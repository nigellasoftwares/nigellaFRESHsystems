<title>Foreign Worker Slip</title>
<style>
    body { font-family: Arial; font-size: 12px; }
    .bguide { border: 1px solid red; }
    .bguide2 { border: 1px solid white; }
    .bguide3 { border-right: 2px solid #d1d8de; }
    
    .space-height { height: 750px; }
    .space-height2 { height: 420px; }
    .space-height3 { height: 690px; }
    .space-footer { height: 20px; }
    
    .main-left { width: 290px; float: left; }
    .main-right { width: 500px; float: left; }
    
    .sub-right { width: 411px; float: left; }
    
    .form-img { text-align: center; }
    .image-applicant { border: 1px solid #d1d8de; padding: 10px; }
    
    .form-title1 { color: #73828e; font-size: 14px; margin-top: 15px; margin-left: 33px; }
    .form-title2 { 
        color: #062a37; 
        font-size: 16px; 
        margin-left: 33px; 
        border-bottom: 1px solid #d1d8de; 
        padding-bottom: 5px; 
        padding-right: 10px;
    }
    
    .text-right { text-align: right; }
    .footer-logo { float: left; width: 200px; }
    .pageno { float: right; width: 200px; }
</style>

<body>
    <?php 
        foreach($print as $p){ 
            $t = Transaction::model()->findByPk($p);
    ?>
        <section>
            <div class="space-height bguide2">
                <!-- Part 1 -->
                <div class="space-height main-left bguide3">
                    <div class="form-img">
                        <img src="vendor/imandor/images/imandor_logo2.jpg" />
                    </div>
                    
                    <div class="form-img">
                        <img class="image-applicant" src="uploads/photos/<?php echo $t->guid; ?>.jpg" width="180" />
                    </div>
                    
                    <div class="space-height2 sub-right bguide2">
                        <div class="form-title1">Full Name</div>
                        <div class="form-title2"><?php echo strtoupper($t->worker->full_name); ?></div>
                        
                        <div class="form-title1">Gender</div>
                        <div class="form-title2"><?php echo $t->worker->gender->name; ?></div>

                        <div class="form-title1">Date Of Birth</div>
                        <div class="form-title2"><?php echo date('d M Y', strtotime($t->worker->birth_date)); ?></div>

                        <div class="form-title1">Place Of Birth</div>
                        <div class="form-title2"><?php echo strtoupper($t->worker->birth_place); ?></div>

                        <div class="form-title1">Nationality</div>
                        <div class="form-title2"><?php echo $t->worker->nationality->name; ?></div>

                        <div class="form-title1">National Card ID Number</div>
                        <div class="form-title2"><?php echo strtoupper($t->worker->national_card); ?></div>
                    </div>
                </div>
                
                <!-- Part 2 -->
                <div class="space-height main-left bguide3">
                    <div class="form-img">
                        <img src="vendor/imandor/images/multimax_logo.jpg" height="41" />
                    </div>
                    
                    <div class="space-height3 sub-right bguide2">
                        <div class="form-title1">Passport Number</div>
                        <div class="form-title2"><?php echo strtoupper($t->passport->number); ?></div>

                        <div class="form-title1">Date Of Issue</div>
                        <div class="form-title2"><?php echo date('d M Y', strtotime($t->passport->issue_date)); ?></div>

                        <div class="form-title1">Place Of Issue</div>
                        <div class="form-title2"><?php echo strtoupper($t->passport->issue_place); ?></div>

                        <div class="form-title1">Date Of Expiry</div>
                        <div class="form-title2"><?php echo date('d M Y', strtotime($t->passport->expiry_date)); ?></div>
                        
                        <div class="form-title1">Job Sector</div>
                        <div class="form-title2"><?php echo strtoupper($t->worker->jobsector->name); ?></div>
                        
                        <div class="form-title1">Marital Status</div>
                        <div class="form-title2"><?php echo strtoupper($t->worker->marital->name); ?></div>
                        
                        <div class="form-title1">Bangladesh Mobile Number</div>
                        <div class="form-title2"><?php echo strtoupper($t->worker->home_mobile); ?></div>
                        
                        <div class="form-title1">Registered Date</div>
                        <div class="form-title2"><?php echo date('d M Y', strtotime($t->created_at)); ?></div>
                        
                        <div class="form-title1">Registered By</div>
                        <div class="form-title2"><?php echo strtoupper($t->createdBy->profile->fullname); ?></div>

                        <div class="form-title1">Company</div>
                        <div class="form-title2"><?php echo strtoupper($t->createdBy->profile->company->name); ?></div>
                    </div>
                </div>
                
                <!-- Part 3 -->
                <div class="space-height main-right">
                    <div class="form-img">
                        <img class="image-applicant" src="uploads/passports/<?php echo $t->guid; ?>.jpg" width="450" />
                    </div>
                </div>
            </div>
        </section>
        <?php 
            if($p != end($print)) { 
        ?>
        <pagebreak />
        <?php } ?>
    <?php } ?>
</body>