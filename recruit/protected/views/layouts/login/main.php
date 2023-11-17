<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="i-MANDOR Login">
    <meta name="author" content="NeoSoftEdge">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="vendor/imandor/images/favicon.png">
    <title>FRESH Recruitment Login</title>
    
    <!-- page css -->
    <link href="vendor/elite/dist/css/pages/login-register-lock.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="vendor/elite/dist/css/style.min.css" rel="stylesheet">
    <link href="vendor/imandor/css/login.css" rel="stylesheet">
    
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="skin-red-dark card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">FRESH</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper">
        <div class="login-register" style="background-image:url(<?php echo Helpers::loginBackgroundImage(date('G')); ?>);">
            <div class="login-box card box-shadow" style="border-radius: 25px;">
                <?php echo $content; ?>    
            </div>
            <div class="bottom-left">
                <img src="vendor/imandor/images/imandor_logo4.png" />
            </div>
        </div>
    </section>
    
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    
    <script src="vendor/elite/assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="vendor/elite/assets/node_modules/popper/popper.min.js"></script>
    <script src="vendor/elite/assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!--Custom JavaScript -->
</body>
</html>