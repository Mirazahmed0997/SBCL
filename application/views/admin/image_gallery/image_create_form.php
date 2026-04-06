<div class="modal fade" id="createNewsModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <form action="<?= base_url('gallary_controller/upload_image'); ?>" method="post" enctype="multipart/form-data">

                <div class="modal-header">
                    <h5 class="modal-title">Upload Image </h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">

                   

                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control" required></input>
                    </div>


                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-sm">Save</button>
                </div>

            </form>

        </div>
    </div>
</div>




<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>