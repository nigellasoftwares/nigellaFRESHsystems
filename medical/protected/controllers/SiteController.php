<?php

class SiteController extends Controller
{
    public $layout='main/main';
    
    /* Site */
    public function actionIndex()
    {
        $this->layout='//layouts/landing/main';
        
        $this->render('index');
    }

    /* Displays the login page */
    public function actionLogin()
    {
        $this->layout='//layouts/login/main';
        $model=new LoginForm;

        // if it is ajax validation request
        if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if(isset($_POST['LoginForm']))
        {
            $model->attributes=$_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if($model->validate() && $model->login()){
                $this->redirect(array('Site/Main'));
            }    
        }
        // display the login form
        $this->render('login',array('model'=>$model));
    }
    
    public function actionMain()
    {
        $user = User::model()->findByAttributes(array('username'=>Yii::app()->user->getState('username')));
        
        if($user->role->name == 'ADMIN'){
            $this->redirect('index.php?r=Admin/Dashboard');
        } else if($user->role->name == 'AGENT'){
            $this->redirect('index.php?r=Agent/Dashboard');
        } else if($user->role->name == 'DOCTOR'){
            $this->redirect('index.php?r=Doctor/Dashboard');    
        } else {
            $this->redirect('index.php?r=Site/Logout');
        }
    }        

    /* Logs out the current user and redirect to homepage. */
    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
        unset(Yii::app()->session['csrf_token']);
    }
    
    /* This is the action to handle external exceptions. */
    public function actionError()
    {
        $this->layout='//layouts/error/main';
        /*
        $this->layout='//layouts/error/main';
        $this->render('error');
        $error = Yii::app()->errorHandler->error;
        $this->render('error', $error);
        */
        if($error = Yii::app()->errorHandler->error){
            if(Yii::app()->request->isAjaxRequest){
                echo $error['message'];
            } else {
                $this->render('error', $error);
            }    
        } 
    }
    
    public function actionFingerprint($id)
    {
        $transaction = Transaction::model()->findByAttributes(array('guid'=>$id));
        $transaction->is_verified = 'YES';
        $transaction->save();
    }
}