    <?php
        if(!Yii::app()->user->isGuest){
            $user = User::model()->findByAttributes(array('username'=>Yii::app()->user->getState('username')));
        }
    ?>
    <nav class="navbar navbar-fixed-top white-bg" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-success " href="#"><i class="fa fa-bars"></i> </a>
            <span>
                <img alt="image" src="vendor/sebumi/images/sebumi_dark.png" height="60" />
            </span>
        </div>
        <ul class="nav navbar-top-links navbar-right">
            <li>
                <span class="m-r-sm text-muted"><span class="label label-primary2 text-lg"><?php echo $user->profile->name; ?></span></span>
            </li>
            <li>
                <a href="index.php?r=Site/Logout">
                    <i class="fa fa-sign-out"></i> Log out
                </a>
            </li>
        </ul>
    </nav>