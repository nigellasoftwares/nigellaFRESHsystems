<?php
// protected/components/Helpers.php

class Helpers 
{
    public static function systemName()
    {
        $title = 'e-Bfbms';
        return $title;
    }
    
    public static function getGUID()
    {
        mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
        $charid = strtoupper(md5(uniqid(rand(), true)));
        $hyphen = chr(45);// "-"
        $uuid = chr(123)// "{"
            .substr($charid, 0, 8).$hyphen
            .substr($charid, 8, 4).$hyphen
            .substr($charid,12, 4).$hyphen
            .substr($charid,16, 4).$hyphen
            .substr($charid,20,12)
            .chr(125);// "}"
        $uuid2 = substr($charid, 0, 8).$hyphen
            .substr($charid, 8, 4).$hyphen
            .substr($charid,12, 4).$hyphen
            .substr($charid,16, 4).$hyphen
            .substr($charid,20,12);

        return $uuid2;
    }
    
    public static function fileRemove($target_dir,$filename)
    {
        if(file_exists($target_dir.basename($filename.'.gif'))){
            unlink($target_dir.basename($filename.'.gif'));
        } else if(file_exists($target_dir.basename($filename.'.jpg'))){
            unlink($target_dir.basename($filename.'.jpg'));
        } else if(file_exists($target_dir.basename($filename.'.jpeg'))){
            unlink($target_dir.basename($filename.'.jpeg'));
        } else if(file_exists($target_dir.basename($filename.'.png'))){
            unlink($target_dir.basename($filename.'.png'));
        }
    }
    
    public static function fileUpload($imagefile,$target_dir,$filename)
    {
        if($imagefile['type'] == 'image/gif'){
            $target_type = 'gif';
        } else if($imagefile['type'] == 'image/jpeg'){
            $target_type = 'jpg';
        } else if($imagefile['type'] == 'image/jpg'){
            $target_type = 'jpg';
        } else if($imagefile['type'] == 'image/pjpeg'){
            $target_type = 'jpg';
        } else if($imagefile['type'] == 'image/x-png'){
            $target_type = 'png';
        } else if($imagefile['type'] == 'image/png'){
            $target_type = 'png';
        }
        
        $target_file = $target_dir.basename($filename.'.'.$target_type);
        if(file_exists($target_file)){
            unlink($target_file);
        }
        Helpers::fileRemove($target_dir,$filename);
        move_uploaded_file($imagefile['tmp_name'], $target_file);
    }
    
    public static function fileUploadPdf($imagefile,$target_dir,$filename)
    {
        $target_file = $target_dir.basename($filename.'.pdf');
        if(file_exists($target_file)){
            unlink($target_file);
        }
        Helpers::fileRemove($target_dir,$filename);
        move_uploaded_file($imagefile['tmp_name'], $target_file);
    }
    
    public static function multipleFileUpload($imagefile,$target_dir,$filename,$index)
    {
        if($imagefile['type'][$index] == 'image/gif'){
            $target_type = 'gif';
        } else if($imagefile['type'][$index] == 'image/jpeg'){
            $target_type = 'jpg';
        } else if($imagefile['type'][$index] == 'image/jpg'){
            $target_type = 'jpg';
        } else if($imagefile['type'][$index] == 'image/pjpeg'){
            $target_type = 'jpg';
        } else if($imagefile['type'][$index] == 'image/x-png'){
            $target_type = 'png';
        } else if($imagefile['type'][$index] == 'image/png'){
            $target_type = 'png';
        }
        
        $target_file = $target_dir.basename($filename.'.'.$target_type);
        Helpers::fileRemove($target_dir,$filename);
        move_uploaded_file($imagefile['tmp_name'][$index], $target_file);
    }
    
    public static function samplefileUpload($imagefile,$target_dir,$filename)
    {
        if($imagefile['type'] == 'image/gif'){
            $target_type = 'gif';
        } else if($imagefile['type'] == 'image/jpeg'){
            $target_type = 'jpg';
        } else if($imagefile['type'] == 'image/jpg'){
            $target_type = 'jpg';
        } else if($imagefile['type'] == 'image/pjpeg'){
            $target_type = 'jpg';
        } else if($imagefile['type'] == 'image/x-png'){
            $target_type = 'png';
        } else if($imagefile['type'] == 'image/png'){
            $target_type = 'png';
        }
        
        $target_file = $target_dir.basename($filename.'.'.$target_type);
        if(move_uploaded_file($imagefile['tmp_name'], $target_file)){
            return 'success';
        } else {
            return 'error';
        }
    }
    
    public static function base64FileUpload($base64file,$target_dir,$filename)
    {
        $raw = str_replace('data:image/jpeg;base64,', '', $base64file);
        $img = str_replace(' ', '+', $raw);
        $data = base64_decode($img);
        $file = $target_dir.'/'.$filename.'.jpg';
        if(file_exists($file)){ unlink($file); }
        Helpers::fileRemove($target_dir,$filename);
        $success = file_put_contents($file, $data);
        
        return $success;
    }
    
