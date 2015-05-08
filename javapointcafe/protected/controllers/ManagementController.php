<?php

class ManagementController extends Controller {

    public function actionIndex() {
        $this->render('index');
    }

    public function actionLogin() {
        $this->pageTitle = "Login";

//        $this->layout = 'login';
        $model = new LoginForm;
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate())
                $model->login();
        }
        $this->render('login', array('model' => $model));
    }
    
    /* THIS IS FOR ORDER */

    public function actionOrder() {
        LoginForm::checkLogin();
        $model = new Customer('search');
        $model->setAttribute('order_complete', 0);

        if (isset($_GET['Customer']))
            $model->attributes = $_GET['Customer'];

        $this->render('order/new', array(
            'model' => $model,
        ));
    }

    public function actionVieworder($id) {
        LoginForm::checkLogin();
        $model = Customer::model()->findByPk($id);
        $orders = new Order();
        $orders->order_customer_id = $id;

        $items = new Item('search');
        $items->unsetAttributes();
        $criteria = new CDbCriteria;
        $criteria->condition = "subcategory_id";
        if (isset($_GET['Item']))
            $items->attributes = $_GET['Item'];

        $this->render('order/vieworder', array(
            'model' => $model,
            'orders' => $orders,
            'items' => $items,
        ));
    }

    public function actionCompleteorder($id) {
        LoginForm::checkLogin();
        $customer = Customer::model()->findByPk($id);
        $customer->order_complete = 1;
        $customer->save();
        $this->redirect(array('management/order'));
    }

    public function actionAdditem() {
        LoginForm::checkLogin();
        $item_id = $_GET['item_id'];
        $customer_id = $_GET['customer_id'];

        //check if item exists in order
        $order_item = Order::model()->findByAttributes(array('order_customer_id' => $customer_id, 'order_item_id' => $item_id));
        if ($order_item) {
            $order_item->order_quantity = $order_item->order_quantity + 1;
        } else {
            $order_item = new Order();
            $order_item->order_customer_id = $customer_id;
            $order_item->order_item_id = $item_id;
            $order_item->order_quantity = 1;
        }

        if ($order_item->save()) {
            $customer = Customer::model()->findByPk($customer_id);
            $orders = $customer->orders;
            $total_amount = 0;
            foreach ($orders as $order) {
                $total_amount += $order->order_quantity * $order->orderItem->item_price;
            }
            $customer->total_amount = $total_amount;
            $customer->save();
        }

        $this->redirect(array('management/vieworder', 'id' => $customer_id));
    }

    public function actionEdititem($id) {
        LoginForm::checkLogin();
        $model = Order::model()->findByPk($id);

        if (isset($_POST['Order'])) {
            $model->attributes = $_POST['Order'];
            if ($model->save()) {
                $customer = $model->orderCustomer;
                $orders = $customer->orders;
                $total_amount = 0;
                foreach ($orders as $order) {
                    $total_amount += $order->order_quantity * $order->orderItem->item_price;
                }
                $customer->total_amount = $total_amount;
                if ($customer->save()) {
                    $this->redirect(array('management/vieworder', 'id' => $model->order_customer_id));
                }
            }
        }

        $this->render('order/edititem', array(
            'model' => $model,
        ));
    }

    public function actionDeleteitem($id) {
        LoginForm::checkLogin();
        $order = Order::model()->findByPk($id);
        $id = $order->order_customer_id;
        $order->delete();

        $customer = Customer::model()->findByPk($id);
        $orders = $customer->orders;
        $total_amount = 0;
        foreach ($orders as $order) {
            $total_amount += $order->order_quantity * $order->orderItem->item_price;
        }
        $customer->total_amount = $total_amount;
        $customer->save();

        $this->redirect(array('management/vieworder', 'id' => $id));
    }

    /* END ORDER */


    /* THIS IS FOR PROCESSED */
    public function actionProcessed() {
        LoginForm::checkLogin();

        $model = new Customer('search');
        $model->setAttribute('order_complete', 1);


        if (isset($_GET['Customer']))
            $model->attributes = $_GET['Customer'];

        $this->render('order/processed', array(
            'model' => $model,
        ));
    }

    public function actionViewprocessed($id) {
        LoginForm::checkLogin();

        $model = Customer::model()->findByPk($id);
        $orders = new Order();
        $orders->order_customer_id = $id;

        $this->render('order/viewprocessed', array(
            'model' => $model,
            'orders' => $orders,
        ));
    }

    /* END PROCESSED */

    /* THIS IS FOR SITE MAMAGEMENT */

    public function actionSite() {
        LoginForm::checkLogin();

        $model = $this->loadModel();

        if (isset($_POST['Management'])) {
            $model->attributes = $_POST['Management'];
            $uploadedFile = CUploadedFile::getInstance($model, 'logo');
            $model->logo = 'logo.' . $uploadedFile->getExtensionName();
            if ($model->save()) {
                Alert::createAlert('Logo updated successfully.', 'success');
                if (!empty($uploadedFile)) {
                    $uploadedFile->saveAs($_SERVER['DOCUMENT_ROOT'] . Yii::app()->request->baseUrl . '/images/logo/logo.' . $uploadedFile->getExtensionName());
                }
            }
        }

        $this->render('site/logo', array(
            'model' => $model,
        ));
    }

    public function actionMenuindex() {
        LoginForm::checkLogin();
        $category = new Category();
        if (isset($_POST['Category'])) {
            $category->attributes = $_POST['Category'];
            if ($category->save()) {
                $category = new Category();
                Alert::createAlert('Category added successfully.', 'success');
            }
        }

        $model = new Category('search');
        $model->unsetAttributes();
        if (isset($_GET['Category']))
            $model->attributes = $_GET['Category'];

        $this->render('site/menu', array(
            'model' => $model,
            'category' => $category,
        ));
    }

    public function actionDeletecategory($id) {
        LoginForm::checkLogin();
        $category = Category::model()->findByPk($id);
        if ($category->delete()) {
            Alert::createAlert('Category deleted successfully.', 'success');
        }

        $this->redirect(array('management/menuindex'));
    }

    public function actionViewcategory($id) {
        LoginForm::checkLogin();

        $model = new Subcategory;
        if (isset($_POST['Subcategory'])) {
            $model->attributes = $_POST['Subcategory'];
            $model->category_id = $id;
            if ($model->save()) {
                $model = new Subcategory;
                Alert::createAlert('Subcategory added successfully.', 'success');
            }
        }

        $category = Category::model()->findByPk($id);

        if (isset($_POST['Category'])) {
            $category->attributes = $_POST['Category'];
            if ($category->save()) {
                Alert::createAlert('Category updated successfully.', 'success');
            }
        }

        $subcategories = new Subcategory();
        $subcategories->category_id = $id;

        $this->render('site/category', array(
            'model' => $model,
            'category' => $category,
            'subcategories' => $subcategories,
        ));
    }

    public function actionDeletesubcategory($id) {
        LoginForm::checkLogin();
        $subcategory = Subcategory::model()->findByPk($id);
        $id = $subcategory->category_id;
        if ($subcategory->delete()) {
            Alert::createAlert('Subcategory deleted successfully.', 'success');
        }

        $this->redirect(array('management/viewcategory', 'id' => $id));
    }

    public function actionViewsubcategory($id) {
        LoginForm::checkLogin();
        $model = new Item();
        if (isset($_POST['Item'])) {
            $model->attributes = $_POST['Item'];
            $model->subcategory_id = $id;
            $uploadedFile = CUploadedFile::getInstance($model, 'item_image');
            if ($model->save()) {
                if (empty($uploadedFile)) {
                    $model->item_image = 'default.png';
                } else {
                    $model->item_image = $model->item_id . '.' . $uploadedFile->getExtensionName();
                    $uploadedFile->saveAs($_SERVER['DOCUMENT_ROOT'] . Yii::app()->request->baseUrl . '/images/menu/' . $model->item_id . '.' . $uploadedFile->getExtensionName());
                }
                $model->save();
                Alert::createAlert('Item added successfully.', 'success');
                $model = new Item;
            }
        }
        $subcategory = Subcategory::model()->findByPk($id);

        if (isset($_POST['Subcategory'])) {
            $subcategory->attributes = $_POST['Subcategory'];
            if ($subcategory->save()) {
                Alert::createAlert('Subcategory updated successfully.', 'success');
            }
        }

        $items = new Item();
        $items->subcategory_id = $id;
        $this->render('site/subcategory', array(
            'subcategory' => $subcategory,
            'items' => $items,
            'model' => $model
        ));
    }

    public function actionUpdatemenuitem($id) {
        LoginForm::checkLogin();

        $item = Item::model()->findByPk($id);
        if (isset($_POST['Item'])) {
            $error = "";
            $uploadedFile = CUploadedFile::getInstance($item, 'item_image');
            if (empty($uploadedFile)) {
                $_POST['Item']['item_image'] = $item->item_image;
            } else if (!($uploadedFile->getExtensionName() == 'jpg' || $uploadedFile->getExtensionName() == 'png')) {
                $_POST['Item']['item_image'] = $item->item_image;
                $error = 'File type must be png or jpg.';
            } else {
                $_POST['Item']['item_image'] = $id . '.' . $uploadedFile->getExtensionName();
            }
            $item->attributes = $_POST['Item'];
            if ($error != "") {
                Alert::createAlert('File type not supported', 'danger');
            } else if ($item->save()) {
                Alert::createAlert('Item updated successfully.', 'success');
                if (!empty($uploadedFile))
                    $uploadedFile->saveAs($_SERVER['DOCUMENT_ROOT'] . Yii::app()->request->baseUrl . '/images/menu/' . $id . '.' . $uploadedFile->getExtensionName());
            }
        }
        $this->render('site/editmenuitem', array(
            'model' => $item,
        ));
    }

    public function actionDeletemenuitem($id) {
        LoginForm::checkLogin();

        $item = Item::model()->findByPk($id);
        $id = $item->subcategory_id;
        if ($item->delete()) {
            Alert::createAlert('Item deleted successfully.', 'success');
        }

        $this->redirect(array('management/viewsubcategory', 'id' => $id));
    }

    public function actionStory() {
        LoginForm::checkLogin();

        $model = $this->loadModel();

        if (isset($_POST['Management'])) {
            $model->attributes = $_POST['Management'];
            $uploadedFile = CUploadedFile::getInstance($model, 'story_image');
            if (!empty($uploadedFile))
                $model->story_image = 'logo.' . $uploadedFile->getExtensionName();

            if ($model->save()) {
                Alert::createAlert('Our Story updated successfully.', 'success');
                if (!empty($uploadedFile)) {
                    $uploadedFile->saveAs($_SERVER['DOCUMENT_ROOT'] . Yii::app()->request->baseUrl . '/images/logo/java.' . $uploadedFile->getExtensionName());
                }
            }
        }

        $this->render('site/story', array(
            'model' => $model,
        ));
    }

    public function actionLocation() {
        LoginForm::checkLogin();
        $model = $this->loadModel();

        if (isset($_POST['Management'])) {
            $model->attributes = $_POST['Management'];
            if ($model->save())
                Alert::createAlert('Location updated successfully.', 'success');
        }

        $this->render('site/location', array(
            'model' => $model,
        ));
    }

    /* END SITE MANAGEMENT */

    public function actionLogout() {
        LoginForm::checkLogin();
        LoginForm::logout();
        $this->redirect('login');
    }

    public function loadModel() {
        $model = Management::model()->find();
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    // Uncomment the following methods and override them if needed
    /*
      public function filters()
      {
      // return the filter configuration for this controller, e.g.:
      return array(
      'inlineFilterName',
      array(
      'class'=>'path.to.FilterClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }

      public function actions()
      {
      // return external action classes, e.g.:
      return array(
      'action1'=>'path.to.ActionClass',
      'action2'=>array(
      'class'=>'path.to.AnotherActionClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }
     */
}
