<?php
    if(Yii::app()->user->isGuest){
        $this->redirect('index.php?r=Site/Logout');
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>FRESH Medical System</title>
        
        <link rel="shortcut icon" href="vendor/sebumi/images/favicon.png" type="image/png" />
        <link rel="icon" href="vendor/sebumi/images/favicon.png" type="image/png" />

        <link href="vendor/inspinia/css/bootstrap.min.css" rel="stylesheet">
        <link href="vendor/inspinia/font-awesome/css/font-awesome.css" rel="stylesheet">
        <link href="vendor/inspinia/css/plugins/slick/slick.css" rel="stylesheet">
        <link href="vendor/inspinia/css/plugins/slick/slick-theme.css" rel="stylesheet">
        <link href="vendor/inspinia/css/animate.css" rel="stylesheet">
        <link href="vendor/inspinia/css/style.css" rel="stylesheet">
        
        <link href="vendor/inspinia/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
        <link href="vendor/inspinia/css/plugins/chosen/bootstrap-chosen.css" rel="stylesheet">
        <link href="vendor/inspinia/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
        <link href="vendor/inspinia/css/plugins/clockpicker/clockpicker.css" rel="stylesheet">
        <link href="vendor/assets/datetimepicker/css/bootstrap-datetimepicker.css" rel="stylesheet">
        <link href="vendor/inspinia/css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">
        <link href="vendor/inspinia/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
        <link href="vendor/inspinia/css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">
        <link href="vendor/inspinia/css/plugins/blueimp/css/blueimp-gallery.min.css" rel="stylesheet">
        <link href="vendor/inspinia/css/plugins/sweetalert/sweetalert.css" rel="stylesheet" />
        <link href="vendor/assets/smoke/css/smoke.min.css" rel="stylesheet">
        
        <link href="vendor/sebumi/css/style.css" rel="stylesheet">
        <link href="vendor/sebumi/css/style3.css" rel="stylesheet">
    </head>
    <body class="fixed-sidebar pace-done fixed-nav fixed-nav-basic">
        <div id="wrapper">
            <?php $this->renderPartial('//layouts/main/menu'); ?>
            <div id="page-wrapper" class="gray-bg">
                <div class="row border-bottom">
                    <?php $this->renderPartial('//layouts/main/header'); ?>
                </div>
                <?php echo $content; ?>
                <div class="footer fixed">
                    <div class="pull-right">
                        &copy; <?php echo date('Y'); ?>
                    </div>
                    <div>
                        <strong>Copyright</strong> FRESH Medical System
                    </div>
                </div>
            </div>
        </div>

        <?php $this->renderPartial('//layouts/main/footer'); ?>
    </body>
</html>