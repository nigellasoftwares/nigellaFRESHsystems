<?php
// protected/components/Helpers.php

class Helpers 
{
    public static function systemName()
    {
        $title = 'Visa Fast Track';
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
        $img = str_replace('data:image/jpeg;base64,', '', $base64file);
        $img = str_replace(' ', '+', $img);
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
            $link = '<a href="vendor/visafasttrack/images/no_image_available.png" title="'.$title.'" data-gallery=""><img src="vendor/visafasttrack/images/no_image_available.png" height="100" width="100"></a>';
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
            $link = '<img src="vendor/visafasttrack/images/no_image_available.png" height="100" width="100" />';
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
            $link = '<img class="image-applicant" title="'.$title.'" src="vendor/visafasttrack/images/no_image_available.png" width="216" />';
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
            $link = '<img class="image-applicant" title="'.$title.'" src="vendor/visafasttrack/images/no_image_available.png" width="216" />';
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
            $link = '<img class="image-circle" title="'.$title.'" src="vendor/visafasttrack/images/no_image_available.png" height="150" />';
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
    
    public static function stat_dashboard($id)
    {
        $passportscan = Passportscan::model()->findAllByAttributes(array(
            'batch_id' => $id
        ));
        
        $statustrack = array();
        foreach($passportscan as $ps){
            if($ps->status_id == 1){
                $statustrack['deliver']['brn']['process'][] = 1;
            }
            if($ps->status_id == 2){
                $statustrack['deliver']['adm']['in'][] = 1;
            }
            if($ps->status_id == 3){
                $statustrack['deliver']['adm']['verify'][] = 1;
            }
            if($ps->status_id == 5){
                $statustrack['deliver']['osc']['in'][] = 1;
            }
            if($ps->status_id == 6){
                $statustrack['deliver']['osc']['verify'][] = 1;
            }
            if($ps->status_id == 8){
                $statustrack['deliver']['hc']['in'][] = 1;
            }
            if($ps->status_id == 9){
                $statustrack['deliver']['hc']['verify'][] = 1;
            }
            if($ps->status_id == 13){
                $statustrack['return']['osc']['out'][] = 1;
            }
            if($ps->status_id == 14){
                $statustrack['return']['osc']['verify'][] = 1;
            }
            if($ps->status_id == 15){
                $statustrack['return']['adm']['out'][] = 1;
            }
            if($ps->status_id == 16){
                $statustrack['return']['adm']['verify'][] = 1;
            }
            if($ps->status_id == 17){
                $statustrack['return']['brn']['out'][] = 1;
            }
            if($ps->status_id == 18){
                $statustrack['return']['brn']['verify'][] = 1;
            }
        }
        
        return $statustrack;
    }
    
    public static function bg_dashstat($rid,$tid = '')
    {
        $labelstatus = array();
        
        if($rid == 1){
            $labelstatus['d_brn_process'] = 'bg2-yellow';
        } else if($rid == 2){
            if(empty($tid)){
                $labelstatus['d_adm_in'] = 'bg2-yellow';
            } else {
                $labelstatus['d_adm_in_not'] = 'bg2-yellow';
            }
        } else if($rid == 3){
            if(empty($tid)){
                $labelstatus['d_adm_verify'] = 'bg2-yellow';
            } else {
                $labelstatus['d_adm_verify_not'] = 'bg2-yellow';
            }
        } else if($rid == 5){
            if(empty($tid)){
                $labelstatus['d_osc_in'] = 'bg2-yellow';
            } else {
                $labelstatus['d_osc_in_not'] = 'bg2-yellow';
            }
        } else if($rid == 6){
            if(empty($tid)){
                $labelstatus['d_osc_verify'] = 'bg2-yellow';
            } else {
                $labelstatus['d_osc_verify_not'] = 'bg2-yellow';
            }
        } else if($rid == 8){
            if(empty($tid)){
                $labelstatus['d_hc_in'] = 'bg2-yellow';
            } else {
                $labelstatus['d_hc_in_not'] = 'bg2-yellow';
            }
        } else if($rid == 9){
            if(empty($tid)){
                $labelstatus['d_hc_verify'] = 'bg2-yellow';
            } else {
                $labelstatus['d_hc_verify_not'] = 'bg2-yellow';
            }
        } else if($rid == 13){
            if(empty($tid)){
                $labelstatus['r_osc_out'] = 'bg2-yellow';
            } else {
                $labelstatus['r_osc_out_not'] = 'bg2-yellow';
            }
        } else if($rid == 14){
            if(empty($tid)){
                $labelstatus['r_osc_verify'] = 'bg2-yellow';
            } else {
                $labelstatus['r_osc_verify_not'] = 'bg2-yellow';
            }
        } else if($rid == 15){
            if(empty($tid)){
                $labelstatus['r_adm_out'] = 'bg2-yellow';
            } else {
                $labelstatus['r_adm_out_not'] = 'bg2-yellow';
            }
        } else if($rid == 16){
            if(empty($tid)){
                $labelstatus['r_adm_verify'] = 'bg2-yellow';
            } else {
                $labelstatus['r_adm_verify_not'] = 'bg2-yellow';
            }
        } else if($rid == 17){
            if(empty($tid)){
                $labelstatus['r_brn_out'] = 'bg2-yellow';
            } else {
                $labelstatus['r_brn_out_not'] = 'bg2-yellow';
            }
        } else if($rid == 18){
            if(empty($tid)){
                $labelstatus['r_brn_verify'] = 'bg2-yellow';
            } else {
                $labelstatus['r_brn_verify_not'] = 'bg2-yellow';
            }
        }
        
        return $labelstatus;
    }
    
    public static function applicantInformation($id)
    {
        $a = Applicant::model()->findByPk($id);
        $ed = Education::model()->findAllByAttributes(array('applicant_id' => $a->id));
        $o = Occupation::model()->findAllByAttributes(array('applicant_id' => $a->id));
        $f = Family::model()->findAllByAttributes(array('applicant_id' => $a->id));
        $em = Emergency::model()->findAllByAttributes(array('applicant_id' => $a->id));
        
        /* Personal 01 */
        $fullname = empty($a->full_name) ? 0 : 1;
        $firstname = empty($a->first_name) ? 0 : 1;
        $middlename = empty($a->middle_name) ? 0 : 1;
        $lastname = empty($a->last_name) ? 0 : 1;
        $gender = empty($a->gender_id) ? 0 : 1;
        $citizen = empty($a->national_number) ? 0 : 1;
        $passportno = empty($a->passport_number) ? 0 : 1;
        $birthdate = empty($a->birth_date) ? 0 : 1;
        $birthplace = empty($a->birth_place) ? 0 : 1;
        
        $currentnat = empty($a->current_nationality_id) ? 0 : 1;
        $passporttype = empty($a->passport_id) ? 0 : 1;
        $issuedate = empty($a->passport_issue_date) ? 0 : 1;
        $issueplace = empty($a->passport_issue_place) ? 0 : 1;
        $expirydate = empty($a->passport_issue_date) ? 0 : 1;
        
        $personal_01 = $fullname + $firstname + $middlename + $lastname + $gender + $citizen + $passportno + $gender + $birthdate + $birthplace + $currentnat + $passporttype + $issuedate + $issueplace + $expirydate;
        
        /* Personal 02 */
        $education = count($ed) > 0 ? 1 : 0;
        $email = empty($a->email) ? 0 : 1;
        $empname = empty($a->employer_name) ? 0 : 1;
        $empaddress = empty($a->employer_address) ? 0 : 1;
        $empzipcode = empty($a->employer_zipcode) ? 0 : 1;
        $empphone = empty($a->employer_phone) ? 0 : 1;
        $homeaddress = empty($a->home_address) ? 0 : 1;
        $homezipcode = empty($a->home_zipcode) ? 0 : 1;
        $homephone = empty($a->home_phone) ? 0 : 1;
        $homemobile = empty($a->home_mobile) ? 0 : 1;
        $marital = empty($a->marital_id) ? 0 : 1;
        $locationvisa = empty($a->location_visa_apply) ? 0 : 1;
        
        $personal_02 = $education + $email + $empname + $empaddress + $empzipcode + $empphone + $homeaddress + $homezipcode + $homephone + $homemobile + $marital + $locationvisa;
        
        /* Occupation */
        $occupation = count($o) > 0 ? 1 : 0;
        
        /* Family */
        $family = count($f) > 0 ? 1 : 0;
        
        /* Emergency */
        $emergency = count($em) > 0 ? 1 : 0;
        
        /* Travel */
        $travel = empty($a->purposevisit_id) ? 0 : 1;
        
        /* Other */
        $visa_overstayed = empty($a->visa_overstayed) ? 0 : 1;
        $visa_refused = empty($a->visa_refused) ? 0 : 1;
        $visa_criminal = empty($a->visa_criminal) ? 0 : 1;
        $visa_condition = empty($a->visa_condition) ? 0 : 1;
        $visa_disease = empty($a->visa_disease) ? 0 : 1;
        
        $other = $visa_overstayed + $visa_refused + $visa_criminal + $visa_condition + $visa_disease;
        
        /* Declaration */
        $declaration = empty($a->declared_sign) ? 0 : 1;
        
        $sign = array(
            'personal_01' => $personal_01 > 0 ? 'bg-warning' : NULL,
            'personal_02' => $personal_02 > 0 ? 'bg-warning' : NULL,
            'occupation' => $occupation > 0 ? 'bg-warning' : NULL,
            'family' => $family > 0 ? 'bg-warning' : NULL,
            'emergency' => $emergency > 0 ? 'bg-warning' : NULL,
            'travel' => $travel > 0 ? 'bg-warning' : NULL,
            'other' => $other > 0 ? 'bg-warning' : NULL,
            'declaration' => $declaration > 0 ? 'bg-warning' : NULL
        );
        
        return $sign;
    }        
}