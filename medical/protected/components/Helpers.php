<?php
// protected/components/Helpers.php

class Helpers 
{
    public static function systemName()
    {
        $title = 'SEBUMI Online System';
        return $title;
    }
    
    public static function getGUID()
    {
        if(function_exists('com_create_guid')){
            return com_create_guid();
        } else {
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
            $link = '<a href="vendor/sebumi/images/no_image_available.png" title="'.$title.'" data-gallery=""><img src="vendor/sebumi/images/no_image_available.png" height="100" width="100"></a>';
        }
        
        return $link;
    }
    
    public static function fileGallery2($target_dir,$filename,$title,$imageid)
    {
        if(file_exists($target_dir.basename($filename.'.gif'))){
            $link = '<img class="'.$imageid.'" src="'.$target_dir.$filename.'.gif" alt="'.$title.'" height="100" width="100" data-zoom-image="'.$target_dir.$filename.'.gif" />';
        } else if(file_exists($target_dir.basename($filename.'.jpg'))){
            $link = '<img class="'.$imageid.'" src="'.$target_dir.$filename.'.jpg" alt="'.$title.'" height="100" width="100" data-zoom-image="'.$target_dir.$filename.'.jpg" />';
        } else if(file_exists($target_dir.basename($filename.'.jpeg'))){
            $link = '<img class="'.$imageid.'" src="'.$target_dir.$filename.'.jpeg" alt="'.$title.'" height="100" width="100" data-zoom-image="'.$target_dir.$filename.'.jpeg" />';
        } else if(file_exists($target_dir.basename($filename.'.png'))){
            $link = '<img class="'.$imageid.'" src="'.$target_dir.$filename.'.png" alt="'.$title.'" height="100" width="100" data-zoom-image="'.$target_dir.$filename.'.png" />';
        } else {
            $link = '<img src="vendor/sebumi/images/no_image_available.png" alt="'.$title.'" height="100" width="100" />';
        }
        
        return $link;
    }
    
    public static function fileDisplay($target_dir,$filename,$title)
    {
        if(file_exists($target_dir.basename($filename.'.gif'))){
            $link = '<img class="image-applicant" title="'.$title.'" src="'.$target_dir.$filename.'.gif" width="321" height="240" />';
        } else if(file_exists($target_dir.basename($filename.'.jpg'))){
            $link = '<img class="image-applicant" title="'.$title.'" src="'.$target_dir.$filename.'.jpg" width="321" height="240" />';
        } else if(file_exists($target_dir.basename($filename.'.jpeg'))){
            $link = '<img class="image-applicant" title="'.$title.'" src="'.$target_dir.$filename.'.jpeg" width="321" height="240" />';
        } else if(file_exists($target_dir.basename($filename.'.png'))){
            $link = '<img class="image-applicant" title="'.$title.'" src="'.$target_dir.$filename.'.png" width="321" height="240" />';
        } else {
            $link = '<img class="image-applicant" title="'.$title.'" src="vendor/sebumi/images/no_image_available.png" width="216" />';
        }
        
        return $link;
    }
}