<h1>404</h1>
<h3 class="font-bold">Page Not Found</h3>

<div class="error-desc">
    Sorry, but the page you are looking for has not been found. Try checking the URL for error, then hit the refresh button on your browser or click the button below.
    <br /><?php echo CHtml::encode($message); ?>
    <br /><br /><a href="index.php?r=Site/Logout" class="btn btn-primary">Exit</a>
</div>

<!--
<div class="row">&nbsp;</div>
<div class="row">
    <div class="col-md-12">
        <div style="text-align: center;">
            <div class="alert alert-danger">
                <h3 class="text-danger"><i class="fa fa-exclamation-triangle"></i> Error</h3>
                <?php echo CHtml::encode($message); ?>
            </div>
        </div>    
    </div>
</div>
-->