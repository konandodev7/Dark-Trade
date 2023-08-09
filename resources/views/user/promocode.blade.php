<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">

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

        <div class="box">
						<div class="box-header with-border">
						  <h4 class="box-title">Apply Promo Code</h4>
						</div>
						<!-- /.box-header -->
						<div class="box-body">
						  <div class="row">
							<div class="col-12">
							@if(session()->has('success'))
                            <div class = "alert alert-success">
                            {{ session()->get('success') }}
							</div>
                            @endif

							@if(session()->has('error'))
                            <div class = "alert alert-danger">
                            {{ session()->get('error') }}
							</div>
                            @endif
								<form method="post" action="{{ url('/user/update-promocode')}}" enctype="multipart/form-data">
								@csrf	
								<div class="form-group row">
								  <label for="example-number-input" class="col-sm-2 col-form-label">Promo Code</label>
								  <div class="col-sm-10">
									<input class="form-control" type="text" name="code"  id="example-number-input">
								  </div>
								</div>
								<div class="box-footer">

								<!-- <button type="submit" class="btn btn-success pull-right">Apply</button> -->
								<input type="submit" value="Apply" class="btn btn-success pull-right" />
							</div>
								</form>
							</div>
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

  @include('user.layout.footer')
  
</div>
</div>
<!-- ./wrapper -->
@include('user.layout.script')
<script src="{{ asset('admin/js/pages/dashboard2.js') }}"></script>
<script src="{{ asset('admin/js/pages/dashboard2-chart.js') }}"></script>
	
</body>
</html>
