<style>
    /* Table header-sebumi */
    table.header-sebumi { width: 100%; font-family: Tahoma; }
    table.header-sebumi th, td { border: 0px solid black; border-spacing: 0px; border-collapse: collapse; }
    
    /* Table meform-sebumi */
    table.meform-sebumi { width: 100%; font-family: Tahoma; border-spacing: 0px; border-collapse: collapse; }
    table.meform-sebumi td { border: 1px solid black;  }
    
    /* Setting */
    .header-title { font-size: 11px; background-color: #1ab394; color: #fff; font-weight: bold; padding: 5px 10px; }
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
                <span class="barcodecell"><barcode code="<?php echo $d->guid; ?>" type="QR" class="barcode" /></span>
            </td>
            <td colspan="2" class="title" valign="top">
                <img class="photo" src="uploads/photos/<?php echo $d->guid; ?>.jpg" height="190" width="140" />
            </td>
        </tr>
        <tr>
            <td width="35%">
                <span class="text-bold">Dependant Temporary Pass</span><br />Sebumi Sdn Bhd
            </td>
            <td width="15%" class="text-right text-bold">
                Trans No. :<br />Date :
            </td>
            <td width="50%" class="text-right">
                <span class="text-red"><?php echo $d->guid; ?></span>
                <br /><?php echo date("d-m-Y", strtotime($d->created_at)) ?>
            </td>
        </tr>
    </table>
    <div>&nbsp;</div>
    <!-- DEPENDANT DETAILS -->
    <table class="meform-sebumi">
        <tr>
            <td colspan="3" class="header-title">DEPENDANT DETAILS</td>
        </tr>
        <tr>
            <td width="33%" class="word">
                <span class="title">Given Name</span><br /><?php echo $d->given_name; ?>
            </td>
            <td width="33%" class="word">
                <span class="title">Middle Name</span><br /><?php echo $d->middle_name; ?>
            </td>
            <td width="34%" class="word">
                <span class="title">Last Name</span><br /><?php echo $d->last_name; ?>
            </td>
        </tr>
        <tr>
            <td class="word">
                <span class="title">Address (Line 1)</span><br /><?php echo $d->address1; ?>
            </td>
            <td class="word">
                <span class="title">Passport</span><br /><?php echo $d->passport_number; ?>
            </td>
            <td class="word">
                <span class="title">Gender</span><br /><?php echo $d->gender->name; ?>
            </td>
        </tr>
        <tr>
            <td class="word">
                <span class="title">Address (Line 2)</span><br /><?php echo $d->address2; ?>
            </td>
            <td class="word">
                <span class="title">Nationality</span><br /><?php echo $d->nationality->name; ?>
            </td>
            <td class="word">
                <span class="title">Date Of Birth</span><br /><?php echo date('d-m-Y', strtotime($d->birth_date)); ?>
            </td>
        </tr>
        <tr>
            <td class="word">
                <span class="title">Address (Line 3)</span><br /><?php echo $d->address3; ?>
            </td>
            <td class="word">
                <span class="title">District</span><br /><?php echo $d->district->name; ?>
            </td>
            <td class="word">
                <span class="title">Contact Number</span><br /><?php echo $d->contact_number; ?>
            </td>
        </tr>
        <tr>
            <td colspan="3" class="word">
                <span class="title">Relation</span><br /><?php echo $d->relation->name; ?>
            </td>
        </tr>
    </table>
    <div>&nbsp;</div>
    <!-- APPLICANT DETAILS -->
    <table class="meform-sebumi">
        <tr>
            <td colspan="3" class="header-title">APPLICANT DETAILS</td>
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
            <td class="word">
                <span class="title">Passport Number</span><br /><?php echo $a->passport_number; ?>
            </td>
            <td class="word">
                <span class="title">PLKS Number</span><br /><?php echo $a->plks_number; ?>
            </td>
            <td class="word">
                <span class="title">BPA Number</span><br /><?php echo $a->bpa_number; ?>
            </td>
        </tr>
        <tr>
            <td class="word">
                <span class="title">Address (Line 1)</span><br /><?php echo $a->address1; ?>
            </td>
            <td class="word">
                <span class="title">Date Of Birth</span><br /><?php echo date('d-m-Y', strtotime($a->birth_date)); ?>
            </td>
            <td class="word">
                <span class="title">Gender</span><br /><?php echo $a->gender->name; ?>
            </td>
        </tr>
        <tr>
            <td class="word">
                <span class="title">Address (Line 2)</span><br /><?php echo $a->address2; ?>
            </td>
            <td class="word">
                <span class="title">Nationality</span><br /><?php echo $a->nationality->name; ?>
            </td>
            <td class="word">
                <span class="title">Job Sector</span><br /><?php echo $a->job->name; ?>
            </td>
        </tr>
        <tr>
            <td class="word">
                <span class="title">Address (Line 3)</span><br /><?php echo $a->address3; ?>
            </td>
            <td class="word">
                <span class="title">District</span><br /><?php echo $a->district->name; ?>
            </td>
            <td class="word">
                <span class="title">Contact Number</span><br /><?php echo $a->contact_number; ?>
            </td>
        </tr>
    </table>
</section>