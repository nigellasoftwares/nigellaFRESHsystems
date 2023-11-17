<?php

class HighcommController extends Controller
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
                    'Index','Dashboard','Application',
                    'ListApproved','ListRejected','ListPending',
                    'ListReturnOSC','ListReturnedOSC'
                ),
                'users'=>array('*'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }
    
    /* Admin */
    public function actionIndex()
    {
        $this->actionDashboard();
    }

    public function actionDashboard()
    {
        $this->render('dashboard');
    }
    
    public function actionApplication()
    {
        $this->render('application');
    }
    
    public function actionListApproved()
    {
        $this->render('approved');
    }
    
    public function actionListRejected()
    {
        $this->render('rejected');
    }
    
    public function actionListPending()
    {
        $this->render('pending');
    }
    
    public function actionListReturnOSC()
    {
        $this->render('returnosc');
    }
    
    public function actionListReturnedOSC()
    {
        $this->render('returnedosc');
    }
}