    public static function fileGallery($target_dir,$filename,$title)
    {
        if(file_exists($target_dir.basename($filename.'.gif'))){
            $link = '<a href="'.$target_dir.$filename.'.gif" title="'.$title.'" data-gallery=""><img src="'.$target_dir.$filename.'.gif" height="100" width="100"></a>';
        } else if(file_exists($target_dir.basename($filename.'.jpg'))){
            $link = '<a href="'.$target_dir.$filename.'.jpg" title="'.$title.'" data-gallery=""><img src="'.$target_dir.$filename.'.jpg" height="100" width="100"></a>';
        } else if(file_exists($target_dir.basename($filename.'.jpeg'))){
            $link = '<a href="'.$target_dir.$filename.'.jpeg" title="'.$title.'" data-gallery=""><img src="'.$target_dir.$filename.'.jpeg" height="100" width="100"></a>';
        } else if(file_exists($target_dir.basename($filename.'.png'))){
            $link = '<a href="'.$target_dir.$filename.'.png" title="'.$title.'" data-gallery=""><img src="'.$target_dir.$filename.'.png" height="100" width="100"></a>';
        } else {
            $link = '<a href="vendor/imandor/images/no_image_available.png" title="'.$title.'" data-gallery=""><img src="vendor/imandor/images/no_image_available.png" height="100" width="100"></a>';
        }
        
        return $link;
    }
    
    public static function fileGallery2($target_dir,$filename,$title,$imageid)
    {
        if(file_exists($target_dir.basename($filename.'.gif'))){
            $link = '<img class="'.$imageid.'" src="'.$target_dir.$filename.'.gif" height="100" width="100" data-zoom-image="'.$target_dir.$filename.'.gif" />';
        } else if(file_exists($target_dir.basename($filename.'.jpg'))){
            $link = '<img class="'.$imageid.'" src="'.$target_dir.$filename.'.jpg" height="100" width="100" data-zoom-image="'.$target_dir.$filename.'.jpg" />';
        } else if(file_exists($target_dir.basename($filename.'.jpeg'))){
            $link = '<img class="'.$imageid.'" src="'.$target_dir.$filename.'.jpeg" height="100" width="100" data-zoom-image="'.$target_dir.$filename.'.jpeg" />';
        } else if(file_exists($target_dir.basename($filename.'.png'))){
            $link = '<img class="'.$imageid.'" src="'.$target_dir.$filename.'.png" height="100" width="100" data-zoom-image="'.$target_dir.$filename.'.png" />';
        } else {
            $link = '<img src="vendor/imandor/images/no_image_available.png" height="100" width="100" />';
        }
        
        return $link;
    }
    
    public static function fileDisplay($target_dir,$filename,$title)
    {
        if(file_exists($target_dir.basename($filename.'.gif'))){
            $link = '<img class="image-applicant" title="'.$title.'" src="'.$target_dir.$filename.'.gif" height="200" />';
        } else if(file_exists($target_dir.basename($filename.'.jpg'))){
            $link = '<img class="image-applicant" title="'.$title.'" src="'.$target_dir.$filename.'.jpg" height="200" />';
        } else if(file_exists($target_dir.basename($filename.'.jpeg'))){
            $link = '<img class="image-applicant" title="'.$title.'" src="'.$target_dir.$filename.'.jpeg" height="200" />';
        } else if(file_exists($target_dir.basename($filename.'.png'))){
            $link = '<img class="image-applicant" title="'.$title.'" src="'.$target_dir.$filename.'.png" height="200" />';
        } else {
            $link = '<img class="image-applicant" title="'.$title.'" src="vendor/imandor/images/no_image_available.png" width="216" />';
        }
        
        return $link;
    }
    
    public static function fileDisplay2($target_dir,$filename,$title)
    {
        if(file_exists($target_dir.basename($filename.'.gif'))){
            $link = '<img class="image-applicant" title="'.$title.'" src="'.$target_dir.$filename.'.gif" height="150" />';
        } else if(file_exists($target_dir.basename($filename.'.jpg'))){
            $link = '<img class="image-applicant" title="'.$title.'" src="'.$target_dir.$filename.'.jpg" height="150" />';
        } else if(file_exists($target_dir.basename($filename.'.jpeg'))){
            $link = '<img class="image-applicant" title="'.$title.'" src="'.$target_dir.$filename.'.jpeg" height="150" />';
        } else if(file_exists($target_dir.basename($filename.'.png'))){
            $link = '<img class="image-applicant" title="'.$title.'" src="'.$target_dir.$filename.'.png" height="150" />';
        } else {
            $link = '<img class="image-applicant" title="'.$title.'" src="vendor/imandor/images/no_image_available.png" width="216" />';
        }
        
        return $link;
    }
    
