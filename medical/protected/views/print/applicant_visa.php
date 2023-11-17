<style>
    body { font-family: Arial; font-size: 12px; }
    .bguide { border: 1px solid white; }
    .bguide2 { border: 0px solid blue; }
    
    .main-title { font-weight: bold; text-decoration: underline; text-align: center; }
    .main-height { /* height: 35px; */ padding-bottom: 12px; }
    .sub-title { font-weight: bold; text-decoration: underline; }
    .sub2-title { text-decoration: underline; }
    .space-height { height: 28px; }
    
    .iheight { /*height: 24px;*/ padding-bottom: 8px; }
    .iheight2 { /*height: 35px;*/ padding-bottom: 8px; }
    .iheight3a { height: 70px; border-bottom: 2px dotted #000 !important; }
    .iheight3b { height: 70px; border-bottom: 2px dotted #fff !important; }
    
    .ileft { float: left; }
    .iright { float: right; }
    .point { width: 25px; }
    .item1 { width: 240px; }
    .item2 { width: 300px; }
    .item3 { width: 255px; }
    .item4 { width: 100px; }
    .item5 { width: 565px; }
    .item6 { width: 350px; }
    .item7 { width: 630px; }
    .item8 { width: 500px; }
    .item9 { width: 150px; }
    
    .p-t-5 { padding-top: 5px; }
    
    .bold { font-weight: bold; }
    .normal { font-weight: normal !important; }
    .justify { text-align: justify; text-justify: inter-word; }
    .right { text-align: right; }
    .center { text-align: center; }
    .line { border-top: 1px solid #000; height: 3px; }
    .line2 { border-bottom: 1px solid #000 !important; }
    .ft-16 { font-size: 16px; }
    
    .photo { border: 1px solid #6f6f6f; padding: 12px; }
    
    .barcode {
        padding: 1.5mm;
        margin: 0;
        vertical-align: top;
        color: #000044;
        height: 300px;
    }
</style>
    
<section>
    <div class="space-height bguide2">
        <div class="line2">
            <div class="ileft main-height item6 bguide">
                <img src="vendor/sebumi/images/sebumi_online.jpg" />
            </div>
            <div class="iright main-height right bguide">
                <img src="vendor/sebumi/images/sebumi_visa.jpg" />
            </div>
        </div>
        <div>
            <div class="ileft item7 bguide">&nbsp;</div>
            <div class="iright p-t-5 bguide">EV<?php echo rand(1000000,9999999); ?></div>
        </div>
        <div>
            <div class="ileft main-height item2 center bguide">
                <span class="barcodecell">
                    <barcode code="<?php echo $a->guid; ?>" type="QR" class="barcode" disableborder="1" />
                </span>
            </div>
            <div class="iright main-height center p-t-5 bguide">
                <strong>MALAYSIA IMMIGRATION</strong>
                <br />[Section 2(1), Passport Act 1966]
                <br /><br /><strong>SINGLE ENTRY VISA</strong>
                <br />Good for working in Malaysia within 1 <strong>year</strong>
                <br />from date hereof, provided that this passport remains valid.
            </div>
        </div>
        <div class="space-height bguide">&nbsp;</div>
        <div class="line2">
            <div class="bold ft-16 bguide">Electronic Visa Holder Information</div>
        </div>
        <div class="space-height bguide">&nbsp;</div>
        <div>
            <div class="ileft main-height item8 bguide">
                <!-- APPLICANT DETAILS -->
                <div>
                    <div class="ileft iheight point bguide">&nbsp;</div>
                    <div class="ileft iheight item9 bguide">Visa Number :</div>
                    <div class="iright iheight bold bguide">
                        <?php echo (isset($a->guid)) ? strtoupper($a->guid) : "-"; ?>
                    </div>
                </div>
                <div>
                    <div class="ileft iheight point bguide">&nbsp;</div>
                    <div class="ileft iheight item9 bguide">Ref. Number :</div>
                    <div class="iright iheight bold bguide">
                        EVS/48811/OGA09/EXQKF121
                    </div>
                </div>
                <div>
                    <div class="ileft iheight point bguide">&nbsp;</div>
                    <div class="ileft iheight item9 bguide">Visa Issue Date :</div>
                    <div class="iright iheight bold bguide">
                        <?php echo (isset($a->created_at)) ? date("d-m-Y", strtotime($a->created_at)) : "-"; ?>
                    </div>
                </div>
                <div>
                    <div class="ileft iheight point bguide">&nbsp;</div>
                    <div class="ileft iheight item9 bguide">Visa Expire Date :</div>
                    <div class="iright iheight bold bguide">
                        <?php echo (isset($a->created_at)) ? date("d-m-Y", strtotime("+1 years", strtotime($a->created_at))) : "-"; ?>
                    </div>
                </div>
                <div>
                    <div class="ileft iheight point bguide">&nbsp;</div>
                    <div class="ileft iheight item9 bguide">Place Of Issue :</div>
                    <div class="iright iheight bold bguide">
                        JAKARTA, INDONESIA
                    </div>
                </div>
                <div>
                    <div class="ileft iheight point bguide">&nbsp;</div>
                    <div class="ileft iheight item9 bguide">Remarks :</div>
                    <div class="iright iheight bold bguide">
                        FOR ISSUE OF WORK PERMIT 1 YEAR ONLY
                    </div>
                </div>
                <div>
                    <div class="ileft iheight point bguide">&nbsp;</div>
                    <div class="ileft iheight item9 bguide">Visa Fee :</div>
                    <div class="iright iheight bold bguide">
                        RM 100.00
                    </div>
                </div>
                <div>
                    <div class="ileft iheight point bguide">&nbsp;</div>
                    <div class="ileft iheight item9 bguide">Gender :</div>
                    <div class="iright iheight bold bguide">
                        <?php echo $a->gender->name; ?>
                    </div>
                </div>
                <div>
                    <div class="ileft iheight point bguide">&nbsp;</div>
                    <div class="ileft iheight item9 bguide">Full Name :</div>
                    <div class="iright iheight bold bguide">
                        <?php echo $a->given_name; ?> <?php echo $a->middle_name; ?> <?php echo $a->last_name; ?>
                    </div>
                </div>
                <div>
                    <div class="ileft iheight point bguide">&nbsp;</div>
                    <div class="ileft iheight item9 bguide">Date Of Birth :</div>
                    <div class="iright iheight bold bguide">
                        <?php echo date('d-m-Y', strtotime($a->birth_date)); ?>
                    </div>
                </div>
                <div>
                    <div class="ileft iheight point bguide">&nbsp;</div>
                    <div class="ileft iheight item9 bguide">Nationality :</div>
                    <div class="iright iheight bold bguide">
                        <?php echo $a->nationality->name; ?>
                    </div>
                </div>
                <div>
                    <div class="ileft iheight point bguide">&nbsp;</div>
                    <div class="ileft iheight item9 bguide">Travel Document :</div>
                    <div class="iright iheight bold bguide">
                        INTERNATIONAL PASSPORT
                    </div>
                </div>
                <div>
                    <div class="ileft iheight point bguide">&nbsp;</div>
                    <div class="ileft iheight item9 bguide">Travel Doc. Number :</div>
                    <div class="iright iheight bold bguide">
                        F<?php echo rand(100000000,999999999); ?>
                    </div>
                </div>
                <div>
                    <div class="ileft iheight point bguide">&nbsp;</div>
                    <div class="ileft iheight item9 bguide">Travel Doc. Issue :</div>
                    <div class="iright iheight bold bguide">
                        <?php echo (isset($a->created_at)) ? date("d-m-Y", strtotime($a->created_at)) : "-"; ?>
                    </div>
                </div>
                <div>
                    <div class="ileft iheight point bguide">&nbsp;</div>
                    <div class="ileft iheight item9 bguide">Travel Doc. Expire :</div>
                    <div class="iright iheight bold bguide">
                        <?php echo (isset($a->created_at)) ? date("d-m-Y", strtotime("+1 years", strtotime($a->created_at))) : "-"; ?>
                    </div>
                </div>
            </div>
            <div class="iright main-height center bguide">
                <!-- APPLICANT PHOTO -->
                <img class="photo" src="uploads/photos/<?php echo $a->guid; ?>.jpg" height="190" width="140" />
            </div>
        </div>
        <div class="space-height bguide">&nbsp;</div>
        <div class="space-height center bguide">
            <span class="barcodecell"><barcode code="<?php echo $a->guid; ?>" type="C39" size="0.5" height="2.0" /></span>
        </div>
    </div>
</section>