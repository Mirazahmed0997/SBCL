<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h3 class="card-title">সংগঠন পরিচালনা পদ্ধতি</h3>
                        </div>
                    </div>
                    
                </div>
                <div class="card-body">
                    <?php echo form_open_multipart('Admin/page6_store', 'role="form" id="fromvalid"'); ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">সংগঠন পরিচালনা পদ্ধতি তথ্য</div>
                                <div class="panel-body">
                                    <p class="help-block form_error" style="font-size:11px;"><?php echo validation_errors("", "<br/>"); ?></p>
                                    <div class="form-group">
                                        <label>Menu Name*</label>
                                        <input name="name" value="<?php echo set_value("name"); ?>" class="form-control input-sm" type="text" placeholder="Enter full name in block later" data-bv-notempty="true"/>
                                        <p class="help-block"></p>
                                    </div>
                                    <div class="form-group">
                                        <label>URL*</label>
                                        <input name="url" value="<?php echo set_value("url"); ?>" class="form-control input-sm" type="text" placeholder="Enter url in block later" data-bv-notempty="true"/>
                                        <p class="help-block"></p>
                                    </div>
                                
                                    
                                
                                </div>
                            
                                    

                            </div>
                        </div>
                    </div>

                    <!-- /.col-lg-6 (nested) -->
                    <div class="col-lg-12">
                        <p style="border-top:1px solid #ccc;"></p>
                        <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-plus-sign"></i> Add সংগঠন পরিচালনা পদ্ধতি</button>
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