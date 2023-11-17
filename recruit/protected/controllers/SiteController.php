<?php

class SiteController extends Controller
{
    public $layout='main/main';
    
    /* Site */
    public function actionIndex()
    {
        $this->layout='//layouts/landing2/main';
        
        $worker = Worker::model()->findAll();
        $agency = Profile::model()->findAllByAttributes(array(
            'type' => 'SOURCE AGENT'
        ));
        $arrival = Transaction::model()->findAllByAttributes(array(
            'arrival' => 'YES' 
        ));
        $employer = Profile::model()->findAllByAttributes(array(
            'type' => 'EMPLOYER'
        ));
        
        $this->render('index', array(
            'worker' => count($worker),
            'agency' => count($agency),
            'arrival' => count($arrival),
            'employer' => count($employer)
        ));
    }
    
    public function actionIndex2()
    {
        $this->layout='//layouts/landing/main';
        
        $worker = Worker::model()->findAll();
        $agency = Profile::model()->findAllByAttributes(array(
            'type' => 'SOURCE AGENT'
        ));
        $arrival = Transaction::model()->findAllByAttributes(array(
            'arrival' => 'YES' 
        ));
        $employer = Profile::model()->findAllByAttributes(array(
            'type' => 'EMPLOYER'
        ));
        
        $this->render('index2', array(
            'worker' => count($worker),
            'agency' => count($agency),
            'arrival' => count($arrival),
            'employer' => count($employer)
        ));
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
        
        if($user->role->name == 'WEBMIN'){
            $this->redirect('index.php?r=Webmin/Dashboard');
        } else if($user->role->name == 'ADMIN'){
            $this->redirect('index.php?r=Admin/Dashboard');
        } else if($user->role->name == 'MASTER'){
            $this->redirect('index.php?r=Master/Mainboard');
        } else if($user->role->name == 'SOURCE AGENT'){
            $this->redirect('index.php?r=Sourceagent/Dashboard');
        } else if($user->role->name == 'EMPLOYER'){
            $this->redirect('index.php?r=Employer/Dashboard');    
        } else if($user->role->name == 'TRAINING CENTER'){
            $this->redirect('index.php?r=Training/Dashboard');    
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
        unset(Yii::app()->session);
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
    
    public function actionScanQR($id)
    {
        $this->layout = '//layouts/main2/main';
        $user = User::model()->findByPk(2);
        $transaction = Transaction::model()->findByAttributes(array(
            'guid' => $id
        ));
        $record = $transaction == NULL ? 'NOT FOUND' : 'FOUND';
        
        $this->render('scanqr', array(
           'user' => $user,
           'transaction' => $transaction,
           'record' => $record
        ));
    }
	
	public function actionSampleExcel()
    {
        Yii::import('ext.phpexcel.XPHPExcel');    
	$objPHPExcel= XPHPExcel::createPHPExcel();
	$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
            ->setLastModifiedBy("Maarten Balliauw")
            ->setTitle("Office 2007 XLSX Test Document")
            ->setSubject("Office 2007 XLSX Test Document")
            ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
            ->setKeywords("office 2007 openxml php")
            ->setCategory("Test result file");

        // Add some data
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Hello')
            ->setCellValue('B2', 'world!')
            ->setCellValue('C1', 'Hello')
            ->setCellValue('D2', 'world!');

        // Miscellaneous glyphs, UTF-8
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A4', 'Miscellaneous glyphs')
            ->setCellValue('A5', 'Ã©Ã Ã¨Ã¹Ã¢ÃªÃ®Ã´Ã»Ã«Ã¯Ã¼Ã¿Ã¤Ã¶Ã¼Ã§');

        // Rename worksheet
        $objPHPExcel->getActiveSheet()->setTitle('Simple');

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $objPHPExcel->setActiveSheetIndex(0);

        // Redirect output to a clientâ€™s web browser (Excel5)
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="01simple.xls"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
        header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header ('Pragma: public'); // HTTP/1.0

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        Yii::app()->end();
    }
    
    public function actionWorkerListExcel()
    {
        Yii::import('ext.phpexcel.XPHPExcel');    
	$objPHPExcel= XPHPExcel::createPHPExcel();
        
        $objPHPExcel->getProperties()->setCreator("i-MANDOR User")
            ->setLastModifiedBy("i-MANDOR User")
            ->setTitle("i-MANDOR Worker List")
            ->setSubject("i-MANDOR Worker List")
            ->setDescription("Worker List - ".date('YmdHis').".")
            ->setKeywords("i-MANDOR Worker List")
            ->setCategory("i-MANDOR Worker List");
        
        $transactions = Transaction::model()->findAll(array('order' => 'id ASC'));
        
        /* Style */
        
        $cellStyle = array(
            'borders' => array(
                'outline' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN
                )
            ),
            'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => array('rgb' => '8ea9db')
            )
        );
        
        /* Excel */
        
        $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->setTitle('Workers');
        
        $objPHPExcel->setActiveSheetIndex(0)
           ->setCellValue('A1', 'No.')
           ->setCellValue('B1', 'Code')
           ->setCellValue('C1', 'GUID')
           ->setCellValue('D1', 'FullName')
           ->setCellValue('E1', 'FirstName')
           ->setCellValue('F1', 'MiddleName')
           ->setCellValue('G1', 'LastName')
           ->setCellValue('H1', 'Gender')
           ->setCellValue('I1', 'DateOfBirth')
           ->setCellValue('J1', 'PlaceOfBirth')
           ->setCellValue('K1', 'Nationality')
           ->setCellValue('L1', 'NationalCard')
           ->setCellValue('M1', 'JobSector')
           ->setCellValue('N1', 'PassportNumber')
           ->setCellValue('O1', 'PassportIssuePlace')
           ->setCellValue('P1', 'PassportIssueDate')
           ->setCellValue('Q1', 'PassportExpiryDate')     
           ->setCellValue('R1', 'Education')
           ->setCellValue('S1', 'HomeAddress')
           ->setCellValue('T1', 'HomeZipCode')
           ->setCellValue('U1', 'HomePhone')
           ->setCellValue('V1', 'HomeMobile')
           ->setCellValue('W1', 'EmailAddress')
           ->setCellValue('X1', 'MaritalStatus')
           ->setCellValue('Y1', 'ChildrenNumber')
           ->setCellValue('Z1', 'Relation')
           ->setCellValue('AA1', 'NextOfKinName')
           ->setCellValue('AB1', 'NextOfKinMobile')
           ->setCellValue('AC1', 'EmployerName')
           ->setCellValue('AD1', 'RegisterNumber')
           ->setCellValue('AE1', 'EmployerAddress1')
           ->setCellValue('AF1', 'EmployerAddress2')
           ->setCellValue('AG1', 'EmployerAddress3')
           ->setCellValue('AH1', 'EmployerAddress4')
           ->setCellValue('AI1', 'EmployerPostcode')
           ->setCellValue('AJ1', 'EmployerDistrict')
           ->setCellValue('AK1', 'EmployerState')
           ->setCellValue('AL1', 'EmployerContact1')
           ->setCellValue('AM1', 'EmployerContact2')
           ->setCellValue('AN1', 'EmployerEmail')
           ->setCellValue('AO1', 'EmployerPIC')
           ->setCellValue('AP1', 'EmployerMobile1')
           ->setCellValue('AQ1', 'EmployerMobile2')
           ->setCellValue('AR1', 'PhotoLink')
           ->setCellValue('AS1', 'QrLink')
           ->setCellValue('AT1', 'Photo');
        
        $objPHPExcel->getActiveSheet()->getStyle('A1:AT1')->applyFromArray($cellStyle);
        
        $p = 0;
        $q = 1;
        
        foreach($transactions as $t){
            $p++;
            $q++;
            
            $education = array();
            
            $edu = Education::model()->findAllByAttributes(array(
                'worker_id' => $t->worker->id
            ));
            
            foreach($edu as $e){
                if($e->educationtype_id != 3){
                    $education[] = $e->educationtype->name;
                }
            }
            
            if(!empty($t->worker->education_other)){
                $education[] = $t->worker->education_other;
            }
            
            $worker_education = count($education) > 0 ? implode(',',$education) : NULL;
            
            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A'.$q, $p)
                ->setCellValue('B'.$q, $t->worker->code)
                ->setCellValue('C'.$q, $t->guid)
                ->setCellValue('D'.$q, $t->worker->full_name)
                ->setCellValue('E'.$q, $t->worker->first_name)
                ->setCellValue('F'.$q, $t->worker->middle_name)
                ->setCellValue('G'.$q, $t->worker->last_name)
                ->setCellValue('H'.$q, $t->worker->gender->name)
                ->setCellValue('I'.$q, date('Y-m-d', strtotime($t->worker->birth_date)))
                ->setCellValue('J'.$q, $t->worker->birth_place)
                ->setCellValue('K'.$q, $t->worker->nationality->name)
                ->setCellValueExplicit('L'.$q, $t->worker->national_card, PHPExcel_Cell_DataType::TYPE_STRING)
                ->setCellValue('M'.$q, empty($t->worker->jobsector_id) ? NULL : $t->worker->jobsector->name)
                ->setCellValue('N'.$q, $t->passport->number)
                ->setCellValue('O'.$q, $t->passport->issue_place)
                ->setCellValue('P'.$q, date('Y-m-d', strtotime($t->passport->issue_date)))
                ->setCellValue('Q'.$q, date('Y-m-d', strtotime($t->passport->expiry_date)))     
                ->setCellValue('R'.$q, $worker_education)
                ->setCellValue('S'.$q, $t->worker->home_address)
                ->setCellValueExplicit('T'.$q, $t->worker->home_zipcode, PHPExcel_Cell_DataType::TYPE_STRING)
                ->setCellValueExplicit('U'.$q, $t->worker->home_phone, PHPExcel_Cell_DataType::TYPE_STRING)
                ->setCellValueExplicit('V'.$q, $t->worker->home_mobile, PHPExcel_Cell_DataType::TYPE_STRING)
                ->setCellValue('W'.$q, $t->worker->email)
                ->setCellValue('X'.$q, $t->worker->marital->name)
                ->setCellValue('Y'.$q, $t->worker->children_number)
                ->setCellValue('Z'.$q, $t->worker->relation->name)
                ->setCellValue('AA'.$q, $t->worker->kin_name)
                ->setCellValueExplicit('AB'.$q, $t->worker->kin_mobile, PHPExcel_Cell_DataType::TYPE_STRING)
                ->setCellValue('AC'.$q, empty($t->employer_id) ? NULL : $t->employer->profile->company->name)
                ->setCellValueExplicit('AD'.$q, empty($t->employer_id) ? NULL : $t->employer->profile->company->register_number, PHPExcel_Cell_DataType::TYPE_STRING)
                ->setCellValue('AE'.$q, empty($t->employer_id) ? NULL : $t->employer->profile->company->address1)
                ->setCellValue('AF'.$q, empty($t->employer_id) ? NULL : $t->employer->profile->company->address2)
                ->setCellValue('AG'.$q, empty($t->employer_id) ? NULL : $t->employer->profile->company->address3)
                ->setCellValue('AH'.$q, empty($t->employer_id) ? NULL : $t->employer->profile->company->address4)
                ->setCellValueExplicit('AI'.$q, empty($t->employer_id) ? NULL : $t->employer->profile->company->postcode, PHPExcel_Cell_DataType::TYPE_STRING)
                ->setCellValue('AJ'.$q, empty($t->employer_id) ? NULL : $t->employer->profile->company->district)
                ->setCellValue('AK'.$q, empty($t->employer_id) ? NULL : $t->employer->profile->company->state->name)
                ->setCellValueExplicit('AL'.$q, empty($t->employer_id) ? NULL : $t->employer->profile->company->contact_number1, PHPExcel_Cell_DataType::TYPE_STRING)
                ->setCellValueExplicit('AM'.$q, empty($t->employer_id) ? NULL : $t->employer->profile->company->contact_number2, PHPExcel_Cell_DataType::TYPE_STRING)
                ->setCellValue('AN'.$q, empty($t->employer_id) ? NULL : $t->employer->profile->company->email)
                ->setCellValue('AO'.$q, empty($t->employer_id) ? NULL : $t->employer->profile->company->person_incharge)
                ->setCellValueExplicit('AP'.$q, empty($t->employer_id) ? NULL : $t->employer->profile->company->mobile_number1, PHPExcel_Cell_DataType::TYPE_STRING)
                ->setCellValueExplicit('AQ'.$q, empty($t->employer_id) ? NULL : $t->employer->profile->company->mobile_number2, PHPExcel_Cell_DataType::TYPE_STRING)
                ->setCellValue('AR'.$q, Helpers::photoOnlineDisplay('uploads/photos/',$t->guid))
                ->setCellValue('AS'.$q, Yii::app()->params['qrlink'].'/php/qr.php?d='.$t->guid.'&e=Q&t=J')
                ->setCellValue('AT'.$q, Helpers::photoBase64Only('uploads/photos/',$t->guid)); 
            
            $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
            $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(13);
            $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(39);
            $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(33);
            $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(13);
            $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(13);
            $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(13);
            $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(10);
            $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(12);
            $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
            $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(16);
            $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(20);
            $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(14);
            $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(16);
            $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(18);
            $objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(12);
            $objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(12);
            $objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(25);
            $objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(90);
            $objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(10);
            $objPHPExcel->getActiveSheet()->getColumnDimension('U')->setWidth(18);
            $objPHPExcel->getActiveSheet()->getColumnDimension('V')->setWidth(18);
            $objPHPExcel->getActiveSheet()->getColumnDimension('W')->setWidth(35);
            $objPHPExcel->getActiveSheet()->getColumnDimension('X')->setWidth(13);
            $objPHPExcel->getActiveSheet()->getColumnDimension('Y')->setWidth(16);
            $objPHPExcel->getActiveSheet()->getColumnDimension('Z')->setWidth(12);
            $objPHPExcel->getActiveSheet()->getColumnDimension('AA')->setWidth(33);
            $objPHPExcel->getActiveSheet()->getColumnDimension('AB')->setWidth(18);
            $objPHPExcel->getActiveSheet()->getColumnDimension('AC')->setWidth(40);
            $objPHPExcel->getActiveSheet()->getColumnDimension('AD')->setWidth(15);
            $objPHPExcel->getActiveSheet()->getColumnDimension('AE')->setWidth(30);
            $objPHPExcel->getActiveSheet()->getColumnDimension('AF')->setWidth(30);
            $objPHPExcel->getActiveSheet()->getColumnDimension('AG')->setWidth(30);
            $objPHPExcel->getActiveSheet()->getColumnDimension('AH')->setWidth(30);
            $objPHPExcel->getActiveSheet()->getColumnDimension('AI')->setWidth(16);
            $objPHPExcel->getActiveSheet()->getColumnDimension('AJ')->setWidth(20);
            $objPHPExcel->getActiveSheet()->getColumnDimension('AK')->setWidth(20);
            $objPHPExcel->getActiveSheet()->getColumnDimension('AL')->setWidth(18);
            $objPHPExcel->getActiveSheet()->getColumnDimension('AM')->setWidth(18);
            $objPHPExcel->getActiveSheet()->getColumnDimension('AN')->setWidth(35);
            $objPHPExcel->getActiveSheet()->getColumnDimension('AO')->setWidth(33);
            $objPHPExcel->getActiveSheet()->getColumnDimension('AP')->setWidth(18);
            $objPHPExcel->getActiveSheet()->getColumnDimension('AQ')->setWidth(18);
            $objPHPExcel->getActiveSheet()->getColumnDimension('AR')->setWidth(30);
            $objPHPExcel->getActiveSheet()->getColumnDimension('AS')->setWidth(30);
            $objPHPExcel->getActiveSheet()->getColumnDimension('AT')->setWidth(30);
        }
        
        
        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $objPHPExcel->setActiveSheetIndex(0);

        // Redirect output to a clientâ€™s web browser (Excel5)
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="WorkerList-'.date('Ymd-His').'.xls"');
        header('Cache-Control: max-age=0');
        
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->setIncludeCharts(TRUE);
        $objWriter->save('php://output');
        Yii::app()->end();
    }
    
