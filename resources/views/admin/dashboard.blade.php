<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://crypto-admin-templates.multipurposethemes.com/sass/bs5/images/favicon.ico">

    <title>Admin</title>
    
	<!-- Vendors Style-->
	@include('admin.layout.head')
     
  </head>

<body class="hold-transition dark-skin sidebar-mini theme-warning fixed">

@include('admin.layout.header')	
@include('admin.layout.lside')	

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<div class="container-full">
			<!-- Main content -->
			<section class="content">			
				<div class="row">	

					
						
				<div class="row">
						<div class="box">
							<div class="box-header with-border">
							<h4 class="box-title">Profit-Loss </h4>

							<div class="box-tools pull-right">
								Real time
								<div class="btn-group" id="realtime" data-toggle="btn-toggle">
								<button type="button" class="btn btn-default bg-success btn-sm active" data-toggle="on">On</button>
								<button type="button" class="btn btn-default bg-danger btn-sm" data-toggle="off">Off</button>
								</div>
							</div>
							</div>
							<div class="box-body">
							<div id="interactive" style="height: 300px;"></div>
							</div>
							<!-- /.box-body-->
						</div>
					</div>
						
					</div>
			</section>
			<!-- /.content -->
		</div>
	</div>
	<!-- /.content-wrapper -->
  
@include('admin.layout.footer')
	
	
	
	
	<!-- Vendor JS -->
	<script src="js/vendors.min.js"></script>
	<script src="js/pages/chat-popup.js"></script>
    <script src="../assets/icons/feather-icons/feather.min.js"></script>
	
	<script src="../assets/vendor_components/Flot/jquery.flot.js"></script>
	<script src="../assets/vendor_components/Flot/jquery.flot.resize.js"></script>
	<script src="../assets/vendor_components/Flot/jquery.flot.pie.js"></script>
	<script src="../assets/vendor_components/Flot/jquery.flot.categories.js"></script>
	<script src="../../../../www.amcharts.com/lib/3/amcharts.js" type="text/javascript"></script>
	<script src="../../../../www.amcharts.com/lib/3/gauge.js" type="text/javascript"></script>
	<script src="../../../../www.amcharts.com/lib/3/serial.js" type="text/javascript"></script>
	<script src="../../../../www.amcharts.com/lib/3/amstock.js" type="text/javascript"></script>
	<script src="../../../../www.amcharts.com/lib/3/pie.js" type="text/javascript"></script>
	<script src="../../../../www.amcharts.com/lib/3/plugins/dataloader/dataloader.min.js"></script>
	<script src="../../../../www.amcharts.com/lib/3/plugins/animate/animate.min.js" type="text/javascript"></script>
	<script src="../../../../www.amcharts.com/lib/3/plugins/export/export.min.js" type="text/javascript"></script>
	<script src="../../../../www.amcharts.com/lib/3/themes/patterns.js" type="text/javascript"></script>
	<script src="../../../../www.amcharts.com/lib/3/themes/light.js" type="text/javascript"></script>	
	<script src="../assets/vendor_components/Web-Ticker-master/jquery.webticker.min.js"></script>
	<script src="../assets/vendor_components/echarts-master/dist/echarts-en.min.js"></script>
	<script src="../assets/vendor_components/echarts-liquidfill-master/dist/echarts-liquidfill.min.js"></script>
    <script src="../assets/vendor_components/datatable/datatables.min.js"></script>
	<script src="../assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js"></script>

    @include('admin.layout.script')
	
	<!-- Crypto Admin App -->
	<script src="js/template.js"></script>
	<script src="js/pages/dashboard.js"></script>
	<script src="js/pages/dashboard-chart.js"></script>

	<script src="{{ asset('admin/js/pages/widget-flot-charts.js') }}"></script>
	<script src="{{ asset('assets/vendor_components/Flot/jquery.flot.resize.js') }}"></script>
	<script src="{{ asset('assets/vendor_components/Flot/jquery.flot.pie.js') }}"></script>
	<script src="{{ asset('assets/vendor_components/Flot/jquery.flot.categories.js') }}"></script>
	
</body>

</html>
