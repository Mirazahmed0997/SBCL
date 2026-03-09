<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="card-title">পদবী</h3>
                        </div>
                    </div>
                </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <?php echo $this->session->flashdata('success') ?>
                            </div>
                            <div class="col-md-6">
                                <form action="<?php echo base_url('') ?>Admin/designation_store" method="post">
                                <div class="card card-info">
                                    <div class="card-header">
                                        <h5>পদবী তৈরি</h5>
                                    </div>
                                    <div class="card-body">
                                        <input type="text" class="form-control" value="" name="designation" placeholder="পদবী" data-validation="length" data-validation-length="min2">
                                        
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-block btn btn-info">Submit</button>
                                    </div>
                                </div>

                                </form>
                            </div>
                            <div class="col-md-6"> 
                                <div class="card card-info">
                                    <div class="card-header">
                                        <h5>পদবী তালিকা</h5>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                            <thead>
                                                <th>#</th>
                                                <th>পদবী</th>
                                                <th>Action</th>
                                            </thead>
                                            <tbody>
                                                <?php if(!empty($d_list)) {
                                                    $count = 0;
                                                    foreach($d_list as $value) {
                                                        $count++;
                                                     ?>
                                                <tr>
                                                    <td><?php echo $count; ?></td>
                                                    <td><?php echo $value->d_name ?></td>
                                                    <td class="text-center">
                                                        
                                                        <form action="<?php echo base_url(); ?>Admin/designation_delete" method="post">
                                                            <input type="hidden" name="d_id" value="<?php echo $value->d_id; ?>">
                                                            <button type="submit" class="custom_btn bg-danger"><i class="fas fa-trash"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                <?php } } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
