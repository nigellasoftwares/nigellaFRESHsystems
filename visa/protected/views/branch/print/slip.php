<title>Registration Slip | <?php echo $applicant->guid; ?></title>
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
    
    .receipt-number { color: #73828e; font-size: 14px; margin-top: 20px; margin-left: 15px; }
    .receipt-number2 { color: #062a37; font-size: 16px; margin-left: 15px; }
    
    .form-img3 { margin-left: 120px; margin-top: 20px; }
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
    .text-amount { text-align: right; background-color: #f8f8f8; padding-right: 10px; }
    
    .total-title { color: #73828e; font-size: 24px;  }
    .total-title2 { margin-top: 30px; margin-left: 120px; }
    .total-amount { color: #062a37; font-size: 30px; text-align: center; }
    .total-amount2 { margin-top: 27px; }
    
    .qrcode { text-align: center; vertical-align: middle; padding-top: 10px; }
    .barcodecell { margin-top: 12px; padding: 20px; border: 1px dashed black; }
</style>

<body>
    <section>
        <div class="space-height bguide3">
            <!-- Application Detail -->
            <div class="space-height main-left bguide6">
                <div class="form-img">
                    <img src="vendor/visafasttrack/images/visafasttrack_logo.jpg" height="200" />
                </div>
                <div class="form-title">Registration Slip</div>
                <div class="form-img2">
                    <img src="vendor/visafasttrack/images/visafasttrack_logo2.jpg" />
                </div>
                
                <div class="form-title2">Full Name</div>
                <div class="form-title3"><?php echo strtoupper($applicant->full_name); ?></div>
                
                <div class="form-title2">Gender</div>
                <div class="form-title3"><?php echo $applicant->gender->name; ?></div>
                
                <div class="form-title2">Date Of Birth</div>
                <div class="form-title3"><?php echo date('d M Y', strtotime($applicant->birth_date)); ?></div>
                
                <div class="form-title2">Place Of Birth</div>
                <div class="form-title3"><?php echo strtoupper($applicant->birth_place); ?></div>
                
                <div class="form-title2">Nationality</div>
                <div class="form-title3"><?php echo $applicant->currentNationality->name; ?></div>
                
                <div class="form-title2">Passport Number</div>
                <div class="form-title3"><?php echo strtoupper($applicant->passport_number); ?></div>
                
                <div class="form-title2">Passport Type</div>
                <div class="form-title3"><?php echo $applicant->passport->name; ?></div>
                
                <div class="form-title2">Date Of Issue</div>
                <div class="form-title3"><?php echo date('d M Y', strtotime($applicant->passport_issue_date)); ?></div>
                
                <div class="form-title2">Place Of Issue</div>
                <div class="form-title3"><?php echo strtoupper($applicant->passport_issue_place); ?></div>
                
                <div class="form-title2">Date Of Expiry</div>
                <div class="form-title3"><?php echo date('d M Y', strtotime($applicant->passport_expiry_date)); ?></div>
                
                <div class="form-title2">Registered By</div>
                <div class="form-title3"><?php echo strtoupper($applicant->createdBy->profile->name); ?></div>
                
                <div class="form-title2">Admin</div>
                <div class="form-title3"><?php echo strtoupper($applicant->createdBy->admin->user->profile->name); ?></div>
                
                <div class="form-title2">Registered Date</div>
                <div class="form-title3"><?php echo date('d M Y', strtotime($applicant->created_at)); ?></div>
                
            </div>
            <div class="space-height main-right bguide5">
                <!-- Receipt Number -->
                <div class="space-height2 sub-right1 bguide7">
                    <div class="receipt-number">Receipt Number</div>
                    <div class="receipt-number2"><?php echo $applicant->guid; ?></div>
                </div>
                
                <!-- Receipt Date -->
                <div class="space-height2 sub-right2 bguide7">
                    <div class="receipt-number">Receipt Date</div>
                    <div class="receipt-number2"><?php echo date('d M Y', strtotime($applicant->created_at)); ?></div>
                </div>
                
                <!-- Batch Number -->
                <div class="space-height2 sub-right1 bguide7">
                    <div class="receipt-number">Batch Number</div>
                    <div class="receipt-number2"><?php echo $applicant->batch->batch_guid; ?></div>
                </div>
                
                <!-- Visa Type -->
                <div class="space-height2 sub-right2 bguide7">
                    <div class="receipt-number">Visa Type</div>
                    <div class="receipt-number2"><?php echo $applicant->visa->name; ?></div>
                </div>
                
                <!-- Payment Detail -->
                <div class="space-height3 sub-right4 bguide3">
                    <div class="form-img3">
                        <?php echo Helpers::fileDisplay('uploads/photos/',$applicant->guid,'Applicant'); ?>
                    </div>
                    <div class="form-table">
                        <table class="form-payment">
                            <thead>
                                <tr>
                                    <th width="10%" height="20">No</th>
                                    <th height="20">Item</th>
                                    <th width="30%" height="20">Price | BDT</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td height="50" class="text-center">1</td>
                                    <td height="50">VLN Fee</td>
                                    <td height="50" class="text-amount"><?php echo number_format($applicant->payment->vln_fee); ?></td>
                                </tr>
                                <tr>
                                    <td height="50" class="text-center">2</td>
                                    <td height="50">One Stop Centre (OSC) Fee</td>
                                    <td height="50" class="text-amount"><?php echo number_format($applicant->payment->osc_fee); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <!-- Total -->
                <div class="space-height4 sub-right6 bguide7 total-title">
                    <div class="total-title2">Total</div>
                </div>
                
                <!-- Total Amount -->
                <div class="space-height4 sub-right7 bguide7 total-amount">
                    <?php
                        $total_amount = $applicant->payment->vln_fee + $applicant->payment->osc_fee;
                    ?>
                    <div class="total-amount2">BDT <?php echo number_format($total_amount); ?></div>
                </div>
                
                <!-- QR Code Left -->
                <div class="space-height5 sub-right5 bguide3 qrcode">
                    <img src="vendor/visafasttrack/images/cut.jpg" height="15" />
                    <div class="barcodecell"><barcode code="<?php echo $applicant->guid; ?>" type="QR" class="barcode" /></div>
                </div>
                
                <!-- QR Code Right -->
                <div class="space-height5 sub-right5 bguide3 qrcode">
                    <img src="vendor/visafasttrack/images/cut.jpg" height="15" />
                    <div class="barcodecell"><barcode code="<?php echo $applicant->guid; ?>" type="QR" class="barcode" /></div>
                </div>
            </div>
        </div>
    </section>
</body>