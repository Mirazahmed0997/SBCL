<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h3 class="card-title">Edit Notice</h3>
                        </div>
                    </div>
                    
                </div>
                <div class="card-body">
                    <script src="<?php echo base_url();?>assets/backend/plugins/ckeditor/ckeditor.js"></script>
                    <?php echo form_open_multipart('Admin/notice_board_update', 'role="form" id="fromvalid"'); ?>
                        <input type="hidden" name="id" value="<?php echo $notice_board->id; ?>">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">Notice Information</div>
                                <div class="panel-body">
                                    <p class="help-block form_error" style="font-size:11px;"><?php echo validation_errors("", "<br/>"); ?></p>
                                    <div class="form-group">
                                        <label id="title">Notice Title*</label>
                                        <input type="text" name="title" value="<?php echo set_value('title',$notice_board->title);?>" id="title" class="form-control input-sm" type="text" placeholder="Enter Title" data-bv-notempty="true">
                                    </div>
                                    <div class="form-group">
                                        <label id="publish_date">Publish Date*</label>
                                        <input type="date" name="publish_date" value="<?php echo date('Y-m-d',strtotime($notice_board->publish_date)) ?>" id="publish_date" class="form-control input-sm" data-bv-notempty="true">
                                    </div>
                                    <div class="form-group">
                                        <label id="title">Notice Description*</label>
                                        <textarea name="pageditor" class="form-control" id="pageditor"><?php echo set_value('pageditor',$notice_board->description);?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="attachment">Attachment</label>
                                        <?php if(!empty($notice_board->filename)):?>
                                            <span class="label label-primary">
                                                <?php echo set_value('filename',$notice_board->filename); ?>
                                            </span>
                                            <input type="hidden" name="old_file" value="<?php echo set_value('filename',$notice_board->filename); ?>">
                                        <?php endif;?>
                                        <input type="file" name="filename" id="attachment">
                                        <p class="help-block" style="border:none;">Upload Attachments| Format pdf| jpg| jpeg| png |
                                            Max. Size 300 KB</p>
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