    public static function fileDisplayCircle($target_dir,$filename,$title)
    {
        if(file_exists($target_dir.basename($filename.'.gif'))){
            $link = '<img class="image-circle" title="'.$title.'" src="'.$target_dir.$filename.'.gif" height="150" />';
        } else if(file_exists($target_dir.basename($filename.'.jpg'))){
            $link = '<img class="image-circle" title="'.$title.'" src="'.$target_dir.$filename.'.jpg" height="150" />';
        } else if(file_exists($target_dir.basename($filename.'.jpeg'))){
            $link = '<img class="image-circle" title="'.$title.'" src="'.$target_dir.$filename.'.jpeg" height="150" />';
        } else if(file_exists($target_dir.basename($filename.'.png'))){
            $link = '<img class="image-circle" title="'.$title.'" src="'.$target_dir.$filename.'.png" height="150" />';
        } else {
            $link = '<img class="image-circle" title="'.$title.'" src="vendor/imandor/images/no_image_available.png" height="150" />';
        }
        
        return $link;
    }
    
    public static function fileDisplayPhoto($target_dir,$filename,$title)
    {
        if(file_exists($target_dir.basename($filename.'.gif'))){
            $link = '<img class="image-applicant" title="'.$title.'" src="'.$target_dir.$filename.'.gif" />';
        } else if(file_exists($target_dir.basename($filename.'.jpg'))){
            $link = '<img class="image-applicant" title="'.$title.'" src="'.$target_dir.$filename.'.jpg" />';
        } else if(file_exists($target_dir.basename($filename.'.jpeg'))){
            $link = '<img class="image-applicant" title="'.$title.'" src="'.$target_dir.$filename.'.jpeg" />';
        } else if(file_exists($target_dir.basename($filename.'.png'))){
            $link = '<img class="image-circle" title="'.$title.'" src="'.$target_dir.$filename.'.png" />';
        } else {
            $link = '<img class="image-applicant" title="'.$title.'" src="vendor/imandor/images/no_image_available.png" height="150" />';
        }
        
        return $link;
    }
    
    public static function fileDisplayPassport($target_dir,$filename,$title)
    {
        if(file_exists($target_dir.basename($filename.'.gif'))){
            $link = '<img class="image-applicant" title="'.$title.'" src="'.$target_dir.$filename.'.gif" />';
        } else if(file_exists($target_dir.basename($filename.'.jpg'))){
            $link = '<img class="image-applicant" title="'.$title.'" src="'.$target_dir.$filename.'.jpg" />';
        } else if(file_exists($target_dir.basename($filename.'.jpeg'))){
            $link = '<img class="image-applicant" title="'.$title.'" src="'.$target_dir.$filename.'.jpeg" />';
        } else if(file_exists($target_dir.basename($filename.'.png'))){
            $link = '<img class="image-circle" title="'.$title.'" src="'.$target_dir.$filename.'.png" />';
        } else {
            $link = '<img class="image-applicant" title="'.$title.'" src="vendor/imandor/images/no_image_available.png" height="150" />';
        }
        
        return $link;
    }
    
    public static function fileDisplaySlip($target_dir,$filename,$title)
    {
        if(file_exists($target_dir.basename($filename.'.gif'))){
            $link = '<img class="image-applicant" title="'.$title.'" src="'.$target_dir.$filename.'.gif" height="200" />';
        } else if(file_exists($target_dir.basename($filename.'.jpg'))){
            $link = '<img class="image-applicant" title="'.$title.'" src="'.$target_dir.$filename.'.jpg" height="200" />';
        } else if(file_exists($target_dir.basename($filename.'.jpeg'))){
            $link = '<img class="image-applicant" title="'.$title.'" src="'.$target_dir.$filename.'.jpeg" height="200" />';
        } else if(file_exists($target_dir.basename($filename.'.png'))){
            $link = '<img class="image-applicant" title="'.$title.'" src="'.$target_dir.$filename.'.png" height="200" />';
        } else {
            $link = '<img class="image-applicant" title="'.$title.'" src="vendor/imandor/images/no_image_available.jpg" width="216" />';
        }
        
        return $link;
    }
    
    public static function randomColour()
    {
        $colour = array(
            'success' => 1,
            'warning' => 2,
            'danger' => 3,
            'info' => 4
        );
        
        $num = rand(1,4);
        return array_search($num,$colour);
    }
    
    public static function d_icon()
    {
        return '<i class="fa fa-times fa-2x text-danger"></i>';
    }

    public static function s_icon($date)
    {
        return '<i class="fa fa-check fa-2x text-success"></i><br /><span class="label label-warning text-dark">'.date('d M Y', strtotime($date)).'</span>';
    }
    
