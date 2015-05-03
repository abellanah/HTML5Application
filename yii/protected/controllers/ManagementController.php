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

    public function actionOrder() {
        LoginForm::checkLogin();
        $this->render('order/new');
    }

    public function actionProcessed() {
        LoginForm::checkLogin();

        $model = new Customer('search');
        $model->setAttribute('order_complete', 0);
        

        if (isset($_GET['Customer']))
            $model->attributes = $_GET['Customer'];

        $this->render('order/processed', array(
            'model' => $model,
        ));
    }

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
