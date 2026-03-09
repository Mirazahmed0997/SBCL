<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h3 class="card-title">Add New প্রধান নির্বাহী কর্মকর্তা</h3>
                        </div>
                    </div>
                    
                </div>
                <div class="card-body">
                    <?php echo form_open_multipart('Admin/ceo_list_store', 'role="form" id="fromvalid"'); ?>
                    <div class="row">
                        <div class="col-12">
                            <?php echo $this->session->flashdata('success'); ?>
                        </div>
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">প্রধান নির্বাহী কর্মকর্তা তথ্য</div>
                                <div class="panel-body">
                                    <p class="help-block form_error" style="font-size:11px;"><?php echo validation_errors("", "<br/>"); ?></p>
                                    <div class="form-group">
                                        <label> অবস্থান *</label>
                                        <input name="commitee" value="<?php echo set_value("commitee"); ?>" class="form-control input-sm" type="text" placeholder="Enter full commitee in block later" data-bv-notempty="true"/>
                                        <p class="help-block"></p>
                                    </div>
                                    <div class="form-group">
                                        <label>নাম*</label>
                                        <input name="name" value="<?php echo set_value("name"); ?>" class="form-control input-sm" type="text" placeholder="Enter full name in block later" data-bv-notempty="true"/>
                                        <p class="help-block"></p>
                                    </div>
                                    <div class="form-group">
                                        <label>প্রধান নির্বাহী কর্মকর্তার ধরন *</label>
                                        <input name="type" value="<?php echo set_value("type"); ?>" class="form-control input-sm" type="text" placeholder="Enter full type in block later" data-bv-notempty="true"/>
                                        <p class="help-block"></p>
                                    </div>
                                    <div class="form-group">
                                        <label>কার্যকাল*</label>
                                        <input name="time" value="<?php echo set_value("time"); ?>" class="form-control input-sm" type="text" placeholder="Enter time in block later" data-bv-notempty="true"/>
                                        <p class="help-block"></p>
                                    </div>
                                    <div class="form-group <?php if (form_error('photo')) echo "has-error";?>">
                                        <label for="photo">ছবি<span class="required"></span></label>
                                        <input type="file"  onchange="preview_image(event)" name="filename" id="attachment">
                                        <p class="help-block" style="border:none;">Upload photo | Format jpg, png, gif</p>
                                        <?php if (form_error('logo')) echo '<p class="help-block">' . form_error('photo') . '</p>'; ?>
                                    </div>
                                    <div class="form-group">
                                            <img id="output_image" width="200" height="200">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">প্রধান নির্বাহী কর্মকর্তা Description*</div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <textarea name="pageditor" class="form-control" id="pageditor"></textarea>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- /.col-lg-6 (nested) -->
                        <div class="col-lg-12">
                            <p style="border-top:1px solid #ccc;"></p>
                            <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-plus-sign"></i> Add প্রধান নির্বাহী কর্মকর্তা</button>
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