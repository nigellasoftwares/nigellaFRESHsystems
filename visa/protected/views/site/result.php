<div class="row m-t-40">
    <div class="col-md-12 m-b-40">
        <div class="fix-width">
            <div class="pull-right">
                <a href="index.php?r=Site/CheckStatus" class="btn btn-outline-secondary btn-rounded btn-lg custom-btn text-dark m-t-10">Back</a>
            </div>
            <div class="card-body">
                <h3 class="card-title">Visa Application</h3>
                <div class="table-responsive">
                    <table class="table color-table primary-table">
                        <thead>
                            <tr class="title-check-result">
                                <th colspan="2" class="side-check-result">&nbsp;</th>
                                <th colspan="4" class="text-center side-check-result">Deliver</th>
                                <th colspan="4" class="text-center">Return</th>
                            </tr>
                            <tr class="title-check-result">
                                <th>#</th>
                                <th class="side-check-result">Passport</th>
                                <th class="text-center">Branch</th>
                                <th class="text-center">Admin</th>
                                <th class="text-center">OSC</th>
                                <th class="text-center side-check-result">High Commission</th>
                                <th class="text-center">OSC</th>
                                <th class="text-center">Admin</th>
                                <th class="text-center">Branch</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $i = 0;
                            foreach($passportlist as $p){
                                $i++;
                                $a = Applicant::model()->findByAttributes(array(
                                    'passport_number' => $p
                                ));
                                
                                if($a){
                                    $passportscan = Passportscan::model()->findAllByAttributes(array(
                                        'applicant_id' => $a->id
                                    ));
                                    
                                    $statusscan = array(
                                        'd_branch' => '<i class="fa fa-spin fa-spinner"></i>',
                                        'd_admin' => '<i class="fa fa-spin fa-spinner"></i>',
                                        'd_osc' => '<i class="fa fa-spin fa-spinner"></i>',
                                        'd_highcomm' => '<i class="fa fa-spin fa-spinner"></i>',
                                        'r_osc' => '<i class="fa fa-spin fa-spinner"></i>',
                                        'r_admin' => '<i class="fa fa-spin fa-spinner"></i>',
                                        'r_branch' => '<i class="fa fa-spin fa-spinner"></i>'
                                    );

                                    foreach($passportscan as $pr){
                                        if($pr->status_id == 1){
                                            $statusscan['d_branch'] = '<i class="fa fa-check fa-2x text-success"></i><br /><span class="label label-info">'.date('d M Y', strtotime($pr->scanned_date)).'</span>';
                                        }
                                        if($pr->status_id == 2 || $pr->status_id == 3){
                                            $statusscan['d_admin'] = '<i class="fa fa-check fa-2x text-success"></i><br /><span class="label label-info">'.date('d M Y', strtotime($pr->scanned_date)).'</span>';
                                        }
                                        if($pr->status_id == 5 || $pr->status_id == 6 || $pr->status_id == 7){
                                            $statusscan['d_osc'] = '<i class="fa fa-check fa-2x text-success"></i><br /><span class="label label-info">'.date('d M Y', strtotime($pr->scanned_date)).'</span>';
                                        }
                                        if($pr->status_id == 8 || $pr->status_id == 9 || $pr->status_id == 10 || $pr->status_id == 11 || $pr->status_id == 12){
                                            $statusscan['d_highcomm'] = '<i class="fa fa-check fa-2x text-success"></i><br /><span class="label label-info">'.date('d M Y', strtotime($pr->scanned_date)).'</span>';
                                        }
                                        if($pr->status_id == 13 || $pr->status_id == 14){
                                            $statusscan['r_osc'] = '<i class="fa fa-check fa-2x text-success"></i><br /><span class="label label-info">'.date('d M Y', strtotime($pr->scanned_date)).'</span>';
                                        }
                                        if($pr->status_id == 15 || $pr->status_id == 16){
                                            $statusscan['r_admin'] = '<i class="fa fa-check fa-2x text-success"></i><br /><span class="label label-info">'.date('d M Y', strtotime($pr->scanned_date)).'</span>';
                                        }
                                        if($pr->status_id == 17 || $pr->status_id == 18){
                                            $statusscan['r_branch'] = '<i class="fa fa-check fa-2x text-success"></i><br /><span class="label label-info">'.date('d M Y', strtotime($pr->scanned_date)).'</span>';
                                        }
                                    }
                        ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td class="side-check-result"><?php echo $p; ?></td>
                                <td class="text-center">
                                    <?php echo $statusscan['d_branch']; ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $statusscan['d_admin']; ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $statusscan['d_osc']; ?>
                                </td>
                                <td class="text-center side-check-result">
                                    <?php echo $statusscan['d_highcomm']; ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $statusscan['r_osc']; ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $statusscan['r_admin']; ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $statusscan['r_branch']; ?>
                                </td>
                            </tr>
                        <?php            
                                } else {
                        ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $p; ?></td>
                                <td colspan="7">NO INFORMATION FOUND</td>
                            </tr>
                        <?php        
                                }
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        
    </div>
</div>    