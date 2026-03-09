<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="card-title">রেজিস্টার্ড ইউজ তালিকা</h3>
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
								<form action="<?php echo base_url('Admin/registered_user_list') ?>"
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
                                        <th class="align-middle text-center">নাম</th>
                                        <th class="align-middle text-center">ঠিকানা</th>
                                        <th class="align-middle text-center">মোবাইল</th>
                                        <th class="align-middle text-center" width="120px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($user_list)) { 
                                    $count=0;
                                    foreach($user_list as $value){
                                        $count++;
                                    
                                    ?>
                                        <tr>
                                            <td class="align-middle text-center"><?php echo $count; ?></td>
                                            <td class="align-middle text-center"><?php echo $value->r_candidate_id; ?></td>
                                            <td class="align-middle text-center"><?php echo $value->r_first_name.' '. $value->r_last_name; ?></td>
                                            <td class="align-middle text-center"><?php echo $value->r_present_address; ?></td>
                                            <td class="align-middle text-center"><?php echo $value->r_primary_mobile; ?></td>
                                            <td class="align-middle text-center">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <form action="<?php echo base_url(); ?>Admin/user_edit" method="post">
                                                            <input type="hidden" name="r_id" value="<?php echo $value->r_id; ?>">
                                                            <button type="submit" class="custom_btn bg-olive"><i class="fas fa-edit"></i></button>
                                                        </form>
                                                    </div>
                                                    <div class="col-6">
                                                        <form action="<?php echo base_url(); ?>Admin/user_inactive_active" method="post">
                                                            <input type="hidden" name="id" value="<?php echo $value->r_id; ?>">
                                                            <?php if($value->r_status == 1){ ?> 
                                                            <input type="hidden" name="status" value="2">
                                                            <button type="submit" class="custom_btn bg-danger">Inactive</button>
                                                            <?php } ?>
                                                            <?php if($value->r_status == 2){ ?> 
                                                            <input type="hidden" name="status" value="1">
                                                            <button type="submit" class="custom_btn bg-primary">Active</button>
                                                            <?php } ?>
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