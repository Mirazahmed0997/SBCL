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
                        <?php
                        
                        foreach ($result as $row):
                            ?>
                        <div class="col-xs-6 col-md-3">
                        <div href="#" class="thumbnail">
                            <img src="<?php echo base_url(); ?>assets/uploads/gallery/<?php echo $row->photo; ?>" alt="<?php echo $row->title; ?>" style="width:100%;height: 200px;">
                            
                            <div class="caption">
                            <p><?php echo ucwords($row->title); ?></p>
                            <div class="btn-group"><button class="btn btn-danger btn-xs dropdown-toggle" type="button" data-toggle="dropdown">
                                            Action <span class="caret"></span></button>
                                        <ul class="dropdown-menu pull-right tblaction" role="menu">
                                            
                                            <li>
                                                <form action="<?php echo base_url(); ?>Admin/active_inactive_parameter" method="post">
                                                    <input type="hidden" name="id" value="<?php echo $row->id; ?>">
                                                    <input type="hidden" name="album_id" value="<?php echo $row->gallery_album_id; ?>">
                                                    <input type="hidden" name="table" value="gallery_photo">
                                                    <input type="hidden" name="url" value="Admin/gallery_photo">
                                                    <?php if($row->status == 1){ ?> 
                                                    <input type="hidden" name="status" value="2">
                                                    <button type="submit" class="custom_btn bg-danger">Inactive</button>
                                                    <?php } ?>
                                                    <?php if($row->status == 2){ ?> 
                                                    <input type="hidden" name="status" value="1">
                                                    <button type="submit" class="custom_btn bg-primary">Active</button>
                                                    <?php } ?>
                                                </form>
                                            </li>
                                            <li>
                                                <form action="<?php echo base_url(); ?>Admin/gallery_edit" method="post">
                                                    <input type="hidden" name="album_id" value="<?php echo $row->gallery_album_id; ?>">
                                                    <input type="hidden" name="photo_id" value="<?php echo $row->id; ?>">
                                                    <input type="submit" value="Edit" class="bg-info">
                                                </form>
                                            </li>
                                            <li style="margin-top: 2px;">
                                                <form action="<?php echo base_url(); ?>Admin/gallery_delete" method="post">
                                                    <input type="hidden" name="album_id" value="<?php echo $row->gallery_album_id; ?>">
                                                    <input type="hidden" name="photo_id" value="<?php echo $row->id; ?>">
                                                    <input type="submit" value="Delete" class="bg-danger">
                                                </form>
                                            </li>
                                            <!-- <a href="<?php echo base_url(); ?>Admin/gallery_delete/<?php echo $row->id ?>"><i class="glyphicon glyphicon-pencil"></i>&nbsp;&nbsp;Delete</a></li> -->
                                            <!-- <li><a href="javascript:void(0)" onclick="confirm_modal('manage/delete_gallery/<?php echo $row->id; ?>');"><i class="glyphicon glyphicon-trash"></i>&nbsp;&nbsp;Delete</a></li> -->
                                        </ul>
                                    </div>
                            </div>
                        </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>