    public static function applicantInformation($id)
    {
        $t = Transaction::model()->findByPk($id);
        $ed = Education::model()->findAllByAttributes(array('worker_id' => $t->worker->id));
        
        /* Personal 01 */
        $fullname = empty($t->worker->full_name) ? 0 : 1;
        $firstname = empty($t->worker->first_name) ? 0 : 1;
        $middlename = empty($t->worker->middle_name) ? 0 : 1;
        $lastname = empty($t->worker->last_name) ? 0 : 1;
        $gender = empty($t->worker->gender_id) ? 0 : 1;
        $nationalcard = empty($t->worker->national_card) ? 0 : 1;
        $passportno = empty($t->passport->number) ? 0 : 1;
        $birthdate = empty($t->worker->birth_date) ? 0 : 1;
        $birthplace = empty($t->worker->birth_place) ? 0 : 1;
        
        $nationality = empty($t->worker->nationality_id) ? 0 : 1;
        $issuedate = empty($t->passport->issue_date) ? 0 : 1;
        $issueplace = empty($t->passport->issue_place) ? 0 : 1;
        $expirydate = empty($t->passport->issue_date) ? 0 : 1;
        
        $personal_01 = $fullname + $firstname + $middlename + $lastname + $gender + $nationalcard + $passportno + $birthdate + $birthplace + $nationality + $issuedate + $issueplace + $expirydate;
        
        /* Personal 02 */
        $education = count($ed) > 0 ? 1 : 0;
        $email = empty($t->worker->email) ? 0 : 1;
        $empname = empty($t->worker->employer_name) ? 0 : 1;
        $empaddress = empty($t->worker->employer_address) ? 0 : 1;
        $empzipcode = empty($t->worker->employer_zipcode) ? 0 : 1;
        $empphone = empty($t->worker->employer_phone) ? 0 : 1;
        $homeaddress = empty($t->worker->home_address) ? 0 : 1;
        $homezipcode = empty($t->worker->home_zipcode) ? 0 : 1;
        $homephone = empty($t->worker->home_phone) ? 0 : 1;
        $homemobile = empty($t->worker->home_mobile) ? 0 : 1;
        $marital = empty($t->worker->marital_id) ? 0 : 1;
        $locationvisa = empty($t->worker->location_visa_apply) ? 0 : 1;
        
        $personal_02 = $education + $email + $empname + $empaddress + $empzipcode + $empphone + $homeaddress + $homezipcode + $homephone + $homemobile + $marital + $locationvisa;
        
        $sign = array(
            'personal_01' => $personal_01 > 0 ? 'bg-success' : NULL,
            'personal_02' => $personal_02 > 0 ? 'bg-success' : NULL
        );
        
        return $sign;
    }   
    
