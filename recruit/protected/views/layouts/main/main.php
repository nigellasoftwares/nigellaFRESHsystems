<?php
    if(Yii::app()->user->isGuest){
        $this->redirect('index.php?r=Site/Logout');
    } else {
        $user = User::model()->findByAttributes(array('username'=>Yii::app()->user->getState('username')));
        $country = $user->role_id == 3 ? $user->profile->company->country->name : NULL;
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="i-MANDOR System">
    <meta name="author" content="NeoSoftEdge">
    
    <link rel="icon" type="image/png" sizes="16x16" href="vendor/imandor/images/favicon.png">
    <title>FRESH Recruitment System</title>
    
    <!-- This page CSS -->
    <link href="vendor/elite/assets/node_modules/morrisjs/morris.css" rel="stylesheet">
    <link href="vendor/elite/dist/css/style.min.css" rel="stylesheet">
    <link href="vendor/elite/dist/css/pages/dashboard4.css" rel="stylesheet">
    <link href="vendor/elite/assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="vendor/elite/assets/node_modules/toast-master/css/jquery.toast.css" rel="stylesheet">
    <link href="vendor/elite/assets/node_modules/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="vendor/elite/dist/css/pages/tab-page.css" rel="stylesheet">
    <link href="vendor/elite/dist/css/pages/timeline-vertical-horizontal.css" rel="stylesheet">
    <link href="vendor/elite/dist/css/pages/easy-pie-chart.css" rel="stylesheet">
    <link href="vendor/elite/dist/css/pages/ribbon-page.css" rel="stylesheet">
    <link href="vendor/elite/assets/node_modules/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
    <link href="vendor/elite/assets/node_modules/calendar/dist/fullcalendar.css" rel="stylesheet" />
    <link href="vendor/elite/assets/node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
    <link href="vendor/elite/assets/node_modules/cropper/cropper.min.css" rel="stylesheet" />
    <link href="vendor/imandor/css/style.css" rel="stylesheet">
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="skin-blue fixed-layout imandor-scale">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">e-BFBMS</p>
        </div>
    </div>
    
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    
    <div id="main-wrapper">
        <?php 
            $this->renderPartial('//layouts/main/header', array(
                'user' => $user,
                'country' => $country
            ));
            $this->renderPartial('//layouts/main/menu', array(
                'user' => $user
            ));
        ?>
        
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        
        <div class="page-wrapper">
            <?php 
                echo $content;
                $this->renderPartial('//layouts/main/sidebar');
            ?>
            
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
        
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        
        <footer class="footer">
            Copyright © <?php echo date('Y'); ?>. Fresh Recruitment System v1.0. All Rights Reserved.
        </footer>
        
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <?php $this->renderPartial('//layouts/main/footer'); ?>
</body>

</html>