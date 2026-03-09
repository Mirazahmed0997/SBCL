<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8">
                            <h3 class="card-title">সাক্ষাৎকার সময়সূচী তালিকা</h3>
                        </div>
                        <div class="col-4">
                            <form action="<?php echo base_url(); ?>Admin/interview_schedule_list" method="post">
                                <div class="input-group mb-3">
                                    <input type="date" id="date_1" class="form-control rounded-2" name="date_1">
                                    <span class="input-group-append">
                                        <button type="submit" id="date_1" class="btn btn-info btn-flat">search</button>
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
                                        <th class="align-middle text-center">চাকরী নাম</th>
                                        <th class="align-middle text-center">সাক্ষাৎকার কমিটি</th>
                                        <th class="align-middle text-center">সাক্ষাৎকার তারিখ</th>
                                        <th class="align-middle text-center">সাক্ষাৎকার সময় শুরু</th>
                                        <th class="align-middle text-center">সাক্ষাৎকার সময় শেষ</th>
                                        <th class="align-middle text-center">সাক্ষাতের সংখ্যা</th>
                                        <th class="align-middle text-center">তারিখ</th>
                                        <th class="align-middle text-center" width="180px">Action</th>
                                    </tr>
                                </thead>
                                <?php if(!empty($schedule_list)) { 
                                    $count=0;
                                    foreach($schedule_list as $value){
                                        $count++;
                                    
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td class="align-middle text-center"><?php echo $count; ?></td>
                                            <td class="align-middle"><?php
                                                $where_data_rec['rec_id'] = $value->is_job_id;
                                                $where_data_rec['rec_status'] = 1;
                                                $job_name = $this->Common->get_data_multi_conditional('recruitment', $where_data_rec)->row();
                                            echo $job_name->rec_job_title; ?></td>
                                            <td class="align-middle"><?php
                                                $where_data_ic['ic_id'] = $value->is_job_id;
                                                $where_data_ic['ic_status'] = 1;
                                                $ic_name = $this->Common->get_data_multi_conditional('interview_committee', $where_data_ic)->row();
                                            echo $ic_name->ic_title; ?></td>
                                            <td class="align-middle text-center"><?php echo $value->is_interview_date; ?></td>
                                            <td class="align-middle text-center"><?php echo $value->is_interview_start_time; ?></td>
                                            <td class="align-middle text-center"><?php echo $value->is_interview_end_time; ?></td>
                                            <td class="align-middle text-center"><?php echo $value->is_applicant_limit; ?></td>
                                            <td class="align-middle text-center"><?php echo $value->is_created_at; ?></td>
                                            
                                            <td class="align-middle text-center">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <form action="<?php echo base_url(); ?>Admin/interview_details" method="post">
                                                            <input type="hidden" name="is_interview_date" value="<?php echo $value->is_interview_date; ?>">
                                                            <input type="hidden" name="is_interview_start_time" value="<?php echo $value->is_interview_start_time; ?>">
                                                            <input type="hidden" name="job_id" value="<?php echo $value->is_job_id; ?>">
                                                            <button type="submit" class="custom_btn bg-olive"><i class="fas fa-eye"></i></button>
                                                        </form>
                                                    </div>
                                                    <!-- <div class="col-4">
                                                        <form action="<?php echo base_url(); ?>Admin/interview_inactive_active" method="post">
                                                            <input type="hidden" name="is_id" value="<?php echo $value->is_id; ?>">
                                                            <input type="hidden" name="is_status" value="1">
                                                            <button type="submit" class="custom_btn bg-info">Approve</button>
                                                        </form>
                                                    </div> -->
                                                    <!-- <div class="col-4">
                                                        <form action="<?php echo base_url(); ?>Admin/interview_inactive_active" method="post">
                                                            <input type="hidden" name="is_id" value="<?php echo $value->is_id; ?>">
                                                            <input type="hidden" name="is_status" value="2">
                                                            <button type="submit" class="custom_btn bg-danger">Delete</button>
                                                        </form>
                                                    </div> -->
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