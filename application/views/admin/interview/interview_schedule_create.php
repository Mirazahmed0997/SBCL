<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="card-title">সাক্ষাৎকার সময়সূচী তৈরি</h3>
                        </div>
                    </div>
                </div>
                <form action="<?php echo base_url('') ?>Admin/interview_store"
                        method="post">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <?php echo $this->session->flashdata('success') ?>
                            </div>
                            <div class="col-md-12" style="clear:both;">
                                <div class="">
                                    <table class="table table-striped table-bordered table-hover" id="tableID">
                                        <thead>
                                            <tr style="font-size: 13px">

                                                <th class="text-center">চাকরী <small class="req" style="color:red;"> *</small></th>
                                                <th class="text-center">সাক্ষাৎকার কমিটি <small class="req" style="color:red;"> *</small></th>
                                                <th class="text-center">তারিখ <small class="req" style="color:red;"> *</small></th>
                                                <th class="text-center">শুরু সময় <small class="req" style="color:red;"> *</small></th>
                                                <th class="text-center">শেষ সময় <small class="req" style="color:red;"> *</small></th>
                                                <th class="text-center">সাক্ষাতের সংখ্যা <small class="req" style="color:red;">*</small></th>
                                                <th class="text-center">আবেদনকারী স্থিতি</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tr id="row0">
                                            <td>
                                            <select name="job_id[]" class="form-control" required  onchange="get_total_applicant(this.value, '0')">
                                                <option value="">--- select ---</option>
                                                <?php if(!empty($rec_list)) { 
                                                foreach($rec_list as $value){
                                                ?>
                                                <option value="<?php echo $value->rec_id; ?>"><?php echo $value->rec_job_title; ?></option>
                                                <?php } } ?>
                                            </select>

                                            </td>
                                            <td>
                                            <select name="ic_id[]" class="form-control" required>
                                                <option value="">--- select ---</option>
                                                <?php if(!empty($ic_list)) { 
                                                foreach($ic_list as $value){
                                                ?>
                                                <option value="<?php echo $value->ic_id; ?>"><?php echo $value->ic_title; ?></option>
                                                <?php } } ?>
                                            </select>

                                            </td>
                                            <td>
                                                <input type="date" name="interview_date[]"  id="interview_date0" class="form-control" required>

                                            </td>
                                            <td>
                                                <input type="time" name="interview_start_time[]"  id="interview_start_time0" class="form-control" required>

                                            </td>
                                            <td>
                                                <input type="time" name="interview_end_time[]"  id="interview_end_time0" class="form-control" required>

                                            </td>
                                            <td>
                                                <input type="text" name="applicant[]"  id="applicant0" onchange="applicant_sthiti(this.value, '0')" class="form-control" required>

                                            </td>
                                            <td>
                                                <input type="text" name="applicant_sthiti[]"  id="applicant_sthiti0" class="form-control" readonly>

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
    function applicant_sthiti(applicant, rowid) {
        var applicant = $("#applicant" + rowid).val();
        if (rowid == 0) {
            var applicant_sthiti = $("#applicant_sthiti" + rowid).val();
        } else {
            rowid = rowid - 1;
            var applicant_sthiti = $("#applicant_sthiti" + rowid).val();
            rowid = rowid + 1;
        }
        if(applicant > applicant_sthiti) {
            alert('দুঃখিত, পর্যাপ্ত আবেদন নেই।');
            $('#applicant' + rowid).val(0);
        } else {
            $('#applicant_sthiti' + rowid).val(applicant_sthiti-applicant);
        }

    }
    function get_total_applicant(id, rowid) {
        $.ajax({
            url: '<?php echo base_url(); ?>admin/get_total_applicant',
            type: "POST",
            data: {ap_rec_id: id},
            dataType: 'json',
            success: function (res) {
                $("#applicant_sthiti" + rowid).val(res);
            }
        });
    }

    function addMore() {
        var table = document.getElementById("tableID");
        var table_len = (table.rows.length);
        var id = parseInt(table_len - 1);
        var div = "<td><select name='job_id[]' class='form-control'><option value=''>--- select ---</option><?php if(!empty($rec_list)) { foreach($rec_list as $value){?><option value='<?php echo $value->rec_id; ?>'><?php echo $value->rec_job_title; ?></option><?php } } ?></select></td><td><select name='ic_id[]' class='form-control'><option value=''>--- select ---</option><?php if(!empty($ic_list)) { foreach($ic_list as $value){?><option value='<?php echo $value->ic_id; ?>'><?php echo $value->ic_title; ?></option><?php } } ?></select></td><td><input type='date' name='interview_date[]'  id='interview_date" + id + "' class='form-control'></td><td><input type='time' name='interview_start_time[]'  id='interview_start_time" + id + "' class='form-control'></td><td><input type='time' name='interview_end_time[]'  id='interview_end_time" + id + "' class='form-control'></td><td><input type='text' name='applicant[]'  id='applicant" + id + "' onchange='applicant_sthiti(this.value," + id + ")' class='form-control'></td><td><input type='text' name='applicant_sthiti[]'  id='applicant_sthiti" + id + "' class='form-control' readonly></td>";

        var row = table.insertRow(table_len).outerHTML = "<tr id='row" + id + "'>" + div + "<td><button type='button' onclick='delete_row(" + id + ")' class='closebtn btn-danger'><i class='fas fa-trash'></i></button></td></tr>";
        
    }
    
    function delete_row(id) {
        var table = document.getElementById("tableID");
        var rowCount = table.rows.length;
        $("#row" + id).remove();
    }

</script>