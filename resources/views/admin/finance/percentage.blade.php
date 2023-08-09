<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">

    <title> Admin </title>
    
	<!-- Vendors Style-->
  <link href="{{ asset('admin/www.amcharts.com/lib/3/plugins/export/export.css') }}" rel="stylesheet" type="text/css" />
	@include('admin.layout.head')
     
  </head>

<body class="hold-transition dark-skin sidebar-mini theme-warning fixed">
	
<div class="wrapper">
	<div id="loader"></div>

    @include('admin.layout.header')
    @include('admin.layout.lside')
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">
		<!-- Main content -->
		<section class="content">
        <div class="row">
        <div class="col-12">

        <div class="box">
						<div class="box-header with-border">
						  <h4 class="box-title">Manage</h4>
						</div>
						<!-- /.box-header -->
						<div class="box-body">
						  <div class="row">
						  @foreach($list as $data)
							<div class="col-12">
								<form method="post" action="{{ url('/admin/update-percentage')}}" enctype="multipart/form-data">
								@csrf	
								<div class="form-group row">
								  <label for="example-number-input" class="col-sm-2 col-form-label">First Login Percentage</label>
								  <div class="col-sm-10">
									<input class="form-control" type="number" name="f_money" value="{{$data->f_money}}" id="example-number-input">
								  </div>
								</div>
								<div class="form-group row">
								  <label for="example-number-input" class="col-sm-2 col-form-label">Regular Percentage</label>
								  <div class="col-sm-4">
									<input class="form-control" type="number" name="d_money" value="{{$data->d_money}}" id="example-number-input">
									</div>
									<label for="example-number-input" class="col-sm-2 col-form-label">Status</label>
									<select class="col-sm-4" name="d_money_status">
										<option value="T" <?php if ($data->d_money_status == 'T' ) echo 'selected' ?>>On</option>
										<option value="F" <?php if ($data->d_money_status == 'F' ) echo 'selected' ?>>Off</option>
									</select>

								</div>
								<div class="form-group row">
								  <label for="example-number-input" class="col-sm-2 col-form-label">Instant Percentage</label>
								  <div class="col-sm-4">
									<input class="form-control" type="number" name="i_money" value="{{$data->i_money}}" id="example-number-input">
								  </div>
								  <label for="example-number-input" class="col-sm-2 col-form-label">Status</label>
									<select class="col-sm-4" name="i_money_status" required>
										<option value="T"<?php if ($data->i_money_status == 'T' ) echo 'selected' ?>>On</option>
										<option value="F"<?php if ($data->i_money_status == 'F' ) echo 'selected' ?>>Off</option>
									</select>
								</div>
								<div class="form-group row">
								  <label for="example-number-input" class="col-sm-2 col-form-label">Security Deposit</label>
								  <div class="col-sm-10">
									<input class="form-control" type="number" name="s_money" value="{{$data->s_money}}" id="example-number-input">
								  </div>
								</div>
								<div class="form-group row">
								  <label for="example-number-input" class="col-sm-2 col-form-label">Referral Amount</label>
								  <div class="col-sm-10">
									<input class="form-control" type="number" name="r_money" value="{{$data->r_money}}" id="example-number-input">
								  </div>
								</div>
								<div class="box-footer">
								<input type="submit" value="Update" class="btn btn-success pull-right" />
								<!-- <button type="submit" class="btn btn-success pull-right">Update</button> -->
							</div>
								</form>
							</div>
							@endforeach
							<!-- /.col -->
						  </div>
						  <!-- /.row -->
						</div>
						<!-- /.box-body -->
					  </div>
			
        </div>  
        </div>
		</section>
		<!-- /.content -->
	  </div>
  </div>
  <!-- /.content-wrapper -->

  @include('admin.layout.footer')
  
</div>
</div>
<!-- ./wrapper -->
@include('admin.layout.script')
<script src="{{ asset('admin/js/pages/dashboard2.js') }}"></script>
<script src="{{ asset('admin/js/pages/dashboard2-chart.js') }}"></script>
	
</body>
</html>
