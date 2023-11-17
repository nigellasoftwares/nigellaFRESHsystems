<!DOCTYPE html>
<html data-wf-page="5d92cef43cfc5c23e81d2d4c" data-wf-site="5d92ce8e9461c33d97feafcf">

<head>
    <meta charset="utf-8">
    <meta content="e-Bfbms Recruitment" property="og:title">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    
    <link rel="icon" type="image/png" sizes="16x16" href="vendor/imandor/images/favicon.png">
    <title>FRESH Recruitment Web</title>
    
    <link href="vendor/calia/css/normalize.css" rel="stylesheet" type="text/css">
    <link href="vendor/calia/css/components.css" rel="stylesheet" type="text/css">
    <link href="vendor/calia/css/calia.css" rel="stylesheet" type="text/css">
    <link href="vendor/imandor/css/landing.css" rel="stylesheet" type="text/css">
</head>

<body>
    <!-- Header Start -->
    <header class="navigation-section position-absolute">
        <div class="navigation-overlay"></div>
        <div class="navigation-and-offcanvas">
            <div class="col no-margin-bottom lg-5 md-basis-uato">
                <nav class="navigation-menu">
                    <a href="index.php" class="nav-link w--current">Home</a>
                </nav>
            </div>
            <div class="col lg-2 md-basis-auto md-order-first no-margin-bottom-lg">
                <a href="#" class="brand margin-left-right-24px w-inline-block">
                    <img src="vendor/imandor/images/imandor_logo.png" alt="e-Bfbms Recruitment Logo">
                </a>
            </div>
            <div class="col no-margin-bottom lg-5">
                <nav class="navigation-menu justify-end">
                    <a data-w-id="e02ef0fd-d341-7eaf-5ed3-b53528c9af97" href="index.php?r=Site/Login" class="button-primary animated is-small alignself-center is-dark md-margin-top-small w-inline-block">
                        <div class="button-primary-text">Login</div>
                        <div class="button-primary-text for-hover">Let&#x27;s Go <span class="fa margin-left"></span></div>
                    </a>
                </nav>
            </div>
            <a data-w-id="83a36909-9554-440b-ec90-d232c2c0c85f" href="#" class="c-nav__close-button w-inline-block">
                <div class="iconfont is-offcanvas-close-button"><em class="iconfont__no-italize"></em></div>
            </a>
        </div>
    </header>
    <!-- Header End -->
    
    <!--Site Start -->
    <?php echo $content; ?>
    <!--Site End -->
    
    <!-- Footer Start -->
    <footer class="section section-footer-dark padding-bottom-16" style="padding-top: 29px;">
        <div class="container margin-bottom">
            <div class="col lg-2 md-12 md-order-first">
                <img src="vendor/imandor/images/imandor_logo2.png" alt="">
            </div>
            <div class="col lg-6 md-12 no-margin-bottom-lg">
                <div class="container container-nested">
                    <div class="col lg-4 md-12 no-margin-bottom-lg">
                        <h4 class="on-dark">Source Country</h4>
                        <a href="#" class="footer-nav-link on-dark">Registration</a>
                        <a href="#" class="footer-nav-link on-dark">Medical</a>
                        <a href="#" class="footer-nav-link on-dark">Visa</a>
                        <a href="#" class="footer-nav-link on-dark">Flight</a>
                    </div>
                    <div class="col lg-4 md-12 no-margin-bottom-lg">
                        <h4 class="on-dark">Administration</h4>
                        <a href="#" class="footer-nav-link on-dark">Approval</a>
                        <a href="#" class="footer-nav-link on-dark">Departure</a>
                        <a href="#" class="footer-nav-link on-dark">Arrival</a>
                        <a href="#" class="footer-nav-link on-dark">Foreign Worker</a>
                    </div>
                    <div class="col lg-4 md-12 no-margin-bottom">
                        <h4 class="on-dark">Settings</h4>
                        <a href="#" class="footer-nav-link on-dark">Agency</a>
                        <a href="#" class="footer-nav-link on-dark">Employer</a>
                        <a href="#" class="footer-nav-link on-dark">User</a>
                        <a href="#" class="footer-nav-link on-dark">Profile</a>
                    </div>
                </div>
            </div>
            <div class="col lg-4 md-12 no-margin-bottom">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d16300239.995669322!2d100.57707731070505!3d4.111378446091053!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3034d3975f6730af%3A0x745969328211cd8!2sMalaysia!5e0!3m2!1sen!2smy!4v1583039460316!5m2!1sen!2smy" width="100%" height="150" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>
        <div class="container">
            <div class="col lg-12 margin-bottom">
                <div class="hr on-dark"></div>
            </div>
        </div>
        <div class="container">
            <div class="col lg-6 no-margin-bottom md-12 md-order-last">
                <div class="low-text-contrast text-small flexh-space-between md-flex-vertical">
                    <div class="md-order-last">Copyright © <?php echo date('Y'); ?>. </div><a href="#" class="footer-bottom-link">FRESH Recruitment Web v1.0</a><a href="#" class="footer-bottom-link">All Rights Reserved.</a>
                </div>
            </div>
            <div class="col lg-6 no-margin-bottom md-12">
                <div class="w100 text-align-right footer-bottom md-text-align-left margin-bottom">Powered by BakeTech</div>
            </div>
        </div>
    </footer>
    <!-- Footer End -->
    
    <?php $this->renderPartial('//layouts/landing/footer'); ?>
</body>

</html>