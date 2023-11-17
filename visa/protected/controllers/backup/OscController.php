<?php

class OscController extends Controller
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
                    'Index','Dashboard','Application','ListVerified','ListPending',
                    'ListDeliverHC','ListDeliveredHC','ListReturnAdmin','ListReturnedAdmin'
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
    
    public function actionListVerified()
    {
        $this->render('verified');
    }
    
    public function actionListPending()
    {
        $this->render('pending');
    }
    
    public function actionListDeliverHC()
    {
        $this->render('deliverhc');
    }
    
    public function actionListDeliveredHC()
    {
        $this->render('deliveredhc');
    }
    
    public function actionListReturnAdmin()
    {
        $this->render('returnadmin');
    }
    
    public function actionListReturnedAdmin()
    {
        $this->render('returnedadmin');
    }
}