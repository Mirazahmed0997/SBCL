<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h3 class="card-title">ভিডিও</h3>
                        </div>
                    </div>
                    
                </div>
                <div class="card-body">
                    <?php echo form_open_multipart('Admin/video_update', 'role="form" id="fromvalid"'); ?>
                    <input type="hidden" name="id" value="<?php echo $video->id; ?>">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">ভিডিও তথ্য</div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label>Video Type*</label>
                                        <select name="video_type" id="video_type" onchange="setForm(this.value)" class="form-control" required>
                                            <option value="1" <?php if($video->type == 1) { echo "selected"; } ?>>Upload Video</option>
                                            <option value="2" <?php if($video->type == 2) { echo "selected"; } ?>>Youtube Video</option>
                                        </select>
                                    </div>
                                    <div id="upload_video" style="<?php if($video->type == 2) { ?>display: none <?php } ?>">
                                        <div class="form-group ">
                                            <label for="photo">Upload a VIDEO</label>
                                            <input type="file" name="filename" id="attachment">
                                            <p class="help-block" style="border:none;">Upload photo | Format MP4|WebM|OGG</p>
                                        </div>
                                    </div>
                                    <div id="youtube_video" style="<?php if($video->type == 1) { ?>display: none <?php } ?>">
                                        <div class="form-group">
                                            <label>Please Add Youtube Video Link*</label>
                                            <input name="name" value="<?php if($video->type == 2) { echo $video->title; } ?>" class="form-control input-sm" type="text" placeholder="Add Youtube Video Link" data-bv-notempty="true"/>
                                            <p class="help-block"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- /.col-lg-6 (nested) -->
                        <div class="col-lg-12">
                            <p style="border-top:1px solid #ccc;"></p>
                            <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-plus-sign"></i> Update ভিডিও</button>
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
<script type="text/javascript">
    function setForm(value) {

        if(value == '1'){
            document.getElementById('upload_video').style='display:block;';
            document.getElementById('youtube_video').style='display:none;';
        }
        else {

            document.getElementById('youtube_video').style = 'display:block;';
            document.getElementById('upload_video').style = 'display:none;';
        }

    }

</script>