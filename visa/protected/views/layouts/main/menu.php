        <?php
            if(!Yii::app()->user->isGuest){
                $user = User::model()->findByAttributes(array('username'=>Yii::app()->user->getState('username')));
            }
        ?>
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                    <?php
                        /** ADMINISTRATOR **/
                        if($user->role->name == 'ADMINISTRATOR'){ 
                    ?>
                        <li class="<?php if(strstr(Yii::app()->request->requestUri,"Administrator/Dashboard") == TRUE){ echo 'active'; } ?>"> 
                            <a class="waves-effect waves-dark" href="index.php?r=Administrator/Dashboard">
                                <i class="icon-speedometer"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="menu-devider"></li>
                        <li class="<?php if(strstr(Yii::app()->request->requestUri,"Administrator/Application") == TRUE){ echo 'active'; } ?>"> 
                            <a class="waves-effect waves-dark" href="index.php?r=Administrator/Application" aria-expanded="false">
                                <i class="icon-layers"></i>
                                <span class="hide-menu">Application</span>
                            </a>
                        </li>
                        <li class="<?php if(strstr(Yii::app()->request->requestUri,"Administrator/User") == TRUE){ echo 'active'; } ?>"> 
                            <a class="waves-effect waves-dark" href="index.php?r=Administrator/User" aria-expanded="false">
                                <i class="icon-user"></i>
                                <span class="hide-menu">User</span>
                            </a>
                        </li>
                        <li class="menu-devider"></li>
                        <li class="<?php if(strstr(Yii::app()->request->requestUri,"Administrator/Report") == TRUE){ echo 'active'; } ?>"> 
                            <a class="waves-effect waves-dark" href="index.php?r=Administrator/Report" aria-expanded="false">
                                <i class="icon-notebook"></i>
                                <span class="hide-menu">Report</span>
                            </a>
                        </li>
                        <li class="<?php if(strstr(Yii::app()->request->requestUri,"Administrator/Statistic") == TRUE){ echo 'active'; } ?>"> 
                            <a class="waves-effect waves-dark" href="index.php?r=Administrator/Statistic" aria-expanded="false">
                                <i class="icon-pie-chart"></i>
                                <span class="hide-menu">Statistic</span>
                            </a>
                        </li>
                        <li class="menu-devider"></li>
                        <li class="<?php if(strstr(Yii::app()->request->requestUri,"Administrator/Setting") == TRUE){ echo 'active'; } ?>"> 
                            <a class="waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                <i class="icon-layers"></i>
                                <span class="hide-menu">Setting</span>
                            </a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="index.php?r=Administrator/Setting">Calendar</a></li>
                                <li><a href="app-chat.html">Chat app</a></li>
                                <li><a href="app-ticket.html">Support Ticket</a></li>
                                <li><a href="app-contact.html">Contact / Employee</a></li>
                                <li><a href="app-contact2.html">Contact Grid</a></li>
                                <li><a href="app-contact-detail.html">Contact Detail</a></li>
                            </ul>
                        </li>
                    <?php
                        /** HIGH COMMISSION **/
                        } else if($user->role->name == 'HIGH COMMISSION'){ 
                    ?>
                        <li class="<?php if(strstr(Yii::app()->request->requestUri,"Highcomm/Dashboard") == TRUE){ echo 'active'; } ?>"> 
                            <a class="waves-effect waves-dark" href="index.php?r=Highcomm/Dashboard" aria-expanded="false">
                                <i class="icon-speedometer"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="menu-devider"></li>
                        <li class="<?php if(strstr(Yii::app()->request->requestUri,"Highcomm/Application") == TRUE){ echo 'active'; } ?>"> 
                            <a class="waves-effect waves-dark" href="index.php?r=Highcomm/Application" aria-expanded="false">
                                <i class="icon-user"></i>
                                <span class="hide-menu">Application</span>
                            </a>
                        </li>
                        <li class="<?php if(strstr(Yii::app()->request->requestUri,"Highcomm/ScanQR") == TRUE){ echo 'active'; } ?>"> 
                            <a class="waves-effect waves-dark" href="index.php?r=Highcomm/ScanQR" aria-expanded="false">
                                <i class="icon-user"></i>
                                <span class="hide-menu">Scan QR</span>
                            </a>
                        </li>
                        <li class="menu-devider"></li>
                        <li class="<?php if(strstr(Yii::app()->request->requestUri,"Highcomm/Report") == TRUE){ echo 'active'; } ?>"> 
                            <a class="waves-effect waves-dark" href="index.php?r=Highcomm/Report" aria-expanded="false">
                                <i class="icon-notebook"></i>
                                <span class="hide-menu">Report</span>
                            </a>
                        </li>
                        <li class="<?php if(strstr(Yii::app()->request->requestUri,"Highcomm/Statistic") == TRUE){ echo 'active'; } ?>"> 
                            <a class="waves-effect waves-dark" href="index.php?r=Highcomm/Statistic" aria-expanded="false">
                                <i class="icon-pie-chart"></i>
                                <span class="hide-menu">Statistic</span>
                            </a>
                        </li>
                    <?php
                        /** ONE STOP CENTRE **/
                        } else if($user->role->name == 'ONE STOP CENTRE'){ 
                    ?>
                        <li class="<?php if(strstr(Yii::app()->request->requestUri,"Osc/Dashboard") == TRUE){ echo 'active'; } ?>"> 
                            <a class="waves-effect waves-dark" href="index.php?r=Osc/Dashboard" aria-expanded="false">
                                <i class="icon-speedometer"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="menu-devider"></li>
                        <li class="<?php if(strstr(Yii::app()->request->requestUri,"Osc/Application") == TRUE){ echo 'active'; } ?>"> 
                            <a class="waves-effect waves-dark" href="index.php?r=Osc/Application" aria-expanded="false">
                                <i class="icon-user"></i>
                                <span class="hide-menu">Application</span>
                            </a>
                        </li>
                        <li class="<?php if(strstr(Yii::app()->request->requestUri,"Osc/ScanQR") == TRUE){ echo 'active'; } ?>"> 
                            <a class="waves-effect waves-dark" href="index.php?r=Osc/ScanQR" aria-expanded="false">
                                <i class="icon-user"></i>
                                <span class="hide-menu">Scan QR</span>
                            </a>
                        </li>
                        <li class="menu-devider"></li>
                        <li class="<?php if(strstr(Yii::app()->request->requestUri,"Osc/Report") == TRUE){ echo 'active'; } ?>"> 
                            <a class="waves-effect waves-dark" href="index.php?r=Osc/Report" aria-expanded="false">
                                <i class="icon-notebook"></i>
                                <span class="hide-menu">Report</span>
                            </a>
                        </li>
                        <li class="<?php if(strstr(Yii::app()->request->requestUri,"Osc/Statistic") == TRUE){ echo 'active'; } ?>"> 
                            <a class="waves-effect waves-dark" href="index.php?r=Osc/Statistic" aria-expanded="false">
                                <i class="icon-pie-chart"></i>
                                <span class="hide-menu">Statistic</span>
                            </a>
                        </li>
                    <?php
                        /** ADMIN **/
                        } else if($user->role->name == 'ADMIN'){ 
                    ?>
                        <li class="<?php if(strstr(Yii::app()->request->requestUri,"Admin/Dashboard") == TRUE){ echo 'active'; } ?>"> 
                            <a class="waves-effect waves-dark" href="index.php?r=Admin/Dashboard" aria-expanded="false">
                                <i class="icon-speedometer"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="menu-devider"></li>
                        <li class="<?php if(strstr(Yii::app()->request->requestUri,"Admin/Application") == TRUE){ echo 'active'; } ?>"> 
                            <a class="waves-effect waves-dark" href="index.php?r=Admin/Application" aria-expanded="false">
                                <i class="icon-user"></i>
                                <span class="hide-menu">Application</span>
                            </a>
                        </li>
                        <li class="<?php if(strstr(Yii::app()->request->requestUri,"Admin/ScanQR") == TRUE){ echo 'active'; } ?>"> 
                            <a class="waves-effect waves-dark" href="index.php?r=Admin/ScanQR" aria-expanded="false">
                                <i class="icon-user"></i>
                                <span class="hide-menu">Scan QR</span>
                            </a>
                        </li>
                        <li class="menu-devider"></li>
                        <li class="<?php if(strstr(Yii::app()->request->requestUri,"Admin/Report") == TRUE){ echo 'active'; } ?>"> 
                            <a class="waves-effect waves-dark" href="index.php?r=Admin/Report" aria-expanded="false">
                                <i class="icon-notebook"></i>
                                <span class="hide-menu">Report</span>
                            </a>
                        </li>
                        <li class="<?php if(strstr(Yii::app()->request->requestUri,"Admin/Statistic") == TRUE){ echo 'active'; } ?>"> 
                            <a class="waves-effect waves-dark" href="index.php?r=Admin/Statistic" aria-expanded="false">
                                <i class="icon-pie-chart"></i>
                                <span class="hide-menu">Statistic</span>
                            </a>
                        </li>
                    <?php
                        /** BRANCH @ AGENT **/
                        } else if($user->role->name == 'BRANCH'){ 
                    ?>
                        <li class="<?php if(strstr(Yii::app()->request->requestUri,"Branch/Dashboard") == TRUE){ echo 'active'; } ?>"> 
                            <a class="waves-effect waves-dark" href="index.php?r=Branch/Dashboard">
                                <i class="icon-speedometer"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="menu-devider"></li>
                        <li class="<?php if(strstr(Yii::app()->request->requestUri,"Branch/Application") == TRUE){ echo 'active'; } ?>"> 
                            <a class="waves-effect waves-dark" href="index.php?r=Branch/Application">
                                <i class="icon-user"></i>
                                <span class="hide-menu">Application</span>
                            </a>
                        </li>
                        <li class="<?php if(strstr(Yii::app()->request->requestUri,"Branch/ScanQR") == TRUE){ echo 'active'; } ?>"> 
                            <a class="waves-effect waves-dark" href="index.php?r=Branch/ScanQR" aria-expanded="false">
                                <i class="icon-user"></i>
                                <span class="hide-menu">Scan QR</span>
                            </a>
                        </li>
                        <li class="menu-devider"></li>
                        <li class="<?php if(strstr(Yii::app()->request->requestUri,"Branch/Report") == TRUE){ echo 'active'; } ?>"> 
                            <a class="waves-effect waves-dark" href="index.php?r=Branch/Report">
                                <i class="icon-notebook"></i>
                                <span class="hide-menu">Report</span>
                            </a>
                        </li>
                        <li class="<?php if(strstr(Yii::app()->request->requestUri,"Branch/Statistic") == TRUE){ echo 'active'; } ?>"> 
                            <a class="waves-effect waves-dark" href="index.php?r=Branch/Statistic">
                                <i class="icon-pie-chart"></i>
                                <span class="hide-menu">Statistic</span>
                            </a>
                        </li>
                    <?php
                        }
                    ?>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->