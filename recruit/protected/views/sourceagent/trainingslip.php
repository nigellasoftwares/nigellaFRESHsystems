<style>
    /* Table header-recruit */
    table.header-recruit { width: 100%; font-family: Tahoma; }
    table.header-recruit th, td { border: 0px solid black; border-spacing: 0px; border-collapse: collapse; }
    
    /* Table meform-recruit */
    table.meform-recruit { width: 100%; font-family: Tahoma; border-spacing: 0px; border-collapse: collapse; }
    table.meform-recruit td { border: 1px solid black;  }
    
    /* Setting */
    .header-title { font-size: 11px; background-color: #830901; color: #fff; font-weight: bold; padding: 5px 10px; }
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
    
    .space-height { height: 28px; }
</style>

<section>
    <table class="header-recruit">
        <tr>
            <td valign="bottom">
                <span class="barcodecell"><barcode code="<?php echo $t->guid; ?>" type="QR" class="barcode" /></span>
            </td>
            <td colspan="2" class="title" valign="top">
                <img class="photo" src="uploads/photos/<?php echo $t->guid; ?>.jpg" height="190" width="140" />
            </td>
        </tr>
        <tr>
            <td width="35%">
                <span class="text-bold">Worker Training Slip</span><br />e-Bfbms Recruitment System
            </td>
            <td width="15%" class="text-right text-bold">
                Trans No. :<br />Date :
            </td>
            <td width="50%" class="text-right">
                <span class="text-red"><?php echo $t->guid; ?></span>
                <br /><?php echo date("d-m-Y", strtotime($t->created_at)); ?>
            </td>
        </tr>
    </table>
    <div>&nbsp;</div>
    <!-- WORKER DETAILS -->
    <table class="meform-recruit">
        <tr>
            <td colspan="6" class="header-title">WORKER DETAILS</td>
        </tr>
        <tr>
            <td width="33%" class="word">
                <span class="title">First Name</span><br /><?php echo $t->worker->first_name; ?>
            </td>
            <td width="33%" class="word">
                <span class="title">Middle Name</span><br /><?php echo $t->worker->middle_name; ?>
            </td>
            <td width="34%" class="word">
                <span class="title">Last Name</span><br /><?php echo $t->worker->last_name; ?>
            </td>
        </tr>
        <tr>
            <td width="33%" class="word">
                <span class="title">Passport Number</span><br /><?php echo $t->passport->number; ?>
            </td>
            <td width="33%" class="word">
                <span class="title">Date Of Birth</span><br /><?php echo date('d-m-Y', strtotime($t->worker->birth_date)); ?>
            </td>
            <td width="34%" class="word">
                <span class="title">Gender</span><br /><?php echo $t->worker->gender->name; ?>
            </td>
        </tr>
        <tr>
            <td width="33%" class="word">
                <span class="title">Nationality</span><br /><?php echo $t->worker->nationality->name; ?>
            </td>
            <td width="33%" class="word">
                <span class="title">Date Of Birth</span><br /><?php echo date('d-m-Y', strtotime($t->worker->birth_date)); ?>
            </td>
            <td width="34%" class="word">
                <span class="title">Job Sector</span><br /><?php echo $t->worker->jobsector->name; ?>
            </td>
        </tr>
        <tr>
            <td width="33%" class="word">
                <span class="title">Address (Line 1)</span><br /><?php echo $t->worker->home_address; ?>
            </td>
            <td width="33%" class="word">
                <span class="title">Address (Line 2)</span><br /><?php echo $t->worker->home_zipcode; ?>
            </td>
            <td width="34%" class="word">
                <span class="title">Contact Number</span><br /><?php echo $t->worker->home_mobile; ?>
            </td>
        </tr>
    </table>
    <div>&nbsp;</div>
    <!-- EMPLOYER DETAILS -->
    <table class="meform-recruit">
        <tr>
            <td colspan="6" class="header-title">EMPLOYER DETAILS</td>
        </tr>
        <tr>
            <td width="50%" class="word">
                <span class="title">Employer</span><br /><?php echo $t->employer->profile->company->name; ?>
            </td>
            <td width="50%" class="word">
                <span class="title">Address (Line 1)</span><br /><?php echo empty($t->employer->profile->company->address1) ? '&nbsp;' : $t->employer->profile->company->address1; ?>
            </td>
        </tr>
        <tr>
            <td width="50%" class="word">
                <span class="title">Contact Number</span><br /><?php echo $t->employer->profile->company->contact_number1; ?>
            </td>
            <td width="50%" class="word">
                <span class="title">Address (Line 2)</span><br /><?php echo empty($t->employer->profile->company->address2) ? '&nbsp;' : $t->employer->profile->company->address2; ?>
            </td>
        </tr>
        <tr>
            <td width="50%" class="word">
                <span class="title">District</span><br /><?php echo $t->employer->profile->company->district; ?>
            </td>
            <td width="50%" class="word">
                <span class="title">Address (Line 3)</span><br /><?php echo empty($t->employer->profile->company->address3) ? '&nbsp;' : $t->employer->profile->company->address3; ?>
            </td>
        </tr>
    </table>
    
    <div>&nbsp;</div>
    <div class="space-height bguide">&nbsp;</div>
    <div class="space-height text-center bguide">
        <span class="barcodecell"><barcode code="<?php echo $t->guid; ?>" type="C39" size="0.5" height="2.0" /></span>
    </div>
</section>