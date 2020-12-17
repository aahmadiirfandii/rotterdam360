		</div>
		<!-- /.content-wrapper -->
		<footer class="main-footer">
			<div class="pull-right hidden-xs">
				<b>Virtual Tour 360</b>
			</div>
			<strong>Copyright &copy;<?=date('Y')?> <a href="http://unhas.ac.id" target="_blank">Universitas Hasanuddin</a></strong>
		</footer>

		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Tab panes -->
			<div class="tab-content">
				<!-- Home tab content -->
				<div class="tab-pane" id="control-sidebar-home-tab">
				</div> <!-- /.tab-pane -->
			</div>
		</aside> <!-- /.control-sidebar -->
		<!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
		<div class="control-sidebar-bg"></div>
	</div>
	<!-- ./wrapper -->

	<!-- jQuery 2.2.3 -->
	<script src="<?=admin_assets()?>plugins/jQuery/jquery-2.2.3.min.js"></script>
	<!-- Bootstrap 3.3.6 -->
	<script src="<?=admin_assets()?>bootstrap/js/bootstrap.min.js"></script>
	<!-- DataTables -->
	<script src="<?=admin_assets()?>plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="<?=admin_assets()?>plugins/datatables/dataTables.bootstrap.min.js"></script>
	<script>
		$(function() {
			$("#dataTables-example").DataTable();
		});
	</script>
	<!-- FastClick -->
	<script src="<?=admin_assets()?>plugins/fastclick/fastclick.js"></script>
	<!-- AdminLTE App -->
	<script src="<?=admin_assets()?>dist/js/app.min.js"></script>
	<!-- Sparkline -->
	<script src="<?=admin_assets()?>plugins/sparkline/jquery.sparkline.min.js"></script>
	<!-- jvectormap -->
	<script src="<?=admin_assets()?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
	<script src="<?=admin_assets()?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
	<!-- SlimScroll 1.3.0 -->
	<script src="<?=admin_assets()?>plugins/slimScroll/jquery.slimscroll.min.js"></script>
	<!-- ChartJS 1.0.1 -->
	<script src="<?=admin_assets()?>plugins/chartjs/Chart.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="<?=admin_assets()?>dist/js/demo.js"></script>
	<!-- SWEETALERT SCRIPTS -->
	<script src="<?=admin_assets()?>plugins/sweetalert/sweetalert.min.js"></script>
	<script>
		function hapus_data(data_class, data_id)
		{
			swal({
				title: "Hapus Data Ini?",
				text: "Data yang sudah dihapus tidak akan bisa dikembalikan lagi.",
				type: "warning",
				allowOutsideClick: true,
				showCancelButton: true,
				cancelButtonText: 'Batal',
				confirmButtonColor: '#DD6B55',
				confirmButtonText: 'Hapus',
				closeOnConfirm: false
			},
			function(isConfirm)
			{
				if (isConfirm)
				{
					location.href = "<?=admin_url()?>" + "/" + data_class + "/hapus/" + data_id + "?act=" + data_id;
				}
			});
		}
	</script>
	<script>
		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function (e) {
					$("#uploadgambar").attr("src", e.target.result);
				};

				reader.readAsDataURL(input.files[0]);
			}
		}
	</script>
</body>
</html>
