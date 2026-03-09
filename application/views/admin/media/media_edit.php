<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h3 class="card-title">Edit মিডিয়া লিংক</h3>
                        </div>
                    </div>
                    
                </div>
                <div class="card-body">
                    <?php echo form_open('Admin/media_update', 'role="form" id="fromvalid"'); ?>
                        <input type="hidden" name="id" value="<?php echo $media->id; ?>">
                    <div class="row">
                            <div class="col-12">
                                <?php echo $this->session->flashdata('success') ?>
                            </div>
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">মিডিয়া লিংক তথ্য</div>
                                <div class="panel-body">
                                    <p class="help-block form_error" style="font-size:11px;"><?php echo validation_errors("", "<br/>"); ?></p>
                                    <div class="form-group">
                                        <label>Facebook *</label>
                                        <input name="title" value="<?php if(!empty($media)) { echo $media->title; } ?>" class="form-control input-sm" type="text" placeholder="Enter full title in block later" data-bv-notempty="true"/>
                                        <p class="help-block"></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Youtube *</label>
                                        <input name="youtube" value="<?php if(!empty($media)) { echo $media->youtube; } ?>" class="form-control input-sm" type="text" placeholder="Enter full youtube in block later" data-bv-notempty="true"/>
                                        <p class="help-block"></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Twitter *</label>
                                        <input name="twitter" value="<?php if(!empty($media)) { echo $media->twitter; } ?>" class="form-control input-sm" type="text" placeholder="Enter full twitter in block later" data-bv-notempty="true"/>
                                        <p class="help-block"></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Linkend *</label>
                                        <input name="linkend" value="<?php if(!empty($media)) { echo $media->linkend; } ?>" class="form-control input-sm" type="text" placeholder="Enter linkend in block later" data-bv-notempty="true"/>
                                        <p class="help-block"></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- /.col-lg-6 (nested) -->
                        <div class="col-lg-12">
                            <p style="border-top:1px solid #ccc;"></p>
                            <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-plus-sign"></i> Update মিডিয়া লিংক</button>
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