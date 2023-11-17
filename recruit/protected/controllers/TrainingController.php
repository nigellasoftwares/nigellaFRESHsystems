<?php

class TrainingController extends Controller
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
                    'Index','Dashboard','Calendar','Calendar2'
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
        $this->actionDashboard();
    }

    public function actionDashboard()
    {
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        
        $this->render('dashboard', array(
            'user' => $user
        ));
    }

    public function actionCalendar()
    {
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        
        $this->render('calendar', array(
            'user' => $user
        ));
    }

    public function actionCalendar2()
    {
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        
        $this->render('calendar2', array(
            'user' => $user
        ));
    }   
}