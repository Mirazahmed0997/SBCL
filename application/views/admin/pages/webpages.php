<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h3 class="card-title">ম্যানেজ Pages</h3>
                        </div>
                        <div class="col-md-2 text-right">
                            <a href="<?php echo base_url(); ?>Admin/webpages_create" class="btn bg-olive">Add Pages</a>
                        </div>
                    </div>
                    
                </div>
                <div class="card-body">
                    <div class="row">
                            <div class="col-12">
                                <?php echo $this->session->flashdata('success') ?>
                            </div>
                        <div class="col-12">
                            <table class="table table-bordered" id="example">
                                <tr>
                                    <th class="align-middle text-center">Page Name</th>
                                    <th class="align-middle text-center">Page URL</th>
                                    <th class="align-middle text-center">Parent</th>
                                    <th class="align-middle text-center">Last Update</th>
                                    <th class="align-middle text-center">Action</th>
                                </tr>
                                <?php if(!empty($webpagess)) { 
                                    $count=0;
                                    foreach($webpagess as $value){
                                        $count++;
                                    
                                    ?>
                                <tr>
                                    <td class="align-middle"><?php echo $value->title; ?></td>
                                    <td class="align-middle text-center"><?php echo $value->uri; ?></td>
                                    <td class="align-middle text-center"><?php echo pageNamebyId($value->parent); ?></td>
                                    <td class="align-middle text-center"><?php echo $value->last_upadte; ?></td>
                                    <td class="align-middle text-center">
                                        <div class="row">
                                            <div class="col-6">
                                                <form action="<?php echo base_url(); ?>Admin/webpages_edit" method="post">
                                                    <input type="hidden" name="id" value="<?php echo $value->id; ?>">
                                                    <button type="submit" class="custom_btn bg-info"><i class="fas fa-edit"></i></button>
                                                </form>
                                            </div>
                                            <div class="col-6">
                                                <form action="<?php echo base_url(); ?>Admin/webpages_detete" method="post">
                                                    <input type="hidden" name="id" value="<?php echo $value->id; ?>">
                                                    <input type="hidden" name="e_status" value="2">
                                                    <button type="submit" class="custom_btn bg-danger"><i class="fas fa-trash"></i></button>
                                                    
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php } } ?>
                            </table>
                            <?= $this->pagination_bootstrap->render() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>