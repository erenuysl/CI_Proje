
<!--top footer-->

  <!--start cart-->
  
  <!--end cart-->

  <!--start switcher-->
  
  
 
  <!--start switcher-->


  <!--bootstrap js-->
  <script src="<?php echo base_url() ?>assets/js/bootstrap.bundle.min.js"></script>

  <!--plugins-->
  <script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
  <!--plugins-->
  <script src="<?php echo base_url() ?>assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
  <script src="<?php echo base_url() ?>assets/plugins/metismenu/metisMenu.min.js"></script>
  <script src="<?php echo base_url() ?>assets/plugins/apexchart/apexcharts.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/index.js"></script>
  <script src="<?php echo base_url() ?>assets/plugins/peity/jquery.peity.min.js"></script>
  <script>
    $(".data-attributes span").peity("donut")
  </script>
  <script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
	<script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
	<script>
		$(document).ready(function() {
			$('#example').DataTable();
		  } );
	</script>
	<script>
		$(document).ready(function() {
			var table = $('#example2').DataTable( {
				lengthChange: false,
				buttons: [ 'copy', 'excel', 'pdf', 'print']
			} );
		 
			table.buttons().container()
				.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
		} );
	</script>
  <script src="<?php echo base_url() ?>assets/plugins/simplebar/js/simplebar.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/main.js"></script>


</body>

</html>