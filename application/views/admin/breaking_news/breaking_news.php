<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h3 class="card-title">ম্যানেজ Breaking News</h3>
                        </div>
                        <div class="col-md-2 text-right">
                            <a href="<?php echo base_url(); ?>Admin/breaking_news_create" class="btn bg-olive">Add Breaking News</a>
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
                                    <th class="align-middle text-center">Serial No.#</th>
                                    <th class="align-middle text-center">Breaking News</th>
                                    <th class="align-middle text-center">Created at</th>
                                    <th class="align-middle text-center" width="150px">Action</th>
                                </tr>
                                <?php if(!empty($breaking_newss)) { 
                                    $count=0;
                                    foreach($breaking_newss as $value){
                                        $count++;
                                    
                                    ?>
                                <tr>
                                    <td class="align-middle"><?php echo $count; ?></td>
                                    <td class="align-middle text-justify"><?php echo $value->news; ?></td>
                                    <td class="align-middle text-justify"><?php echo $value->created_at; ?></td>
                                    <td class="align-middle text-center">
                                        <div class="row">
                                            <div class="col-4">
                                                <form action="<?php echo base_url(); ?>Admin/breaking_news_edit" method="post">
                                                    <input type="hidden" name="id" value="<?php echo $value->id; ?>">
                                                    <button type="submit" class="custom_btn bg-info"><i class="fas fa-edit"></i></button>
                                                </form>
                                            </div>
                                            <div class="col-4">
                                                <form action="<?php echo base_url(); ?>Admin/breaking_inactive_active" method="post">
                                                    <input type="hidden" name="id" value="<?php echo $value->id; ?>">
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
                                                <form action="<?php echo base_url(); ?>Admin/breaking_news_detete" method="post">
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
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>