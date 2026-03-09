<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="card-title">আবেদন বাতিলকৃত তালিকা</h3>
                        </div>
                    </div>
                    
                </div>
                <div class="card-body">
                    <div class="row">
                            <div class="col-12">
                                <?php echo $this->session->flashdata('success') ?>
                            </div>
                        <div class="col-12">
                            
							<div id="search_div">
								<form action="<?php echo base_url('Admin/reject_applicant_list') ?>"
									  method="post">
									<div class="row">
										<div class="col-3">
											<input type="text" name="r_candidate_id" class="form-control form-control-default" value=""
												   id="r_candidate_id"

												   placeholder="আইডি নম্বর">
										</div>
										<div class="col-3">
											<input type="text" name="r_nid" class="form-control form-control-default" value=""
												   id="r_nid"

												   placeholder="জাতীয় পরিচয়পত্র">
										</div>
										<div class="col-3">
											<input type="text" name="r_primary_mobile" class="form-control form-control-default" value=""
												   id="r_primary_mobile" placeholder="মোবাইল/ফোন">
										</div>
										<div class="col-3">
											<input type="text" name="r_post" class="form-control form-control-default" value=""
												   id="r_post" placeholder="পোস্ট">
										</div>

									</div>
									<div class="row" style="margin-top:5px;">
										<div class="col-3">
											<input type="text" name="r_upazila" class="form-control form-control-default" value=""
												   id="r_upazila" placeholder="উপজেলা">
										</div>
										<div class="col-3">
											<input type="text" name="r_district" class="form-control form-control-default" value=""
												   id="r_district" placeholder="জেলা">
										</div>
										<div class="col-3">
											<input type="text" name="r_division" class="form-control form-control-default" value=""
												   id="r_division" placeholder="বিভাগ">
										</div>


										<div class="col-3">
											<button type="submit" class="btn bg-info" name="" value="" id="">search
											</button>
										</div>
									</div>
								</form>
							</div>
                        </div>
                        <div class="col-12">
							<?php echo "<br>"; ?>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="align-middle text-center">#</th>
                                        <th class="align-middle text-center">আইডি নম্বর</th>
                                        <th class="align-middle text-center">আবেদনকারী নাম</th>
                                        <th class="align-middle text-center">শিরোনাম</th>
                                        <th class="align-middle text-center">পদবী</th>
                                        <th class="align-middle text-center">আবেদনের তারিখ</th>
                                        <th class="align-middle text-center" width="180px">Action</th>
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
                                                    <div class="col-6">
                                                        <form action="<?php echo base_url(); ?>Admin/applicant_details" method="post">
                                                            <input type="hidden" name="ap_id" value="<?php echo $value->ap_id; ?>">
                                                            <input type="hidden" name="ap_status" value="2">
                                                            <button type="submit" class="custom_btn bg-olive"><i class="fas fa-eye"></i></button>
                                                        </form>
                                                    </div>
                                                    <div class="col-6">
                                                        <form action="<?php echo base_url(); ?>Admin/applicant_inactive_active" method="post">
                                                            <input type="hidden" name="ap_id" value="<?php echo $value->ap_id; ?>">
                                                            <input type="hidden" name="ap_status" value="1">
                                                            <button type="submit" class="custom_btn bg-info">Approve</button>
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