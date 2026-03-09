<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="card-title">নিয়োগ কমিটি তালিকা</h3>
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
                                
                                <tbody>
                                <?php if(!empty($rc_list)) { 
                                    $count=0;
                                    foreach($rc_list as $value){
                                        $count++;
                                    
                                    ?>
                                        <tr>
                                            <td class="align-middle text-center"><?php echo $count; ?></td>
                                            <td class="align-middle text-center"><?php echo $value->rc_title; ?></td>
                                            <td class="align-middle text-center"><?php echo $value->rc_details; ?></td>
                                            <td class="align-middle text-center"><?php echo $value->rc_created_at; ?></td>
                                            <td class="align-middle text-center"><?php if($value->rc_status == 1) { echo "<span class='badge badge-success'>Active</span>"; } else { echo "<span class='badge badge-danger'>Inactive</span>"; } ?></td>
                                            
                                            <td class="align-middle text-center">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <form action="<?php echo base_url(); ?>Admin/recruitment_committee_details" method="post">
                                                            <input type="hidden" name="rcd_rc_id" value="<?php echo $value->rc_id; ?>">
                                                            <button type="submit" class="custom_btn bg-olive"><i class="fas fa-eye"></i></button>
                                                        </form>
                                                    </div>
                                                    <div class="col-3">
                                                        <form action="<?php echo base_url(); ?>Admin/recruitment_committee_edit" method="post">
                                                            <input type="hidden" name="rcd_rc_id" value="<?php echo $value->rc_id; ?>">
                                                            <button type="submit" class="custom_btn bg-info"><i class="fas fa-edit"></i></button>
                                                        </form>
                                                    </div>
                                                    <div class="col-3">
                                                        <form action="<?php echo base_url(); ?>Admin/recruitment_committee_inactive_active" method="post">
                                                            <input type="hidden" name="rcd_rc_id" value="<?php echo $value->rc_id; ?>">
                                                            <?php if($value->rc_status == 1){ ?> 
                                                            <input type="hidden" name="rc_status" value="2">
                                                            <button type="submit" class="custom_btn bg-danger">Inactive</button>
                                                            <?php } ?>
                                                            <?php if($value->rc_status == 2){ ?> 
                                                            <input type="hidden" name="rc_status" value="1">
                                                            <button type="submit" class="custom_btn bg-primary">Active</button>
                                                            <?php } ?>
                                                        </form>
                                                    </div>
                                                    <div class="col-3">
                                                        <form action="<?php echo base_url(); ?>Admin/recruitment_committee_delete" method="post">
                                                            <input type="hidden" name="rcd_rc_id" value="<?php echo $value->rc_id; ?>">
                                                            <button type="submit" class="custom_btn bg-danger"><i class="fas fa-trash"></i></button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                <?php } } ?>
                                    </tbody>
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