    public function actionViewWorkerAll()
    {
        $this->layout = false;
        $transactions = Transaction::model()->findAll(array('order' => 'id ASC'));
        
        $result = array();
        
        foreach($transactions as $t){
            $education = array();
            
            $edu = Education::model()->findAllByAttributes(array(
                'worker_id' => $t->worker->id
            ));
            
            foreach($edu as $e){
                if($e->educationtype_id != 3){
                    $education[] = $e->educationtype->name;
                }
            }
            
            if(!empty($t->worker->education_other)){
                $education[] = $t->worker->education_other;
            }
            
            $worker_education = count($education) > 0 ? implode(',',$education) : NULL;
            
            $result[$t->guid] = array(
                'code' => $t->worker->code,
                'guid' => $t->guid,
                'fullname' => $t->worker->full_name,
                'firstname' => $t->worker->first_name,
                'middlename' => $t->worker->middle_name,
                'lastname' => $t->worker->last_name,
                'gender' => $t->worker->gender->name,
                'dateofbirth' => date('Y-m-d', strtotime($t->worker->birth_date)),
                'placeofbirth' => $t->worker->birth_place,
                'nationality' => $t->worker->nationality->name,
                'nationalcard' => $t->worker->national_card,
                'jobsector' => empty($t->worker->jobsector_id) ? NULL : $t->worker->jobsector->name,
                'passportnumber' => $t->passport->number,
                'passportissueplace' => $t->passport->issue_place,
                'passportissuedate' => date('Y-m-d', strtotime($t->passport->issue_date)),
                'passportexpirydate' => date('Y-m-d', strtotime($t->passport->expiry_date)),
                'education' => $worker_education,
                'homeaddress' => $t->worker->home_address,
                'homezipcode' => $t->worker->home_zipcode,
                'homephone' => $t->worker->home_phone,
                'homemobile' => $t->worker->home_mobile,
                'emailaddress' => $t->worker->email,
                'maritalstatus' => $t->worker->marital->name,
                'childrennumber' => $t->worker->children_number,
                'relation' => $t->worker->relation->name,
                'nextofkinname' => $t->worker->kin_name,
                'nextofkinmobile' => $t->worker->kin_mobile,
                'employername' => empty($t->employer_id) ? NULL : $t->employer->profile->company->name,
                'registernumber' => empty($t->employer_id) ? NULL : $t->employer->profile->company->register_number,
                'employeraddress1' => empty($t->employer_id) ? NULL : $t->employer->profile->company->address1,
                'employeraddress2' => empty($t->employer_id) ? NULL : $t->employer->profile->company->address2,
                'employeraddress3' => empty($t->employer_id) ? NULL : $t->employer->profile->company->address3,
                'employeraddress4' => empty($t->employer_id) ? NULL : $t->employer->profile->company->address4,
                'employerpostcode' => empty($t->employer_id) ? NULL : $t->employer->profile->company->postcode,
                'employerdistrict' => empty($t->employer_id) ? NULL : $t->employer->profile->company->district,
                'employerstate' => empty($t->employer_id) ? NULL : $t->employer->profile->company->state->name,
                'employercontact1' => empty($t->employer_id) ? NULL : $t->employer->profile->company->contact_number1,
                'employercontact2' => empty($t->employer_id) ? NULL : $t->employer->profile->company->contact_number2,
                'employeremail' => empty($t->employer_id) ? NULL : $t->employer->profile->company->email,
                'employerpic' => empty($t->employer_id) ? NULL : $t->employer->profile->company->person_incharge,
                'employermobile1' => empty($t->employer_id) ? NULL : $t->employer->profile->company->mobile_number1,
                'employermobile2' => empty($t->employer_id) ? NULL : $t->employer->profile->company->mobile_number2,
                'photolink' => Helpers::photoOnlineDisplay('uploads/photos/',$t->guid),
                'qrlink' => Yii::app()->params['qrlink'].'/php/qr.php?d='.$t->guid.'&e=Q&t=J',
				'photo' => Helpers::photoBase64Only('uploads/photos/',$t->guid)
            );
        }
        
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }
    