    public static function activeMenu($role)
    {        
        $active = array();
        
        if($role == 'WEBMIN'){
            if(strstr(Yii::app()->request->requestUri,"Webmin/Dashboard") == TRUE){ 
                $active['webmin_dashboard'] = 'active'; 
            }
            if(strstr(Yii::app()->request->requestUri,"Webmin/Worker") == TRUE){ 
                $active['webmin_worker'] = 'active'; 
            }
            if(strstr(Yii::app()->request->requestUri,"Webmin/View") == TRUE){ 
                $active['webmin_worker'] = 'active'; 
            }
            if(strstr(Yii::app()->request->requestUri,"Webmin/Company") == TRUE){ 
                $active['webmin_company'] = 'active'; 
            }
            if(strstr(Yii::app()->request->requestUri,"Webmin/SourceAgent") == TRUE){ 
                $active['webmin_sourceagent'] = 'active'; 
            }
            if(strstr(Yii::app()->request->requestUri,"Webmin/ViewSourceAgent") == TRUE){
                $active['webmin_worker'] = '';
                $active['webmin_sourceagent'] = 'active'; 
            }
            if(strstr(Yii::app()->request->requestUri,"Webmin/ListWorker") == TRUE){ 
                $active['webmin_sourceagent'] = 'active'; 
            }
            if(strstr(Yii::app()->request->requestUri,"Webmin/View&pid") == TRUE){ 
                $active['webmin_worker'] = ''; 
                $active['webmin_sourceagent'] = 'active'; 
            }
            if(strstr(Yii::app()->request->requestUri,"Webmin/LocalAgent") == TRUE){ 
                $active['webmin_localagent'] = 'active'; 
            }
            if(strstr(Yii::app()->request->requestUri,"Webmin/Administrator") == TRUE){ 
                $active['webmin_administrator'] = 'active'; 
            }
            if(strstr(Yii::app()->request->requestUri,"Webmin/User") == TRUE){ 
                $active['webmin_user'] = 'active'; 
            }
            if(strstr(Yii::app()->request->requestUri,"Setting") == TRUE){ 
                $active['webmin_setting'] = 'active'; 
                $active['webmin_setting_in'] = 'in'; 
            }
            if(strstr(Yii::app()->request->requestUri,"Setting/District") == TRUE){ 
                $active['webmin_setting_district'] = 'active'; 
            }
            if(strstr(Yii::app()->request->requestUri,"Setting/EducationType") == TRUE){ 
                $active['webmin_setting_educationtype'] = 'active'; 
            }
            if(strstr(Yii::app()->request->requestUri,"Setting/Gender") == TRUE){ 
                $active['webmin_setting_gender'] = 'active'; 
            }
            if(strstr(Yii::app()->request->requestUri,"Setting/Marital") == TRUE){ 
                $active['webmin_setting_marital'] = 'active'; 
            }
            if(strstr(Yii::app()->request->requestUri,"Setting/Nationality") == TRUE){ 
                $active['webmin_setting_nationality'] = 'active'; 
            }
            if(strstr(Yii::app()->request->requestUri,"Setting/Role") == TRUE){ 
                $active['webmin_setting_role'] = 'active'; 
            }
            if(strstr(Yii::app()->request->requestUri,"Setting/State") == TRUE){ 
                $active['webmin_setting_state'] = 'active'; 
            }
            if(strstr(Yii::app()->request->requestUri,"Setting/Status") == TRUE){ 
                $active['webmin_setting_status'] = 'active'; 
            }
            if(strstr(Yii::app()->request->requestUri,"Webmin/Sequence") == TRUE){ 
                $active['webmin_sequence'] = 'active'; 
            }
        } else if($role == 'SOURCE AGENT'){
            if(strstr(Yii::app()->request->requestUri,"Sourceagent/Dashboard") == TRUE){ 
                $active['sourceagent_dashboard'] = 'active'; 
            }
            if(strstr(Yii::app()->request->requestUri,"Sourceagent/Application") == TRUE){ 
                $active['sourceagent_application'] = 'active'; 
            }
            if(strstr(Yii::app()->request->requestUri,"Sourceagent/Register") == TRUE){ 
                $active['sourceagent_application'] = 'active'; 
            }
            if(strstr(Yii::app()->request->requestUri,"Sourceagent/View") == TRUE){ 
                $active['sourceagent_application'] = 'active'; 
            }
            if(strstr(Yii::app()->request->requestUri,"Sourceagent/Edit") == TRUE){ 
                $active['sourceagent_application'] = 'active'; 
            }
            if(strstr(Yii::app()->request->requestUri,"Sourceagent/Worker") == TRUE){ 
                $active['worker'] = 'active'; 
            }
            if(strstr(Yii::app()->request->requestUri,"Sourceagent/Flight") == TRUE){ 
                $active['sourceagent_flight'] = 'active'; 
            }
            if(strstr(Yii::app()->request->requestUri,"Sourceagent/FlightList") == TRUE){ 
                $active['sourceagent_flight'] = '';
                $active['sourceagent_flightlist'] = 'active';
            }
            if(strstr(Yii::app()->request->requestUri,"Sourceagent/Report") == TRUE){ 
                $active['sourceagent_report'] = 'active'; 
            }
        } else if($role == 'ADMIN'){
            if(strstr(Yii::app()->request->requestUri,"Admin/Dashboard") == TRUE){ 
                $active['admin_dashboard'] = 'active'; 
            }
            if(strstr(Yii::app()->request->requestUri,"Admin/Worker") == TRUE){ 
                $active['admin_worker'] = 'active'; 
            }
            if(strstr(Yii::app()->request->requestUri,"Admin/View") == TRUE){ 
                $active['admin_worker'] = 'active'; 
            }
            if(strstr(Yii::app()->request->requestUri,"Admin/Agent") == TRUE){ 
                $active['admin_agent'] = 'active'; 
            }
            if(strstr(Yii::app()->request->requestUri,"Admin/RegisterAgent") == TRUE){ 
                $active['admin_worker'] = 'active';
            }
            if(strstr(Yii::app()->request->requestUri,"Admin/ViewAgent") == TRUE){ 
                //$active['admin_worker'] = NULL; 
                //$active['admin_agent'] = 'active'; 
                $active['admin_worker'] = 'active';
            }
            if(strstr(Yii::app()->request->requestUri,"Admin/EditAgent") == TRUE){ 
                $active['admin_worker'] = 'active';
            }
			if(strstr(Yii::app()->request->requestUri,"Admin/ResetAgent") == TRUE){ 
                $active['admin_worker'] = 'active';
            }
            if(strstr(Yii::app()->request->requestUri,"Admin/ListWorker") == TRUE){ 
                $active['admin_agent'] = 'active'; 
            }
            if(strstr(Yii::app()->request->requestUri,"Admin/View&pid") == TRUE){ 
                $active['admin_worker'] = NULL; 
                $active['admin_agent'] = 'active'; 
            }
            if(strstr(Yii::app()->request->requestUri,"Admin/ScanQR") == TRUE){ 
                $active['admin_scanqr'] = 'active'; 
            }
            if(strstr(Yii::app()->request->requestUri,"Admin/Report") == TRUE){ 
                $active['admin_report'] = 'active'; 
            }
            if(strstr(Yii::app()->request->requestUri,"Admin/LinkWorker") == TRUE){ 
                $active['admin_worker'] = 'active'; 
            }
            if(strstr(Yii::app()->request->requestUri,"Admin/Photo") == TRUE){ 
                $active['admin_worker'] = 'active'; 
            }
            if(strstr(Yii::app()->request->requestUri,"Admin/Passport") == TRUE){ 
                $active['admin_worker'] = 'active'; 
            }
            if(strstr(Yii::app()->request->requestUri,"Admin/Employer") == TRUE){ 
                $active['admin_employer'] = 'active'; 
            }
            if(strstr(Yii::app()->request->requestUri,"Admin/RegisterEmployer") == TRUE){ 
                $active['admin_employer'] = 'active'; 
            }
            if(strstr(Yii::app()->request->requestUri,"Admin/ViewEmployer") == TRUE){ 
                $active['admin_worker'] = '';
                $active['admin_employer'] = 'active'; 
            }
            if(strstr(Yii::app()->request->requestUri,"Admin/EditEmployer") == TRUE){ 
                $active['admin_employer'] = 'active'; 
            }
        } else if($role == 'EMPLOYER'){    
            if(strstr(Yii::app()->request->requestUri,"Employer/Mainboard") == TRUE){ 
                $active['employer_dashboard'] = 'active'; 
            }
            if(strstr(Yii::app()->request->requestUri,"Employer/Profile") == TRUE){ 
                $active['employer_profile'] = 'active'; 
            }
            if(strstr(Yii::app()->request->requestUri,"Employer/ReminderMedical") == TRUE){ 
                $active['employer_reminder'] = 'active'; 
                $active['employer_reminder_in'] = 'in';
                $active['employer_reminder_medical'] = 'active';
            }
            if(strstr(Yii::app()->request->requestUri,"Employer/ReminderPLKS") == TRUE){ 
                $active['employer_reminder'] = 'active'; 
                $active['employer_reminder_in'] = 'in';
                $active['employer_reminder_plks'] = 'active';
            }
            if(strstr(Yii::app()->request->requestUri,"Employer/WorkerAll") == TRUE){ 
                $active['employer_worker'] = 'active'; 
                $active['employer_worker_in'] = 'in';
                $active['employer_worker_all'] = 'active';
            }
            if(strstr(Yii::app()->request->requestUri,"Employer/ViewAgent") == TRUE){ 
                $active['employer_worker'] = 'active'; 
                $active['employer_worker_in'] = 'in';
                $active['employer_worker_all'] = 'active';
            }
            if(strstr(Yii::app()->request->requestUri,"Employer/LinkWorkerAll") == TRUE){ 
                $active['employer_worker'] = 'active'; 
                $active['employer_worker_in'] = 'in';
                $active['employer_worker_all'] = 'active';
            }
            if(strstr(Yii::app()->request->requestUri,"Employer/ViewWorkerAll") == TRUE){ 
                $active['employer_worker'] = 'active'; 
                $active['employer_worker_in'] = 'in';
                $active['employer_worker_all'] = 'active';
            }
            if(strstr(Yii::app()->request->requestUri,"Employer/LinkWorkerMy") == TRUE){ 
                $active['employer_worker'] = 'active'; 
                $active['employer_worker_in'] = 'in';
                $active['employer_worker_my'] = 'active';
            }
            if(strstr(Yii::app()->request->requestUri,"Employer/ViewWorkerMy") == TRUE){ 
                $active['employer_worker'] = 'active'; 
                $active['employer_worker_in'] = 'in';
                $active['employer_worker_my'] = 'active';
            }
            if(strstr(Yii::app()->request->requestUri,"Employer/Attendance") == TRUE){ 
                $active['employer_attendance'] = 'active'; 
            }
        } else if($role == 'MASTER'){    
            if(strstr(Yii::app()->request->requestUri,"Master/Mainboard") == TRUE){ 
                $active['master_mainboard'] = 'active'; 
            }
            if(strstr(Yii::app()->request->requestUri,"Master/Profile") == TRUE){ 
                $active['master_profile'] = 'active'; 
            }
            if(strstr(Yii::app()->request->requestUri,"Master/Dashboard") == TRUE){ 
                $active['master_dashboard'] = 'active'; 
            }
            if(strstr(Yii::app()->request->requestUri,"Master/Application") == TRUE){ 
                $active['master_application'] = 'active'; 
            }
            if(strstr(Yii::app()->request->requestUri,"Master/View") == TRUE){ 
                $active['master_application'] = 'active'; 
            }
            if(strstr(Yii::app()->request->requestUri,"Master/PrintSlip") == TRUE){ 
                $active['master_application'] = 'active'; 
            }
            if(strstr(Yii::app()->request->requestUri,"Master/Medical") == TRUE){ 
                $active['master_medical'] = 'active'; 
            }
        }
        
        return $active;
    }  
    
