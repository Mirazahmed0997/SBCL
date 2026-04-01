<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <!-- Search / Filter Form -->
            <form method="get" action="<?= base_url('news_notice_management/news_list') ?>">
                <div class="row g-2 mb-3 align-items-center">
                    <div class="col-md-auto">
                        <button type="button" class="btn btn-primary"><i class="fas fa-search"></i> সদস্য
                            খুঁজুন</button>
                    </div>
                    <div class="col-md">
                        <input type="text" name="id" value="<?= $this->input->get('id') ?>" class="form-control"
                            placeholder="News ID">
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

    <!-- news Table -->
    <section class="content">
        <div class="container-fluid">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0 text-center">ব্যবস্থাপক তালিকা</h5>
                </div>




                <div class="card-body p-2">
                    <div class="table-responsive" style="overflow:auto;">
                        <table id="membersTable" class="table table-bordered table-striped table-hover"
                            style="width:100%; white-space: nowrap;">

                            <button type="button" class="btn btn-success m-2" id="openCreateModal">
                                <i class="fas fa-edit"></i> Create Info
                            </button>

                            <thead class="thead-dark">
                                <tr>
                                    <th>ক্রমিক</th>
                                    <th>নাম</th>
                                    <th>ছবি </th>
                                    <th>পদবী </th>
                                    <th>বিস্তারিত</th>
                                    <!-- <th>Created At</th> -->
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($managment_info as $row): ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $row->name; ?></td>
                                        <td>
                                            <img src="<?= base_url('./assets/uploads/project/management_img/' . $row->image) ?>"
                                                alt="Image" width="100px" height="100px">
                                        </td>

                                        <td><?= $row->designation; ?></td>
                                        <td style="max-height: 100px; overflow-y: auto; white-space: normal;">
                                            <?= htmlspecialchars($row->details); ?>
                                        </td>
                                        <td>
                                            <a href="javascript:void(0);" class="btn btn-warning btn-sm open-charge-modal"
                                                data-id="<?= $row->id; ?>"
                                                data-name="<?= htmlspecialchars($row->name, ENT_QUOTES); ?>"
                                                data-details="<?= htmlspecialchars($row->details, ENT_QUOTES); ?>"
                                                data-designation="<?= htmlspecialchars($row->designation, ENT_QUOTES); ?>">
                                                Edit Info
                                            </a>
                                            <a href="<?= base_url('delete_info/' . $row->id) ?>"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure you want to delete this Information?')">Delete</a>
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

<?php $this->load->view('admin/management_info/create_info_table'); ?>

<!-- ---------------------update popup-------------------------- -->

<?php $this->load->view('admin/management_info/update_info_table'); ?>







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
            url: "<?= base_url('home_Page_managment_controller/update_info'); ?>",
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
                var name = $(this).data('name');
                var designation = $(this).data('designation');
                var details = $(this).data('details');

                // Set values in modal
                $('#chargeModal input[name="name"]').val(name);
                $('#chargeModal input[name="designation"]').val(designation);
                $('#chargeModal textarea[name="details"]').val(details);

                // Add hidden input for ID
                if ($('#chargeModal input[name="info_id"]').length === 0) {
                    $('<input>').attr({
                        type: 'hidden',
                        name: 'info_id',
                        value: id
                    }).appendTo('#chargeModal form');
                } else {
                    $('#chargeModal input[name="info_id"]').val(id);
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