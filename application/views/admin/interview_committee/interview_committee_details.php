<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="card-title">বিস্তারিত সাক্ষাৎকার কমিটি</h3>
                        </div>
                    </div>
                    
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <h3>শিরোনামঃ <?php if(!empty($interview_committee)) { echo $interview_committee->ic_title; } ?></h3>
                            <p>বিস্তারিতঃ <?php if(!empty($interview_committee)) { echo $interview_committee->ic_details; } ?></p>
                        </div>
                        <div class="col-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="align-middle text-center">#</th>
                                        <th class="align-middle text-center">নাম </th>
                                        <th class="align-middle text-center">পদবী</th>
                                        <th class="align-middle text-center">মোবাইল</th>
                                        <th class="align-middle text-center">তারিখ</th>
                                    </tr>
                                </thead>
                                <?php if(!empty($icd_list)) { 
                                    $count=0;
                                    foreach($icd_list as $value){
                                        $count++;
                                    
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td class="align-middle text-center"><?php echo $count; ?></td>
                                            <td class="align-middle text-center"><?php echo $value->icd_name; ?></td>
                                            <td class="align-middle text-center"><?php echo $value->icd_designation; ?></td>
                                            <td class="align-middle text-center"><?php echo $value->icd_mobile; ?></td>
                                            <td class="align-middle text-center"><?php echo $value->icd_created_at; ?></td>
                                            
                                        </tr>
                                    </tbody>
                                <?php } } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>