    public static function describeRole($role)
    {
        if($role == 1){
            $name = 'Web Admin';
        } else if($role == 2){
            $name = 'Local Agent';
        } else if($role == 3){
            $name = 'Source Agent';
        } else if($role == 4){
            $name = 'Employer';
        } else if($role == 5){
            $name = 'Master';
        } else if($role == 6){
            $name = 'Training Center';
        } else {
            $name = 'e-Bfbms';
        }
        
        return $name;
    }
    
    public static function describeLink($role)
    {
        if($role == 1){
            $name = 'Webmin';
        } else if($role == 2){
            $name = 'Local Agent';
        } else if($role == 3){
            $name = 'Sourceagent';
        } else if($role == 4){
            $name = 'Employer';
        } else if($role == 5){
            $name = 'Master';
        } else if($role == 6){
            $name = 'Training Center';
        } else {
            $name = 'e-Bfbms';
        }
        
        return $name;
    }
    
    public static function statForeignWorker($employerid)
    {
        $employer = Profile::model()->findByPk($employerid);
        
        $output = array();
        
        /* (a) Foreign Worker Required */
        $quota = Quota::model()->findAllByAttributes(array(
            'employer_id' => $employer->id
        ), array('order' => 'id ASC'));
        
        foreach($quota as $q){
            if(!empty($q->remark)){
                $remark = '<br /><span class="badge badge-info">'.strtoupper($q->remark).'</span>';
            } else {
                $remark = NULL;
            }
            
            $output[$q->code]['code'] = $q->code.'<br /><span class="font-small">'.date('d M Y', strtotime($q->created_at)).'</span>'.$remark;
            $output[$q->code]['required'] = $q->required;
            
            if(file_exists('uploads/demandletters/'.$q->guid.'.pdf')){
                $disabled = NULL;
            } else {
                $disabled = 'disabled';
            }
            
            $output[$q->code]['action'] = '
                <a href="uploads/demandletters/'.$q->guid.'.pdf" target="_blank" class="btn btn-sm waves-effect waves-light btn-warning '.$disabled.'" data-toggle="tooltip" data-placement="top" title="View" data-original-title="View">
                    <i class="fa fa-search"></i>
                </a>
                <a class="btn btn-sm waves-effect waves-light btn-info text-white edit-demandletter" data-id="'.$q->id.'" data-toggle="tooltip" data-placement="top" title="Edit" data-original-title="Demand Letter">
                    <i class="fa fa-edit"></i>
                </a>
                <a class="btn btn-sm waves-effect waves-light btn-danger text-white delete-demandletter" data-id="'.$q->id.'" data-toggle="tooltip" data-placement="top" title="Delete" data-original-title="Demand Letter">
                    <i class="fa fa-trash"></i>
                </a>';
        
            /* (b) Foreign Worker Allocated */
            $allocation = Transaction::model()->findAllByAttributes(array(
                'employer_id' => $employer->id,
                'quota_id' => $q->id
            ));
            $output[$q->code]['allocated'] = count($allocation);
            
            /* (c = a - b) Balance 1 */
            $output[$q->code]['balance1'] = $output[$q->code]['required'] - $output[$q->code]['allocated'];
            
            /* (d) Foreign Worker Arrived */
            $arrival = Transaction::model()->findAllByAttributes(array(
                'employer_id' => $employer->id,
                'quota_id' => $q->id,
                'medical' => 'YES',
                'visa' => 'YES',
                'approval' => 'YES',
                'departure' => 'YES',
                'arrival' => 'YES'
            ));
            $output[$q->code]['arrived'] = count($arrival);
            
            /* (e = c - d) Balance 2 */
            $output[$q->code]['balance2'] = $output[$q->code]['balance1'] - $output[$q->code]['arrived'];
        }
        
        return $output;
    }
    
