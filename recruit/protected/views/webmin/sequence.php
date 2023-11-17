<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Sequence</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><?php echo Helpers::describeRole($user->role_id); ?></li>
                    <li class="breadcrumb-item active">Sequence</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"><span class="label label-primary"><?php echo $user->profile->company->name; ?></span></h4>
            <h4 class="card-title">Sequence</h4>
            
            <div class="table-responsive m-t-40">
                <table id="table-application-sequence" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th rowspan="2">#</th>
                            <th rowspan="2">Name</th>
                            <th rowspan="2">Code</th>
                            <th rowspan="2">Increment</th>
                            <th colspan="2" class="text-center">Letter</th>
                            <th colspan="2" class="text-center">Number</th>
                            <th colspan="5" class="text-center">Current Letter</th>
                            <th rowspan="2">Cur<br />Num</th>
                            <th rowspan="2">Cycle</th>
                        </tr>
                        <tr>
                            <th>Min</th>
                            <th>Max</th>
                            <th>Min</th>
                            <th>Max</th>
                            <th>1</th>
                            <th>2</th>
                            <th>3</th>
                            <th>4</th>
                            <th>5</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $i = 0;
                        foreach($sequence as $s){
                            $i++;
                    ?>
                        <tr>
                            <td class="text-center"><?php echo $i; ?></td>
                            <td><?php echo $s->name; ?></td>
                            <td class="text-center"><?php echo $s->code; ?></td>
                            <td class="text-center"><?php echo $s->increment; ?></td>
                            <td class="text-center"><?php echo $s->min_letter; ?></td>
                            <td class="text-center"><?php echo $s->max_letter; ?></td>
                            <td class="text-center"><?php echo $s->min_number; ?></td>
                            <td class="text-center"><?php echo $s->max_number; ?></td>
                            <td class="text-center"><?php echo $s->cur_letter1; ?></td>
                            <td class="text-center"><?php echo $s->cur_letter2; ?></td>
                            <td class="text-center"><?php echo $s->cur_letter3; ?></td>
                            <td class="text-center"><?php echo $s->cur_letter4; ?></td>
                            <td class="text-center"><?php echo $s->cur_letter5; ?></td>
                            <td class="text-center"><?php echo $s->cur_number; ?></td>
                            <td class="text-center"><?php echo $s->cycle; ?></td>
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

<?php
    Yii::app()->clientScript->registerScriptFile("vendor/elite/assets/node_modules/datatables/jquery.dataTables.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/imandor/js/webmin/sequence.js", CClientScript::POS_END);