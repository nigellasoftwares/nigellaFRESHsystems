<section class="visitor-section mt-n5 mb-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12 col-md-12">
                <div class="visitor-title">
                    <span style="color: #ff8b00;">
                        <strong>e-Bfbms</strong>
                    </span>
                    <h2>Medical Center</h2>
					<span class="text-warning">The list below is displayed alphabetically by Medical Center's name.</span>
                </div>
            </div>
        </div>

        <div class="row">
        <?php
            $i = 0;
            foreach($medical as $m){
                $i++;
        ?>
            <div class="col-lg-3 col-sm-6 col-md-6">
                <div class="visitor-content-area">
                    <div class="text-right mr-3">
                        <span style="color: #ff8b00; font-size: smaller;"><?php echo $i; ?></span>
                    </div>
                    <div class="img-fluid">
                        <img src="vendor/ebfbms/img/medical/medical_<?php echo $m->id; ?>.jpg" style="border: 1px solid #ccc;">
                    </div>
                    <hr />
                    <h3><?php echo $m->name; ?></h3>
                    <div class="mb-1">
                        <span style="color: #ff8b00; font-size: smaller;">Reg. Code :</span>
                        <span class="text-muted"><?php echo $m->code; ?></span>
                    </div>
                    <hr />
                    <div class="mb-1">
                        <span style="color: #ff8b00; font-size: smaller;">Address :</span>
                        <span class="text-muted"><?php echo $m->address; ?></span>
                    </div>
                    <hr />
                    <div class="mb-1">
                        <span style="color: #ff8b00; font-size: smaller;">Owner :</span>
                        <span class="text-muted"><?php echo $m->owner; ?></span>
                    </div>
                    <div class="mb-1">
                        <span style="color: #ff8b00; font-size: smaller;">Tel. :</span>
                        <span class="text-muted"><?php echo $m->tel; ?></span>
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
</section>