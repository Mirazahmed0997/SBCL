<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="card-title">নিয়োগ বিজ্ঞপ্তি তালিকা</h3>
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
                                        <th class="align-middle text-center">ঠিকানা</th>
                                        <th class="align-middle text-center">পদবী</th>
                                        <th class="align-middle text-center">প্রকাশের তারিখ</th>
                                        <th class="align-middle text-center">শেষ তারিখ</th>
                                        <th class="align-middle text-center">তারিখ</th>
                                        <th class="align-middle text-center">নিয়োগ কমিটি</th>
                                        <th class="align-middle text-center">Status</th>
                                        <th class="align-middle text-center" width="200px">Action</th>
                                    </tr>
                                </thead>
                                <?php if(!empty($rec_list)) { 
                                    $count=0;
                                    foreach($rec_list as $value){
                                        $count++;
                                    
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td class="align-middle text-center"><?php echo $count; ?></td>
                                            <td class="align-middle text-center"><?php echo $value->rec_job_title; ?></td>
                                            <td class="align-middle text-center"><?php echo $value->rec_job_location; ?></td>
                                            <td class="align-middle text-center"><?php
                                                $where_data['d_id'] = $value->rec_designation;
                                                $where_data['d_status'] = 1;
                                                $designation = $this->Common->get_data_multi_conditional('designation', $where_data)->row();
                                            echo $designation->d_name; ?></td>
                                            <td class="align-middle text-center"><?php echo $value->rec_publish_date; ?></td>
                                            <td class="align-middle text-center"><?php echo $value->rec_last_date; ?></td>
                                            <td class="align-middle text-center"><?php echo $value->rec_created_at; ?></td>
                                            <td class="align-middle text-center"><?php
                                                $where_data_rc['rc_id'] = $value->rec_rc_id;
                                                // $where_data_rc['d_status'] = 1;
                                                $rc_id = $this->Common->get_data_multi_conditional('recruitment_committee', $where_data_rc)->row();
                                            echo $rc_id->rc_title; ?></td>
                                            <td class="align-middle text-center"><?php if($value->rec_status == 1) { echo "<span class='badge badge-success'>Active</span>"; } else { echo "<span class='badge badge-danger'>Inactive</span>"; } ?></td>
                                            
                                            <td class="align-middle text-center">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <form action="<?php echo base_url(); ?>Admin/recruitment_details" method="post">
                                                            <input type="hidden" name="rec_id" value="<?php echo $value->rec_id; ?>">
                                                            <button type="submit" class="custom_btn bg-olive"><i class="fas fa-eye"></i></button>
                                                        </form>
                                                    </div>
                                                    <div class="col-3">
                                                        <form action="<?php echo base_url(); ?>Admin/recruitment_edit" method="post">
                                                            <input type="hidden" name="rec_id" value="<?php echo $value->rec_id; ?>">
                                                            <button type="submit" class="custom_btn bg-info"><i class="fas fa-edit"></i></button>
                                                        </form>
                                                    </div>
                                                    <div class="col-3">
                                                        <form action="<?php echo base_url(); ?>Admin/recruitment_inactive_active" method="post">
                                                            <input type="hidden" name="rec_id" value="<?php echo $value->rec_id; ?>">
                                                            <?php if($value->rec_status == 1){ ?> 
                                                            <input type="hidden" name="rec_status" value="2">
                                                            <button type="submit" class="custom_btn bg-danger">Inactive</button>
                                                            <?php } ?>
                                                            <?php if($value->rec_status == 2){ ?> 
                                                            <input type="hidden" name="rec_status" value="1">
                                                            <button type="submit" class="custom_btn bg-primary">Active</button>
                                                            <?php } ?>
                                                        </form>
                                                    </div>
                                                    <div class="col-3">
                                                        <form action="<?php echo base_url(); ?>Admin/recruitment_delete" method="post">
                                                            <input type="hidden" name="rec_id" value="<?php echo $value->rec_id; ?>">
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