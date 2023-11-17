<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>FRESH Medical Web</title>
        
        <link rel="shortcut icon" href="vendor/sebumi/images/favicon.png" type="image/png" />
        <link rel="icon" href="vendor/sebumi/images/favicon.png" type="image/png" />
        
        <!-- Bootstrap core CSS -->
        <link href="vendor/inspinia/css/bootstrap.min.css" rel="stylesheet">
        <link href="vendor/inspinia/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="vendor/inspinia/css/animate.css" rel="stylesheet">
        <link href="vendor/inspinia/css/style.css" rel="stylesheet">
        <link href="vendor/sebumi/css/style.css" rel="stylesheet">
        
        <!-- Plugins CSS Frame -->
        <link href="vendor/inspinia/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
    </head>
    <body id="page-top" class="landing-page no-skin-config">
        <div class="navbar-wrapper">
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                <div class="container">
                    <div class="navbar-header page-scroll">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">FRESH MEDICAL WEB</a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <!--
                            <li><a class="page-scroll" href="#page-top">Home</a></li>
                            <li><a class="page-scroll" href="#features">Features</a></li>
                            <li><a class="page-scroll" href="#team">Team</a></li>
                            <li><a class="page-scroll" href="#testimonials">Testimonials</a></li>
                            <li><a class="page-scroll" href="#pricing">Pricing</a></li>
                            <li><a class="page-scroll" href="#contact">Contact</a></li>
                            -->
                            <li><a href="index.php?r=Site/Login">Login</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <?php echo $content; ?>
        <?php $this->renderPartial('//layouts/landing/footer'); ?>
    </body>
</html>