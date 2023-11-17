<title>Flight Slip | <?php echo $info['flight']; ?></title>
<style>
    body { font-family: Arial; font-size: 12px; }
    .bguide { border: 1px solid red; }
    .bguide2 { border: 1px solid white; }
    .bguide3 { border-right: 2px solid #d1d8de; }
    .bguide4 { border: 1px solid white; }
    
    .space-height { height: 50px; }
    .space-height2 { height: 420px; }
    .space-height3 { height: 690px; }
    .space-footer { height: 20px; }
    
    .main-left { width: 240px; float: left; }
    .main-right { width: 240px; float: left; }
    .sub-left { width: 100px; float: left; margin-left: 10px; }
    .sub-right { width: 411px; float: left; }
    
    .form-img { text-align: center; }
    .image-applicant { border: 1px solid #d1d8de; padding: 10px; }
    
    .text-center { text-align: center; }
    .text-right { text-align: right; }
    .text-bold { font-weight: bold; }
    
    .qrcode { text-align: center; vertical-align: middle; padding-top: 10px; }
    .barcodecell { margin-top: 12px; padding: 20px; border: 0px dashed black; }
    
    .footer-logo { float: left; width: 200px; }
    .pageno { float: right; width: 200px; }
    
    table.flight { border-collapse: collapse; width: 100%; margin-top: 20px; }
    table.flight th { 
        padding: 4px 0px; 
        border: 0.5px solid #000; 
        border-bottom: 0.5px solid black; 
        background-color: #5b9bd5;
    }
    table.flight td { 
        padding: 5px 10px; 
        border-top: 0.5px solid #000; 
        border-bottom: 0.5px solid #000;
        border-left: 0.5px solid #000;
        border-right: 0.5px solid #000; 
        font-weight: normal;
    }
</style>

<body>
    <section>
        <div class="space-height bguide2">
            <!-- Part 1 -->
            <div class="space-height main-left bguide3">
                <strong>FLIGHT LIST FOR FOREIGN WORKERS</strong><br />
                <div class="sub-left">
                    Total Worker : <br />
                    Total Male : <br />
                    Total Female :
                </div>
                <div class="sub-left text-bold">
                    <?php echo count($worker['total']); ?><br />
                    <?php echo count($worker['male']); ?><br />
                    <?php echo count($worker['female']); ?>
                </div>
            </div>
            
            <!-- Part 2 -->
            <div class="space-height main-left text-center text-bold bguide3">
                <img src="vendor/imandor/images/imandor_logo2.jpg" height="20" /><br />
                <?php echo $user->profile->company->name; ?>
            </div>
            
            <!-- Part 3 -->
            <div class="space-height main-right">
                <div class="sub-left">
                    Flight Number : <br />
                    ETA Malaysia : <br />
                    Flight Date : <br />
                </div>
                <div class="sub-left text-bold">
                    <?php echo $info['flight']; ?><br />
                    <?php echo $info['eta']; ?><br />
                    <?php echo date('d M Y', strtotime($info['date'])); ?>
                </div>
            </div>
        </div>
        
        <div>
            <table class="flight">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Photo</th>
                        <th class="text-center">Full Name</th>
                        <th class="text-center">Passport</th>
                        <th class="text-center">National ID</th>
                        <th class="text-center">Gender</th>
                        <th class="text-center">QR Code</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $i = 0;
                    foreach($transaction as $t){
                        $i++;
                ?>
                    <tr>
                        <td class="text-center"><?php echo $i; ?></td>
                        <td class="text-center">
                            <img class="image-applicant" src="uploads/photos/<?php echo $t->guid; ?>.jpg" height="78" />
                        </td>
                        <td class="text-center"><?php echo strtoupper($t->worker->full_name); ?></td>
                        <td class="text-center"><?php echo strtoupper($t->passport->number); ?></td>
                        <td class="text-center"><?php echo strtoupper($t->worker->national_card); ?></td>
                        <td class="text-center"><?php echo strtoupper($t->worker->gender->name); ?></td>
                        <td class="text-center">
                            <div class="barcodecell">
                                <barcode code="<?php echo Yii::app()->params['qrslip'].'/index.php?r=Site/ScanQR&id='.$t->guid; ?>" type="QR" class="barcode" size="1" />
                            </div>
                        </td>
                    </tr>
                <?php
                    }
                ?>
                </tbody>
            </table>
        </div>
    </section>
</body>