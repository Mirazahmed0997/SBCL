<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h3 class="card-title">Edit সহ-সভাপতি</h3>
                        </div>
                    </div>
                    
                </div>
                <div class="card-body">
                    <?php echo form_open_multipart('Admin/secretary_list_update', 'role="form" id="fromvalid"'); ?>
                        <input type="hidden" name="id" value="<?php echo $secretary_list->id; ?>">
                    <div class="row">
                            <div class="col-12">
                                <?php echo $this->session->flashdata('success') ?>
                            </div>
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">সহ-সভাপতি তথ্য</div>
                                <div class="panel-body">
                                    <p class="help-block form_error" style="font-size:11px;"><?php echo validation_errors("", "<br/>"); ?></p>
                                    <div class="form-group">
                                        <label>কমিটির অবস্থান *</label>
                                        <input name="commitee" value="<?php if(!empty($secretary_list)) { echo $secretary_list->commitee; } ?>" class="form-control input-sm" type="text" placeholder="Enter full commitee in block later" data-bv-notempty="true"/>
                                        <p class="help-block"></p>
                                    </div>
                                    <div class="form-group">
                                        <label>নাম*</label>
                                        <input name="name" value="<?php if(!empty($secretary_list)) { echo $secretary_list->title; } ?>" class="form-control input-sm" type="text" placeholder="Enter full name in block later" data-bv-notempty="true"/>
                                        <p class="help-block"></p>
                                    </div>
                                    <div class="form-group <?php if (form_error('photo')) echo "has-error";?>">
                                        <label for="photo">ছবি<span class="required"></span></label>
                                        <input type="file"  onchange="preview_image(event)" name="filename" id="attachment">
                                        <p class="help-block" style="border:none;">Upload photo | Format jpg, png, gif</p>
                                        <?php if (form_error('logo')) echo '<p class="help-block">' . form_error('photo') . '</p>'; ?>
                                    </div>
                                    <div class="form-group">
                                        
                                    <img id="output_image" <?php if (!empty($secretary_list->image)){?> src="<?php echo base_url('assets/uploads/photos/'.$secretary_list->image); ?>" <?php } ?> width="200" height="200">
                                    <?php if (!empty($secretary_list->image)){?>
                                        <input type="hidden" value="<?= $secretary_list->image ?>" name="secretary_img">
                                    <?php } ?>
                                    
                                    </div>
                                    <div class="form-group">
                                        <label>ব্যবস্থাপনা কমিটির ধরন *</label>
                                        <input name="type" value="<?php if(!empty($secretary_list)) { echo $secretary_list->type; } ?>" class="form-control input-sm" type="text" placeholder="Enter full type in block later" data-bv-notempty="true"/>
                                        <p class="help-block"></p>
                                    </div>
                                    <div class="form-group">
                                        <label>কার্যকাল*</label>
                                        <input name="time" value="<?php if(!empty($secretary_list)) { echo $secretary_list->time; } ?>" class="form-control input-sm" type="text" placeholder="Enter time in block later" data-bv-notempty="true"/>
                                        <p class="help-block"></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- /.col-lg-6 (nested) -->
                        <div class="col-lg-12">
                            <p style="border-top:1px solid #ccc;"></p>
                            <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-plus-sign"></i> Update সহ-সভাপতি</button>
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
<script>
	function preview_image(event) {
		var reader = new FileReader();
		reader.onload = function () {
			var output = document.getElementById('output_image');
			output.src = reader.result;
		}
		reader.readAsDataURL(event.target.files[0]);
	}
</script>