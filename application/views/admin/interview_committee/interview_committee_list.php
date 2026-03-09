<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="card-title">সাক্ষাৎকার কমিটি তালিকা</h3>
                        </div>
                    </div>
                    
                </div>
                <div class="card-body">
                    <div class="row">
                            <div class="col-12">
                                <?php echo $this->session->flashdata('success') ?>
                            </div>
                        <div class="col-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="align-middle text-center">#</th>
                                        <th class="align-middle text-center">শিরোনাম</th>
                                        <th class="align-middle text-center">বিস্তারিত</th>
                                        <th class="align-middle text-center">তারিখ</th>
                                        <th class="align-middle text-center">Status</th>
                                        <th class="align-middle text-center" width="200px">Action</th>
                                    </tr>
                                </thead>
                                <?php if(!empty($ic_list)) { 
                                    $count=0;
                                    foreach($ic_list as $value){
                                        $count++;
                                    
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td class="align-middle text-center"><?php echo $count; ?></td>
                                            <td class="align-middle text-center"><?php echo $value->ic_title; ?></td>
                                            <td class="align-middle text-center"><?php echo $value->ic_details; ?></td>
                                            <td class="align-middle text-center"><?php echo $value->ic_created_at; ?></td>
                                            <td class="align-middle text-center"><?php if($value->ic_status == 1) { echo "<span class='badge badge-success'>Active</span>"; } else { echo "<span class='badge badge-danger'>Inactive</span>"; } ?></td>
                                            
                                            <td class="align-middle text-center">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <form action="<?php echo base_url(); ?>Admin/interview_committee_details" method="post">
                                                            <input type="hidden" name="icd_ic_id" value="<?php echo $value->ic_id; ?>">
                                                            <button type="submit" class="custom_btn bg-olive"><i class="fas fa-eye"></i></button>
                                                        </form>
                                                    </div>
                                                    <div class="col-3">
                                                        <form action="<?php echo base_url(); ?>Admin/interview_committee_edit" method="post">
                                                            <input type="hidden" name="icd_ic_id" value="<?php echo $value->ic_id; ?>">
                                                            <button type="submit" class="custom_btn bg-info"><i class="fas fa-edit"></i></button>
                                                        </form>
                                                    </div>
                                                    <div class="col-3">
                                                        <form action="<?php echo base_url(); ?>Admin/interview_committee_inactive_active" method="post">
                                                            <input type="hidden" name="icd_ic_id" value="<?php echo $value->ic_id; ?>">
                                                            <?php if($value->ic_status == 1){ ?> 
                                                            <input type="hidden" name="ic_status" value="2">
                                                            <button type="submit" class="custom_btn bg-danger">Inactive</button>
                                                            <?php } ?>
                                                            <?php if($value->ic_status == 2){ ?> 
                                                            <input type="hidden" name="ic_status" value="1">
                                                            <button type="submit" class="custom_btn bg-primary">Active</button>
                                                            <?php } ?>
                                                        </form>
                                                    </div>
                                                    <div class="col-3">
                                                        <form action="<?php echo base_url(); ?>Admin/interview_committee_delete" method="post">
                                                            <input type="hidden" name="icd_ic_id" value="<?php echo $value->ic_id; ?>">
                                                            <button type="submit" class="custom_btn bg-danger"><i class="fas fa-trash"></i></button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                    </tbody>
                                <?php } } ?>
                            </table>
                            <?= $this->pagination_bootstrap->render() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>