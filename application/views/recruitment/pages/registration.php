<!-- welcome section start -->
<style>
    .row {
        margin-top: 5px;
    }
</style>
<section class="welcome" id="welcome">
    <div class="container job_details">
      <div class="row align-items-center">
        <div class="col-12 text-justify">
            <form action="<?php echo base_url('Recruitment/registration_store') ?>" method="post" enctype='multipart/form-data'>
            <h1 class="text-center">Registration</h1>
            <hr>
            <h4>PERSONAL INFORMATION</h4>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="first_name">First Name <span style="color:red">*</span></label>
                        <input type="text" name="first_name" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="last_name">Last Name <span style="color:red">*</span></label>
                        <input type="text" name="last_name" class="form-control" required>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="father_name">Father's Name <span style="color:red">*</span></label>
                        <input type="text" name="father_name" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="father_profession">Father's Profession (Present/ Last position, Name of Organization, Business Type/ Location) <span style="color:red">*</span></label>
                        <input type="text" name="father_profession" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="mother_name">Mother's Name <span style="color:red">*</span></label>
                        <input type="text" name="mother_name" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="mother_profession">Mother's Profession(Present/ Last position, Name of Organization, Business Type/ Location) <span style="color:red">*</span></label>
                        <input type="text" name="mother_profession" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="gender">Gender <span style="color:red">*</span></label>
                        <select name="gender" class="form-control" required>
                            <option value="">--- select ---</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="birth_date">Date of Birth <span style="color:red">*</span></label>
                        <input type="date" name="birth_date" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="maritial_status">Marital Status <span style="color:red">*</span></label>
                        <select name="maritial_status" class="form-control" required>
                            <option value="">--- select ---</option>
                            <option value="Single">Single</option>
                            <option value="Engaged">Engaged</option>
                            <option value="Married">Married</option>
                            <option value="Separated">Separated</option>
                            <option value="Divorced">Divorced</option>
                            <option value="Widower">Widower</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="blood_group">Blood Group <span style="color:red">*</span></label>
                        <select name="blood_group" class="form-control" required>
                            <option value="">--- select ---</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nationality">Nationality <span style="color:red">*</span></label>
                        <input type="text" name="nationality" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nid">National ID <span style="color:red">*</span></label>
                        <input type="text" name="nid" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="religion">Religion <span style="color:red">*</span></label>
                        <select name="religion" class="form-control" required>
                            <option value="">--- select ---</option>
                            <option value="Islam">Islam</option>
                            <option value="Hinduism">Hinduism</option>
                            <option value="Christianity">Christianity</option>
                            <option value="Buddhism">Buddhism</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nid">Cell Phone <span style="color:red">*</span></label>
                        <input type="number" name="primary_mobile"id="NumberCode" class="form-control" required>
                                <div id="number_result" class="direct-chat-msg">
                                    <div class="direct-chat-text">
                                        This number should be unique
                                    </div>

                                </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="office_mobile">Office Phone <span style="color:red">*</span></label>
                        <input type="number" name="office_mobile" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="home_mobile">Home Phone <span style="color:red">*</span></label>
                        <input type="number" name="home_mobile" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">E-mail Address <span style="color:red">*</span></label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="present_address">Present Address <span style="color:red">*</span></label>
                        <textarea name="present_address" class="form-control" required></textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="permanent_address">Permanent Address <span style="color:red">*</span></label>
                        <textarea name="permanent_address" class="form-control" required></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="password">Password <span style="color:red">*</span></label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="password_confirm">Re-type Password <span style="color:red">*</span></label>
                        <input type="password" name="password_confirm" id="password_confirm" class="form-control" required  oninput="check(this)">
                        <span id="output"></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="permanent_address">Image upload(jpg|png) <span style="color:red">*</span></label>
                        <input onchange="preview_image(event)" type="file" name="applicant_image"
                                    class="form-control-file" value="" id="applicant_image" required>
                            <img id="output_image" width="300" height="200">
                    </div>
                </div>
                
                <div class="col-md-12 text-center">
                    <br>
                    <input type="submit" value="Submit" class="btn btn-info">
                </div>
            </div>
            </form>
        </div>

      </div>
    </div>
  </section>
  <!-- welcome section end -->
<script src="<?php echo base_url('') ?>assets/backend/plugins/jquery/jquery.min.js"></script>

<script> 
    function check(input) {
        if (input.value != document.getElementById('password').value) {
            document.getElementById("output").innerHTML = "Password not matched!";
        } else {
            document.getElementById("output").innerHTML = "Password matched!";
        }
    }
	$(document).ready(function () {
		$("#NumberCode").change(function () {
			var NumberCode = $('#NumberCode').val();
			$.ajax({
				type: 'POST',
				url: "<?php echo base_url('Recruitment/check_number_code') ?>",
				data: 'NumberCode=' + NumberCode,

				success: function (resp) {
					$('#number_result').html(resp);
				}
			});

		});


	});
	function preview_image(event) {
		var reader = new FileReader();
		reader.onload = function () {
			var output = document.getElementById('output_image');
			output.src = reader.result;
		}
		reader.readAsDataURL(event.target.files[0]);
	}
</script>
