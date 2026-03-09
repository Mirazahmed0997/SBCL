<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?= $tittle ?></title>
	<!--	datatable start-->
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url('') ?>assets/backend/plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!--	<link rel="stylesheet" href="--><?php //echo base_url('') 
											?>
	<!--assets/backend/css/ionicons.min.css">-->
	<!-- DataTables -->
	<link rel="stylesheet" href="<?php echo base_url('') ?>assets/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="<?php echo base_url('') ?>assets/backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url('') ?>assets/backend/dist/css/adminlte.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<!--	datatable end-->


	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url('') ?>assets/backend/plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Tempusdominus Bbootstrap 4 -->
	<link rel="stylesheet" href="<?php echo base_url('') ?>assets/backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="<?php echo base_url('') ?>assets/backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- JQVMap -->
	<link rel="stylesheet" href="<?php echo base_url('') ?>assets/backend/plugins/jqvmap/jqvmap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url('') ?>assets/backend/dist/css/adminlte.min.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="<?php echo base_url('') ?>assets/backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
	<!-- Daterange picker -->
	<link rel="stylesheet" href="<?php echo base_url('') ?>assets/backend/plugins/daterangepicker/daterangepicker.css">
	<!-- summernote -->
	<link rel="stylesheet" href="<?php echo base_url('') ?>assets/backend/plugins/summernote/summernote-bs4.css">
	<!-- Select2 -->
	<link rel="stylesheet" href="<?php echo base_url('') ?>assets/backend/plugins/select2/css/select2.min.css">
	<link rel="stylesheet" href="<?php echo base_url('') ?>assets/backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
	<!-- Bootstrap4 Duallistbox -->
	<link rel="stylesheet" href="<?php echo base_url('') ?>assets/backend/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url('') ?>assets/backend/dist/css/adminlte.min.css">
	<!--custom css-->
	<link rel="stylesheet" href="<?php echo base_url('') ?>assets/backend/css/custom.css">
	<!-- SweetAlert2 -->
	<link rel="stylesheet" href="<?php echo base_url('') ?>assets/backend/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<link href="<?php echo base_url('') ?>assets/backend/css/family.css" rel="stylesheet">
	<style>
		.accounts_profile {
			font-weight: 900;
			color: #000 !important;
		}

		.accounts_profile_menu a:hover {
			background-color: #007bff;
			color: #fff;
		}

		.nav-item {
			text-align: center;
		}

		@media screen and (max-width: 600px) {

			.right_side_img {
				display: none;
			}
		}
	</style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">

	<div class="wrapper" id="wrapper" class="clearfix">
		<div class="container-fluid" style="border-bottom: 2px solid #fff;">
			<div class="row" style="background-image: url(<?php echo base_url(); ?>assets/site/images/background1.png);background-size:cover;">
				<div class="col-lg-2 col-md-2 bg-image hover-zoom">
					<a> <img <?php if (!empty($homapage_info->h_logo)) { ?> src="<?php echo base_url('assets/site/images/' . $homapage_info->h_logo); ?>" <?php } else { ?>src="<?php echo base_url(); ?>assets/site/images/logo.png" <?php } ?>></a>

				</div>
				<div class="col-lg-7 col-md-7 company_info">
					<h1> <?php if (!empty($homapage_info)) {
								echo $homapage_info->h_company_name;
							} ?></h1>
					<p><?php if (!empty($homapage_info)) {
							echo $homapage_info->h_company_address;
						} ?> <span style="float:right;" id="google_element"></span></p>
				</div>
				<script src="https://translate.google.com/translate_a/element.js?cb=loadGoogleTranslate"></script>
				<script>
					function loadGoogleTranslate() {
						new google.translate.TranslateElement('google_element');
					}
				</script>
				<div class="col-lg-3 col-md-3 right_side_img">
					<img <?php if (!empty($homapage_info->h_header_right_image)) { ?> src="<?php echo base_url('assets/site/images/' . $homapage_info->h_header_right_image); ?>" <?php } else { ?> src="<?php echo base_url(); ?>assets/site/images/officer_3.jpg" <?php } ?> style="">
				</div>

			</div>
		</div>
		<!-- Header
        ============================================= -->
		<header id="header recruit_header" class="sticky-style-2 text-center">
			<nav class="navbar navbar-expand-lg navbar-background">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<i class="navbar-toggler-icon fas fa-bars"></i>

				</button>
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav" style="margin: auto;">
						<li class="nav-item active">
							<a class="nav-link link" href="<?php echo base_url(); ?>Recruitment/index">Home <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link link" href="<?php echo base_url(); ?>">SBCL Website</a>
						</li>
						<li class="nav-item">
							<a class="nav-link link" href="<?php echo base_url('Recruitment/job_openings'); ?>">Job Openings</a>
						</li>
						<li class="nav-item">
							<a class="nav-link link" href="<?php echo base_url('Recruitment/registration'); ?>">Applicant Registration</a>
						</li>
						<?php $login_user_info_all = $this->session->userdata('login_user_info_all');
						if (empty($login_user_info_all)) {
						?>
							<li class="nav-item">
								<a class="nav-link link" href="<?php echo base_url('applicant_login'); ?>">Applicant Login</a>
							</li>
						<?php } else { ?>
							<li class="nav-item">
								<a class="nav-link link" href="<?php echo base_url('applicant_dashboard'); ?>">Go To Dashboard</a>
							<?php } ?>
							<li class="nav-item">
								<a class="nav-link link" href="<?php echo base_url('Recruitment/how_to_apply'); ?>">How To Apply</a>
							</li>
							<li class="nav-item">
								<a class="nav-link link" href="<?php echo base_url('Recruitment/faq'); ?>">FAQ</a>
							</li>
					</ul>
				</div>
			</nav>
		</header><!-- #header end -->