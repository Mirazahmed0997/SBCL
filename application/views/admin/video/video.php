<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8">
                            <h3 class="card-title">ম্যানেজ ভিডিও</h3>
                        </div>
                        <div class="col-md-4 text-right">
                            <a href="<?php echo base_url(); ?>Admin/video_create" class="btn bg-olive">Add ভিডিও</a>
                        </div>
                    </div>
                    
                </div>
                <div class="card-body">
                    <div class="row">
                            <div class="col-12">
                                <?php echo $this->session->flashdata('success') ?>
                            </div>
                        <div class="col-12">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th class="align-middle text-center">ভিডিও</th>
                                    <th class="align-middle text-center" width="150px">Action</th>
                                </tr>
                                <?php if(!empty($videos)) { 
                                    $count=0;
                                    foreach($videos as $value){
                                        $count++;
                                    
                                    ?>
                                <tr>
                                    <td class="align-middle text-justify text-center">
                                        
                                        <iframe width="360" height="200" <?php if($value->type == 1) { ?> src="<?php echo base_url(); ?>assets/uploads/videos/<?php echo $value->title; ?>" <?php } elseif($value->type == 2) { ?>src="<?php echo $value->title; ?>"<?php } ?> title="video player" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </td>
                                    <td class="align-middle text-center">
                                        <div class="row">
                                            <div class="col-4">
                                                <form action="<?php echo base_url(); ?>Admin/active_inactive" method="post">
                                                    <input type="hidden" name="id" value="<?php echo $value->id; ?>">
                                                    <input type="hidden" name="table" value="video">
                                                    <input type="hidden" name="url" value="Admin/video">
                                                    <?php if($value->status == 1){ ?> 
                                                    <input type="hidden" name="status" value="2">
                                                    <button type="submit" class="custom_btn bg-danger">Inactive</button>
                                                    <?php } ?>
                                                    <?php if($value->status == 2){ ?> 
                                                    <input type="hidden" name="status" value="1">
                                                    <button type="submit" class="custom_btn bg-primary">Active</button>
                                                    <?php } ?>
                                                </form>
                                            </div>
                                            <div class="col-4">
                                                <form action="<?php echo base_url(); ?>Admin/video_edit" method="post">
                                                    <input type="hidden" name="id" value="<?php echo $value->id; ?>">
                                                    <button type="submit" class="custom_btn bg-info"><i class="fas fa-edit"></i></button>
                                                </form>
                                            </div>
                                            <div class="col-4">
                                                <form action="<?php echo base_url(); ?>Admin/video_delete" method="post">
                                                    <input type="hidden" name="id" value="<?php echo $value->id; ?>">
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