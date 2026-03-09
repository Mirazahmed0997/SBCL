<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8">
                            <h3 class="card-title">ম্যানেজ Album</h3>
                        </div>
                        <div class="col-md-4 text-right">
                            <a href="<?php echo base_url(); ?>Admin/album_create" class="btn bg-olive">Create Album</a>
                            <a href="<?php echo base_url(); ?>Admin/gallery_create" class="btn bg-olive">Add Photo</a>
                        </div>
                    </div>
                    
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <?php echo $this->session->flashdata('success') ?>
                        </div>
                                        
                        <!-- ls Gallery Item Start -->
                        <?php
                        foreach ($gallerys as $rowA):
                            ?>
                            <div class="col-3">
                                <div class="thumbnail" style="width:250px;height:280px;">
                                    
                                    <a href="<?php echo base_url(); ?>Admin/gallery_photo/<?php echo $rowA->gallery_album_id ?>">
                                        <img src="<?php echo base_url(); ?>assets/uploads/gallery/<?php echo $rowA->gallery_album_photo; ?>" alt="<?php echo $rowA->gallery_album_title; ?>" style="width:100%;height:70%;">
                                        <div class="caption">
                                            <p><?php echo $rowA->gallery_album_title; ?></p>
                                        </div>
                                        
                                    </a>
                                    <div class="btn-group">
                                        <button class="btn btn-danger btn-xs dropdown-toggle" type="button" data-toggle="dropdown"> Action <span class="caret"></span></button>
                                        <ul class="dropdown-menu pull-right tblaction" role="menu">
                                            <li><a href="<?php echo base_url(); ?>Admin/album_edit/<?php echo $rowA->gallery_album_id ?>"><i class="glyphicon glyphicon-pencil"></i>&nbsp;&nbsp;Edit</a></li>
                                            <li><a href="<?php echo base_url(); ?>Admin/album_delete/<?php echo $rowA->gallery_album_id ?>"><i class="glyphicon glyphicon-pencil"></i>&nbsp;&nbsp;Delete</a></li>
                                        </ul>
                                    </div>
                                
                                </div>
                            </div>

                        <?php endforeach; ?>
                        <!-- ls Gallery Item Finish -->
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>