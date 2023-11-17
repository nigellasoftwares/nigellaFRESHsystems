<?php
$active = Helpers::activeMenu($user->role->name);
?>

<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->

<aside class="left-sidebar">

    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- User Profile-->
        <div class="user-profile">
            <div class="user-pro-body">
                <div><img src="vendor/imandor/images/user2.jpg" alt="user-img" class="img-circle"></div>
                <div class="dropdown">
                    <a href="javascript:void(0)" class="u-dropdown link hide-menu"><?php echo $user->profile->fullname; ?></a>
                    <a href="javascript:void(0)" class="u-dropdown link hide-menu">
                        <?php
                            if ($user->role->id == 2) {
                                echo 'LOCAL AGENT';
                            } else {
                                echo $user->role->name;
                            }
                        ?>
                    </a>
                </div>
            </div>
        </div>

        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <?php
                /** ADMIN * */
                if ($user->role->name == 'WEBMIN') {
                    ?>
                    <li class="<?php echo $active['webmin_dashboard']; ?>"> 
                        <a class="waves-effect waves-dark" href="index.php?r=Webmin/Dashboard">
                            <i class="icon-speedometer"></i>
                            <span class="hide-menu">Dashboard</span>
                        </a>
                    </li>
                    <li class="<?php echo $active['webmin_profile']; ?>"> 
                        <a class="waves-effect waves-dark" href="index.php?r=Webmin/Profile" aria-expanded="false">
                            <i class="icon-user"></i>
                            <span class="hide-menu">Profile</span>
                        </a>
                    </li>
                    <li class="menu-devider"></li>
                    <li class="<?php echo $active['webmin_worker']; ?>"> 
                        <a class="waves-effect waves-dark" href="index.php?r=Webmin/Worker" aria-expanded="false">
                            <i class="icon-people"></i>
                            <span class="hide-menu">Worker</span>
                        </a>
                    </li>
                    <li class="menu-devider"></li>
                    <!--
    <li class="<?php echo $active['webmin_company']; ?>"> 
    <a class="waves-effect waves-dark" href="index.php?r=Webmin/Company" aria-expanded="false">
    <i class="fa fa-building-o"></i>
    <span class="hide-menu">Company</span>
    </a>
    </li>
                    <li class="menu-devider"></li>
                    -->
                    <li class="<?php echo $active['webmin_sourceagent']; ?>"> 
                        <a class="waves-effect waves-dark" href="index.php?r=Webmin/SourceAgent" aria-expanded="false">
                            <i class="icon-briefcase"></i>
                            <span class="hide-menu">Source Agent</span>
                        </a>
                    </li>
                    <li class="<?php echo $active['webmin_localagent']; ?>"> 
                        <a class="waves-effect waves-dark" href="index.php?r=Webmin/LocalAgent" aria-expanded="false">
                            <i class="icon-briefcase"></i>
                            <span class="hide-menu">Local Agent</span>
                        </a>
                    </li>
                    <!--
    <li class="<?php echo $active['webmin_employer']; ?>"> 
    <a class="waves-effect waves-dark" href="index.php?r=Webmin/Employer" aria-expanded="false">
    <i class="icon-employer"></i>
    <span class="hide-menu">Employer</span>
    </a>
    </li>
                    -->
                    <li class="<?php echo $active['webmin_administrator']; ?>"> 
                        <a class="waves-effect waves-dark" href="index.php?r=Webmin/Administrator" aria-expanded="false">
                            <i class="icon-people"></i>
                            <span class="hide-menu">Administrator</span>
                        </a>
                    </li>
                    <li class="menu-devider"></li>
                    <li class="<?php echo $active['webmin_user']; ?>"> 
                        <a class="waves-effect waves-dark" href="index.php?r=Webmin/User" aria-expanded="false">
                            <i class="icon-people"></i>
                            <span class="hide-menu">User</span>
                        </a>
                    </li>
                    <li class="menu-devider"></li>
                    <li class="<?php echo $active['webmin_setting']; ?>"> 
                        <a class="waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i class="icon-settings"></i>
                            <span class="hide-menu">Setting</span>
                        </a>
                        <ul aria-expanded="false" class="collapse <?php echo $active['webmin_setting_in']; ?>">
                            <!--
                            <li class="<?php echo $active['webmin_setting_district']; ?>">
                                <a href="index.php?r=Setting/District" class="<?php echo $active['webmin_setting_district']; ?>">
                                    District
                                </a>
                            </li>
                            -->
                            <li class="<?php echo $active['webmin_setting_educationtype']; ?>">
                                <a href="index.php?r=Setting/EducationType" class="<?php echo $active['webmin_setting_educationtype']; ?>">
                                    Education
                                </a>
                            </li>
                            <li class="<?php echo $active['webmin_setting_gender']; ?>">
                                <a href="index.php?r=Setting/Gender" class="<?php echo $active['webmin_setting_gender']; ?>">
                                    Gender
                                </a>
                            </li>
                            <li class="<?php echo $active['webmin_setting_marital']; ?>">
                                <a href="index.php?r=Setting/Marital" class="<?php echo $active['webmin_setting_marital']; ?>">
                                    Marital Status
                                </a>
                            </li>
                            <li class="<?php echo $active['webmin_setting_nationality']; ?>">
                                <a href="index.php?r=Setting/Nationality" class="<?php echo $active['webmin_setting_nationality']; ?>">
                                    Nationality
                                </a>
                            </li>
                            <li class="<?php echo $active['webmin_setting_role']; ?>">
                                <a href="index.php?r=Setting/Role" class="<?php echo $active['webmin_setting_role']; ?>">
                                    Role
                                </a>
                            </li>
                            <li class="<?php echo $active['webmin_setting_state']; ?>">
                                <a href="index.php?r=Setting/State" class="<?php echo $active['webmin_setting_state']; ?>">
                                    State
                                </a>
                            </li>
                            <li class="<?php echo $active['webmin_setting_status']; ?>">
                                <a href="index.php?r=Setting/Status" class="<?php echo $active['webmin_setting_status']; ?>">
                                    Status
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="<?php echo $active['webmin_sequence']; ?>"> 
                        <a class="waves-effect waves-dark" href="index.php?r=Webmin/Sequence" aria-expanded="false">
                            <i class="icon-equalizer"></i>
                            <span class="hide-menu">Sequence</span>
                        </a>
                    </li>
                    <?php
                    /** SOURCE AGENT * */
                } else if ($user->role->name == 'SOURCE AGENT') {
                    ?>
                    <li class="<?php echo $active['sourceagent_dashboard']; ?>"> 
                        <a class="waves-effect waves-dark" href="index.php?r=Sourceagent/Dashboard" aria-expanded="false">
                            <i class="icon-speedometer"></i>
                            <span class="hide-menu">Dashboard</span>
                        </a>
                    </li>
                    <li class="menu-devider"></li>
                    <li class="<?php echo $active['sourceagent_profile']; ?>"> 
                        <a class="waves-effect waves-dark" href="index.php?r=Sourceagent/Profile" aria-expanded="false">
                            <i class="icon-user"></i>
                            <span class="hide-menu">Profile</span>
                        </a>
                    </li>
                    <li class="menu-devider"></li>
                    <li class="<?php echo $active['sourceagent_application']; ?>"> 
                        <a class="waves-effect waves-dark" href="index.php?r=Sourceagent/Application" aria-expanded="false">
                            <i class="icon-people"></i>
                            <span class="hide-menu">Application</span>
                        </a>
                    </li>
                    <li class="<?php echo $active['sourceagent_medical']; ?>"> 
                        <a class="waves-effect waves-dark" href="index.php?r=Sourceagent/Medical" aria-expanded="false">
                            <i class="fa fa-medkit"></i>
                            <span class="hide-menu">Medical</span>
                        </a>
                    </li>
                    <li class="<?php echo $active['sourceagent_training']; ?>"> 
                        <a class="waves-effect waves-dark" href="index.php?r=Sourceagent/Training" aria-expanded="false">
                            <i class="fa fa-medkit"></i>
                            <span class="hide-menu">Training</span>
                        </a>
                    </li>
                    <li class="menu-devider"></li>
                    <li class="<?php echo $active['sourceagent_worker']; ?>"> 
                        <a class="waves-effect waves-dark" href="index.php?r=Sourceagent/Worker" aria-expanded="false">
                            <i class="icon-people"></i>
                            <span class="hide-menu">Worker Management</span>
                        </a>
                    </li>
                    <li class="menu-devider"></li>
                    <li class="<?php echo $active['sourceagent_flight']; ?>"> 
                        <a class="waves-effect waves-dark" href="index.php?r=Sourceagent/Flight" aria-expanded="false">
                            <i class="fa fa-plane"></i>
                            <span class="hide-menu">Flight Booking</span>
                        </a>
                    </li>
                    <li class="<?php echo $active['sourceagent_flightlist']; ?>"> 
                        <a class="waves-effect waves-dark" href="index.php?r=Sourceagent/FlightList" aria-expanded="false">
                            <i class="icon-list"></i>
                            <span class="hide-menu">Flight List</span>
                        </a>
                    </li>
                    <!--
                    <li class="menu-devider"></li>
                    <li class="<?php echo $active['sourceagent_report']; ?>"> 
                        <a class="waves-effect waves-dark" href="index.php?r=Sourceagent/Report" aria-expanded="false">
                            <i class="icon-docs"></i>
                            <span class="hide-menu">Report</span>
                        </a>
                    </li>
                    -->
                    <?php
                    /** LOCAL AGENT * */
                } else if ($user->role->name == 'ADMIN') {
                    ?>
                    <li class="<?php echo $active['admin_dashboard']; ?>"> 
                        <a class="waves-effect waves-dark" href="index.php?r=Admin/Dashboard" aria-expanded="false">
                            <i class="icon-speedometer"></i>
                            <span class="hide-menu">Dashboard</span>
                        </a>
                    </li>
                    <li class="<?php echo $active['admin_profile']; ?>"> 
                        <a class="waves-effect waves-dark" href="index.php?r=Admin/Profile" aria-expanded="false">
                            <i class="icon-user"></i>
                            <span class="hide-menu">Profile</span>
                        </a>
                    </li>
                    <li class="menu-devider"></li>
                    <li class="<?php echo $active['admin_worker']; ?>"> 
                        <a class="waves-effect waves-dark" href="index.php?r=Admin/Worker" aria-expanded="false">
                            <i class="icon-people"></i>
                            <span class="hide-menu">Worker Management</span>
                        </a>
                    </li>
                    <!--
                    <li class="<?php echo $active['admin_agent']; ?>"> 
                        <a class="waves-effect waves-dark" href="index.php?r=Admin/Agent" aria-expanded="false">
                            <i class="icon-briefcase"></i>
                            <span class="hide-menu">Agent</span>
                        </a>
                    </li>
                    -->
                    <li class="<?php echo $active['admin_employer']; ?>"> 
                        <a class="waves-effect waves-dark" href="index.php?r=Admin/Employer" aria-expanded="false">
                            <i class="icon-diamond"></i>
                            <span class="hide-menu">Document Uploads</span>
                        </a>
                    </li>
                    <li class="menu-devider"></li>
                    <li class="<?php echo $active['admin_reminder']; ?>"> 
                        <a class="waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i class="icon-bell"></i>
                            <span class="hide-menu">Reminder</span>
                        </a>
                        <ul aria-expanded="false" class="collapse <?php echo $active['admin_reminder_in']; ?>">
                            <li class="<?php echo $active['admin_reminder_medical']; ?>">
                                <a href="index.php?r=Admin/ReminderMedical" class="<?php echo $active['admin_reminder_medical']; ?>">
                                    Medical
                                </a>
                            </li>
                            <li class="<?php echo $active['admin_reminder_plks']; ?>">
                                <a href="index.php?r=Admin/ReminderPLKS" class="<?php echo $active['admin_reminder_plks']; ?>">
                                    PLKS
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!--
                    <li class="menu-devider"></li>
                    <li class="<?php echo $active['admin_scanqr']; ?>">
                        <a class="waves-effect waves-dark" href="index.php?r=Admin/ScanQR" aria-expanded="false">
                            <i class="icon-grid"></i>
                            <span class="hide-menu">Scan QR</span>
                        </a>
                    </li>
                    <li class="<?php echo $active['admin_report']; ?>"> 
                        <a class="waves-effect waves-dark" href="index.php?r=Admin/Report" aria-expanded="false">
                            <i class="icon-docs"></i>
                            <span class="hide-menu">Report</span>
                        </a>
                    </li>
                    -->
                    <?php
                    /** MASTER * */
                } else if ($user->role->name == 'MASTER') {
                    ?>    
                    <li class="<?php echo $active['master_mainboard']; ?>"> 
                        <a class="waves-effect waves-dark" href="index.php?r=Master/Mainboard" aria-expanded="false">
                            <i class="icon-speedometer"></i>
                            <span class="hide-menu">Mainboard</span>
                        </a>
                    </li>
                    <li class="menu-devider"></li>
                    <li class="<?php echo $active['master_profile']; ?>"> 
                        <a class="waves-effect waves-dark" href="index.php?r=Master/Profile" aria-expanded="false">
                            <i class="icon-user"></i>
                            <span class="hide-menu">Profile</span>
                        </a>
                    </li>
                    <?php
                    if (!empty($_GET['said'])) {
                        $said = $_GET['said'];
                        $sagent = Profile::model()->findByPk($said);
                        ?>
                        <li class="menu-devider"></li>
                        <li class="nav-small-cap">--- <?php echo $sagent->company->remark; ?></li>
                        <li class="<?php echo $active['master_dashboard']; ?>"> 
                            <a class="waves-effect waves-dark" href="index.php?r=Master/Dashboard&said=<?php echo $said; ?>" aria-expanded="false">
                                <i class="icon-speedometer"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="<?php echo $active['master_application']; ?>"> 
                            <a class="waves-effect waves-dark" href="index.php?r=Master/Application&said=<?php echo $said; ?>" aria-expanded="false">
                                <i class="icon-people"></i>
                                <span class="hide-menu">Application</span>
                            </a>
                        </li>
                        <li class="<?php echo $active['master_medical']; ?>"> 
                            <a class="waves-effect waves-dark" href="index.php?r=Master/Medical&said=<?php echo $said; ?>" aria-expanded="false">
                                <i class="fa fa-medkit"></i>
                                <span class="hide-menu">Medical</span>
                            </a>
                        </li>
                        <li class="<?php echo $active['master_flight']; ?>"> 
                            <a class="waves-effect waves-dark" href="index.php?r=Master/Flight&said=<?php echo $said; ?>" aria-expanded="false">
                                <i class="fa fa-plane"></i>
                                <span class="hide-menu">Flight Booking</span>
                            </a>
                        </li>
                        <li class="<?php echo $active['master_flightlist']; ?>"> 
                            <a class="waves-effect waves-dark" href="index.php?r=Master/FlightList&said=<?php echo $said; ?>" aria-expanded="false">
                                <i class="icon-list"></i>
                                <span class="hide-menu">Flight List</span>
                            </a>
                        </li>
                        <?php
                    }

                    /** EMPLOYER * */
                } else if ($user->role->name == 'EMPLOYER') {
                    ?>
                    <li class="<?php echo $active['employer_dashboard']; ?>"> 
                        <a class="waves-effect waves-dark" href="index.php?r=Employer/Dashboard" aria-expanded="false">
                            <i class="icon-speedometer"></i>
                            <span class="hide-menu">Dashboard</span>
                        </a>
                    </li>
                    <li class="<?php echo $active['employer_profile']; ?>"> 
                        <a class="waves-effect waves-dark" href="index.php?r=Employer/Profile" aria-expanded="false">
                            <i class="icon-user"></i>
                            <span class="hide-menu">Profile</span>
                        </a>
                    </li>
                    <li class="menu-devider"></li>
                    <li class="<?php echo $active['employer_reminder']; ?>"> 
                        <a class="waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i class="icon-bell"></i>
                            <span class="hide-menu">Reminder</span>
                        </a>
                        <ul aria-expanded="false" class="collapse <?php echo $active['employer_reminder_in']; ?>">
                            <li class="<?php echo $active['employer_reminder_medical']; ?>">
                                <a href="index.php?r=Employer/ReminderMedical" class="<?php echo $active['employer_reminder_medical']; ?>">
                                    Medical
                                </a>
                            </li>
                            <li class="<?php echo $active['employer_reminder_plks']; ?>">
                                <a href="index.php?r=Employer/ReminderPLKS" class="<?php echo $active['employer_reminder_plks']; ?>">
                                    PLKS
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-devider"></li>
                    <li class="<?php echo $active['employer_worker']; ?>"> 
                        <a class="waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i class="icon-people"></i>
                            <span class="hide-menu">Worker</span>
                        </a>
                        <ul aria-expanded="false" class="collapse <?php echo $active['employer_worker_in']; ?>">
                            <li class="<?php echo $active['employer_worker_all']; ?>">
                                <a href="index.php?r=Employer/WorkerAll" class="<?php echo $active['employer_worker_all']; ?>">
                                    All Workers
                                </a>
                            </li>
                            <li class="<?php echo $active['employer_worker_my']; ?>">
                                <a href="index.php?r=Employer/LinkWorkerMy" class="<?php echo $active['employer_worker_my']; ?>">
                                    My Workers
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!--
                    <li class="menu-devider"></li>
                    <li class="<?php echo $active['employer_worker']; ?>"> 
                        <a class="waves-effect waves-dark" href="index.php?r=Employer/Worker" aria-expanded="false">
                            <i class="icon-user"></i>
                            <span class="hide-menu">Foreign Worker</span>
                        </a>
                    </li>
                    <li class="<?php echo $active['employer_attendance']; ?>"> 
                        <a class="waves-effect waves-dark" href="index.php?r=Employer/Attendance" aria-expanded="false">
                            <i class="icon-calender"></i>
                            <span class="hide-menu">Attendance</span>
                        </a>
                    </li>
                    -->
                    <?php
                    /* TRAINING CENTER */
                } else if ($user->role->name == 'TRAINING CENTER') {
                    ?>
                    <li class="<?php echo $active['training_dashboard']; ?>"> 
                        <a class="waves-effect waves-dark" href="index.php?r=Training/Dashboard" aria-expanded="false">
                            <i class="icon-speedometer"></i>
                            <span class="hide-menu">Dashboard</span>
                        </a>
                    </li>
                    <?php
                    /** TRAINING CENTER * */
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