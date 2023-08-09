<?php 
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
$uid = Auth::user()->id;
$data= DB::table('wallets')->where('uid','=',$uid)->get();
$data2= DB::table('percentages')->get();

if($data2[0]->d_money_status=='T'){
	try {
		$range=($data2[0]->d_money/100)*$data[0]->wallet_balance;
		}
	catch (Exception $e) {}
	finally {
		$range=($data2[0]->d_money/100)*$data[0]->wallet_balance;
	}
}
else{
	try {
		$range=round(($data2[0]->i_money/100)*$data[0]->wallet_balance);
	}
	catch (Exception $e) {}
	finally {$range=round(($data2[0]->i_money/100)*$data[0]->wallet_balance);}
}

$wallet=$data[0]->wallet_balance;
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">

	<script>
        setInterval(alertpayment, 1 * 60 * 1000);
		

	function alertpayment() {
		if (<?php echo $wallet ?> <= 0) {
			final = 0.00;
			document.getElementById("myspan1").textContent=final.toFixed(2);
			document.getElementById("myspan2").textContent=final.toFixed(2);
		}
		else{
			var min = 1 ;
			var max = <?php echo $range ?>;
			var final = Math.random() * (max - min) + min ;
			
			document.getElementById("myspan1").textContent=final.toFixed(2);
	
			var final1 = parseFloat(final)+parseFloat('<?php echo $wallet ?>');
			document.getElementById("myspan2").textContent=final1.toFixed(2);
		}
		}  
	
    </script>

    <title> User </title>
    
	<!-- Vendors Style-->
	@include('user.layout.head')
     
  </head>

<body class="hold-transition dark-skin sidebar-mini theme-warning fixed">
	<br/>
	<br/>
    @include('user.layout.header')
    @include('user.layout.lside')
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">
		<!-- Main content -->
			<section class="content">			
					<div class="row">

					<?php if($data[0]->security_amount!=0){ ?>
						<div class="col-12 col-md-4">
							<a class="box box-link-pop text-center" href="javascript:void(0)">
								<div class="box-body py-25">
									<p class="fs-40">
									<strong>Rs.&nbsp;</strong><strong>{{$data[0]->security_amount}}.00</strong>
									</p>
									<p class="fw-600">
										<span class="icon-Money me-5 text-info"><span class="path1"></span><span class="path2"></span></span>Security Deposit
									</p>
								</div>
							</a>
						</div>
					<?php } ?>

						<div class="col-12 col-md-4">
							<a class="box box-link-pop text-center" href="javascript:void(0)">
								<div class="box-body py-25">
									<p class="fs-40 text-success">
									<strong>Rs.&nbsp;</strong><strong><span id ="myspan2">{{$wallet}}<span></strong>
									</p>
									<p class="fw-600">
										<span class="icon-Money me-5 text-info"><span class="path1"></span><span class="path2"></span></span> Wallet Balance
									</p>
								</div>
							</a>
						</div>

						<div class="col-12 col-md-4">
							<a class="box box-link-pop text-center" href="javascript:void(0)">
								<div class="box-body py-25">
									<p class="fs-40 text-success">
									<strong>Rs.&nbsp;</strong><strong><span id ="myspan1">0.00<span></strong>	
									</p>
									<p class="fw-600">
										<span class="icon-Money me-5 text-info"><span class="path1"></span><span class="path2"></span></span> Today's Income
									</p>
								</div>
							</a>
						</div>
					</div>
					
					

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
	
			</section>>

		</div>
	</div>
 <!-- /.content-wrapper -->
@include('user.layout.footer')

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
<!-- ./wrapper -->
@include('user.layout.script')
	<script src="js/template.js"></script>
	<script src="js/pages/dashboard.js"></script>
	<script src="js/pages/dashboard-chart.js"></script>

	<script src="{{ asset('admin/js/pages/widget-flot-charts.js') }}"></script>
	<script src="{{ asset('assets/vendor_components/Flot/jquery.flot.resize.js') }}"></script>
	<script src="{{ asset('assets/vendor_components/Flot/jquery.flot.pie.js') }}"></script>
	<script src="{{ asset('assets/vendor_components/Flot/jquery.flot.categories.js') }}"></script>
	
</body>
</html>
