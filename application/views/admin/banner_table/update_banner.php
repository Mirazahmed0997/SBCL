<!-- -----------for update popup------------------------------------------ -->


<div class="modal fade" id="chargeModal">
    <div class="modal-dialog ">
        <div class="modal-content">

            <form action="<?= base_url('home_Page_managment_controller/update_banner'); ?>" method="post"
                enctype="multipart/form-data">

                <input type="hidden" name="banner_id" id="banner_id" value="<?= isset($single_banner) ? $single_banner->id : '' ?>">

                <div class="modal-header">
                    <h5 class="modal-title">Change Image</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">


                    <div class="form-group">
                        <label class="text-green">Image</label>
                        <div style="position:relative;">
                            <input type="file" name="image" id="image" class="form-control"></input>
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