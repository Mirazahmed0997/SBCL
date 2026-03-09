<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h3 class="card-title">ম্যানেজ Slider</h3>
                        </div>
                        <div class="col-md-2 text-right">
                            <a href="<?php echo base_url(); ?>Admin/slider_create" class="btn bg-olive">Add Slider</a>
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
                                    <th class="align-middle text-center">Slider Photo</th>
                                    <th class="align-middle text-center">Title English</th>
                                    <th class="align-middle text-center">Title Bangla</th>
                                    <th class="align-middle text-center">Action</th>
                                </tr>
                                <?php if(!empty($sliders)) { 
                                    $count=0;
                                    foreach($sliders as $value){
                                        $count++;
                                    
                                    ?>
                                <tr>
                                    <td class="align-middle text-center"><img src="<?php echo base_url(); ?>/assets/uploads/slider_img/<?php echo $value->photo; ?>" alt="Image" style="width:100px;height:100px;"></td>
                                    <td class="align-middle text-center"><?php echo $value->title_en; ?></td>
                                    <td class="align-middle text-center"><?php echo $value->title_bn; ?></td>
                                    <td class="align-middle text-center">
                                        <div class="row">
                                            <div class="col-4">
                                                <form action="<?php echo base_url(); ?>Admin/active_inactive" method="post">
                                                    <input type="hidden" name="id" value="<?php echo $value->id; ?>">
                                                    <input type="hidden" name="table" value="slider">
                                                    <input type="hidden" name="url" value="Admin/slider">
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
                                                <form action="<?php echo base_url(); ?>Admin/slider_edit" method="post">
                                                    <input type="hidden" name="id" value="<?php echo $value->id; ?>">
                                                    <button type="submit" class="custom_btn bg-info"><i class="fas fa-edit"></i></button>
                                                </form>
                                            </div>
                                            <div class="col-4">
                                                <form action="<?php echo base_url(); ?>Admin/slider_detete" method="post">
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