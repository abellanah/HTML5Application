<?php

class SiteController extends Controller {

    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        //this is for ITEMS
        $condition = new CDbCriteria();
        $condition->addNotInCondition('subcategory_id', array('NULL'));
        $items = Item::model()->findAll($condition);

        //This is for Other Details
        $management = Management::model()->find();

        $this->render('index', array('items' => $items, 'details' => $management));
    }

    public function actionAdduser() {
        LoginForm::checkLogin();
        $this->pageTitle = "Register Admin";

        $model = new User();

        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            if ($model->user_password != $_POST['User']['confirm_user_password']) {
                $model->addError('confirm_user_password', 'Confirm password does not match with password.');
            } else {
                $model->user_password = LoginForm::encrypt($model->user_password);
                if ($model->save()) {
                    $model = new User();
                    Alert::createAlert('User Admin added successfully.', 'success');
                } else {
                    $model->user_password = $_POST['User']['user_password'];
                }
            }
        }

        $this->render('register', array('model' => $model));
    }

    public function actionAddtocart() {
        if (isset($_GET['item_quantity']) && isset($_GET['item_id'])) {
            $item = Item::model()->findByPk($_GET['item_id']);
            $data = array('result' => "");
            if ($item) {
                if (!is_numeric($_GET['item_quantity'])) {
                    $data['result'] = 'An Error Occured.';
                } else {
                    $cart = array();
                    if (isset(Yii::app()->session['cart'])) {
                        $cart = unserialize(Yii::app()->session['cart']);
                    }
                    if (!isset($cart[$_GET['item_id']])) {
                        $cart[$_GET['item_id']] = 0;
                    }
                    $cart[$_GET['item_id']] += $_GET['item_quantity'];
                    Yii::app()->session['cart'] = serialize($cart);
                    $data['result'] = $item->item_description . " is added in your cart.";
                }
            } else {
                $data['result'] = 'An Error Occured.';
            }
            echo json_encode($data);
        } else {
            $this->redirect('index');
        }
    }

    public function actionShowcart() {
        $condition = new CDbCriteria();
        $condition->addNotInCondition('subcategory_id', array('NULL'));
        $items = Item::model()->findAll($condition);
        $this->render('cart', array('items' => $items));
    }

    public function actionUpdatecart() {
        if (isset($_POST['item_quantity']) && isset($_POST['item_id'])) {
            $item = Item::model()->findByPk($_POST['item_id']);
            if ($item) {
                if (!is_numeric($_POST['item_quantity'])) {
                    Alert::createAlert('Error Occured', 'danger');
                } else {
                    $cart = array();
                    if (isset(Yii::app()->session['cart'])) {
                        $cart = unserialize(Yii::app()->session['cart']);
                    }
                    if (!isset($cart[$_POST['item_id']])) {
                        $cart[$_POST['item_id']] = 0;
                    }
                    $cart[$_POST['item_id']] += $_POST['item_quantity'];
                    Yii::app()->session['cart'] = serialize($cart);
                    Alert::createAlert('Cart Updated', 'success');
                }
            } else {
                Alert::createAlert('Error Occured', 'danger');
            }
            $this->redirect('showcart');
        } else {
            $this->redirect('index');
        }
    }

    public function actionRemovefromcart($id = 0) {
        if ($id) {
            $item_set = array();
            if (isset(Yii::app()->session['cart'])) {
                $item_set = unserialize(Yii::app()->session['cart']);
            }
            if (isset($item_set[$id])) {
                unset($item_set[$id]);
            }
            Yii::app()->session['cart'] = serialize($item_set);

            Alert::createAlert('Cart successfully updated', 'success');
        }
        $this->redirect(array('showcart'));
    }

    public function actionCheckout() {
        if (isset(Yii::app()->session['cart'])) {
            $customer = new Customer();
            if (isset($_POST['Customer'])) {
                $customer->attributes = $_POST['Customer'];
                $customer->created_time = date('Y-m-d H:i:s');
                $customer->order_complete = 0;
                $customer->confirmation_no = 0;
                $customer->total_amount = 0;

                if ($customer->save()) {
                    $cart = unserialize(Yii::app()->session['cart']);
                    $total_amount = 0;
                    foreach ($cart as $key => $value) {
                        $order = new Order();
                        $item = Item::model()->findByPk($key);
                        $order->order_customer_id = $customer->customer_id;
                        $order->order_item_id = $key;
                        $order->order_quantity = $value;
                        if ($order->save()) {
                            $total_amount += ($item->item_price * $value);
                        }
                    }
                    $customer->total_amount = $total_amount;
                    $customer->confirmation_no = "JPC" . dechex($customer->customer_id);
                    if($customer->save()){
                        unset(Yii::app()->session['cart']);
                        $this->render('confirmation', array('model' => $customer));
                        return;
                    }
                }
            }
            $this->render('checkout', array('model' => $customer));
        } else {
            $this->redirect('index');
        }
    }

     public function actionConfirmation() {
          $this->render('confirmation');
     }
    
    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Displays the login page
     */
    public function actionLogin() {
        $model = new LoginForm;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login())
                $this->redirect(Yii::app()->user->returnUrl);
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

}
