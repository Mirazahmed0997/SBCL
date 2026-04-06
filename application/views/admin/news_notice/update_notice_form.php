<!-- -----------for update popup------------------------------------------ -->


<div class="modal fade" id="chargeModal">
    <div class="modal-dialog ">
        <div class="modal-content">

            <form action="<?= base_url('news_notice_management/update_notice'); ?>" method="post" enctype="multipart/form-data">

                <div class="modal-header">
                    <h5 class="modal-title">Change Image</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">

                    <div class="form-group">
                        <label class="text-green">Headline</label>
                        <div style="position:relative;">
                            <input type="text" name="headline" id="headline" class="form-control" placeholder="Headline"
                                value="<?= isset($single_news) ? $single_news->headline : '' ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="text-green">Details</label>
                        <div style="position:relative;">
                            <textarea name="details" id="details" class="form-control" placeholder="Details"></textarea>
                        </div>
                    </div>

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