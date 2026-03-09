<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="card-title">নিয়োগ কমিটি তৈরি</h3>
                        </div>
                    </div>
                </div>
                <form action="<?php echo base_url('') ?>Admin/recruitment_committee_store"
                        method="post">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <?php echo $this->session->flashdata('success') ?>
                            </div>
                            <div class="col-md-12">
                                <label>শিরোনাম</label>
                                <span class="text-danger">*</span>
                                <input type="text" class="form-control" value="" name="title"
                                        placeholder="শিরোনাম" data-validation="length"
                                        data-validation-length="min2">
                            </div>
                            <div class="col-md-12">
                                <label>বিস্তারিত</label>
                                <span class="text-danger">*</span>
                                <textarea name="details" class="form-control" value="" required></textarea>
                            </div>
                            
                            <div class="col-md-12" style="clear:both;">
                                <p>কমিটি (নাম, পদবী, মোবাইল)</p>
                                <div class="">
                                    <table class="table table-striped table-bordered table-hover" id="tableID">
                                        <thead>
                                            <tr style="font-size: 13px">

                                                <th>নাম <small class="req" style="color:red;"> *</small></th>
                                                <th>পদবী <small class="req" style="color:red;"> *</small></th>
                                                <th>মোবাইল  <small class="req" style="color:red;">*</small></th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tr id="row0">
                                            <td>
                                                <input type="text" name="name[]"  id="name0" class="form-control" required>

                                            </td>
                                            <td>
                                                <input type="text" name="designation[]"  id="designation0" class="form-control" required>

                                            </td>
                                            <td>
                                                <input type="number" name="mobile[]"  id="mobile0" class="form-control" required>

                                            </td>
                                            <td><button type="button" onclick="addMore()" style="color: #2196f3" class="closebtn"><i class="fa fa-plus"></i></button></td>
                                        </tr>
                                    </table>
                                </div>  
                            </div><!--./col-md-12-->
                            
							<div class=" col-md-12">
								<div class="card-footer">
									<button type="submit" class="btn btn-block btn btn-primary">Submit</button>
								</div>
							</div>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<script>
    
    function addMore() {
        var table = document.getElementById("tableID");
        var table_len = (table.rows.length);
        var id = parseInt(table_len - 1);
        var div = "<td><input type='text' name='name[]' id='name" + id + "' class='form-control' required></td><td><input type='text' name='designation[]' id='designation" + id + "' class='form-control' required></td><td><input type='number' name='mobile[]' id='mobile" + id + "' class='form-control' required></td>";

        var row = table.insertRow(table_len).outerHTML = "<tr id='row" + id + "'>" + div + "<td><button type='button' onclick='delete_row(" + id + ")' class='closebtn btn-danger'><i class='fas fa-trash'></i></button></td></tr>";
        
    }
    
    function delete_row(id) {
        var table = document.getElementById("tableID");
        var rowCount = table.rows.length;
        $("#row" + id).remove();
    }

</script>