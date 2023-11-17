<?php
    if(!Yii::app()->user->isGuest){
        $user = User::model()->findByAttributes(array('username'=>Yii::app()->user->getState('username')));
    }
?>
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 100%;">
            <div class="sidebar-collapse" style="overflow: hidden; width: auto; height: 100%;">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> 
                            <span>
                                <img alt="image" src="vendor/sebumi/images/sebumi_white.png" width="150" />
                            </span>
                            <span class="clear">
                                <span class="block m-t-xs text-white"><strong class="font-bold"><?php echo $user->profile->name; ?></strong></span>
                                <span class="text-muted text-xs block"><?php echo $user->role->name; ?></span> 
                            </span> 
                        </div>
                        <div class="logo-element">
                            RO
                        </div>
                    </li>
                <?php
                    /** ADMINISTRATOR **/
                    if($user->role->name == 'ADMIN'){ 
                ?>
                    <li class="<?php if(strstr(Yii::app()->request->requestUri,"Admin/Dashboard") == TRUE){ echo 'active'; } ?>">
                        <a href="index.php?r=Admin/Dashboard"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
                    </li>
                    <li class="<?php if(strstr(Yii::app()->request->requestUri,"Admin/List") == TRUE){ echo 'active'; } ?>">
                        <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">List</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <!--
                            <li class="<?php if(strstr(Yii::app()->request->requestUri,"Admin/ListAgent") == TRUE){ echo 'active'; } ?>">
                                <a href="index.php?r=Admin/ListAgent">Agent</a>
                            </li>
                            -->
                            <li class="<?php if(strstr(Yii::app()->request->requestUri,"Admin/ListApplicant") == TRUE){ echo 'active'; } ?>">
                                <a href="index.php?r=Admin/ListApplicant">Applicant</a>
                            </li>
                            <!--
                            <li class="<?php if(strstr(Yii::app()->request->requestUri,"Admin/ListDependant") == TRUE){ echo 'active'; } ?>">
                                <a href="index.php?r=Admin/ListDependant">Dependant</a>
                            </li>
                            -->
                        </ul>
                    </li>
                    <li class="<?php if(strstr(Yii::app()->request->requestUri,"Admin/Topup") == TRUE){ echo 'active'; } ?>">
                        <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Top-Up</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li class="<?php if(strstr(Yii::app()->request->requestUri,"Admin/TopupManage") == TRUE){ echo 'active'; } ?>">
                                <a href="index.php?r=Admin/TopupManage">Manage Top-Up</a>
                            </li>
                            <li class="<?php if(strstr(Yii::app()->request->requestUri,"Admin/TopupApprove") == TRUE){ echo 'active'; } ?>">
                                <a href="index.php?r=Admin/TopupApprove">Approve Top-Up</a>
                            </li>
                        </ul>
                    </li>
                    <li class="<?php if(strstr(Yii::app()->request->requestUri,"Admin/Setting") == TRUE){ echo 'active'; } ?>">
                        <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Settings</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li class="<?php if(strstr(Yii::app()->request->requestUri,"Admin/SettingBank") == TRUE){ echo 'active'; } ?>">
                                <a href="index.php?r=Admin/SettingBank">Bank</a>
                            </li>
                            <!--
                            <li class="<?php if(strstr(Yii::app()->request->requestUri,"Admin/SettingDistrict") == TRUE){ echo 'active'; } ?>">
                                <a href="index.php?r=Admin/SettingDistrict">District</a>
                            </li>
                            -->
                            <li class="<?php if(strstr(Yii::app()->request->requestUri,"Admin/SettingNational") == TRUE){ echo 'active'; } ?>">
                                <a href="index.php?r=Admin/SettingNational">National</a>
                            </li>
                            <li class="<?php if(strstr(Yii::app()->request->requestUri,"Admin/SettingJob") == TRUE){ echo 'active'; } ?>">
                                <a href="index.php?r=Admin/SettingJob">Job</a>
                            </li>
                            <li class="<?php if(strstr(Yii::app()->request->requestUri,"Admin/SettingRelation") == TRUE){ echo 'active'; } ?>">
                                <a href="index.php?r=Admin/SettingRelation">Relation</a>
                            </li>
                        </ul>
                    </li>
                <?php
                    /** AGENT **/
                    } else if($user->role->name == 'AGENT'){ 
                ?>
                    <li class="<?php if(strstr(Yii::app()->request->requestUri,"Agent/Dashboard") == TRUE){ echo 'active'; } ?>">
                        <a href="index.php?r=Agent/Dashboard"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
                    </li>
                    <li class="<?php if(strstr(Yii::app()->request->requestUri,"Agent/ListApplicant") == TRUE){ echo 'active'; } ?>">
                        <a href="index.php?r=Agent/ListApplicant"><i class="fa fa-th-large"></i> <span class="nav-label">Worker</span></a>
                    </li>
                    <li class="<?php if(strstr(Yii::app()->request->requestUri,"Agent/ListVisa") == TRUE){ echo 'active'; } ?>">
                        <a href="index.php?r=Agent/ListVisa"><i class="fa fa-th-large"></i> <span class="nav-label">Visa</span></a>
                    </li>
                    <li class="<?php if(strstr(Yii::app()->request->requestUri,"Agent/Account") == TRUE){ echo 'active'; } ?>">
                        <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Account</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li class="active"><a href="index.php?r=Agent/AccountView">View Account</a></li>
                            <li class="active"><a href="index.php?r=Agent/AccountRegister">View Registration</a></li>
                            <li class="active"><a href="index.php?r=Agent/AccountTopupView">View Top-Up</a></li>
                            <!--
                            <li class="active"><a href="index.php?r=Agent/AccountTopupCreate">Create Top-Up</a></li>
                            -->
                        </ul>
                    </li>
                <?php
                    /** DOCTOR **/
                    } else if($user->role->name == 'DOCTOR'){ 
                ?>
                    <li class="<?php if(strstr(Yii::app()->request->requestUri,"Doctor/Dashboard") == TRUE){ echo 'active'; } ?>">
                        <a href="index.php?r=Doctor/Dashboard"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
                    </li>
					<li class="<?php if(strstr(Yii::app()->request->requestUri,"Doctor/Barcode") == TRUE){ echo 'active'; } ?>">
                        <a href="index.php?r=Doctor/Barcode"><i class="fa fa-th-large"></i> <span class="nav-label">Medical</span></a>
                    </li>
					<!--
					<li class="<?php if(strstr(Yii::app()->request->requestUri,"Doctor/Account") == TRUE){ echo 'active'; } ?>">
                        <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Account</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li class="active"><a href="index.php?r=Doctor/AccountView">View Account</a></li>
                            <li class="active"><a href="index.php?r=Doctor/AccountRegister">View Registration</a></li>
                            <li class="active"><a href="index.php?r=Doctor/AccountTopupView">View Top-Up</a></li>
                        </ul>
                    </li>
					-->
				<?php
                    } else { 
                        $this->redirect('index.php?r=Site/Logout');
                    } 
                ?>
                </ul>
            </div>
        </div>
    </nav>