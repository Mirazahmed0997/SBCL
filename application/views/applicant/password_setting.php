<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h3 class="card-title">Password Settings</h3>
                        </div>
                    </div>
                    
                </div>
                <div class="card-body">
                <?php
                    if ($_POST){
                    $newpass=$this->input->post("newpass");
                    $conpass=$this->input->post("conpass");
                    if ($newpass!=$conpass) redirect("Applicant/password_setting?sk=3");
                    $id=$this->session->userdata('currentActiveId');
                    $this->db->where('a_id',$id);
                    $this->db->update('authority',array('a_key'=>md5($newpass)));
                    redirect("Applicant/password_setting?sk=1");
                    }
                    ?>
                    <div id="page-wrapper">
                        <div class="row">
                            <div class="col-lg-12">
                                <h1 class="page-header"><i class="fa fa-arrow-circle-o-right"></i> Password Settings</h1>
                                                <?php echo form_open('Applicant/password_setting','role="form" id="fromvalid"');?>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                    <?php $sk=$this->input->get("sk",TRUE);
                                                    if ($sk==1) {
                                                    ?>
                                                    <div class="alert alert-success alert-dismissable">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    <strong>Success!</strong> Password changed successfully.
                                                    </div>
                                                    <?php } if ($sk==3) { ?>
                                                    <div class="alert alert-danger alert-dismissable">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    <strong>Error!</strong> New password & confirmation password dose not matched!
                                                    </div>
                                                    <?php } ?>
                                                    <div class="panel panel-default">
                                                    <div class="panel-heading">Password Change</div>
                                                    <div class="panel-body">
                                                            <p class="help-block form_error" style="font-size:11px;"><?php echo validation_errors("","<br/>");?></p>
                                                            <div class="form-group">
                                                                <label id="newpass">New Password</label>
                                                                <input type="password" name="newpass" id="newpass" class="form-control input-sm" data-bv-notempty="true">
                                                            </div>
                                                            <div class="form-group">
                                                                <label id="conpass">Confirm Password</label>
                                                                <input type="password" name="conpass" id="conpass" class="form-control input-sm" data-bv-notempty="true">
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
