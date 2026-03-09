<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="card-title">নিয়োগ বিজ্ঞপ্তি পরিবর্তন</h3>
                        </div>
                    </div>
                </div>
                <form action="<?php echo base_url('') ?>Admin/recruitment_update"
                        method="post">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <?php echo $this->session->flashdata('success') ?>
                            </div>
                            <div class="col-md-6">
                                <label>শিরোনাম</label>
                                <span class="text-danger">*</span>
                                <input type="text" class="form-control" value="<?php if(!empty($recruitment)) { echo $recruitment->rec_job_title; } ?>" name="job_title"
                                        placeholder="শিরোনাম" data-validation="length"
                                        data-validation-length="min2">
                            </div>
                            <div class="col-md-6">
                                <label>ঠিকানা</label>
                                <span class="text-danger">*</span>
                                <input type="text" class="form-control" value="<?php if(!empty($recruitment)) { echo $recruitment->rec_job_location; } ?>" name="job_location"
                                        placeholder="ঠিকানা" data-validation="length"
                                        data-validation-length="min2">
                            </div>
                            <div class="col-md-3">
                                <label>প্রকাশের তারিখ</label>
                                <span class="text-danger">*</span>
                                <input type="date" class="form-control" value="<?php if(!empty($recruitment)) { echo $recruitment->rec_publish_date; } ?>" name="publish_date"
                                        placeholder="প্রকাশের তারিখ" data-validation="length"
                                        data-validation-length="min2">
                            </div>
                            <div class="col-md-3">
                                <label>শেষ তারিখ</label>
                                <span class="text-danger">*</span>
                                <input type="date" class="form-control" value="<?php echo $recruitment->rec_last_date; ?>" name="last_date"
                                        placeholder="শেষ তারিখ" data-validation="length"
                                        data-validation-length="min2">
                            </div>
                            <div class="col-md-3">
                                <label>পদবী</label>
                                <span class="text-danger">*</span>
                                <select name="designation" class="form-control" required>
                                    <option value="">--- Select ---</option>
                                    
                                    <?php if(!empty($d_list)) {
                                        foreach($d_list as $value) {
                                    ?>
                                    <option value="<?php echo $value->d_id; ?>" <?php if(!empty($recruitment)) { if($value->d_id == $recruitment->rec_designation) { echo "selected"; } } ?>><?php echo $value->d_name; ?></option>

                                    <?php } } ?>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label>নিয়োগ কমিটি</label>
                                <span class="text-danger">*</span>
                                <select name="rc_id" class="form-control" required>
                                    <option value="">--- Select ---</option>
                                    
                                    <?php if(!empty($rc_list)) {
                                        foreach($rc_list as $value) {
                                    ?>
                                    <option value="<?php echo $value->rc_id; ?>" <?php if(!empty($recruitment)) { if($value->rc_id == $recruitment->rec_rc_id) { echo "selected"; } } ?>><?php echo $value->rc_title; ?></option>

                                    <?php } } ?>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label>চাকরী বিস্তারিত</label>
                                <span class="text-danger">*</span>
                                <textarea name="job_description" id="editor1" class="form-control" required><?php if(!empty($recruitment)) { echo $recruitment->rec_job_description; } ?></textarea>
                            </div>
                            <input type="hidden" name="rec_id" value="<?php echo $recruitment->rec_id; ?>">
                            
							<div class=" col-md-12">
								<div class="card-footer">
									<button type="submit" class="btn btn-block btn btn-primary">Submit</button>
								</div>
							</div>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<script src="<?php echo base_url(); ?>assets/backend/plugins/ckeditor/ckeditor.js"></script> 
<script> 
    CKEDITOR.replace( 'editor1' ); 
</script> 