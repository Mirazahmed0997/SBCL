<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

</head>

<body>

<div style="width:90%; margin:auto;">

<h2>Members List</h2>

<table id="membersTable" class="display">

<thead>
<tr>
<th>ID</th>
<th>Name</th>
<th>Father Name</th>
<th>Mobile</th>
<th>NID</th>
<!-- <th>Logo</th> -->
<th>Documents</th>
<th>Nominee Sign</th>
</tr>
</thead>

<tbody>

<?php foreach($members as $row){ ?>

<tr>
<td><?php echo $row->id; ?></td>
<td><?php echo $row->name; ?></td>
<td><?php echo $row->father_name; ?></td>
<td><?php echo $row->mobile_number; ?></td>
<td><?php echo $row->nid; ?></td>


<td>
    <?php if(!empty($row->document_1)): ?>
        <a href="<?php echo base_url('assets/uploads/project/members/members_document'.$row->document_1); ?>" target="_blank">View PDF</a>
    <?php else: ?>
        No Document
    <?php endif; ?>
</td>

<td>
    <?php if(!empty($row->nomini_sign)): ?>
        <img src="<?php echo base_url('assets/uploads/project/members/nominee_sign/'.$row->nomini_sign); ?>" width="50" alt="Nomini Sign">
    <?php else: ?>
        No Image
    <?php endif; ?>
</td>
<td>
    <a href="<?php echo base_url('Site/view_member/'.$row->id); ?>" class="btn-view">View</a> |
    <a href="<?php echo base_url('Site/update_member/'.$row->id); ?>" class="btn-edit">Edit</a> |
    <a href="<?php echo base_url('Site/delete_member/'.$row->id); ?>" class="btn-delete" onclick="return confirm('Are you sure you want to delete this member?');">Delete</a>
</td>


</tr>

<?php } ?>

</tbody>

</table>

</div>

<script>

$(document).ready(function(){
    $('#membersTable').DataTable({
        "pageLength":10
    });
});

</script>

</body>
</html>