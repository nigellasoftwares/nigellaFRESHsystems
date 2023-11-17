<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>FRESH Medical Login</title>
    
    <link rel="shortcut icon" href="vendor/sebumi/images/favicon.png" type="image/png" />
    <link rel="icon" href="vendor/sebumi/images/favicon.png" type="image/png" />

    <link href="vendor/inspinia/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/inspinia/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="vendor/inspinia/css/animate.css" rel="stylesheet">
    <link href="vendor/inspinia/css/style.css" rel="stylesheet">
</head>
<body class="gray-bg" style="background:url(vendor/sebumi/images/system.jpg) fixed no-repeat;">
    <div class="loginColumns animated fadeInDown">
	<?php echo $content; ?>
	<hr/>
        <div class="row">
            <div class="col-md-6 text-white">
                Copyright Fresh Medical Login
            </div>
            <div class="col-md-6 text-right text-white">
               <small>© <?php echo date('Y'); ?></small>
            </div>
        </div>
    </div>
    <?php $this->renderPartial('//layouts/main/footer'); ?>
</body>
</html>