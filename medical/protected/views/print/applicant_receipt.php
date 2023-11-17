<style>
    /* Table header-sebumi */
    table.header-sebumi { width: 100%; font-family: Tahoma; }
    table.header-sebumi th, td { border: 0px solid black; border-spacing: 0px; border-collapse: collapse; }
    
    /* Table meform-sebumi */
    table.meform-sebumi { width: 100%; font-family: Tahoma; border-spacing: 0px; border-collapse: collapse; }
    table.meform-sebumi td { border: 1px solid black;  }
    
    /* Setting */
    .header-title { font-size: 11px; background-color: #1691d9; color: #fff; font-weight: bold; padding: 5px 10px; }
    .title { font-size: 11px; width: 65px; text-align: right; padding-right: 10px; color: #666; }
    .title2 { font-size: 11px; text-align: center; width: 30px; }
    .title3 { font-size: 11px; padding-left: 10px; }
    .title4 { font-size: 11px; width: 80px; padding-left: 10px; }
    .title5 { font-size: 11px; width: 120px; padding-left: 10px; }
    .title6 { background-color: #ffffcc; font-size: 11px; text-align: right; padding-right: 10px; font-weight: bold; }
    .total { text-align: right; padding-right: 10px; }
    .total2 { background-color: #ffffcc; font-weight: bold; text-align: right; padding-right: 10px; }
    .number { width: 96px; padding-left: 10px; }
    .word { padding-left: 10px; }
    .pad-10 { padding-left: 10px; }
    .line-dashed { color: #d9d9d9; }
    .text-red { color: red; font-size: 16px; }
    .text-center { text-align: center; }
    .text-right { text-align: right; }
    .text-bold { font-weight: bold; }
    .photo { border: 1px solid #6f6f6f; padding: 12px; }
</style>
    
<section>
    <table class="header-sebumi">
        <tr>
            <td valign="bottom">
                <span class="barcodecell"><barcode code="<?php echo $a->guid; ?>" type="QR" class="barcode" /></span>
            </td>
            <td colspan="2" class="title" valign="top">
                <img class="photo" src="uploads/photos/<?php echo $a->guid; ?>.jpg" height="190" width="140" />
            </td>
        </tr>
        <tr>
            <td width="35%">
                <span class="text-bold">Receipt : </span><span class="text-red"><?php echo $transaction->receipt; ?></span><br />Sebumi Sdn Bhd
            </td>
            <td width="15%" class="text-right text-bold">
                Trans No. :<br />Date :
            </td>
            <td width="50%" class="text-right">
                <span class="text-bold"><?php echo $a->guid; ?></span>
                <br /><?php echo date("d-m-Y", strtotime($a->created_at)); ?>
            </td>
        </tr>
    </table>
    <div>&nbsp;</div>
    <!-- RECEIPT DETAILS -->
    <table class="meform-sebumi">
        <tr>
            <td colspan="6" class="header-title">RECEIPT DETAILS</td>
        </tr>
        <tr>
            <td width="33%" class="word">
                <span class="title">Receipt No</span><br /><?php echo $transaction->receipt; ?>
            </td>
            <td colspan="2" class="word">
                <span class="title">Purpose</span><br />WORKER MEDICAL EXAMINATION
            </td>
        </tr>
        <tr>
            <td width="33%" class="word">
                <span class="title">Assistant</span><br /><?php echo $agent->name; ?>
            </td>
            <td width="33%" class="word">
                <span class="title">Type</span><br /><?php echo $agent->type; ?>
            </td>
            <td width="34%" class="word">
                <span class="title">Assistant Code</span><br /><span class="text-right"><?php echo $agent->code; ?></span>
            </td>
        </tr>
        <tr>
            <td width="33%" class="word">
                <span class="title">Doctor Code</span><br /><?php echo $doctor->code; ?>
            </td>
            <td width="33%" class="word">
                <span class="title">Doctor Name</span><br /><?php echo $doctor->name; ?>
            </td>
            <td width="34%" class="word">
                <span class="title">Total</span><br /><span class="text-right">Rp 20,000</span>
            </td>
        </tr>
    </table>
    <div>&nbsp;</div>
    <!-- APPLICANT DETAILS -->
    <table class="meform-sebumi">
        <tr>
            <td colspan="6" class="header-title">WORKER DETAILS</td>
        </tr>
        <tr>
            <td width="33%" class="word">
                <span class="title">Given Name</span><br /><?php echo $a->given_name; ?>
            </td>
            <td width="33%" class="word">
                <span class="title">Middle Name</span><br /><?php echo $a->middle_name; ?>
            </td>
            <td width="34%" class="word">
                <span class="title">Last Name</span><br /><?php echo $a->last_name; ?>
            </td>
        </tr>
        <tr>
            <td width="33%" class="word">
                <span class="title">Passport Number</span><br /><?php echo $a->passport_number; ?>
            </td>
            <td width="33%" class="word">
                <span class="title">Date Of Birth</span><br /><?php echo date('d-m-Y', strtotime($a->birth_date)); ?>
            </td>
            <td width="34%" class="word">
                <span class="title">Gender</span><br /><?php echo $a->gender->name; ?>
            </td>
        </tr>
        <tr>
            <td width="33%" class="word">
                <span class="title">Nationality</span><br /><?php echo $a->nationality->name; ?>
            </td>
            <td width="33%" class="word">
                <span class="title">Job Sector</span><br /><?php echo $a->job->name; ?>
            </td>
            <td width="34%" class="word">
                <span class="title">Contact Number</span><br /><?php echo $a->contact_number; ?>
            </td>
        </tr>
        <tr>
            <td width="33%" class="word">
                <span class="title">Address (Line 1)</span><br /><?php echo empty($a->address1) ? '&nbsp;' : strtoupper($a->address1); ?>
            </td>
            <td width="33%" class="word">
                <span class="title">Address (Line 2)</span><br /><?php echo empty($a->address2) ? '&nbsp;' : strtoupper($a->address2); ?>
            </td>
            <td width="34%" class="word">
                <span class="title">Address (Line 3)</span><br /><?php echo empty($a->address3) ? '&nbsp;' : strtoupper($a->address3); ?>
            </td>
        </tr>
    </table>
</section>