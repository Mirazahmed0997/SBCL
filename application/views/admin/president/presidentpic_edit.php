<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h3 class="card-title">Edit সভাপতির ছবি</h3>
                        </div>
                    </div>
                    
                </div>
                <div class="card-body">
                    <?php echo form_open_multipart('Admin/presidentpic_update', 'role="form" id="fromvalid"'); ?>
                        <input type="hidden" name="id" value="<?php echo $presidentpic->id; ?>">
                    <div class="row">
                            <div class="col-12">
                                <?php echo $this->session->flashdata('success') ?>
                            </div>
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">সভাপতির ছবি তথ্য</div>
                                <div class="panel-body">
                                    <p class="help-block form_error" style="font-size:11px;"><?php echo validation_errors("", "<br/>"); ?></p>
                                    <div class="form-group">
                                        <label>নাম*</label>
                                        <input name="name" value="<?php if(!empty($presidentpic)) { echo $presidentpic->title; } ?>" class="form-control input-sm" type="text" placeholder="Enter full name in block later" data-bv-notempty="true"/>
                                        <p class="help-block"></p>
                                    </div>
                                    <div class="form-group">
                                        <label>সময়কাল*</label>
                                        <input name="time" value="<?php if(!empty($presidentpic)) { echo $presidentpic->time; } ?>" class="form-control input-sm" type="text" placeholder="Enter time in block later" data-bv-notempty="true"/>
                                        <p class="help-block"></p>
                                    </div>
                                    <div class="form-group <?php if (form_error('photo')) echo "has-error";?>">
                                        <label for="photo">ছবি<span class="required"></span></label>
                                        <input type="file"  onchange="preview_image(event)" name="filename" id="attachment">
                                        <p class="help-block" style="border:none;">Upload photo | Format jpg, png, gif</p>
                                        <?php if (form_error('logo')) echo '<p class="help-block">' . form_error('photo') . '</p>'; ?>
                                    </div>
                                    <div class="form-group">
                                        
                                    <img id="output_image" <?php if (!empty($presidentpic->image)){?> src="<?php echo base_url('assets/uploads/photos/'.$presidentpic->image); ?>" <?php } ?> width="200" height="200">
                                    <?php if (!empty($presidentpic->image)){?>
                                        <input type="hidden" value="<?= $presidentpic->image ?>" name="presidentpic_img">
                                    <?php } ?>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- /.col-lg-6 (nested) -->
                        <div class="col-lg-12">
                            <p style="border-top:1px solid #ccc;"></p>
                            <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-plus-sign"></i> Update সভাপতির ছবি</button>
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