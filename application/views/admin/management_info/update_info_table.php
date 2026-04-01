

<div class="modal fade" id="chargeModal">
    <div class="modal-dialog ">
        <div class="modal-content">

            <form action="<?= base_url('home_Page_managment_controller/update_info'); ?>" method="post" enctype="multipart/form-data">

                <div class="modal-header">
                    <h5 class="modal-title">Update INfo</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">

                    <div class="form-group">
                        <label class="text-green">Name</label>
                        <div style="position:relative;">
                            <input type="text" name="name" id="name" class="form-control" placeholder="Name"
                                value="<?= isset($single_info) ? $single_info->name : '' ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="text-green">Designation</label>
                        <div style="position:relative;">
                           <input type="text" name="designation" id="designation" class="form-control" placeholder="designation"
                                value="<?= isset($single_info) ? $single_info->designation : '' ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="text-green">Image</label>
                        <div style="position:relative;">
                            <input type="file" name="image" id="image" class="form-control" 
                               >
                        </div>
                    </div>

                      <div class="form-group">
                        <label class="text-green">Details</label>
                        <div style="position:relative;">
                            <textarea name="details" id="details" class="form-control" placeholder="Details"></textarea>
                        </div>
                    </div>



                </div>

                <!-- Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-sm">Save</button>
                </div>

            </form>

        </div>
    </div>
</div>