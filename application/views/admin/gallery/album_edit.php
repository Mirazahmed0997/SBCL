<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h3 class="card-title">Edit Album</h3>
                        </div>
                    </div>
                    
                </div>
                <div class="card-body">
                    <?php echo form_open_multipart('Admin/album_update', 'role="form" id="fromvalid"'); ?>
                        <input type="hidden" name="album_id" value="<?php if(!empty($result)) { echo $result->gallery_album_id; } ?>">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">Gallery Album</div>
                                <div class="panel-body">
                                    <p class="help-block form_error" style="font-size:11px;"><?php echo validation_errors("", "<br/>"); ?></p>
                                    <div class="form-group">
                                        <label id="title">Album Title*</label>
                                        <input type="text" name="gallery_album_title" id="gallery_album_title" class="form-control input-sm" value="<?php if(!empty($result)) { echo $result->gallery_album_title; } ?>" placeholder="Enter Title" data-bv-notempty="true">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group <?php if (form_error('photo')) echo "has-error";?>">
                                <label for="photo">Photo<span class="required"></span></label>
                                <input type="file"  onchange="preview_image(event)" name="filename" id="attachment">
                                <p class="help-block" style="border:none;">Upload photo | Format jpg, png, gif</p>
                                <?php if (form_error('logo')) echo '<p class="help-block">' . form_error('photo') . '</p>'; ?>
                            </div>
                            <div class="form-group">
                                
                                    <img id="output_image" src="<?php echo base_url(); ?>assets/uploads/gallery/<?php echo $result->gallery_album_photo; ?>" width="200" height="200">
                                    <input type="hidden" name="g_album_photo" value="<?php echo $result->gallery_album_photo; ?>">
                            
                            </div>

                        </div>
                        <!-- /.col-lg-6 (nested) -->
                        <div class="col-lg-12">
                            <p style="border-top:1px solid #ccc;"></p>
                            <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-plus-sign"></i> Update Album</button>
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