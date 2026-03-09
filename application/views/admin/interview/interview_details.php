<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8">
                            <h3 class="card-title">সাক্ষাৎকার তালিকা</h3>
                        </div>
                        <div class="col-4">
                            <form action="<?php echo base_url(); ?>Admin/interview_details" method="post">
                                <div class="input-group mb-3">
                                    <input type="hidden" name="job_id" value="<?php if(!empty($job_id)) { echo $job_id; } ?>">
                                    <input type="hidden" name="is_interview_date" value="<?php if(!empty($is_interview_date)) { echo $is_interview_date; } ?>">
                                    <input type="hidden" name="is_interview_start_time" value="<?php if(!empty($is_interview_start_time)) { echo $is_interview_start_time; } ?>">
                                    <input type="number" id="candidate_id" class="form-control rounded-2" name="candidate_id" placeholder="আবেদনকারী নম্বর">
                                    <span class="input-group-append">
                                        <button type="submit" id="candidate_id" class="btn btn-info btn-flat">search</button>
                                    </span>
                                </div>
                            </form>
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
                                        <th class="align-middle text-center">আইডি নম্বর</th>
                                        <th class="align-middle text-center">আবেদনকারী নাম</th>
                                        <th class="align-middle text-center">শিরোনাম</th>
                                        <th class="align-middle text-center">পদবী</th>
                                        <th class="align-middle text-center">আবেদনের তারিখ</th>
                                        <th class="align-middle text-center" width="60px">Action</th>
                                    </tr>
                                </thead>
                                <?php if(!empty($applicant_list)) { 
                                    $count=0;
                                    foreach($applicant_list as $value){
                                        $count++;
                                    
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td class="align-middle text-center"><?php echo $count; ?></td>
                                            <td class="align-middle text-center"><?php echo $value->r_candidate_id; ?></td>
                                            <td class="align-middle text-center"><?php echo $value->r_first_name.' '. $value->r_last_name; ?></td>
                                            <td class="align-middle"><?php echo $value->rec_job_title; ?></td>
                                            <td class="align-middle text-center"><?php
                                                $where_data['d_id'] = $value->rec_designation;
                                                $where_data['d_status'] = 1;
                                                $designation = $this->Common->get_data_multi_conditional('designation', $where_data)->row();
                                            echo $designation->d_name; ?></td>
                                            <td class="align-middle text-center"><?php echo $value->ap_created_at; ?></td>
                                            
                                            <td class="align-middle text-center">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <form action="<?php echo base_url(); ?>Admin/evaluation" method="post">
                                                            <input type="hidden" name="ap_id" value="<?php echo $value->ap_id; ?>">
                                                            <input type="hidden" name="r_candidate_id" value="<?php echo $value->r_candidate_id; ?>">
                                                            <input type="hidden" name="ap_status" value="1">
                                                            <button type="submit" class="custom_btn bg-olive"><i class="fas fa-eye"></i></button>
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