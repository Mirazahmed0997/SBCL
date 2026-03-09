<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h3 class="card-title">Edit প্রধান নির্বাহী কর্মকর্তার ছবি</h3>
                        </div>
                    </div>
                    
                </div>
                <div class="card-body">
                    <?php echo form_open_multipart('Admin/joinsecretarypic_update', 'role="form" id="fromvalid"'); ?>
                        <input type="hidden" name="id" value="<?php echo $joinsecretarypic->id; ?>">
                    <div class="row">
                            <div class="col-12">
                                <?php echo $this->session->flashdata('success') ?>
                            </div>
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">প্রধান নির্বাহী কর্মকর্তার ছবি তথ্য</div>
                                <div class="panel-body">
                                    <p class="help-block form_error" style="font-size:11px;"><?php echo validation_errors("", "<br/>"); ?></p>
                                    <div class="form-group">
                                        <label>নাম*</label>
                                        <input name="name" value="<?php if(!empty($joinsecretarypic)) { echo $joinsecretarypic->title; } ?>" class="form-control input-sm" type="text" placeholder="Enter full name in block later" data-bv-notempty="true"/>
                                        <p class="help-block"></p>
                                    </div>
                                    <div class="form-group">
                                        <label>সময়কাল*</label>
                                        <input name="time" value="<?php if(!empty($joinsecretarypic)) { echo $joinsecretarypic->time; } ?>" class="form-control input-sm" type="text" placeholder="Enter time in block later" data-bv-notempty="true"/>
                                        <p class="help-block"></p>
                                    </div>
                                    <div class="form-group <?php if (form_error('photo')) echo "has-error";?>">
                                        <label for="photo">ছবি<span class="required"></span></label>
                                        <input type="file"  onchange="preview_image(event)" name="filename" id="attachment">
                                        <p class="help-block" style="border:none;">Upload photo | Format jpg, png, gif</p>
                                        <?php if (form_error('logo')) echo '<p class="help-block">' . form_error('photo') . '</p>'; ?>
                                    </div>
                                    <div class="form-group">
                                        
                                    <img id="output_image" <?php if (!empty($joinsecretarypic->image)){?> src="<?php echo base_url('assets/uploads/photos/'.$joinsecretarypic->image); ?>" <?php } ?> width="200" height="200">
                                    <?php if (!empty($joinsecretarypic->image)){?>
                                        <input type="hidden" value="<?= $joinsecretarypic->image ?>" name="joinsecretarypic_img">
                                    <?php } ?>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">প্রধান নির্বাহী কর্মকর্তা Description*</div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <textarea name="pageditor" class="form-control" id="pageditor"><?php if(!empty($joinsecretarypic)) { echo $joinsecretarypic->description; } ?></textarea>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- /.col-lg-6 (nested) -->
                        <div class="col-lg-12">
                            <p style="border-top:1px solid #ccc;"></p>
                            <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-plus-sign"></i> Update প্রধান নির্বাহী কর্মকর্তার ছবি</button>
                            <button type="reset" class="btn btn-danger"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                        </div>
                    </div>
                    <!-- /.row (nested) -->
                    </form>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<script src="<?php echo base_url(); ?>assets/backend/plugins/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('pageditor');

	function preview_image(event) {
		var reader = new FileReader();
		reader.onload = function () {
			var output = document.getElementById('output_image');
			output.src = reader.result;
		}
		reader.readAsDataURL(event.target.files[0]);
	}
</script>