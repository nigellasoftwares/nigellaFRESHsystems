<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Medical Examination</h2>
    </div>
</div>

<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Worker Barcode</h5>
                </div>
                <div class="ibox-content">
                    <form id="form-barcode-search">
                        <div class="message-form"></div>
                        <div class="row">
                            <div class="col-md-12">
                                <span class="label label-primary2">Barcode</span>
                            </div>
                            <div class="hr-line-solid"></div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><strong>Worker Barcode</strong></label>
                                    <!--
                                    <br />
                                    <small>
                                        Example 1 : 9FF19E9C-EB49-3072-D207-353D42F578A2<br />
                                        Example 2 : DD99304C-39A5-E14D-C69E-8450C001AD85
                                    </small>
                                    -->
                                    <br /><br />
                                    <input type="text" name="barcode" class="form-control" placeholder="Barcode" required="true" />
                                </div>
                            </div>
                        </div>
                        
                        <div class="text-right">
                            <a id="search-barcode" class="btn btn-primary">Search</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    Yii::app()->clientScript->registerScriptFile("vendor/assets/smoke/js/smoke.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/assets/webcam/webcam.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/sebumi/js/plugins/webcam/webcam.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/sebumi/js/doctor/list/list_barcode.js", CClientScript::POS_END);    