
		<!-- Main Sidebar Container -->
		<?php echo $header; ?>
		<section id="main-content">
			<section class="wrapper">
				<?= $main_content; ?>
			</section>
		</section>
	</div>
	<!-- /.content-wrapper -->
		<?php echo $footer; ?>

	<!-- Control Sidebar -->
	<aside class="control-sidebar control-sidebar-dark">
		<!-- Control sidebar content goes here -->
	</aside>
	<!-- /.control-sidebar -->
	</div>


	<script src="<?php echo base_url('') ?>assets/backend/plugins/jquery/jquery.min.js"></script>
	<!-- jQuery UI 1.11.4 -->
	<script src="<?php echo base_url('') ?>assets/backend/plugins/jquery-ui/jquery-ui.min.js"></script>
	<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
	<script>
		$.widget.bridge('uibutton', $.ui.button)
	</script>
	<!-- Bootstrap 4 -->
	<script src="<?php echo base_url('') ?>assets/backend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- ChartJS -->
	<script src="<?php echo base_url('') ?>assets/backend/plugins/chart.js/Chart.min.js"></script>
	<!-- Sparkline -->
	<script src="<?php echo base_url('') ?>assets/backend/plugins/sparklines/sparkline.js"></script>
	<!-- JQVMap -->
	<script src="<?php echo base_url('') ?>assets/backend/plugins/jqvmap/jquery.vmap.min.js"></script>
	<script src="<?php echo base_url('') ?>assets/backend/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
	<!-- jQuery Knob Chart -->
	<script src="<?php echo base_url('') ?>assets/backend/plugins/jquery-knob/jquery.knob.min.js"></script>
	<!-- daterangepicker -->
	<script src="<?php echo base_url('') ?>assets/backend/plugins/moment/moment.min.js"></script>
	<script src="<?php echo base_url('') ?>assets/backend/plugins/daterangepicker/daterangepicker.js"></script>
	<!-- Tempusdominus Bootstrap 4 -->
	<script src="<?php echo base_url('') ?>assets/backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
	<!-- Summernote -->
	<script src="<?php echo base_url('') ?>assets/backend/plugins/summernote/summernote-bs4.min.js"></script>
	<!-- overlayScrollbars -->
	<script src="<?php echo base_url('') ?>assets/backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?php echo base_url('') ?>assets/backend/dist/js/adminlte.js"></script>

	<!-- SweetAlert2 -->

	<script src="<?php echo base_url('') ?>assets/backend/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url('') ?>assets/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
	<script src="<?php echo base_url('') ?>assets/backend/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
	<script src="<?php echo base_url('') ?>assets/backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

	<!-- Our Used JS  -->
	<script src="<?php echo base_url('') ?>assets/backend/plugins/sweetalert2/sweetalert2.min.js"></script>
	<script src="<?php echo base_url('') ?>assets/backend/custom/client_site.js"></script>
	<script src="<?php echo base_url('') ?>assets/backend/custom/select2.full.min.js"></script>
	<script src="<?php echo base_url() ?>assets/backend/plugins/summernote/summernote-bs4.min.js"></script>

	<script>
		$(function() {
			$("#example1").DataTable({
				"responsive": true,
				"autoWidth": false,
			});
			$('#example2').DataTable({
				"paging": true,
				"lengthChange": false,
				"searching": false,
				"ordering": true,
				"info": true,
				"autoWidth": false,
				"responsive": true,
			});
		});
	</script>
	<script>
		$.validate({
			lang: 'en'
		});
	</script>
	<script>
		$(function() {
			//Initialize Select2 Elements
			$('.select2').select2()

			//Initialize Select2 Elements
			$('.select2bs4').select2({
				theme: 'bootstrap4'
			})

			//Datemask dd/mm/yyyy
			$('#datemask').inputmask('dd/mm/yyyy', {
				'placeholder': 'dd/mm/yyyy'
			})
			//Datemask2 mm/dd/yyyy
			$('#datemask2').inputmask('mm/dd/yyyy', {
				'placeholder': 'mm/dd/yyyy'
			})
			//Money Euro
			$('[data-mask]').inputmask()

			//Date range picker
			$('#reservationdate').datetimepicker({
				format: 'L'
			});
			//Date range picker
			$('#reservation').daterangepicker()
			//Date range picker with time picker
			$('#reservationtime').daterangepicker({
				timePicker: true,
				timePickerIncrement: 30,
				locale: {
					format: 'MM/DD/YYYY hh:mm A'
				}
			})
			//Date range as a button
			$('#daterange-btn').daterangepicker({
					ranges: {
						'Today': [moment(), moment()],
						'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
						'Last 7 Days': [moment().subtract(6, 'days'), moment()],
						'Last 30 Days': [moment().subtract(29, 'days'), moment()],
						'This Month': [moment().startOf('month'), moment().endOf('month')],
						'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
					},
					startDate: moment().subtract(29, 'days'),
					endDate: moment()
				},
				function(start, end) {
					$('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
				}
			)

			//Timepicker
			$('#timepicker').datetimepicker({
				format: 'LT'
			})

			//Bootstrap Duallistbox
			$('.duallistbox').bootstrapDualListbox()

			//Colorpicker
			$('.my-colorpicker1').colorpicker()
			//color picker with addon
			$('.my-colorpicker2').colorpicker()

			$('.my-colorpicker2').on('colorpickerChange', function(event) {
				$('.my-colorpicker2 .fa-square').css('color', event.color.toString());
			});

			$("input[data-bootstrap-switch]").each(function() {
				$(this).bootstrapSwitch('state', $(this).prop('checked'));
			});

		})
	</script>
	<script>
		$(function() {
			// Summernote
			$('.textarea').summernote()
		})
	</script>
</body>

</html>