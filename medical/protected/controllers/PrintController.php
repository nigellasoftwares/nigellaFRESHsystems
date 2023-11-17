<?php

class PrintController extends Controller
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
                    'Index','Test','Applicant','ApplicantTest','Dependant','DependantTest',
                    'ApplicantVisa','DependantVisa','Receipt'),
                'users'=>array('*'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }
    
    /* Phase */
    public function actionIndex()
    {
        $this->render('index');
    }
    
    public function actionTest()
    {
        $pdf = Yii::app()->ePdf->mpdf('utf-8','A4','','','10','10','73.5','26');
        $pdf->SetFont('helvetica', '', 11);
        $pdf->showImageErrors = true;
        $pdf->shrink_tables_to_fit = 1;
        $pdf->WriteHTML($this->renderPartial('test','',true));
        
        $filename = 'test.pdf';
        $pdf->Output($filename,'I');
    }
    
    public function actionApplicantTest($id)
    {
        $user = User::model()->findByAttributes(array('username' => Yii::app()->user->getState('username')));
        $applicant = Applicant::model()->findByPk($id);
        
        $pdf = Yii::app()->ePdf->mpdf('utf-8','A5-L','','','10','10','20.5','26');
        $pdf->SetFont('helvetica', '', 11);
        $pdf->showImageErrors = true;
        $pdf->shrink_tables_to_fit = 1;
        $pdf->WriteHTML($this->renderPartial('applicant', array(
            'a' => $applicant,
            'user' => $user
        ), true));
        
        $filename = 'applicant-'.$id.'.pdf';
        $pdf->Output($filename,'I');
    }
    
    public function actionApplicant($id)
    {
        $user = User::model()->findByAttributes(array('username' => Yii::app()->user->getState('username')));
        $applicant = Applicant::model()->findByPk($id);
        //$dependant = Dependant::model()->findAllByAttributes(array('applicant_id' => $id));
        
        $pdf = Yii::app()->ePdf->mpdf('utf-8','A4','','','10','10','10.5','26');
        $pdf->SetFont('helvetica', '', 11);
        $pdf->showImageErrors = true;
        $pdf->shrink_tables_to_fit = 1;
        $pdf->WriteHTML($this->renderPartial('applicant_test', array(
            'a' => $applicant,
            //'dependant' => $dependant,
            'user' => $user
        ), true));
        
        $filename = 'applicant-'.$id.'.pdf';
        $pdf->Output($filename,'I');
    }
    
    public function actionDependantTest($id)
    {
        $user = User::model()->findByAttributes(array('username' => Yii::app()->user->getState('username')));
        $dependant = Dependant::model()->findByPk($id);
        
        $pdf = Yii::app()->ePdf->mpdf('utf-8','A5-L','','','10','10','20.5','26');
        $pdf->SetFont('helvetica', '', 11);
        $pdf->showImageErrors = true;
        $pdf->shrink_tables_to_fit = 1;
        $pdf->WriteHTML($this->renderPartial('dependant', array(
            'd' => $dependant,
            'user' => $user
        ), true));
        
        $filename = 'dependant-'.$id.'.pdf';
        $pdf->Output($filename,'I');
    }
    
    public function actionDependant($id)
    {
        $user = User::model()->findByAttributes(array('username' => Yii::app()->user->getState('username')));
        $dependant = Dependant::model()->findByPk($id);
        $applicant = Applicant::model()->findByPk($dependant->applicant_id);
        
        $pdf = Yii::app()->ePdf->mpdf('utf-8','A4','','','10','10','10.5','26');
        $pdf->SetFont('helvetica', '', 11);
        $pdf->showImageErrors = true;
        $pdf->shrink_tables_to_fit = 1;
        $pdf->WriteHTML($this->renderPartial('dependant_test', array(
            'd' => $dependant,
            'a' => $applicant,
            'user' => $user
        ), true));
        
        $filename = 'dependant-'.$id.'.pdf';
        $pdf->Output($filename,'I');
    }
    
    public function actionApplicantVisa($id)
    {
        $user = User::model()->findByAttributes(array('username' => Yii::app()->user->getState('username')));
        $applicant = Applicant::model()->findByPk($id);
        
        $pdf = Yii::app()->ePdf->mpdf('utf-8','A4','','','10','10','10.5','26');
        $pdf->SetFont('helvetica', '', 11);
        $pdf->showImageErrors = true;
        $pdf->shrink_tables_to_fit = 1;
        $pdf->WriteHTML($this->renderPartial('applicant_visa', array(
            'a' => $applicant,
            'user' => $user
        ), true));
        
        $filename = 'applicantvisa-'.$id.'.pdf';
        $pdf->Output($filename,'I');
    }
    
    public function actionDependantVisa($id)
    {
        $user = User::model()->findByAttributes(array('username' => Yii::app()->user->getState('username')));
        $dependant = Dependant::model()->findByPk($id);
        
        $pdf = Yii::app()->ePdf->mpdf('utf-8','A4','','','10','10','10.5','26');
        $pdf->SetFont('helvetica', '', 11);
        $pdf->showImageErrors = true;
        $pdf->shrink_tables_to_fit = 1;
        $pdf->WriteHTML($this->renderPartial('applicant_visa', array(
            'd' => $dependant,
            'user' => $user
        ), true));
        
        $filename = 'applicantvisa-'.$id.'.pdf';
        $pdf->Output($filename,'I');
    }
    
    public function actionReceipt($id)
    {
        $user = User::model()->findByAttributes(array('username' => Yii::app()->user->getState('username')));
        $applicant = Applicant::model()->findByPk($id);
        //$dependant = Dependant::model()->findAllByAttributes(array('applicant_id' => $id));
        $transaction = Transaction::model()->findByAttributes(array('guid'=>$applicant->guid));
        $agent = Profile::model()->findByPk($transaction->agent_id);
        $doctor = Profile::model()->findByPk($transaction->doctor_id);
        
        $pdf = Yii::app()->ePdf->mpdf('utf-8','A4','','','10','10','10.5','26');
        $pdf->SetFont('helvetica', '', 11);
        $pdf->showImageErrors = true;
        $pdf->shrink_tables_to_fit = 1;
        $pdf->WriteHTML($this->renderPartial('applicant_receipt', array(
            'a' => $applicant,
            'transaction' => $transaction,
            'user' => $user,
            'agent' => $agent,
            'doctor' => $doctor
        ), true));
        
        $filename = 'applicantreceipt-'.$id.'.pdf';
        $pdf->Output($filename,'I');
    }        
}