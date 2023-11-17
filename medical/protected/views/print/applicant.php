<style>
    /* Table header-sebumi */
    table.header-sebumi { width: 100%; font-family: Tahoma; }
    table.header-sebumi th, td { border: 0px solid black; border-spacing: 0px; border-collapse: collapse; }
    
    /* Table meform-sebumi */
    table.meform-sebumi { width: 100%; font-family: Tahoma; border-spacing: 0px; border-collapse: collapse; }
    table.meform-sebumi td { border: 1px solid black;  }
    
    /* Setting */
    .header-title { background-color: #4472c4; color: #fff; font-weight: bold; padding-left: 10px; }
    .title { font-size: 11px; width: 65px; text-align: right; padding-right: 10px; }
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
</style>
    
<section>
    <!-- EMPLOYER SECTION -->
    <span class="barcodecell"><barcode code="<?php echo $a->guid; ?>" type="QR" class="barcode" /></span>
    <table class="header-sebumi">
        <tr>
            <td colspan="2" width="47%">
                <span class="text-bold">Applicant Temporary Pass</span><br />Sebumi Sdn Bhd
            </td>
            <td width="18%" class="text-right">
                Trans No. :<br />Date :
            </td>
            <td width="15%">
                <span class="text-red"><?php echo $a->guid; ?></span>
                <br /><?php echo date("d-m-Y", strtotime($a->created_at)) ?>
            </td>
        </tr>
    </table>
    <table class="meform-sebumi">
        <tr>
            <td colspan="6" class="header-title">APPLICANT DETAILS</td>
        </tr>
        <tr>
            <td class="title">Applicant</td>
            <td colspan="4" class="word"><?php echo $a->given_name.' '.$a->middle_name.' '.$a->last_name; ?></td>
            <td class="title" rowspan="6" style="border: 1px solid #000;" valign="top">
                <img src="uploads/photos/<?php echo $a->guid; ?>.jpg" height="190" width="140" />
            </td>
        </tr>
        <tr>
            <td class="title">Country</td>
            <td colspan="4" class="word"><?php echo $a->nationality->name; ?></td>
        </tr>
        <tr>
            <td class="title">Passport</td>
            <td colspan="4" class="number"><?php echo $a->passport_number ?></td>
        </tr>
        <tr>
            <td class="title">Contact</td>
            <td colspan="4" class="word"><?php echo $a->contact_number; ?></td>
        </tr>
        <tr>
            <td class="title">Employer</td>
            <td colspan="4" class="word"><?php echo $a->employer_name; ?></td>
        </tr>
        <?php
            $a_add1 = empty($a->employer_address1) ? NULL : $a->employer_address1;
            $a_add2 = empty($a->employer_address2) ? NULL : $a->employer_address2;
            $a_add3 = empty($a->employer_address3) ? NULL : $a->employer_address3;
            $a_add = $a_add1.'<br />'.$a_add2.'<br />'.$a_add3.'<br />'.$a->employerDistrict->name.'<br /> SABAH';
        ?>
        <tr>
            <td class="title">Address</td>
            <td colspan="4" class="word"><?php echo $a_add; ?></td>
        </tr>
        <tr>
            <td class="title">Assistant</td>
            <td colspan="5"  class="word"><?php echo $user->profile->name; ?></td>
        </tr>
    </table>
</section>