<title>Registration Slip | <?php echo $transaction->code; ?></title>
<style>
    body { font-family: Arial; font-size: 12px; }
    .bguide { border: 1px solid red; }
    .bguide2 { border: 1px solid #d1d8de; }
    .bguide3 { border: 1px solid white; }
    .bguide4 { border: 1px solid blue; }
    .bguide5 { border: 0px solid white; }
    
    .bguide6 { border-right: 2px solid #d1d8de; }
    .bguide7 { border: 1px solid #d1d8de; background-color: #f8f8f8; }
    
    .space-height { height: 1105px; }
    .space-height2 { height: 120px; }
    .space-height3 { height: 560px; }
    .space-height4 { height: 100px; }
    .space-height5 { height: 204px; }
    
    .main-left { width: 350px; float: left; }
    .main-right { width: 415px; float: left; }
    .sub-right1 { width: 260px; float: left; }
    .sub-right2 { width: 150px; float: left; }
    .sub-right3 { width: 411px; float: left; }
    .sub-right4 { width: 411px; float: left; }
    .sub-right5 { width: 205px; float: left; }
    .sub-right6 { width: 210px; float: left; }
    .sub-right7 { width: 200px; float: left; }
    
    .form-img { margin-top: 25px; margin-left: 63px; }
    .form-title { color: #73828e; font-size: 20px; margin-left: 89px; }
    .form-img2 { margin-left: 43px; }
    .form-title2 { color: #73828e; font-size: 14px; margin-top: 15px; margin-left: 33px; }
    .form-title3 { 
        color: #062a37; 
        font-size: 16px; 
        margin-left: 33px; 
        border-bottom: 1px solid #d1d8de; 
        padding-bottom: 5px; 
        padding-right: 10px;
    }
    
    .flight-info { 
        border: 1px solid #000;
        margin-top: 30px; 
        margin-left: 78px;
        margin-right: 79px;
        padding-bottom: 20px;
    }
    
    .form-title4 { color: #73828e; font-size: 14px; margin-top: 20px; margin-left: 15px; }
    .form-title5 { 
        color: #062a37; 
        font-size: 16px; 
        margin-left: 15px;
        margin-right: 15px;
        border-bottom: 1px solid #d1d8de;
        padding-bottom: 5px; 
        padding-right: 10px;
    }
    
    .receipt-number { color: #73828e; font-size: 14px; margin-top: 20px; margin-left: 15px; }
    .receipt-number2 { color: #062a37; font-size: 16px; margin-left: 15px; }
    
    .form-img3 { margin-left: 120px; margin-top: 20px; }
    .form-img4 { margin-top: 12px; }
    .image-applicant { border: 1px solid #d1d8de; padding: 10px; }
    
    .form-payment { margin-top: 20px; margin-left: 33px; width: 364px; border-collapse: collapse; }
    .form-payment th { 
        color: #73828e; 
        font-size: 12px; 
        font-weight: normal; 
        border-bottom: 2px solid #d1d8de;
        padding-bottom: 10px;
    }
    .form-payment td { color: #062a37; font-size: 16px; border-bottom: 1px solid #d1d8de; padding-bottom: 10px; }
    
    .text-center { text-align: center; }
    .text-right { text-align: right; }
    .text-amount { text-align: right; background-color: #f8f8f8; padding-right: 10px; }
    
    .total-title { color: #73828e; font-size: 24px;  }
    .total-title2 { margin-top: 30px; margin-left: 120px; }
    .total-amount { color: #062a37; font-size: 30px; text-align: center; }
    .total-amount2 { margin-top: 27px; }
    
    .qrcode { text-align: center; vertical-align: middle; padding-top: 10px; }
    .barcodecell { margin-top: 12px; padding: 20px; border: 0px dashed black; }
</style>

<body>
    <section>
        <div class="space-height bguide3">
            <!-- Application Detail -->
            <div class="space-height main-left bguide6">
                <div class="form-img">
                    <img src="vendor/imandor/images/imandor_logo3.jpg" height="200" />
                </div>
                <div class="form-title">Registration Slip</div>
                <div class="form-img2">
                    <img src="vendor/imandor/images/imandor_logo2.jpg" />
                </div>
                
                <!-- isi -->
                <div class="space-height3 sub-right4 bguide3">
                    <div class="text-center">
                        <div class="barcodecell">
                            <barcode code="<?php echo Yii::app()->params['qrslip'].'/index.php?r=Site/ScanQR&id='.$transaction->guid; ?>" type="QR" class="barcode" size="2" />
                        </div>
                    </div>
                    <!--
                    <div class="text-center">
                        <img src="<?php echo Yii::app()->params['qrlink']; ?>/php/qr.php?d=<?php echo 'http://localhost/imandorv2/index.php?r=Site/ScanQR&gid='.$transaction->guid; ?>&e=Q&t=J&size=200" class="image-qrcode" />
                    </div>
                    -->
                    <div class="form-img4 text-center">
                        <?php echo Helpers::fileDisplaySlip('uploads/photos/',$transaction->guid,'Transaction'); ?>
                    </div>
                    
                    <div class="flight-info">
                        <div class="form-title4">Flight Number</div>
                        <div class="form-title5 text-right"><?php echo empty($transaction->flight_number) ? '<i>... to be updated</i>' : strtoupper($transaction->flight_number); ?></div>

                        <div class="form-title4">ETA Malaysia</div>
                        <div class="form-title5 text-right"><?php echo empty($transaction->eta_malaysia) ? '<i>... to be updated</i>' : strtoupper($transaction->eta_malaysia); ?></div>

                        <div class="form-title4">Flight Date</div>
                        <div class="form-title5 text-right"><?php echo empty($transaction->flight_date) ? '<i>... to be updated</i>' : date('d M Y', strtotime($transaction->flight_date)); ?></div>
                    </div>
                </div>
            </div>
            <div class="space-height main-right bguide5">
                <!-- Transaction ID -->
                <div class="space-height2 sub-right1 bguide7">
                    <div class="receipt-number">Transaction Number</div>
                    <div class="receipt-number2"><?php echo $transaction->guid; ?></div>
                </div>
                
                <!-- Registered Date -->
                <div class="space-height2 sub-right2 bguide7">
                    <div class="receipt-number">Registered Date</div>
                    <div class="receipt-number2"><?php echo date('d M Y', strtotime($transaction->created_at)); ?></div>
                </div>
                
                <!-- Transaction Code -->
                <div class="space-height2 sub-right1 bguide7">
                    <div class="receipt-number">Transaction ID</div>
                    <div class="receipt-number2"><?php echo $transaction->code; ?></div>
                </div>
                
                <!-- Worker Code -->
                <div class="space-height2 sub-right2 bguide7">
                    <div class="receipt-number">Foreign Worker ID</div>
                    <div class="receipt-number2"><?php echo $transaction->worker->code; ?></div>
                </div>
                
                <!-- Payment Detail -->
                <div class="space-height3 sub-right4 bguide3">
                    <div class="form-title2">Full Name</div>
                    <div class="form-title3"><?php echo strtoupper($transaction->worker->full_name); ?></div>

                    <div class="form-title2">Gender</div>
                    <div class="form-title3"><?php echo $transaction->worker->gender->name; ?></div>

                    <div class="form-title2">Date Of Birth</div>
                    <div class="form-title3"><?php echo date('d M Y', strtotime($transaction->worker->birth_date)); ?></div>

                    <div class="form-title2">Place Of Birth</div>
                    <div class="form-title3"><?php echo strtoupper($transaction->worker->birth_place); ?></div>

                    <div class="form-title2">Nationality</div>
                    <div class="form-title3"><?php echo $transaction->worker->nationality->name; ?></div>
                    
                    <div class="form-title2">National Card ID Number</div>
                    <div class="form-title3"><?php echo strtoupper($transaction->worker->national_card); ?></div>

                    <div class="form-title2">Passport Number</div>
                    <div class="form-title3"><?php echo strtoupper($transaction->passport->number); ?></div>

                    <div class="form-title2">Date Of Issue</div>
                    <div class="form-title3"><?php echo date('d M Y', strtotime($transaction->passport->issue_date)); ?></div>

                    <div class="form-title2">Place Of Issue</div>
                    <div class="form-title3"><?php echo strtoupper($transaction->passport->issue_place); ?></div>

                    <div class="form-title2">Date Of Expiry</div>
                    <div class="form-title3"><?php echo date('d M Y', strtotime($transaction->passport->expiry_date)); ?></div>

                    <div class="form-title2">Registered By</div>
                    <div class="form-title3"><?php echo strtoupper($transaction->createdBy->profile->fullname); ?></div>

                    <div class="form-title2">Agent Code</div>
                    <div class="form-title3"><?php echo $transaction->createdBy->profile->code; ?></div>

                    <div class="form-title2">Company</div>
                    <div class="form-title3"><?php echo strtoupper($transaction->createdBy->profile->company->name); ?></div>
                </div>
            </div>
        </div>
    </section>
</body>