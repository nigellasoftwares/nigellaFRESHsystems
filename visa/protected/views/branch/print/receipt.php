<title>Receipt Slip | <?php echo $batch->batch_guid; ?></title>
<style>
    body { font-family: Arial; font-size: 12px; }
    header { font-family: Arial; font-size: 12px; }
    footer { font-family: Arial; font-size: 10px; text-align: center; }
    
    .bguide { border: 1px solid red; }
    .bguide2 { border: 1px solid #d1d8de; }
    .bguide3 { border: 1px solid white; }
    .bguide4 { border: 1px solid blue; }
    .bguide5 { border: 0px solid white; }
    .bguide6 { border: 1px solid #000; background-color: #f8f8f8; }
    
    .space-height { height: 1000px; }
    .space-header { height: 70px; }
    .space-footer { height: 40px; }
    
    .space-height2 { height: 150px; }
    .space-height3 { height: 150px; }
    .space-height4 { height: 120px; }
    
    .sub-main1 { width: 450px; float: left }
    .sub-main2 { width: 262px; float: left }
    .sub-main3 { width: 714px; float: left }
    .sub-main4 { width: 332px; float: left }
    
    .form-title { color: #73828e; font-size: 17px; }
    .receipt-number { color: #73828e; font-size: 12px; margin-top: 10px; margin-left: 15px; }
    .receipt-number2 { color: #062a37; font-size: 13px; margin-left: 15px; }
    
    .h1 { width: 370px; float: left; }
    .h2 { width: 170px; float: left; }
    .pageno { margin-top: 6px; }
    
    .form-payment { margin-top: 20px; margin-left: 25px; width: 398px; border-collapse: collapse; }
    .form-payment td { 
        color: #062a37; 
        font-size: 13px; 
        border-bottom: 1px solid #d1d8de; 
        padding-bottom: 10px;
        padding-top: 10px;
    }
    
    .form-payment2 { margin-top: 20px; margin-left: 25px; width: 210px; border-collapse: collapse; }
    .form-payment2 td { 
        color: #062a37; 
        font-size: 13px; 
        border-bottom: 1px solid #d1d8de; 
        padding-bottom: 10px;
        padding-top: 10px;
    }
    
    .form-payment3 { margin-top: 20px; margin-left: 25px; width: 664px; border-collapse: collapse; }
    .form-payment3 th { 
        color: #73828e; 
        font-size: 12px; 
        font-weight: normal; 
        /*border-bottom: 2px solid #d1d8de;*/
        padding-bottom: 5px;
    }
    .form-payment3 td { 
        color: #062a37; 
        font-size: 12px; 
        border: 1px solid #000; 
        padding-bottom: 5px;
        padding-top: 5px;
    }
    
    .top { border-top: 1px solid #d1d8de; }
    .text-center { text-align: center; }
    .text-output { text-align: right; background-color: #f8f8f8; padding-right: 10px; }
    .text-output2 { text-align: right; background-color: #ffffcc; padding-right: 10px; }
    .text-output3 { text-align: right; background-color: #f8f8f8; padding-right: 10px; font-weight: bold; }
    .text-output4 { text-align: right; background-color: #ffffcc; padding-right: 10px; font-weight: bold; }
    .visa-title { font-weight: bold; padding-left: 40px; background-color: #ddd; }
    .total-visa { font-weight: bold; padding-left: 40px; background-color: #ddd; }
    
    .payment-verify { padding-top: 15px; padding-left: 24px; padding-right: 24px; }
    .payment-title { margin-left: 12px; margin-top: 5px; }
    .payment-title2 { 
        margin-left: 12px; 
        margin-right: 12px; 
        margin-top: 75px; 
        border-top: 1px dotted #000;
        font-weight: bold;
    }
</style>

<body>
    <section>
        <div class="space-height bguide3">
            <div class="space-height2 sub-main1 bguide3">
                <div class="form-table">
                    <table class="form-payment">
                        <tbody>
                            <tr>
                                <td height="20" class="top">Name</td>
                                <td height="20" class="top text-output"><?php echo $batch->branch->user->profile->company->name; ?></td>
                            </tr>
                            <?php
                                $totalfee = array();
                                foreach($payment as $p){
                                    $totalfee[] = $p->vln_fee;
                                    $totalfee[] = $p->osc_fee;
                                }
                            ?>
                            <tr>
                                <td height="20" class="top">Fee Deposited</td>
                                <td height="20" class="text-output">BTD <?php echo number_format(array_sum($totalfee)); ?></td>
                            </tr>
                            <tr>
                                <td height="20" class="top">Receiving Date</td>
                                <td height="20" class="text-output"><?php echo date('d M Y', strtotime($batch->created_at)); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="space-height2 sub-main2 bguide3">
                <div class="form-table">
                    <table class="form-payment2">
                        <tbody>
                            <tr>
                                <td height="20" class="top">Number of Passports</td>
                                <td height="20" class="top text-output"><?php echo count($payment); ?></td>
                            </tr>
                            <?php
                                $totalvdr = array();
                                $totalvtr = array();
                                $totaloth = array();
                                
                                foreach($payment as $q){
                                    if($q->visa_id == 1){
                                        $totalvdr[] = 1;
                                    } else if($q->visa_id == 2){
                                        $totalvtr[] = 1;
                                    } else {
                                        $totaloth[] = 1;
                                    }
                                }
                            ?>
                            <tr>
                                <td height="20" class="top">VTR</td>
                                <td height="20" class="text-output"><?php echo array_sum($totalvtr); ?></td>
                            </tr>
                            <tr>
                                <td height="20" class="top">VDR</td>
                                <td height="20" class="text-output"><?php echo array_sum($totalvdr); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="space-height3 sub-main3 bguide3">
                <div class="form-table">
                    <div class="form-table">
                        <table class="form-payment3">
                            <thead>
                                <tr>
                                    <th height="20" width="5%">No</th>
                                    <th height="20" width="32%">Name</th>
                                    <th height="20" width="12%">Passport</th>
                                    <th height="20" width="12%">VLN Fee<br />(BDT)</th>
                                    <th height="20" width="12%">OSC Fee<br />(BDT)</th>
                                    <th height="20" width="12%">Total Fee<br />(BDT)</th>
                                    <th height="20" width="15%">Remarks<th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $totalvlnfee = 0;
                                    $totaloscfee = 0;
                                    $totalvisafee = 0;
                                
                                    $i = 0;
                                    if(count($applicantvtr > 0)){ 
                                ?>
                                <tr>
                                    <td height="20" colspan="7" class="visa-title top">VTR</td>
                                </tr>
                                    <?php  
                                        foreach($applicantvtr as $vtr){
                                            $i++;
                                            $totalfeevtr = $vtr->payment->vln_fee + $vtr->payment->osc_fee;   
                                    ?>
                                <tr>
                                    <td height="20" class="text-center"><?php echo $i; ?></td>
                                    <td height="20"><?php echo strtoupper($vtr->full_name); ?></td>
                                    <td height="20" class="text-center"><?php echo strtoupper($vtr->passport_number); ?></td>
                                    <td height="20" class="text-output"><?php echo number_format($vtr->payment->vln_fee); ?></td>
                                    <td height="20" class="text-output"><?php echo number_format($vtr->payment->osc_fee); ?></td>
                                    <td height="20" class="text-output2"><?php echo number_format($totalfeevtr); ?></td>
                                    <td height="20" class="text-center"><?php echo $vtr->purposevisit->remark; ?></td>
                                </tr>
                                <?php
                                            $totalvlnfee = $totalvlnfee + $vtr->payment->vln_fee;
                                            $totaloscfee = $totaloscfee + $vtr->payment->osc_fee;
                                            $totalvisafee = $totalvisafee + $totalfeevtr;
                                        }
                                    } 

                                    if(count($applicantvdr > 0)){ 
                                ?>
                                <tr>
                                    <td height="20" colspan="7" class="visa-title">VDR</td>
                                </tr>
                                    <?php  
                                        foreach($applicantvdr as $vdr){
                                            $i++;
                                            $totalfeevdr = $vdr->payment->vln_fee + $vdr->payment->osc_fee;   
                                    ?>
                                <tr>
                                    <td height="20" class="text-center"><?php echo $i; ?></td>
                                    <td height="20"><?php echo strtoupper($vdr->full_name); ?></td>
                                    <td height="20" class="text-center"><?php echo strtoupper($vdr->passport_number); ?></td>
                                    <td height="20" class="text-output"><?php echo number_format($vdr->payment->vln_fee); ?></td>
                                    <td height="20" class="text-output"><?php echo number_format($vdr->payment->osc_fee); ?></td>
                                    <td height="20" class="text-output2"><?php echo number_format($totalfeevdr); ?></td>
                                    <td height="20" class="text-center"><?php echo $vdr->purposevisit->remark; ?></td>
                                </tr>
                                <?php
                                            $totalvlnfee = $totalvlnfee + $vdr->payment->vln_fee;
                                            $totaloscfee = $totaloscfee + $vdr->payment->osc_fee;
                                            $totalvisafee = $totalvisafee + $totalfeevdr;
                                        }
                                    } 
                                ?>    
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td height="20" colspan="3" class="total-visa">TOTAL</td>
                                    <td height="20" class="text-output3"><?php echo number_format($totalvlnfee); ?></td>
                                    <td height="20" class="text-output3"><?php echo number_format($totaloscfee); ?></td>
                                    <td height="20" class="text-output4"><?php echo number_format($totalvisafee); ?></td>
                                    <td height="20" class="total-visa">&nbsp;</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class="space-height3 sub-main3 payment-verify">
                <div class="space-height4 sub-main4 bguide6">
                    <div class="payment-title">Payment Made By:</div>
                    <div class="payment-title2">(<?php echo $batch->branch->user->profile->company->name; ?>)</div>
                </div>
                <div class="space-height4 sub-main4 bguide6">
                    <div class="payment-title">Received By:</div>
                    <div class="payment-title2">(VISA FAST TRACK)</div>
                </div>
            </div>
        </div>
    </section>
</body>    