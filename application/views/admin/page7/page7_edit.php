<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h3 class="card-title">সাংগঠনিক উৎপত্তি ও পরিচিতি</h3>
                        </div>
                    </div>
                    
                </div>
                <div class="card-body">
                    <?php echo form_open_multipart('Admin/page7_update', 'role="form" id="fromvalid"'); ?>
                    <input type="hidden" name="id" value="<?php echo $page7->id; ?>">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">সাংগঠনিক উৎপত্তি ও পরিচিতি</div>
                                <div class="panel-body">
                                    <p class="help-block form_error" style="font-size:11px;"><?php echo validation_errors("", "<br/>"); ?></p>
                                    <div class="form-group">
                                        <label>Description*</label>
                                    
                                        <textarea name="name" id="name" value="<?php echo set_value("name"); ?>" class="form-control" id="textAreaExample1" rows="4"><?php echo $page7->title; ?></textarea>
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

<script src="<?php echo base_url();?>assets/backend/plugins/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('name');

    CKEDITOR.on( 'dialogDefinition', function ( ev ) {
        var dialogName = ev.data.name;
        var dialogDefinition = ev.data.definition;
        if ( dialogName == 'table' ) {
            var info = dialogDefinition.getContents( 'info' );
            info.get( 'txtWidth' )[ 'default' ] = '100%';  
        }
    } );
	function preview_image(event) {
		var reader = new FileReader();
		reader.onload = function () {
			var output = document.getElementById('output_image');
			output.src = reader.result;
		}
		reader.readAsDataURL(event.target.files[0]);
	}
</script>