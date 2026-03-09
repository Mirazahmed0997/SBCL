<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8">
                            <h3 class="card-title">মূল্যায়নকৃত তালিকা</h3>
                        </div>
                        <!-- <div class="col-4">
                            <form action="<?php echo base_url(); ?>Admin/interview_schedule_list" method="post">
                                <div class="input-group mb-3">
                                    <input type="date" id="date_1" class="form-control rounded-2" name="date_1">
                                    <span class="input-group-append">
                                        <button type="submit" id="date_1" class="btn btn-info btn-flat">search</button>
                                    </span>
                                </div>
                            </form>
                        </div> -->
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
                                        <th class="align-middle text-center">আইডি নম্বর</th>
                                        <th class="align-middle text-center">আবেদনকারী নাম</th>
                                        <th class="align-middle text-center">পদবী</th>
                                        <th class="align-middle text-center">মোট মূল্যায়নকৃত নম্বর</th>
                                        <th class="align-middle text-center">মোট প্রাপ্ত নম্বর</th>
                                        <th class="align-middle text-center">মূল্যায়নের তারিখ</th>
                                        <th class="align-middle text-center" width="180px">Action</th>
                                    </tr>
                                </thead>
                                <?php if(!empty($evaluation_list)) { 
                                    $count=0;
                                    foreach($evaluation_list as $value){
                                        $count++;
                                    
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td class="align-middle text-center"><?php echo $count; ?></td>
                                            <td class="align-middle"><?php
                                                $where_data_rec['rec_id'] = $value->aev_rec_id;
                                                $where_data_rec['rec_status'] = 1;
                                                $job_name = $this->Common->get_data_multi_conditional('recruitment', $where_data_rec)->row();
                                            echo $job_name->rec_job_title; ?></td>
                                            <td class="align-middle"><?php
                                                $where_data_reg['r_candidate_id'] = $value->aev_r_candidate_id;
                                                $where_data_reg['r_status'] = 1;
                                                $emp_name = $this->Common->get_data_multi_conditional('register', $where_data_reg)->row();
                                            echo $emp_name->r_candidate_id; ?></td>
                                            <td class="align-middle"><?php
                                                echo $emp_name->r_first_name.' '.$emp_name->r_last_name; ?></td>
                                            <td class="align-middle text-center"><?php
                                                $where_data['d_id'] = $value->aev_designation;
                                                $where_data['d_status'] = 1;
                                                $designation = $this->Common->get_data_multi_conditional('designation', $where_data)->row();
                                            echo $designation->d_name; ?></td>
                                            <td class="align-middle text-center"><?php echo $value->aev_total_marks; ?></td>
                                            <td class="align-middle text-center"><?php echo $value->aev_total_rcv_marks; ?></td>
                                            <td class="align-middle text-center"><?php echo $value->aev_created_at; ?></td>
                                            
                                            <td class="align-middle text-center">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <form action="<?php echo base_url(); ?>Admin/evaluation_approve_reject" method="post">
                                                            <input type="hidden" name="aev_status" value="2">
                                                            <input type="hidden" name="aev_id" value="<?php echo $value->aev_id; ?>">
                                                            <button type="submit" class="custom_btn bg-olive">Approve</button>
                                                        </form>
                                                    </div>
                                                    <div class="col-6">
                                                        <form action="<?php echo base_url(); ?>Admin/evaluation_approve_reject" method="post">
                                                            <input type="hidden" name="aev_status" value="3">
                                                            <input type="hidden" name="aev_id" value="<?php echo $value->aev_id; ?>">
                                                            <button type="submit" class="custom_btn bg-danger">Reject</button>
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