<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="card-title">সাক্ষাৎকার কমিটি পরিবর্তন</h3>
                        </div>
                    </div>
                </div>
                <form action="<?php echo base_url('') ?>Admin/interview_committee_update"
                        method="post">
                        <input type="hidden" name="ic_id" value="<?php if(!empty($interview_committee)) { echo $interview_committee->ic_id; } ?>">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <?php echo $this->session->flashdata('success') ?>
                            </div>
                            <div class="col-md-12">
                                <label>শিরোনাম</label>
                                <span class="text-danger">*</span>
                                <input type="text" class="form-control" value="<?php if(!empty($interview_committee)) { echo $interview_committee->ic_title; } ?>" name="title"
                                        placeholder="শিরোনাম" data-validation="length"
                                        data-validation-length="min2">
                            </div>
                            <div class="col-md-12">
                                <label>বিস্তারিত</label>
                                <span class="text-danger">*</span>
                                <textarea name="details" class="form-control" value="" required><?php if(!empty($interview_committee)) { echo $interview_committee->ic_details; } ?></textarea>
                            </div>
                            
                            <div class="col-md-12" style="clear:both;">
                                <p>কমিটি (নাম, পদবী, মোবাইল)</p>
                                <div class="">
                                    <table class="table table-striped table-bordered table-hover" id="edittableID">
                                        <thead>
                                            <tr style="font-size: 13px">

                                                <th>নাম <small class="req" style="color:red;"> *</small></th>
                                                <th>পদবী <small class="req" style="color:red;"> *</small></th>
                                                <th>মোবাইল  <small class="req" style="color:red;">*</small></th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <?php if(!empty($icd_list)) { 
                                            $i = 0;
                                            foreach($icd_list as $value) {
                                            ?>
                                            <input type="hidden" name="icd_id[]" id="icd_id<?php echo $i; ?>" value="<?php echo $value->icd_id; ?>">
                                        <tr id="row<?php echo $i ?>">
                                            <td>
                                                <input type="text" name="name[]"  id="name<?php echo $i ?>" class="form-control" value="<?php echo $value->icd_name; ?>" required>

                                            </td>
                                            <td>
                                                <input type="text" name="designation[]"  id="designation<?php echo $i ?>" class="form-control" value="<?php echo $value->icd_designation; ?>" required>

                                            </td>
                                            <td>
                                                <input type="number" name="mobile[]"  id="mobile<?php echo $i ?>" class="form-control" value="<?php echo $value->icd_mobile; ?>" required>

                                            </td>
                                            <?php if ($i != 0) { ?>
                                                <td><button type='button' onclick="delete_row('<?php echo $i ?>')" class='closebtn btn-danger'><i class='fas fa-trash'></i></button></td>
                                                <?php } else { ?>
                                                <td><button type="button" onclick="editMore()" style="color:#2196f3" class="closebtn"><i class="fa fa-plus"></i></button></td>
                                            <?php } ?>
                                        </tr>
                                        <?php $i++; } } ?>
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
    
    function editMore() {
        var table = document.getElementById("edittableID");
        var table_len = (table.rows.length);
        var id = parseInt(table_len);
        var div = "<td><input type='text' id='name" + id + "' name='name[]' class='form-control' required></td><td><input type='text' name='designation[]' id='designation" + id + "' class='form-control' required</td><td><input type='number' name='mobile[]' id='mobile" + id + "' class='form-control' required></td>";

        var row = table.insertRow(table_len).outerHTML = "<tr id='row" + id + "'>" + div + "<td><button type='button' onclick='delete_row(" + id + ")' class='closebtn btn-danger'><i class='fas fa-trash'></i></button></td></tr>";

    }

    function delete_row(id) {
        var table = document.getElementById("edittableID");
        var rowCount = table.rows.length;
        $("#row" + id).remove();
    }

</script>