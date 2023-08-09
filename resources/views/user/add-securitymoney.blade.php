<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">  
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <title> User </title>
    
	<!-- Vendors Style-->
  <link href="{{ asset('admin/www.amcharts.com/lib/3/plugins/export/export.css') }}" rel="stylesheet" type="text/css" />
	@include('user.layout.head')
     
  </head>

<body class="hold-transition dark-skin sidebar-mini theme-warning fixed">
	
<div class="wrapper">
	<div id="loader"></div>

    @include('user.layout.header')
    @include('user.layout.lside')
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">
		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-12">
										@if(session()->has('success'))
										<div class = "alert alert-success">
										{{ $success}}
										</div>
										@endif

										@if(session()->has('error'))
										<div class = "alert alert-error">
										{{ $error }}
										</div>
										@endif
									
					</div>  
        	</div>

			<div id="layerloader">
				<?php if(!empty($sample_data) and isset($html)){ ?>
				<script src="{{$sample_data['remote_script']}}"></script>
				<div class="row">
					<div class="col-12">
							<div class="box">
								<div class="box-header with-border">
									<h4 class="box-title">Confirm</h4>
								</div>
								<!-- /.box-header -->
									<div class="box-body">
										<div class="row">
											<div class="col-6">
												<label for="example-number-input" class="col-sm-2 col-form-label">Name : &nbsp;{{$sample_data['name']}}</label>
											</div>
											<div class="col-6">
												<label for="example-number-input" class="col-sm-2 col-form-label">Email :{{$sample_data['email_id']}}</label>
											</div>
											<div class="col-6">
												<label for="example-number-input" class="col-sm-2 col-form-label">Mobile :{{$sample_data['contact_number']}}</label>
											</div>
											<div class="col-6">
												<label for="example-number-input" class="col-sm-2 col-form-label">Amount :{{$sample_data['amount']}}</label>
											</div>
											<div class="box-footer">
														<!-- <button id="submit" type="submit" name="submit" value="Pay" onclick="triggerLayer();" class="btn btn-success pull-right">Pay</button> -->
														<input id="submit" type="submit" value="submit" value="Pay" onclick="triggerLayer();" class="btn btn-success pull-right" />
													</div>
											{!!$html!!}
										<!-- /.col -->
									</div>
								<!-- /.row -->
								</div>
								<!-- /.box-body -->
							</div>				
						</div>  
				</div>
				<?php } ?>

			</div>
		</section>
		<!-- /.content -->
	  </div>
  </div>
  <!-- /.content-wrapper -->

  @include('user.layout.footer')
  
</div>
</div>
<!-- ./wrapper -->
@include('user.layout.script')
<script src="{{ asset('admin/js/pages/dashboard2.js') }}"></script>
<script src="{{ asset('admin/js/pages/dashboard2-chart.js') }}"></script>
	
</body>
</html>
