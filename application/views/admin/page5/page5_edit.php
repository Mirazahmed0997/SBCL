<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h3 class="card-title">কর্মকর্তা-কর্মচারী নিয়োগ</h3>
                        </div>
                    </div>
                    
                </div>
                <div class="card-body">
                    <?php echo form_open_multipart('Admin/page5_update', 'role="form" id="fromvalid"'); ?>
                        <input type="hidden" name="id" value="<?php echo $page5->id; ?>">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">কর্মকর্তা-কর্মচারী নিয়োগ তথ্য</div>
                                <div class="panel-body">
                                    <p class="help-block form_error" style="font-size:11px;"><?php echo validation_errors("", "<br/>"); ?></p>
                                    <div class="form-group">
                                        <label>Menu Name*</label>
                                        <input name="name" value="<?php echo set_value("name", $page5->title); ?>" class="form-control input-sm" type="text" placeholder="Enter full name in block later" data-bv-notempty="true"/>
                                        <p class="help-block"></p>
                                    </div>
                                    <div class="form-group">
                                        <label>URL*</label>
                                        <input name="url" value="<?php echo set_value("url", $page5->url); ?>" class="form-control input-sm" type="text" placeholder="Enter url in block later" data-bv-notempty="true"/>
                                        <p class="help-block"></p>
                                    </div>
                                
                                    
                                
                                </div>
                            
                                    

                            </div>
                        </div>
                    </div>

                    <!-- /.col-lg-6 (nested) -->
                    <div class="col-lg-12">
                        <p style="border-top:1px solid #ccc;"></p>
                        <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-plus-sign"></i> Update কর্মকর্তা-কর্মচারী নিয়োগ</button>
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