<section class="visitor-section mt-n5 mb-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12 col-md-12">
                <div class="visitor-title">
                    <span style="color: #ff8b00;">
                        <strong>e-Bfbms</strong>
                    </span>
                    <h2>Recruiting Agency</h2>
                    <span class="text-warning">The list below is displayed alphabetically by Recruiting Agency's name.</span>
                </div>
            </div>
        </div>
        
        <div class="row">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="bra-tab" data-toggle="tab" href="#bra" role="tab" aria-controls="bra" aria-selected="true">
                        <h4>Bangladesh Recruiting Agency</h4>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="mra-tab" data-toggle="tab" href="#mra" role="tab" aria-controls="mra" aria-selected="false">
                        <h4>Malaysia Recruiting Agency</h4>
                    </a>
                </li>
            </ul>
            <div class="tab-content mt-lg-5" id="myTabContent">
                <div class="tab-pane fade show active" id="bra" role="tabpanel" aria-labelledby="bra-tab">
                    
                    <!-- Bangladesh Recruiting Agency -->
                    <div class="row">
                    <?php
                        $i = 0;
                        foreach($agency as $a){
                            $i++;
                    ?>
                        <div class="col-lg-3 col-sm-6 col-md-6">
                            <div class="visitor-content-area">
                                <div class="text-right mr-3">
                                    <span style="color: #ff8b00; font-size: smaller;"><?php echo $i; ?></span>
                                </div>
                                <div class="img-fluid">
                                    <img src="vendor/ebfbms/img/agency/agency_<?php echo $a->id; ?>.jpg" style="border: 1px solid #ccc;">
                                </div>
                                <hr />
                                <h3><?php echo $a->name; ?></h3>
                                <div class="mb-1">
                                    <span style="color: #ff8b00; font-size: smaller;">RL No. :</span>
                                    <span class="text-muted"><?php echo $a->rlno; ?></span>
                                </div>
                                <hr />
                                <div class="mb-1">
                                    <span style="color: #ff8b00; font-size: smaller;">Address :</span>
                                    <span class="text-muted"><?php echo $a->address; ?></span>
                                </div>
                                <div class="mb-1">
                                    <span style="color: #ff8b00; font-size: smaller;">Tel. :</span>
                                    <span class="text-muted"><?php echo $a->tel; ?></span>
                                </div>
                                <hr />
                                <div class="mb-1">
                                    <span style="color: #ff8b00; font-size: smaller;">Owner :</span>
                                    <span class="text-muted"><?php echo $a->owner; ?></span>
                                </div>
                                <div class="mb-1">
                                    <span style="color: #ff8b00; font-size: smaller;">Position :</span>
                                    <span class="text-muted"><?php echo $a->position; ?></span>
                                </div>
                                <div class="mb-1">
                                    <span style="color: #ff8b00; font-size: smaller;">Mobile :</span>
                                    <span class="text-muted"><?php echo $a->mobile; ?></span>
                                </div>
                                <div class="visitor-shape">
                                    <img src="vendor/exto/img/seo/shape-2.png" alt="image">
                                </div>
                            </div>
                        </div>
                    <?php
                        }
                    ?>    
                    </div>
                    
                </div>
                <div class="tab-pane fade" id="mra" role="tabpanel" aria-labelledby="mra-tab">
                    
                    <!-- Malaysia Recruiting Agency -->
                    <div class="row">
                    <?php
                        $i = 0;
                        foreach($local as $a){
                            $i++;
                    ?>
                        <div class="col-lg-3 col-sm-6 col-md-6">
                            <div class="visitor-content-area">
                                <div class="text-right mr-3">
                                    <span style="color: #ff8b00; font-size: smaller;"><?php echo $i; ?></span>
                                </div>
                                <!--
                                <div class="img-fluid">
                                    <img src="vendor/ebfbms/img/agency/agency_<?php //echo $a->id; ?>.jpg" style="border: 1px solid #ccc;">
                                </div>
                                -->
                                <hr />
                                <h3><?php echo $a->name; ?></h3>
                                <div class="mb-1">
                                    <span style="color: #ff8b00; font-size: smaller;">ROC No. :</span>
                                    <span class="text-muted"><?php echo $a->rocno; ?></span>
                                </div>
                                <div class="mb-1">
                                    <span style="color: #ff8b00; font-size: smaller;">JTK No. :</span>
                                    <span class="text-muted"><?php echo $a->jtkno; ?></span>
                                </div>
                                <hr />
                                <div class="mb-1">
                                    <span style="color: #ff8b00; font-size: smaller;">Address :</span>
                                    <span class="text-muted"><?php echo $a->address; ?></span>
                                </div>
                                <hr />
                                <div class="mb-1">
                                    <span style="color: #ff8b00; font-size: smaller;">Owner :</span>
                                    <span class="text-muted"><?php echo $a->owner; ?></span>
                                </div>
                                <div class="mb-1">
                                    <span style="color: #ff8b00; font-size: smaller;">Position :</span>
                                    <span class="text-muted"><?php echo $a->position; ?></span>
                                </div>
                                <div class="mb-1">
                                    <span style="color: #ff8b00; font-size: smaller;">Mobile :</span>
                                    <span class="text-muted"><?php echo $a->mobile; ?></span>
                                </div>
                                <div class="visitor-shape">
                                    <img src="vendor/exto/img/seo/shape-2.png" alt="image">
                                </div>
                            </div>
                        </div>
                    <?php
                        }
                    ?>    
                    </div>
                    
                </div>
            </div>
        </div>    
        
        
    </div>
</section>