    public static function statTotalForeignWorker($employerid)
    {
        $employer = Profile::model()->findByPk($employerid);
        
        $output = array();
        
        /* (a) Foreign Worker Required */
        $quota = Quota::model()->findAllByAttributes(array(
            'employer_id' => $employer->id
        ), array('order' => 'id ASC'));
        
        foreach($quota as $q){
            $output['demand'][] = 1;
            $output['required'][] = $q->required;
            
            /* (b) Foreign Worker Allocated */
            $allocation = Transaction::model()->findAllByAttributes(array(
                'employer_id' => $employer->id,
                'quota_id' => $q->id
            ));
            $output['allocated'][] = count($allocation);
            
            /* (c = a - b) Balance 1 */
            $output['balance'][] = $q->required - count($allocation);
        }
        
        $output2 = array(
            'demand' => array_sum($output['demand']) > 0 ? array_sum($output['demand']) : 0,
            'required' => array_sum($output['required']) > 0 ? array_sum($output['required']) : 0,
            'allocated' => array_sum($output['allocated']) > 0 ? array_sum($output['allocated']) : 0,
            'balance' => array_sum($output['balance']) > 0 ? array_sum($output['balance']) : 0,
        );
        
        return $output2;
    }
    
    public static function statForeignWorkerQuota()
    {
        $quota = Quota::model()->findAll(array('order' => 'employer_id ASC, id ASC'));
        
        $output = array();
        
        foreach($quota as $q){
            $allocation = Transaction::model()->findAllByAttributes(array(
                'employer_id' => $q->employer_id,
                'quota_id' => $q->id
            ));
            
            $arrival = Transaction::model()->findAllByAttributes(array(
                'employer_id' => $q->employer_id,
                'quota_id' => $q->id,
                'medical' => 'YES',
                'visa' => 'YES',
                'approval' => 'YES',
                'departure' => 'YES',
                'arrival' => 'YES'
            ));
            
            $balance1 = $q->required - count($allocation);
            
            if($balance1 > 0){
                $output[$q->code] = array(
                    'id' => $q->id,
                    'code' => $q->code,
                    'createddate' => date('d M Y', strtotime($q->created_at)),
                    'employercode' => $q->employer->profile->code,
                    'employer' => $q->employer->profile->company->name,
                    'remark' => $q->remark,
                    'required' => $q->required,
                    'allocated' => count($allocation),
                    'balance1' => $q->required - count($allocation),
                    'arrived' => count($arrival),
                    'balance2' => $balance1 - count($arrival)
                );
            }
        }
        
        return $output;
    }        
    
