<?php

class SettingController extends Controller
{
    public $layout='main/main';
    
    /* @return array action filters */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }
    
    /*  Specifies the access control rules.
        This method is used by the 'accessControl' filter.
        @return array access control rules */
    public function accessRules()
    {
        return array(
            array('allow',
                'actions'=>array(
                    'Index','EducationType','Gender','Marital','Nationality','Role','State','Status'
                ),
                'users'=>array('*'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }
    
    public function actionIndex()
    {
        $this->actionEducationType();
    }

    public function actionEducationType()
    {
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        
        $item = EducationType::model()->findAll(array(
            'order' => 'sort ASC'
        ));
        
        $this->render('educationtype', array(
            'user' => $user,
            'item' => $item
        ));
    }
    
    public function actionGender()
    {
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        
        $item = Gender::model()->findAll(array(
            'order' => 'sort ASC'
        ));
        
        $this->render('gender', array(
            'user' => $user,
            'item' => $item
        ));
    }
    
    public function actionMarital()
    {
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        
        $item = Marital::model()->findAll(array(
            'order' => 'sort ASC'
        ));
        
        $this->render('marital', array(
            'user' => $user,
            'item' => $item
        ));
    }
    
    public function actionNationality()
    {
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        
        $item = Nationality::model()->findAll(array(
            'order' => 'sort ASC'
        ));
        
        $this->render('nationality', array(
            'user' => $user,
            'item' => $item
        ));
    }
    
    public function actionRole()
    {
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        
        $item = Role::model()->findAll(array(
            'order' => 'sort ASC'
        ));
        
        $this->render('role', array(
            'user' => $user,
            'item' => $item
        ));
    }
    
    public function actionState()
    {
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        
        $item = State::model()->findAll(array(
            'order' => 'sort ASC'
        ));
        
        $this->render('role', array(
            'user' => $user,
            'item' => $item
        ));
    }
    
    public function actionStatus()
    {
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        
        $item = Status::model()->findAll(array(
            'order' => 'sort ASC'
        ));
        
        $this->render('role', array(
            'user' => $user,
            'item' => $item
        ));
    }
}