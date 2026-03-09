<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h3 class="card-title">General Settings</h3>
                        </div>
                    </div>
                    
                </div>
                <div class="card-body"><?php
                    if ($_POST) {
                        foreach ($_POST as $key => $value):
                            $this->db->query("UPDATE config SET value='$value' WHERE setting='$key'");
                        endforeach;
                        redirect("Admin/general_setting?sk=1");
                    }
                    ?>
                    <div id="page-wrapper">
                        <div class="row">
                            <div class="col-lg-12">
                                <?php echo form_open('Admin/general_setting', 'role="form" id="fromvalid"'); ?>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <?php
                                        $sk = $this->input->get("sk", TRUE);
                                        if ($sk == 1) {
                                            ?>
                                            <div class="alert alert-success alert-dismissable">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                <strong>Success!</strong> General settings was saved successfully.
                                            </div>
                                        <?php } ?>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">General Admin Settings</div>
                                            <div class="panel-body">
                                                <p class="help-block form_error" style="font-size:11px;"><?php echo validation_errors("", "<br/>"); ?></p>
                                                <div class="form-group">
                                                    <label id="brandname">Name</label>
                                                    <input type="text" name="brandname" id="brandname" class="form-control input-sm" value="<?php echo getSet('brandname'); ?>">
                                                </div>
                                                <!--<div class="form-group">
                                                    <label id="toptitle">Slogan</label>
                                                    <input type="text" name="toptitle" id="toptitle" class="form-control input-sm" value="<?php echo getSet('toptitle'); ?>">
                                                </div>-->
                                                <div class="form-group">
                                                    <label id="email">Email Address</label>
                                                    <input type="text" name="email" id="email" class="form-control input-sm" value="<?php echo getSet('email'); ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label id="email">Phone Number</label>
                                                    <input type="text" name="phone" id="phone" class="form-control input-sm" value="<?php echo getSet('phone'); ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label id="email">CopyRight Text</label>
                                                    <input type="text" name="footer"  id="phone" class="form-control input-sm" value="<?php echo getSet('footer'); ?>">
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
                            </div>
                            <!-- /.col-lg-12 -->
                            <div class="cleartop"></div>
                        </div>
                    </div>
                    <!-- /#page-wrapper -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
