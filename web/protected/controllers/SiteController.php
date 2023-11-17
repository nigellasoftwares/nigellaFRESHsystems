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
    
    public function actionRecruit()
    {
        $this->layout='//layouts/landing/main';
        $agency = Agency::model()->findAll(array(
            //'order' => 'name ASC'
            'order' => "IF(name RLIKE '^[a-z]', 1, 2), name"
        ));
        
        $local = Local::model()->findAll(array(
            //'order' => 'name ASC'
            'order' => "IF(name RLIKE '^[a-z]', 1, 2), name"
        ));
        
        //$page = 'recruitlist';
        $page = 'recruitcard';
        
        $this->render($page, array(
            'agency' => $agency,
            'local' => $local
        ));
    }
    
    public function actionRecruitList()
    {
        $this->layout='//layouts/landing/main';
        $agency = Agency::model()->findAll(array(
            'order' => 'id ASC'
        ));
        
        $this->render('recruitlist', array(
            'agency' => $agency
        ));
    }
    
    public function actionRecruitCard()
    {
        $this->layout='//layouts/landing/main';
        $agency = Agency::model()->findAll(array(
            'order' => 'id ASC'
        ));
        
        $this->render('recruitcard', array(
            'agency' => $agency
        ));
    }
    
    public function actionMedical()
    {
        $this->layout='//layouts/landing/main';
        $medical = Medical::model()->findAll(array(
            'order' => 'name ASC'
        ));
        
        //$page = 'medicallist';
        $page = 'medicalcard';
        
        $this->render($page, array(
            'medical' => $medical
        ));
    }
    
    public function actionMedicalList()
    {
        $this->layout='//layouts/landing/main';
        $medical = Medical::model()->findAll(array(
            'order' => 'id ASC'
        ));
        
        $this->render('medicallist', array(
            'medical' => $medical
        ));
    }
    
    public function actionMedicalCard()
    {
        $this->layout='//layouts/landing/main';
        $medical = Medical::model()->findAll(array(
            'order' => 'id ASC'
        ));
        
        $this->render('medicalcard', array(
            'medical' => $medical
        ));
    }
    
    public function actionTraining()
    {
        $this->layout='//layouts/landing/main';
        $training = Training::model()->findAll(array(
            'order' => 'name ASC'
        ));
        
        //$page = 'traininglist';
        $page = 'trainingcard';
        
        $this->render($page, array(
            'training' => $training
        ));
    }
    
    public function actionTrainingList()
    {
        $this->layout='//layouts/landing/main';
        $training = Training::model()->findAll(array(
            'order' => 'id ASC'
        ));
        
        $this->render('traininglist', array(
            'training' => $training
        ));
    }
    
    public function actionTrainingCard()
    {
        $this->layout='//layouts/landing/main';
        $training = Training::model()->findAll(array(
            'order' => 'id ASC'
        ));
        
        $this->render('trainingcard', array(
            'training' => $training
        ));
    }
    
    public function actionCheckResult()
    {
        $this->layout='//layouts/landing/main';
        
        $this->render('result');
    }
    
    /* This is the action to handle external exceptions. */
    public function actionError()
    {
        $this->layout='//layouts/landing/main';
        
        if($error = Yii::app()->errorHandler->error){
            if(Yii::app()->request->isAjaxRequest){
                echo $error['message'];
            } else {
                $this->render('error', $error);
            }    
        } 
    }
}