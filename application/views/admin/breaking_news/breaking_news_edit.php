<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h3 class="card-title">Update Breaking News</h3>
                        </div>
                    </div>
                    
                </div>
                <div class="card-body">
                    <?php echo form_open('Admin/breaking_news_update', 'role="form" id="fromvalid"'); ?>
                    <input type="hidden" name="id" value="<?php echo $breaking_news->id; ?>">
                    <div class="row">
                        <?php
                        if(isset($news)){ ?>
                            <div class="alert alert-success alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <strong>Success!</strong> Breaking News Updated Successfully.
                                </div>
                        <?php }
                        ?>
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">Breaking News Information</div>
                                <div class="panel-body">
                                    <p class="help-block form_error" style="font-size:11px;"><?php echo validation_errors("", "<br/>"); ?></p>
                                    <div class="form-group">
                                        <label>Breaking News*</label>
                                        <input name="news" value="<?php echo set_value("name",$breaking_news->news); ?>" class="form-control input-sm" type="text" placeholder="Enter Breaking news" data-bv-notempty="true"/>
                                        <p class="help-block"></p>
                                    </div>
                                    <div class="form-group">
                                        <textarea name="pageditor" class="form-control" id="pageditor"><?php if(!empty($breaking_news)) { echo $breaking_news->description; } ?></textarea>
                                    </div
                                    
                                
                                </div>
                            
                            
                                
                            

                            </div>
                        </div>
                    </div>

                    <!-- /.col-lg-6 (nested) -->
                    <div class="col-lg-12">
                        <p style="border-top:1px solid #ccc;"></p>
                        <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-plus-sign"></i> Update Breaking news</button>
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
</script>