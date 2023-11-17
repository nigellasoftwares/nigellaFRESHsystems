<section class="what-we-do-section pb-100">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12 col-md-12">
                <div class="we-do-content-area">
                    <span>e-Bfbms</span>
                    <h3>Medical Center List</h3>
                    
                    <table class="table table-responsive">
                        <thead>
                            <tr style="background-color: #ff8b00; color: #fff;">
                                <td width="5%" class="text-center">SL.</td>
                                <td>Photo</td>
                                <td width="20%">Agency Name</td>
                                <td width="8%" class="text-center">Reg. Code</td>
                                <td>Address</td>
                                <td width="25%">Owner</td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $i = 0;
                            foreach($medical as $m){
                                $i++;
                        ?>
                            
                            <tr>
                                <td class="text-center"><?php echo $i; ?></td>
                                <td><img src="vendor/ebfbms/img/medical/medical_<?php echo $m->id; ?>.jpg" style="border: 1px solid #ccc;"></td>
                                <td><strong><?php echo $m->name; ?></strong></td>
                                <td class="text-center" style="color: #ff8b00;"><?php echo $m->code; ?></td>
                                <td><?php echo $m->address; ?></td>
                                <td><?php echo $m->owner; ?><br />
                                    <span style="color: #ff8b00; font-size: smaller;">Tel. :</span> <?php echo $m->tel; ?>
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