<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h3 class="card-title">ম্যানেজ মিডিয়া লিংক</h3>
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
                                    <th class="align-middle text-center">Facebook Link</th>
                                    <th class="align-middle text-center">Youtube Link</th>
                                    <th class="align-middle text-center">Twitter Link</th>
                                    <th class="align-middle text-center">Linkedin Link</th>
                                    <th class="align-middle text-center">Action</th>
                                </tr>
                                <?php if(!empty($medias)) { 
                                    $count=0;
                                    foreach($medias as $value){
                                        $count++;
                                    
                                    ?>
                                <tr>
                                    <td class="align-middle text-center"><?php echo $value->title; ?></td>
                                    <td class="align-middle text-center"><?php echo $value->youtube; ?></td>
                                    <td class="align-middle text-center"><?php echo $value->twitter; ?></td>
                                    <td class="align-middle text-center"><?php echo $value->linkend; ?></td>
                                    <td class="align-middle text-center">
                                        <div class="row">
                                            <div class="col-12">
                                                <form action="<?php echo base_url(); ?>Admin/media_edit" method="post">
                                                    <input type="hidden" name="id" value="<?php echo $value->id; ?>">
                                                    <button type="submit" class="custom_btn bg-info"><i class="fas fa-edit"></i></button>
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