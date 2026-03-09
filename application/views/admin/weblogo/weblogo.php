<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h3 class="card-title">Edit Header Heading</h3>
                        </div>
                    </div>
                    
                </div>
                <div class="card-body">
                    <?php echo form_open_multipart('Admin/weblogo_update', 'role="form" id="fromvalid"'); ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">Heading</div>
                                <div class="panel-body">
                                    <p class="help-block form_error" style="font-size:11px;"><?php echo validation_errors("", "<br/>"); ?></p>

                                    <div class="form-group">
                                        <label id="brandname">Title*</label>
                                        <input type="text" name="brandname" id="brandname" value="<?php echo set_value('brandname', getwebSet('brandname')) ?>" class="form-control input-sm" type="text" placeholder="Institute Name" data-bv-notempty="true">
                                    </div>
                                    <!-- <div class="form-group">
                                        <label id="tagline">TagLine*</label>
                                        <input type="text" name="tagline" id="tagline" value="<?php echo set_value('tagline', getwebSet('tagline')) ?>" class="form-control input-sm" type="text" placeholder="Tag line" data-bv-notempty="true">
                                    </div> -->
                                    <div class="form-group">
                                        <label id="school_code">Address</label>
                                        <input type="text" name="school_code" id="school_code" value="<?php echo set_value('school_code', getwebSet('school_code')) ?>" class="form-control input-sm" type="text" placeholder="School Code">
                                    </div>
                                    <div class="form-group">
                                        <label id="website">Website*</label>
                                        <input type="text" name="website" id="website" value="<?php echo set_value('website', getwebSet('website')) ?>" class="form-control input-sm" type="text" placeholder="Website" data-bv-notempty="true">
                                    </div>
                                    <!-- <div class="form-group <?php if (form_error('photo')) echo "has-error";?>">
                                        <label for="photo">Photo<span class="required"></span></label>
                                        <input type="file"  onchange="preview_image(event)" name="filename" id="attachment">
                                        <p class="help-block" style="border:none;">Upload photo | Format jpg, png, gif</p>
                                        <?php if (form_error('logo')) echo '<p class="help-block">' . form_error('photo') . '</p>'; ?>
                                    </div>
                                    <div class="form-group">
                                        
                                            <img id="output_image" <?php if (strlen($photo = getwebSet('logo'))) echo "src='content/photo/$photo'";?>width="200" height="200">
                                    
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <!-- /.col-lg-6 (nested) -->
                        <div class="col-lg-12">
                            <p style="border-top:1px solid #ccc;"></p>
                            <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-plus-sign"></i> Save changes</button>
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