<?php 
    $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
            'validateOnSubmit'=>true,
	),
        'htmlOptions'=>array(
            'accept-charset'=>'utf-8',
            'name'=>'login-form-'.Yii::app()->session['csrf_token']
        ),
    ));
    
    // Create a new CSRF token.
    if (!isset(Yii::app()->session['csrf_token'])){
        Yii::app()->session['csrf_token'] = base64_encode(openssl_random_pseudo_bytes(32));
    }
?>

<div class="row p-sm" style="background-color: rgba(112,88,74,0.3);">
    <div class="row">
        <div class="col-md-6">
            <h2 class="font-bold text-white">FRESH MEDICAL SYSTEM</h2>
            <p class="text-white">
                <small>Foreign Workers Regulated for Employment and System for Health Examination</small>
            </p>
            <p>&nbsp;</p>
            <p class="text-white">
                <table class="table">
                    <tbody>
                        <tr class="text-white">
                            <td>
                                <span class="label label-success">F</span> 
                                <span class="label label-default">O</span> 
                                <span class="label label-default">R</span> 
                                <span class="label label-default">E</span> 
                                <span class="label label-default">I</span> 
                                <span class="label label-default">G</span>
								<span class="label label-default">N</span>
							</td>
                        </tr>
                        <tr class="text-white">
                            <td>
                                <span class="label label-default">&nbsp;</span>
                                <span class="label label-default">W</span>
								<span class="label label-default">O</span>
                                <span class="label label-default">R</span>
								<span class="label label-default">K</span>
                                <span class="label label-default">E</span>
								<span class="label label-default">R</span>
                                <span class="label label-default">S</span>
                            </td>
                        </tr>
						<tr class="text-white">
                            <td>
                                <span class="label label-success">R</span> 
                                <span class="label label-default">E</span> 
                                <span class="label label-default">G</span> 
                                <span class="label label-default">U</span> 
                                <span class="label label-default">L</span> 
                                <span class="label label-default">A</span> 
                                <span class="label label-default">T</span> 
                                <span class="label label-default">E</span> 
                                <span class="label label-default">D</span> 
                                <span class="label label-default">&nbsp;</span>
                                <span class="label label-default">F</span>
								<span class="label label-default">O</span>
                                <span class="label label-default">R</span>
                            </td>
                        </tr>
                        <tr class="text-white">
                            <td>
                                <span class="label label-success">E</span> 
                                <span class="label label-default">M</span> 
                                <span class="label label-default">P</span> 
                                <span class="label label-default">L</span> 
                                <span class="label label-default">O</span> 
                                <span class="label label-default">Y</span> 
                                <span class="label label-default">M</span> 
                                <span class="label label-default">E</span> 
                                <span class="label label-default">N</span> 
                                <span class="label label-default">T</span> 
                            </td>
                        </tr>
                        <tr class="text-white">
                            <td>
                                <span class="label label-default">&nbsp;</span>
                                <span class="label label-default">A</span>
								<span class="label label-default">N</span>
                                <span class="label label-default">D</span>
							</td>
                        </tr>
						<tr class="text-white">
                            <td>
                                <span class="label label-success">S</span> 
                                <span class="label label-default">Y</span> 
                                <span class="label label-default">S</span> 
                                <span class="label label-default">T</span> 
                                <span class="label label-default">E</span> 
                                <span class="label label-default">M</span> 
                                <span class="label label-default">&nbsp;</span>
                                <span class="label label-default">F</span>
								<span class="label label-default">O</span>
                                <span class="label label-default">R</span>
                            </td>
                        </tr>
                        <tr class="text-white">
                            <td>
                                <span class="label label-success">H</span> 
                                <span class="label label-default">E</span> 
                                <span class="label label-default">A</span> 
                                <span class="label label-default">L</span> 
                                <span class="label label-default">T</span> 
                                <span class="label label-default">H</span> 
                            </td>
                        </tr>
                        <tr class="text-white">
                            <td>
                                <span class="label label-default">&nbsp;</span> 
                                <span class="label label-default">E</span> 
                                <span class="label label-default">X</span> 
                                <span class="label label-default">A</span> 
                                <span class="label label-default">M</span> 
                                <span class="label label-default">I</span> 
                                <span class="label label-default">N</span>
                                <span class="label label-default">A</span>
                                <span class="label label-default">T</span>
                                <span class="label label-default">I</span>
                                <span class="label label-default">O</span>
                                <span class="label label-default">N</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </p>
        </div>
        <div class="col-md-6">
            <div class="ibox-content">
                <form class="m-t" role="form" name="login_form" action="" method="post">
                    <div class="row">
                        <img src="vendor/sebumi/images/sebumi_dark.png" />
                    </div>
                    <?php if ($model->hasErrors()){ ?>
                        <div class="alert alert-danger sebumi-alert">
                            <strong>
                                <?php 
                                    if($form->error($model,'username') != NULL){
                                        echo $form->error($model,'username');
                                    }
                                    if($form->error($model,'password') != NULL){
                                        echo $form->error($model,'password');
                                    }
                                ?>
                            </strong>
                        </div>
                    <?php } ?>
                    <div class="form-group">
                        <?php 
                            echo $form->textField($model,'username',array(
                                'class' => 'form-control',
                                'placeholder' => 'Username',
                                'autofocus' => true,
                            )); 
                        ?>
                    </div>
                    <?php 
                        echo CHtml::hiddenField('csrf_token',Yii::app()->session['csrf_token'], array(
                            'id' => 'csrf_token'
                        ));
                    ?>
                    <div class="form-group">
                        <?php 
                            echo $form->passwordField($model,'password',array(
                                'class' => 'form-control',
                                'placeholder' => 'Password',
                                'autofocus' => true,
                            )); 
                        ?>
                    </div>
                    <?php 
                        echo CHtml::submitButton('Login',array(
                            'class' => 'btn btn-success block full-width m-b sebumi-login',
                        )); 
                    ?>
                    <a href="#" class="sebumi-password"><small>Forgot password?</small></a>
                    <span class="pull-right">
                        <i class="fa fa-home"></i> <a href="index.php"><small>Home</small></a>
                    </span>
                    <div class="sebumi-password-alert">
                        <div class="alert alert-warning alert-dismissable">
                            Please contact Administrator to change password.
                        </div>
                    </div>    
                </form>
                <p class="m-t">
                    <small>FRESH Medical Login &copy; <?php echo date('Y'); ?></small>
                </p>
            </div>
        </div>
    </div>
</div>    

<?php 
    $this->endWidget();
    Yii::app()->clientScript->registerScriptFile("vendor/sebumi/js/site/login.js", CClientScript::POS_END);