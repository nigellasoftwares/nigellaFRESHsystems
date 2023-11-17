        <?php
            if(!Yii::app()->user->isGuest){
                $user = User::model()->findByAttributes(array('username'=>Yii::app()->user->getState('username')));
            }
        ?>
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="vendor/visafasttrack/images/visafasttrack_icon.png" alt="Visa Fast Track" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="vendor/visafasttrack/images/visafasttrack_icon.png" alt="Visa Fast Track" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span>
                         <!-- dark Logo text -->
                         <img src="vendor/visafasttrack/images/visafasttrack_text.png" alt="Visa Fast Track" class="dark-logo" />
                         <!-- Light Logo text -->    
                         <img src="vendor/visafasttrack/images/visafasttrack_text_white.png" alt="Visa Fast Track" class="light-logo" /></span> </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler d-block d-sm-none waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark" href="javascript:void(0)"><i class="icon-menu"></i></a> </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                                <img src="vendor/visafasttrack/images/visafasttrack_logo2.png" alt="Visa Fast Track" class="dark-logo" />
                                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                            </a>
                            <!--
                            <div class="dropdown-menu animated flipInY">
                                <a href="javascript:void(0)" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                                <a href="javascript:void(0)" class="dropdown-item"><i class="ti-wallet"></i> My Balance</a>
                                <a href="javascript:void(0)" class="dropdown-item"><i class="ti-email"></i> Inbox</a>
                                <div class="dropdown-divider"></div>
                                <a href="javascript:void(0)" class="dropdown-item"><i class="ti-settings"></i> Account Setting</a>
                                <div class="dropdown-divider"></div>
                                <a href="login.html" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                            </div>
                            -->
                        </li>
                    </ul>
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                                <div>
                                    <img src="vendor/visafasttrack/images/user.png" alt="user-img" class="img-circle" height="40"> 
                                    <span class="text-white"><?php echo $user->profile->name; ?><!--<i class="ti-arrow-circle-down"></i>--></span>
                                </div>
                                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                            </a>
                            <!--
                            <div class="dropdown-menu animated flipInY">
                                <a href="javascript:void(0)" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                                <a href="javascript:void(0)" class="dropdown-item"><i class="ti-wallet"></i> My Balance</a>
                                <a href="javascript:void(0)" class="dropdown-item"><i class="ti-email"></i> Inbox</a>
                                <div class="dropdown-divider"></div>
                                <a href="javascript:void(0)" class="dropdown-item"><i class="ti-settings"></i> Account Setting</a>
                                <div class="dropdown-divider"></div>
                                <a href="login.html" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                            </div>
                            -->
                        </li>
                        <li class="nav-item"> 
                            <a class="nav-link waves-effect waves-light" href="#">
                                <img src="vendor/visafasttrack/images/role.png" alt="user-img" class="img-circle" height="40"> 
                                <span class="text-white"><?php echo $user->role->name; ?></span>
                            </a>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End Profile -->
                        <!-- ============================================================== -->
                        <!--
                        <li class="nav-item right-side-toggle"> <a class="nav-link waves-effect waves-light" href="javascript:void(0)"><i class="ti-settings"></i></a></li>
                        -->
                        <li class="nav-item"> 
                            <a class="nav-link waves-effect waves-light" href="index.php?r=Site/Logout">
                                <img src="vendor/visafasttrack/images/logout.png" alt="user-img" class="img-circle" height="40">
                                <span class="text-white">Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->