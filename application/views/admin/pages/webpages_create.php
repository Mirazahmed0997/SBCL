<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h3 class="card-title">Add New Page</h3>
                        </div>
                    </div>
                    
                </div>
                <div class="card-body">
                    <script src="<?php echo base_url(); ?>assets/backend/plugins/ckeditor/ckeditor.js"></script>
                    <?php echo form_open('Admin/webpages_store', 'role="form" id="fromvalid"'); ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading"> Information</div>
                                <div class="panel-body">
                                    <p class="help-block form_error" style="font-size:11px;"><?php echo validation_errors("", "<br/>"); ?></p>
                                    <div class="form-group">
                                        <label id="title">Page Title*</label>
                                        <input type="text" name="title" id="title" class="form-control input-sm" type="text" placeholder="Enter Title" data-bv-notempty="true">
                                    </div>
                                    <!-- <div class="form-group">
                                        <label id="url">Page URL*</label>
                                        <input type="text" name="uri" id="uri" class="form-control input-sm" type="text" placeholder="Enter Valid Url" data-bv-notempty="true">
                                    </div>
                                    <div class="form-group">
                                        <label id="url">Type*</label>
                                        <input type="text" name="type" id="type" class="form-control input-sm" type="text" placeholder="Enter Type" data-bv-notempty="true">
                                    </div> -->
                                    <div class="form-group">
                                        <label id="url">Parent*</label>
                                        <select name="parent" id='parent' class="form-control input-sm">
                                            <option value="-1">No Parent</option>
                                            <?php $pRes = listPage();
                                            foreach ($pRes as $pR): ?>
                                                <option value="<?php echo $pR->id ?>"><?php echo $pR->title; ?></option>
                                            <?php endforeach; ?>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label id="title">Page content*</label>
                                        <textarea name="pageditor" class="form-control" id="pageditor"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label id="url">Keyword</label>
                                        <input type="text" name="keyword" id="keyword" class="form-control input-sm" type="text" placeholder="Enter Keyword">
                                    </div>
                                    <div class="form-group">
                                        <label id="url">Meta Description</label>
                                        <input type="text" name="metadesc" id="metadesc" class="form-control input-sm" type="text" placeholder="Enter Meta Description">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- /.col-lg-6 (nested) -->
                        <div class="col-lg-12">
                            <p style="border-top:1px solid #ccc;"></p>
                            <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-plus-sign"></i> Save</button>
                            <button type="reset" class="btn btn-danger"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                        </div>
                    </div>
                    <!-- /.row (nested) -->
                    </form>

                    <script>
                        CKEDITOR.replace('pageditor',
                                {
                                    filebrowserImageUploadUrl: '<?php echo base_url(); ?>content/files/upload.php?type=Images'
                                });
                    </script>
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