<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Photo</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><?php echo Helpers::describeRole($user->role_id); ?></li>
                    <li class="breadcrumb-item"><?php echo $user->role->id == 3 ? 'Application' : 'Foreign Worker'; ?></li>
                    <li class="breadcrumb-item active">Photo</li>
                </ol>
            </div>
        </div>
    </div>
    
    <div class="card">
        <div class="card-body">
            <div class="pull-right">
                <a href="index.php?r=Admin/Passport&id=<?php echo $transaction->id; ?>" class="btn btn-info d-none d-lg-block m-l-15 text-white">
                    <i class="fa fa-book"></i> Passport
                </a>
            </div>    
            <div class="pull-right">
                <a href="<?php echo $link; ?>" class="btn btn-info d-none d-lg-block m-l-15 text-white">
                    <i class="fa fa-arrow-circle-o-left"></i> Back To Foreign Workers
                </a>
            </div>
        <?php if($user->role->id != 3 && $_GET['pid'] == 1){ ?>    
            <div class="pull-right">
                <a href="<?php echo $link2; ?>&id=<?php echo $transaction->createdBy->profile->id; ?>" class="btn btn-info d-none d-lg-block m-l-15 text-white">
                    <i class="fa fa-arrow-circle-o-left"></i> Back To Agent
                </a>
            </div>
        <?php } ?>    
            
            <h4 class="card-title"><span class="label label-primary"><?php echo $user->profile->company->name; ?></span></h4>
            <h4 class="card-title">Foreign Worker Photo Information</h4>
        </div>
    </div>
    
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-2" style="border-right: 1px solid #e5e5e5;">
                    <small class="text-muted">Transaction ID</small>
                    <h6 class="text-black font-bold"><?php echo $transaction->code; ?></h6>
                    <small class="text-muted">Foreign Worker ID</small>
                    <h6 class="text-black font-bold"><?php echo $transaction->worker->code; ?></h6> 
                </div>
                <div class="col-md-4" style="border-right: 1px solid #e5e5e5;">
                    <center>
                        <h4 class="card-title m-t-10"><?php echo $transaction->worker->full_name; ?></h4>
                        <h6 class="card-subtitle"><?php echo $transaction->passport->number; ?></h6>
                        <h6 class="card-subtitle"><?php echo $transaction->worker->nationality->name; ?></h6>
                    </center>
                </div>
                <div class="col-md-2" style="border-right: 1px solid #e5e5e5;">
                    <small class="text-muted p-t-30 db">Phone</small>
                    <h6 class="text-black font-bold"><?php echo $transaction->worker->home_mobile; ?></h6>
                </div>
                <div class="col-md-4">
                    <small class="text-muted p-t-30 db">Address</small>
                    <h6 class="text-black font-bold"><?php echo $transaction->worker->home_address; ?></h6>
                    <small class="text-muted p-t-30 db">Zip Code</small>
                    <h6 class="text-black font-bold"><?php echo $transaction->worker->home_zipcode; ?></h6>
                </div>
            </div>
        </div>
    </div>    
    
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-9 p-20">
                    <div class="img-container"><img id="image" src="uploads/photos/<?php echo $transaction->guid; ?>.jpg" class="img-responsive" alt="Photo"></div>
                </div>
                
                <div class="col-md-3 p-20">
                    <div class="docs-preview clearfix">
                        <div class="img-preview preview-lg"></div>
                        <div class="img-preview preview-md"></div>
                        <div class="img-preview preview-sm"></div>
                        <div class="img-preview preview-xs"></div>
                    </div>
                    <div class="docs-data">
                        <div class="input-group input-group-sm">
                            <label class="input-group-addon" for="dataX">X</label>
                            <input type="text" class="form-control" id="dataX" placeholder="x">
                            <span class="input-group-addon">px</span> </div>
                        <div class="input-group input-group-sm">
                            <label class="input-group-addon" for="dataY">Y</label>
                            <input type="text" class="form-control" id="dataY" placeholder="y">
                            <span class="input-group-addon">px</span> </div>
                        <div class="input-group input-group-sm">
                            <label class="input-group-addon" for="dataWidth">Width</label>
                            <input type="text" class="form-control" id="dataWidth" placeholder="width">
                            <span class="input-group-addon">px</span> </div>
                        <div class="input-group input-group-sm">
                            <label class="input-group-addon" for="dataHeight">Height</label>
                            <input type="text" class="form-control" id="dataHeight" placeholder="height">
                            <span class="input-group-addon">px</span> </div>
                        <div class="input-group input-group-sm">
                            <label class="input-group-addon" for="dataRotate">Rotate</label>
                            <input type="text" class="form-control" id="dataRotate" placeholder="rotate">
                            <span class="input-group-addon">deg</span> </div>
                        <div class="input-group input-group-sm">
                            <label class="input-group-addon" for="dataScaleX">ScaleX</label>
                            <input type="text" class="form-control" id="dataScaleX" placeholder="scaleX">
                        </div>
                        <div class="input-group input-group-sm">
                            <label class="input-group-addon" for="dataScaleY">ScaleY</label>
                            <input type="text" class="form-control" id="dataScaleY" placeholder="scaleY">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-9 docs-buttons">
                    <div class="btn-group">
                        <button type="button" class="btn btn-info" data-method="setDragMode" data-option="move" title="Move"> <span class="docs-tooltip" data-toggle="tooltip" title="Move Picture"> <span class="fa fa-arrows"></span> </span>
                        </button>
                        <button type="button" class="btn btn-info" data-method="setDragMode" data-option="crop" title="Crop"> <span class="docs-tooltip" data-toggle="tooltip" title="Stop Picture"> <span class="fa fa-crop"></span> </span>
                        </button>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-success" data-method="zoom" data-option="0.1" title="Zoom In"> <span class="docs-tooltip" data-toggle="tooltip" title="Zoom In"> <span class="fa fa-search-plus"></span> </span>
                        </button>
                        <button type="button" class="btn btn-success" data-method="zoom" data-option="-0.1" title="Zoom Out"> <span class="docs-tooltip" data-toggle="tooltip" title="Zoom Out"> <span class="fa fa-search-minus"></span> </span>
                        </button>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-secondary btn-outline" data-method="move" data-option="-10" data-second-option="0" title="Move Left"> <span class="docs-tooltip" data-toggle="tooltip" title="Move Left"> <span class="fa fa-arrow-left"></span> </span>
                        </button>
                        <button type="button" class="btn btn-secondary btn-outline" data-method="move" data-option="10" data-second-option="0" title="Move Right"> <span class="docs-tooltip" data-toggle="tooltip" title="Move Right"> <span class="fa fa-arrow-right"></span> </span>
                        </button>
                        <button type="button" class="btn btn-secondary btn-outline" data-method="move" data-option="0" data-second-option="-10" title="Move Up"> <span class="docs-tooltip" data-toggle="tooltip" title="Move Up"> <span class="fa fa-arrow-up"></span> </span>
                        </button>
                        <button type="button" class="btn btn-secondary btn-outline" data-method="move" data-option="0" data-second-option="10" title="Move Down"> <span class="docs-tooltip" data-toggle="tooltip" title="Move Down"> <span class="fa fa-arrow-down"></span> </span>
                        </button>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-secondary btn-outline" data-method="rotate" data-option="-45" title="Rotate Left"> <span class="docs-tooltip" data-toggle="tooltip" title="Rotate Left"> <span class="fa fa-rotate-left"></span> </span>
                        </button>
                        <button type="button" class="btn btn-secondary btn-outline" data-method="rotate" data-option="45" title="Rotate Right"> <span class="docs-tooltip" data-toggle="tooltip" title="Rotate Right"> <span class="fa fa-rotate-right"></span> </span>
                        </button>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-secondary btn-outline" data-method="scaleX" data-option="-1" title="Flip Horizontal"> <span class="docs-tooltip" data-toggle="tooltip" title="Flip Horizontal"> <span class="fa fa-arrows-h"></span> </span>
                        </button>
                        <button type="button" class="btn btn-secondary btn-outline" data-method="scaleY" data-option="-1" title="Flip Vertical"> <span class="docs-tooltip" data-toggle="tooltip" title="Flip Vertical"> <span class="fa fa-arrows-v"></span> </span>
                        </button>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-secondary btn-outline" data-method="crop" title="Crop"> <span class="docs-tooltip" data-toggle="tooltip" title="Crop"> <span class="fa fa-check"></span> </span>
                        </button>
                        <button type="button" class="btn btn-secondary btn-outline" data-method="clear" title="Clear"> <span class="docs-tooltip" data-toggle="tooltip" title="Clear"> <span class="fa fa-remove"></span> </span>
                        </button>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-secondary btn-outline" data-method="disable" title="Disable"> <span class="docs-tooltip" data-toggle="tooltip" title="Disable"> <span class="fa fa-lock"></span> </span>
                        </button>
                        <button type="button" class="btn btn-secondary btn-outline" data-method="enable" title="Enable"> <span class="docs-tooltip" data-toggle="tooltip" title="Enable"> <span class="fa fa-unlock"></span> </span>
                        </button>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-secondary btn-outline" data-method="reset" title="Reset"> <span class="docs-tooltip" data-toggle="tooltip" title="Reset"> <span class="fa fa-refresh"></span> </span>
                        </button>
                        <!--
                        <label class="btn btn-secondary btn-outline btn-upload" for="inputImage" title="Upload image file">
                            <input type="file" class="sr-only" id="inputImage" name="file" accept="image/*">
                            <span class="docs-tooltip" data-toggle="tooltip" title="Import image with Blob URLs"> <span class="fa fa-upload"></span> </span>
                        </label>
                        <button type="button" class="btn btn-secondary btn-outline" data-method="destroy" title="Destroy"> <span class="docs-tooltip" data-toggle="tooltip" title="Destroy"> <span class="fa fa-power-off"></span> </span>
                        </button>
                        -->
                    </div>
                    <div class="btn-group btn-group-crop">
                        <button type="button" class="btn btn-danger" data-method="getCroppedCanvas"> <span class="docs-tooltip" data-toggle="tooltip" title="Crop Image"> Crop Image </span> </button>
                        <button type="button" class="btn btn-danger" data-method="getCroppedCanvas" data-option="{ &quot;width&quot;: 160, &quot;height&quot;: 90 }"> <span class="docs-tooltip" data-toggle="tooltip" title="Crop Image 160x90"> 160&times;90 </span> </button>
                        <button type="button" class="btn btn-danger" data-method="getCroppedCanvas" data-option="{ &quot;width&quot;: 320, &quot;height&quot;: 180 }"> <span class="docs-tooltip" data-toggle="tooltip" title="Crop Image 320x180"> 320&times;180 </span> </button>
                    </div>
                    
                    <!--
                    <button type="button" class="btn btn-secondary btn-outline" data-method="getData" data-option data-target="#putData"> <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;getData&quot;)"> Get Data </span> </button>
                    <button type="button" class="btn btn-secondary btn-outline" data-method="setData" data-target="#putData"> <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;setData&quot;, data)"> Set Data </span> </button>
                    <button type="button" class="btn btn-secondary btn-outline" data-method="getContainerData" data-option data-target="#putData"> <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;getContainerData&quot;)"> Get Container Data </span> </button>
                    <button type="button" class="btn btn-secondary btn-outline" data-method="getImageData" data-option data-target="#putData"> <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;getImageData&quot;)"> Get Image Data </span> </button>
                    -->
                    
                    <!--
                    <button type="button" class="btn btn-secondary btn-outline" data-method="getCanvasData" data-option data-target="#putData"> <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;getCanvasData&quot;)"> Get Canvas Data </span> </button>
                    <button type="button" class="btn btn-secondary btn-outline" data-method="setCanvasData" data-target="#putData"> <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;setCanvasData&quot;, data)"> Set Canvas Data </span> </button>
                    -->
                    
                    <!--
                    <button type="button" class="btn btn-secondary btn-outline" data-method="getCropBoxData" data-option data-target="#putData"> <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;getCropBoxData&quot;)"> Get Crop Box Data </span> </button>
                    <button type="button" class="btn btn-secondary btn-outline" data-method="setCropBoxData" data-target="#putData"> <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;setCropBoxData&quot;, data)"> Set Crop Box Data </span> </button>
                    -->
                    
                    <!--
                    <button type="button" class="btn btn-secondary btn-outline" data-method="moveTo" data-option="0"> <span class="docs-tooltip" data-toggle="tooltip" title="cropper.moveTo(0)"> 0,0 </span> </button>
                    -->
                    <button type="button" class="btn btn-secondary btn-outline" data-method="zoomTo" data-option="1"> <span class="docs-tooltip" data-toggle="tooltip" title="cropper.zoomTo(1)"> 100% </span> </button>
                    <!--
                    <button type="button" class="btn btn-secondary btn-outline" data-method="rotateTo" data-option="180"> <span class="docs-tooltip" data-toggle="tooltip" title="cropper.rotateTo(180)"> 180° </span> </button>
                    -->
                    <!--
                    <input type="text" class="form-control" id="putData" placeholder="Get data to here or set data with this value">
                    -->
                </div>
                
                <div class="col-md-3 docs-toggles">
                    <div class="btn-group btn-group-justified" data-toggle="buttons">
                        <label class="btn btn-secondary btn-outline active">
                            <input type="radio" class="sr-only" id="aspectRatio0" name="aspectRatio" value="1.7777777777777777">
                            <span class="docs-tooltip" data-toggle="tooltip" title="aspectRatio: 16 / 9"> 16:9 </span> </label>
                        <label class="btn btn-secondary btn-outline">
                            <input type="radio" class="sr-only" id="aspectRatio1" name="aspectRatio" value="1.3333333333333333">
                            <span class="docs-tooltip" data-toggle="tooltip" title="aspectRatio: 4 / 3"> 4:3 </span> </label>
                        <label class="btn btn-secondary btn-outline">
                            <input type="radio" class="sr-only" id="aspectRatio2" name="aspectRatio" value="1">
                            <span class="docs-tooltip" data-toggle="tooltip" title="aspectRatio: 1 / 1"> 1:1 </span> </label>
                        <label class="btn btn-secondary btn-outline">
                            <input type="radio" class="sr-only" id="aspectRatio3" name="aspectRatio" value="0.6666666666666666">
                            <span class="docs-tooltip" data-toggle="tooltip" title="aspectRatio: 2 / 3"> 2:3 </span> </label>
                        <label class="btn btn-secondary btn-outline">
                            <input type="radio" class="sr-only" id="aspectRatio4" name="aspectRatio" value="NaN">
                            <span class="docs-tooltip" data-toggle="tooltip" title="aspectRatio: NaN"> Free </span> </label>
                    </div>
                    
                    <!--
                    <div class="btn-group btn-group-justified" data-toggle="buttons">
                        <label class="btn btn-secondary btn-outline active">
                            <input type="radio" class="sr-only" id="viewMode0" name="viewMode" value="0" checked>
                            <span class="docs-tooltip" data-toggle="tooltip" title="View Mode 0"> VM0 </span> </label>
                        <label class="btn btn-secondary btn-outline">
                            <input type="radio" info="sr-only" id="viewMode1" name="viewMode" value="1">
                            <span class="docs-tooltip" data-toggle="tooltip" title="View Mode 1"> VM1 </span> </label>
                        <label class="btn btn-secondary btn-outline">
                            <input type="radio" class="sr-only" id="viewMode2" name="viewMode" value="2">
                            <span class="docs-tooltip" data-toggle="tooltip" title="View Mode 2"> VM2 </span> </label>
                        <label class="btn btn-secondary  btn-outline">
                            <input type="radio" class="sr-only" id="viewMode3" name="viewMode" value="3">
                            <span class="docs-tooltip" data-toggle="tooltip" title="View Mode 3"> VM3 </span> </label>
                    </div>
                    
                    <div class="dropdown dropup docs-options">
                        <button type="button" class="btn btn-success btn-block dropdown-toggle" id="toggleOptions" data-toggle="dropdown" aria-expanded="true"> Toggle Options <span class="caret"></span> </button>
                        <ul class="dropdown-menu" aria-labelledby="toggleOptions" role="menu">
                            <li role="presentation">
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="responsive" checked> responsive </label>
                            </li>
                            <li role="presentation">
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="restore" checked> restore </label>
                            </li>
                            <li role="presentation">
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="checkCrossOrigin" checked> checkCrossOrigin </label>
                            </li>
                            <li role="presentation">
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="checkOrientation" checked> checkOrientation </label>
                            </li>
                            <li role="presentation">
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="modal" checked> modal </label>
                            </li>
                            <li role="presentation">
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="guides" checked> guides </label>
                            </li>
                            <li role="presentation">
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="center" checked> center </label>
                            </li>
                            <li role="presentation">
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="highlight" checked> highlight </label>
                            </li>
                            <li role="presentation">
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="background" checked> background </label>
                            </li>
                            <li role="presentation">
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="autoCrop" checked> autoCrop </label>
                            </li>
                            <li role="presentation">
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="movable" checked> movable </label>
                            </li>
                            <li role="presentation">
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="rotatable" checked> rotatable </label>
                            </li>
                            <li role="presentation">
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="scalable" checked> scalable </label>
                            </li>
                            <li role="presentation">
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="zoomable" checked> zoomable </label>
                            </li>
                            <li role="presentation">
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="zoomOnTouch" checked> zoomOnTouch </label>
                            </li>
                            <li role="presentation">
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="zoomOnWheel" checked> zoomOnWheel </label>
                            </li>
                            <li role="presentation">
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="cropBoxMovable" checked> cropBoxMovable </label>
                            </li>
                            <li role="presentation">
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="cropBoxResizable" checked> cropBoxResizable </label>
                            </li>
                            <li role="presentation">
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="toggleDragModeOnDblclick" checked> toggleDragModeOnDblclick </label>
                            </li>
                        </ul>
                    </div>
                    -->
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal docs-cropped" id="getCroppedCanvasModal" aria-hidden="true" aria-labelledby="getCroppedCanvasTitle" role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="getCroppedCanvasTitle">Cropped</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <!--
                <a class="btn btn-primary" id="download" href="javascript:void(0);" download="cropped.jpg">Download</a>
                -->
                <a class="btn btn-primary save-cropped-image" id="download" data-image="" data-id="<?php echo $transaction->id; ?>" data-doc="<?php echo $document; ?>">Save Image</a>
            </div>
        </div>
    </div>
</div>

<?php
    Yii::app()->clientScript->registerScriptFile("vendor/elite/assets/node_modules/toast-master/js/jquery.toast.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/elite/assets/node_modules/cropper/cropper.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/imandor/js/worker/cropped.js", CClientScript::POS_END);