    public static function loginBackgroundImage($time)
    {
        $image = 'vendor/imandor/images/login/';
        
        if($time >= 0 && $time < 5){
            $image .= 'klcc_20_05b.jpg';
        } else if($time >= 5 && $time < 7){
            $image .= 'klcc_05_07b.jpg';
        } else if($time >= 7 && $time < 9){
            $image .= 'klcc_07_09b.jpg';
        } else if($time >= 9 && $time < 12){
            $image .= 'klcc_09_12b.jpg';
        } else if($time >= 12 && $time < 16){
            $image .= 'klcc_12_16b.jpg';
        } else if($time >= 16 && $time < 18){
            $image .= 'klcc_16_18b.jpg';
        } else if($time >= 18 && $time < 19){
            $image .= 'klcc_18_19b.jpg';
        } else if($time >= 19 && $time < 20){
            $image .= 'klcc_19_20b.jpg';
        } else if($time >= 20 && $time < 24){
            $image .= 'klcc_20_05b.jpg';
        } 
        
        return $image;
    }       
    
    public static function percentvalue($value)
    {
        $value2 = number_format($value,0).'%';
        return $value2;
    }     
    
    public static function photoOnlineDisplay($target_dir,$filename)
    {
        if(file_exists($target_dir.basename($filename.'.gif'))){
            $link = Yii::app()->params['qrslip'].'/uploads/photos/'.$filename.'.gif';
        } else if(file_exists($target_dir.basename($filename.'.jpg'))){
            $link = Yii::app()->params['qrslip'].'/uploads/photos/'.$filename.'.jpg';
        } else if(file_exists($target_dir.basename($filename.'.jpeg'))){
            $link = Yii::app()->params['qrslip'].'/uploads/photos/'.$filename.'.jpeg';
        } else if(file_exists($target_dir.basename($filename.'.png'))){
            $link = Yii::app()->params['qrslip'].'/uploads/photos/'.$filename.'.png';
        } else {
            $link = Yii::app()->params['qrslip'].'/uploads/photos/no_image_available.png';
        }
        
        return $link;
    }
    
    public static function photoBase64($target_dir,$filename)
    {
        if(file_exists($target_dir.basename($filename.'.gif'))){
            $ext = 'gif';
            $status = 'AVAILABLE';
            $link = Yii::app()->params['qrslip'].'/uploads/photos/'.$filename.'.gif';
        } else if(file_exists($target_dir.basename($filename.'.jpg'))){
            $ext = 'jpg';
            $status = 'AVAILABLE';
            $link = Yii::app()->params['qrslip'].'/uploads/photos/'.$filename.'.jpg';
        } else if(file_exists($target_dir.basename($filename.'.jpeg'))){
            $ext = 'jpeg';
            $status = 'AVAILABLE';
            $link = Yii::app()->params['qrslip'].'/uploads/photos/'.$filename.'.jpeg';
        } else if(file_exists($target_dir.basename($filename.'.png'))){
            $ext = 'png';
            $status = 'AVAILABLE';
            $link = Yii::app()->params['qrslip'].'/uploads/photos/'.$filename.'.png';
        } else {
            $ext = 'png';
            $status = 'NOT AVAILABLE';
            $link = Yii::app()->params['qrslip'].'/uploads/photos/no_image_available.png';
        }
        
        $img = file_get_contents($link);
        
        $result = array(
            'status' => $status,
            'ext' => $ext,
            'data' => base64_encode($img),
        );
        
        return $result;
    }
    
    public static function photoBase64Only($target_dir,$filename)
    {
        if(file_exists($target_dir.basename($filename.'.gif'))){
            $ext = 'gif';
            $status = 'AVAILABLE';
            $link = Yii::app()->params['qrslip'].'/uploads/photos/'.$filename.'.gif';
        } else if(file_exists($target_dir.basename($filename.'.jpg'))){
            $ext = 'jpg';
            $status = 'AVAILABLE';
            $link = Yii::app()->params['qrslip'].'/uploads/photos/'.$filename.'.jpg';
        } else if(file_exists($target_dir.basename($filename.'.jpeg'))){
            $ext = 'jpeg';
            $status = 'AVAILABLE';
            $link = Yii::app()->params['qrslip'].'/uploads/photos/'.$filename.'.jpeg';
        } else if(file_exists($target_dir.basename($filename.'.png'))){
            $ext = 'png';
            $status = 'AVAILABLE';
            $link = Yii::app()->params['qrslip'].'/uploads/photos/'.$filename.'.png';
        } else {
            $ext = 'png';
            $status = 'NOT AVAILABLE';
            $link = Yii::app()->params['qrslip'].'/uploads/photos/no_image_available.png';
        }
        
        $img = file_get_contents($link);
        return base64_encode($img);
    }
	
	public static function checkCovid19Document($guid)
    {
        if(file_exists('uploads/covid19/'.$guid.'.pdf')){
            $result =   '<a href="uploads/covid19/'.$guid.'.pdf" target="_blank" class="btn btn-sm waves-effect waves-light btn-warning" data-toggle="tooltip" data-placement="top" title="" data-original-title="View">
                            <i class="fa fa-search"></i>
                        </a><br />Covid-19';
        } else {
            $result = '<i class="fa fa-times text-danger"></i><br />No Covid-19<br />File Attached';
        }
        
        return $result;
    }
}