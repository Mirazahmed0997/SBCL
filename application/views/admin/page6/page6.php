<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8">
                            <h3 class="card-title">ম্যানেজ সংগঠন পরিচালনা পদ্ধতি</h3>
                        </div>
                        <div class="col-md-4 text-right">
                            <a href="<?php echo base_url(); ?>Admin/page6_create" class="btn bg-olive">Add সংগঠন পরিচালনা পদ্ধতি</a>
                        </div>
                    </div>
                    
                </div>
                <div class="card-body">
                    <div class="row">
                            <div class="col-12">
                                <?php echo $this->session->flashdata('success') ?>
                            </div>
                        <div class="col-12">
                            <table class="table table-bordered">
                                <tr>
                                    <th class="align-middle text-center">Name</th>
                                    <th class="align-middle text-center">URL</th>
                                    <th class="align-middle text-center" width="80px">Action</th>
                                </tr>
                                <?php if(!empty($page6)) { 
                                    $count=0;
                                    foreach($page6 as $value){
                                        $count++;
                                    
                                    ?>
                                <tr>
                                    <td class="align-middle text-justify"><?php echo $value->title; ?></td>
                                    <td class="align-middle text-justify"><?php echo $value->url; ?></td>
                                    <td class="align-middle text-center">
                                        <div class="row">
                                            <div class="col-6">
                                                <form action="<?php echo base_url(); ?>Admin/page6_edit" method="post">
                                                    <input type="hidden" name="id" value="<?php echo $value->id; ?>">
                                                    <button type="submit" class="custom_btn bg-info"><i class="fas fa-edit"></i></button>
                                                </form>
                                            </div>
                                            <div class="col-6">
                                                <form action="<?php echo base_url(); ?>Admin/page6_delete" method="post">
                                                    <input type="hidden" name="id" value="<?php echo $value->id; ?>">
                                                    <button type="submit" class="custom_btn bg-danger"><i class="fas fa-trash"></i></button>
                                                    
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php } } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>