    public function actionViewWorker($id)
    {
        $this->layout = false;
        $t = Transaction::model()->findByAttributes(array(
            'guid' => $id
        ));
        
        $result = array();
        
        if($t == NULL){
            $result[$id] = array(
                'status' => 'RECORD NOT FOUND'
            );
        } else {
            $education = array();
        
            $edu = Education::model()->findAllByAttributes(array(
                'worker_id' => $t->worker->id
            ));

            foreach($edu as $e){
                if($e->educationtype_id != 3){
                    $education[] = $e->educationtype->name;
                }
            }

            if(!empty($t->worker->education_other)){
                $education[] = $t->worker->education_other;
            }

            $worker_education = count($education) > 0 ? implode(',',$education) : NULL;
            
            $result[$t->guid] = array(
                'status' => 'RECORD FOUND',
                'code' => $t->worker->code,
                'guid' => $t->guid,
                'fullname' => $t->worker->full_name,
                'firstname' => $t->worker->first_name,
                'middlename' => $t->worker->middle_name,
                'lastname' => $t->worker->last_name,
                'gender' => $t->worker->gender->name,
                'dateofbirth' => date('Y-m-d', strtotime($t->worker->birth_date)),
                'placeofbirth' => $t->worker->birth_place,
                'nationality' => $t->worker->nationality->name,
                'nationalcard' => $t->worker->national_card,
                'jobsector' => empty($t->worker->jobsector_id) ? NULL : $t->worker->jobsector->name,
                'passportnumber' => $t->passport->number,
                'passportissueplace' => $t->passport->issue_place,
                'passportissuedate' => date('Y-m-d', strtotime($t->passport->issue_date)),
                'passportexpirydate' => date('Y-m-d', strtotime($t->passport->expiry_date)),
                'education' => $worker_education,
                'homeaddress' => $t->worker->home_address,
                'homezipcode' => $t->worker->home_zipcode,
                'homephone' => $t->worker->home_phone,
                'homemobile' => $t->worker->home_mobile,
                'emailaddress' => $t->worker->email,
                'maritalstatus' => $t->worker->marital->name,
                'childrennumber' => $t->worker->children_number,
                'relation' => $t->worker->relation->name,
                'nextofkinname' => $t->worker->kin_name,
                'nextofkinmobile' => $t->worker->kin_mobile,
                'employername' => empty($t->employer_id) ? NULL : $t->employer->profile->company->name,
                'registernumber' => empty($t->employer_id) ? NULL : $t->employer->profile->company->register_number,
                'employeraddress1' => empty($t->employer_id) ? NULL : $t->employer->profile->company->address1,
                'employeraddress2' => empty($t->employer_id) ? NULL : $t->employer->profile->company->address2,
                'employeraddress3' => empty($t->employer_id) ? NULL : $t->employer->profile->company->address3,
                'employeraddress4' => empty($t->employer_id) ? NULL : $t->employer->profile->company->address4,
                'employerpostcode' => empty($t->employer_id) ? NULL : $t->employer->profile->company->postcode,
                'employerdistrict' => empty($t->employer_id) ? NULL : $t->employer->profile->company->district,
                'employerstate' => empty($t->employer_id) ? NULL : $t->employer->profile->company->state->name,
                'employercontact1' => empty($t->employer_id) ? NULL : $t->employer->profile->company->contact_number1,
                'employercontact2' => empty($t->employer_id) ? NULL : $t->employer->profile->company->contact_number2,
                'employeremail' => empty($t->employer_id) ? NULL : $t->employer->profile->company->email,
                'employerpic' => empty($t->employer_id) ? NULL : $t->employer->profile->company->person_incharge,
                'employermobile1' => empty($t->employer_id) ? NULL : $t->employer->profile->company->mobile_number1,
                'employermobile2' => empty($t->employer_id) ? NULL : $t->employer->profile->company->mobile_number2,
                'photolink' => Helpers::photoOnlineDisplay('uploads/photos/',$t->guid),
                'qrlink' => Yii::app()->params['qrlink'].'/php/qr.php?d='.$t->guid.'&e=Q&t=J',
				'photo' => Helpers::photoBase64Only('uploads/photos/',$t->guid)
            );
        }
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }
}