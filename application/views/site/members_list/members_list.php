<!DOCTYPE html>
<html>

<head>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <style>
        .btn-view {
            padding: 6px 12px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-size: 14px;
        }

        .btn-form{
             padding: 6px 12px;
            background-color: orange;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-size: 14px;
        }

        .btn-delete{
             padding: 6px 12px;
            background-color: red;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-size: 14px;
        }
    </style>

</head>


<body>

    <div style="width:90%; margin:auto;">

        <h2>Members List</h2>

        <?php $i = 1; ?>
        <table id="membersTable" class="display">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Father Name</th>
                    <th>Mobile</th>
                    <th>NID</th>
                    <!-- <th>Logo</th> -->
                </tr>
            </thead>

            <tbody>

                <?php foreach ($members as $row) { ?>

                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $row->name; ?></td>
                        <td><?php echo $row->father_name; ?></td>
                        <td><?php echo $row->mobile_number; ?></td>
                        <td><?php echo $row->nid; ?></td>




                        <td>
                                <a href="<?php echo base_url('Site/view_member/' . $row->id); ?>" class="btn-view">Details</a>
                                <a href="<?php echo base_url('Site/form_view/' . $row->id); ?>" class="btn-form">Preview</a>
                                <a href="<?php echo base_url('Site/delete_member/' . $row->id); ?>" class="btn-delete"
                                    onclick="return confirm('Are you sure you want to delete this member?');">Delete</a>

                        </td>


                    </tr>

                <?php } ?>

            </tbody>

        </table>

    </div>

    <script>

        $(document).ready(function () {
            $('#membersTable').DataTable({
                "pageLength": 10
            });
        });

    </script>

</body>

</html>