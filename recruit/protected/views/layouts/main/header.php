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
                            <img src="vendor/imandor/images/imandor_icon.png" alt="i-MANDOR" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="vendor/imandor/images/imandor_icon.png" alt="i-MANDOR" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span>
                         <!-- dark Logo text -->
                         <img src="vendor/imandor/images/imandor_text.png" alt="i-MANDOR" class="dark-logo" />
                         <!-- Light Logo text -->    
                         <img src="vendor/imandor/images/imandor_text_white.png" alt="i-MANDOR" class="light-logo" /></span> </a>
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
                                <img src="vendor/imandor/images/imandor_logo2.png" alt="i-MANDOR" class="dark-logo" height="30" /> <?php echo $country; ?>
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
                        <li class="nav-item"> 
                            <div class="dropdown">
                                <a class="nav-link waves-effect waves-light dropdown-toggle u-dropdown" href="javascript:void(0)" data-toggle="dropdown">
                                    <i class="icon-logout"></i> <span class="text-white">Logout</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right animated flipInY">
                                    <div class="dropdown-item text-danger"><?php echo $user->profile->fullname; ?></div>
                                    <div class="dropdown-item text-danger"><?php echo $user->role->name; ?></div>
                                    <div class="dropdown-divider"></div>
                                    <a href="index.php?r=<?php echo ucfirst(strtolower(str_replace(' ','',$user->role->name))); ?>/Profile" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                                    <a href="index.php?r=Site/Logout" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                                </div>
                            </div>    
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->