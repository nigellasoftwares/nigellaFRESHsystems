<section class="what-we-do-section pb-100">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12 col-md-12">
                <div class="we-do-content-area">
                    <span>e-Bfbms</span>
                    <h3>Recruiting Agency List</h3>
                    
                    <table class="table table-responsive">
                        <thead>
                            <tr style="background-color: #ff8b00; color: #fff;">
                                <td width="5%" class="text-center">SL.</td>
                                <td>Photo</td>
                                <td width="20%">Agency Name</td>
                                <td width="8%" class="text-center">RL No.</td>
                                <td>Address</td>
                                <td width="25%">Owner</td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $i = 0;
                            foreach($agency as $a){
                                $i++;
                        ?>
                            <tr>
                                <td class="text-center"><?php echo $i; ?></td>
                                <td><img src="vendor/ebfbms/img/agency/agency_<?php echo $a->id; ?>.jpg" style="border: 1px solid #ccc;"></td>
                                <td><strong><?php echo $a->name; ?></strong></td>
                                <td class="text-center" style="color: #ff8b00;"><?php echo $a->rlno; ?></td>
                                <td><?php echo $a->address; ?><br /><br />
                                    <span style="color: #ff8b00; font-size: smaller;">Tel. :</span> <?php echo $a->tel; ?>
                                </td>
                                <td><?php echo $a->owner; ?><br />
                                    <?php echo $a->position; ?><br /><br />
                                    <span style="color: #ff8b00; font-size: smaller;">Mobile :</span> <?php echo $a->mobile; ?>
                                </td>
                            </tr>
                        <?php
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>