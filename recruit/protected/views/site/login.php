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

<div class="card-body">
    <div class="row m-b-20">
        <div class="col-md-12 text-center">
            <img src="vendor/imandor/images/imandor_logo.png" />
        </div>
        <div class="col-sm-12 text-center text-info">
        Foreign workers Regulated for Employment<br />and System for Health examination
        </div>
    </div>
    <div class="col-md-12 text-center"><hr /></div>
    <form class="form-horizontal form-material" name="login_form" action="" method="post">
        <h3 class="box-title m-b-20">Sign In</h3>
        <?php if ($model->hasErrors()){ ?>
            <div class="alert alert-danger obyu-alert">
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
            <div class="col-xs-12">
                <?php 
                    echo $form->textField($model,'username',array(
                        'class' => 'form-control',
                        'placeholder' => 'Username',
                        'autofocus' => true,
                    )); 
                ?> 
            </div>
        </div>
        <?php 
            echo CHtml::hiddenField('csrf_token',Yii::app()->session['csrf_token'], array(
                'id' => 'csrf_token'
            ));
        ?>
        <div class="form-group">
            <div class="col-xs-12">
                <?php 
                    echo $form->passwordField($model,'password',array(
                        'class' => 'form-control',
                        'placeholder' => 'Password',
                        'autofocus' => true,
                    )); 
                ?>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-12">
                <div class="custom-control custom-checkbox">
                    <a href="index.php" class="text-dark"><i class="fa fa-home m-r-5"></i> Home</a>
                    <a href="#" class="text-dark pull-right vft-password"><i class="fa fa-lock m-r-5 vft-password"></i> Forgot password?</a> 
                </div>
                <div class="vft-password-alert">
                    <div class="alert alert-warning alert-dismissable">
                        Please contact Administrator to change password.
                    </div>
                </div>
            </div>
        </div>
        <?php 
            echo CHtml::submitButton('Login',array(
                'class' => 'btn btn-block btn-lg btn-info btn-rounded vft-login',
            )); 
        ?>
        <div class="row">&nbsp;</div>
        <div class="form-group m-b-0">
            <div class="col-sm-12 text-center">
                Copyright © <?php echo date('Y'); ?>. All Rights Reserved.<br />FRESH Recruitment Login v1.0.
            </div>
        </div>
    </form>
</div>
<?php 
    $this->endWidget();
    Yii::app()->clientScript->registerScriptFile("vendor/imandor/js/site/login.js", CClientScript::POS_END);