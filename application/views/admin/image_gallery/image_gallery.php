<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <!-- Search / Filter Form -->
            <form method="get" action="<?= base_url('news_notice_management/notice_list') ?>">
                <div class="row g-2 mb-3 align-items-center">
                    <div class="col-md-auto">
                        <button type="button" class="btn btn-primary"><i class="fas fa-search"></i> সদস্য
                            খুঁজুন</button>
                    </div>
                    <div class="col-md">
                        <input type="text" name="id" value="<?= $this->input->get('id') ?>" class="form-control"
                            placeholder="Notice ID">
                    </div>
                    <div class="col-md">
                        <input type="text" name="headline" class="form-control" placeholder="Headline">
                    </div>

                    <div class="col-md">
                        <select name="status" class="form-select">
                            <option value="">সকল অবস্থা</option> <!-- All statuses -->
                            <option value="1" <?= $this->input->get('status') == '1' ? 'selected' : '' ?>>Active</option>
                            <option value="0" <?= $this->input->get('status') == '0' ? 'selected' : '' ?>>Inactive</option>
                        </select>
                    </div>
                </div>

                <div class="row g-2 align-items-center mb-3">
                    <div class="col-md-auto">
                        <button type="button" class="btn btn-primary"><i class="fas fa-calendar-alt"></i> তারিখ
                            নির্বাচন</button>
                    </div>
                    <div class="col-md">
                        <input type="date" name="from_date" class="form-control">
                    </div>
                    <div class="col-md">
                        <input type="date" name="to_date" class="form-control">
                    </div>
                    <div class="col-md-auto">
                        <button type="submit" class="btn btn-success"><i class="fas fa-search"></i> Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- notices Table -->
    <section class="content">
        <div class="container-fluid">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0 text-center">ছবি তালিকা</h5>
                </div>




                <div class="card-body p-2">
                    <div class="table-responsive" style="overflow:auto;">
                        <table id="membersTable" class="table table-bordered table-striped table-hover"
                            style="width:100%; white-space: nowrap;">

                            <button type="button" class="btn btn-success m-2" id="openCreateModal">
                                <i class="fas fa-edit"></i> Upload Image
                            </button>

                            <thead class="thead-dark">
                                <tr>
                                    <th>ক্রমিক</th>
                                    <th>ছবি</th>
                                    <th>অবস্থান</th>
                                    <th>Posted By</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($image_gallery as $row): ?>
                                    <tr>
                                        <td><?= $i++; ?></td>

                                        <td>
                                            <img src="<?= base_url('./assets/uploads/project/gallary_image/' . $row->image) ?>"
                                                alt="Image" width="100px" height="100px">
                                        </td>
                                        <td>
                                            <form action="<?= base_url('image_active_status/' . $row->id); ?>"
                                                method="post">
                                                <select name="status" onchange="this.form.submit()"
                                                    class="form-control form-control-sm">
                                                    <option value=1 <?= $row->status == 1 ? 'selected' : '' ?>>Active
                                                    </option>
                                                    <option value=0 <?= $row->status == 0 ? 'selected' : '' ?>>Inactive
                                                    </option>

                                                </select>
                                            </form>
                                        </td>
                                        <td><?= $row->posted_by; ?></td>
                                        <td><?= $row->created_at; ?></td>
                                        <td>
                                            <a href="javascript:void(0);" class="btn btn-warning btn-sm open-charge-modal"
                                                data-id="<?= $row->id; ?>">
                                                <i class="fas fa-edit nav-icon"></i>
                                            </a>
                                            <a href="<?= base_url('delete_image/' . $row->id) ?>"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure you want to delete this Image?')"><i
                                                    class="fas fa-trash nav-icon"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>




<!-- ---------------------create popup-------------------------- -->

<?php $this->load->view('admin/image_gallery/image_create_form'); ?>

<!-- ---------------------update popup-------------------------- -->

<?php $this->load->view('admin/image_gallery/image_update_form'); ?>







<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>


<script>
    $(document).ready(function () {
        $('#membersTable').DataTable({
            responsive: false,
            scrollX: true,
            scrollY: "500px",
            scrollCollapse: true,
            paging: false,
            fixedHeader: true,
            pageLength: 10,
            searching: false,
            lengthMenu: [10, 25, 50, 100],
            language: {
                lengthMenu: "Show _MENU_ entries",
                info: "Showing _START_ to _END_ of _TOTAL_ members"
            }
        });
    });


    // ------------update form popup-----------------------------------


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
        $(document).on("click", ".open-charge-modal", function () {

            $("#chargeModal").modal("show");
});


        $("#chargeForm").submit(function (e) {
            e.preventDefault();

        $.ajax({
            url: "<?= base_url('news_notice_management/update_news'); ?>",
        type: "POST",
        data: $(this).serialize(),
        success: function (response) {

            $("#chargeModal").modal("hide");

        alert("Charge updated successfully!");

        location.reload();
}
});
});

        // ------------set previous value in update form------------

        $(document).ready(function () {
            $('.open-charge-modal').on('click', function () {
                var id = $(this).data('id');
                

              

                // Add hidden input for ID
                if ($('#chargeModal input[name="image_id"]').length === 0) {
                    $('<input>').attr({
                        type: 'hidden',
                        name: 'image_id',
                        value: id
                    }).appendTo('#chargeModal form');
                } else {
                    $('#chargeModal input[name="image_id"]').val(id);
                }

                // Show the modal
                $('#chargeModal').modal('show');
            });
    });


        // --------------------create popup-----------------------

        $(document).ready(function() {
            $('#openCreateModal').click(function () {
                $('#createNewsModal').modal('show');
            });
});

</script>