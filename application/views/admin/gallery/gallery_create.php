<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h3 class="card-title">Add New Image</h3>
                        </div>
                    </div>
                    
                </div>
                <div class="card-body">
                    <?php echo form_open_multipart('Admin/gallery_store', 'role="form" id="fromvalid"'); ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">Gallery Photo</div>
                                <div class="panel-body">
                                    <p class="help-block form_error" style="font-size:11px;"><?php echo validation_errors("", "<br/>"); ?></p>
                                    <div class="form-group">
                                        <label id="title">Photo Title*</label>
                                        <input type="text" name="title" id="title" class="form-control input-sm" type="text" placeholder="Enter Title" data-bv-notempty="true" required>
                                    </div>
                                    <div class="form-group">
                                        <label id="url">Photo Album*</label>
                                        <select name="gallery_album_id" id='gallery_album_id' class="form-control input-sm" required>
                                            <option value="" selected="selected"> --- Select Album --- </option>
                                            <?php $aRes = listAlbum();
                                            foreach ($aRes as $aR): ?>
                                                <option value="<?php echo $aR->gallery_album_id ?>"><?php echo $aR->gallery_album_title; ?></option>
                                            <?php endforeach; ?>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        
                                        <table class="table table-striped table-bordered table-hover" id="tableID">
                                            <thead>
                                                <tr>
                                                    <th>Product Image</th>
                                                    <th>Product Image View</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tr id="row0">
                                                <td class="align-middle"><input type="file" name="filename[]" onchange="preview_image(event,'output_image0')" id="filename0" class="form-control" required></td>
                                                <td class="align-middle"><img id="output_image0" width="100" height="100"></td>
                                                <td class="align-middle"><button type="button" onclick="addMore()" style="color: #2196f3" class="closebtn"><i class="fa fa-plus"></i></button></td>
                                            </tr>

                                        </table>
                                    </div>
                                    
                                    <!-- <div class="form-group <?php if (form_error('photo')) echo "has-error";?>">
                                        <label for="photo">Photo<span class="required"></span></label>
                                        <input type="file"  onchange="preview_image(event)" name="filename" id="attachment">
                                        <p class="help-block" style="border:none;">Upload photo | Format jpg, png, gif</p>
                                        <?php if (form_error('logo')) echo '<p class="help-block">' . form_error('photo') . '</p>'; ?>
                                    </div>
                                    <div class="form-group">
                                        
                                            <img id="output_image" width="200" height="200">
                                    
                                    </div> -->

                                </div>
                            </div>
                        </div>
                        <!-- /.col-lg-6 (nested) -->
                        <div class="col-lg-12">
                            <p style="border-top:1px solid #ccc;"></p>
                            <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-plus-sign"></i> Add Photo</button>
                            <button type="reset" class="btn btn-danger"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                        </div>
                    </div>
                    <!-- /.row (nested) -->
                    </form>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<script>
	// function preview_image(event) {
	// 	var reader = new FileReader();
	// 	reader.onload = function () {
	// 		var output = document.getElementById('output_image');
	// 		output.src = reader.result;
	// 	}
	// 	reader.readAsDataURL(event.target.files[0]);
	// }
</script>
<script>
    
    function addMore() {
        var table = document.getElementById('tableID');
        var table_len = (table.rows.length);
        var id = parseInt(table_len-1);
        var div = '<td class="align-middle"><input type="file" name="filename[]" id="filename'+ id +'" onchange="preview_image(event,&#34;output_image'+ id +'&#34;)" class="form-control"  required></td><td class="align-middle"> <img id="output_image'+ id +'" width="100" height="100"></td>'

        var row = table.insertRow(table_len).outerHTML = "<tr id='row"+id+"'>" +div+  "<td class='align-middle'><button type='button' onclick='delete_row(" + id + ")' class='closebtn btn-danger'><i class='fas fa-trash'></i></button></td></tr>";
    }
    function delete_row(id) {
        var table = document.getElementById('tableID');
        var rowCount = table.rows.length;
        $('#row'+id).remove();
    }
    
	function preview_image(event,id) {
		var reader = new FileReader();
		reader.onload = function () {
			var output = document.getElementById(id);
			output.src = reader.result;
		}
		reader.readAsDataURL(event.target.files[0]);
	}
</script>