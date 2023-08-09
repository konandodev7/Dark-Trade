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
						  <h4 class="box-title">Approve or Decline</h4>
						</div>
						<!-- /.box-header -->
						<div class="box-body">
						  <div class="row">
							<div class="col-12">
							@if (count($errors) > 0)
                                <div class = "alert alert-danger">
                                    <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                    </ul>
                                </div>
                            @endif

                            @foreach($lists as $data)
							<form  method="post" action="{{url('admin\approve-withdrawal')}}" enctype="multipart/form-data">	
								@csrf	
								
                            <div class="form-group row">
								  <label for="example-number-input" class="col-sm-2 col-form-label">Withdwawal Amount</label>
								  <div class="col-sm-10">
									<input class="form-control" type="number" name="amount" value ="{{$data->amount}}" id="example-number-input">
								  </div>
								</div>

								<div class="form-group row">
								  <label for="example-number-input" class="col-sm-2 col-form-label">Transaction Id</label>
								  <div class="col-sm-10">
									<input class="form-control" type="text" name="trans" id="example-number-input">
								  </div>
								</div>
                                <input type="hidden" name="id" value="{{$data->id}}">
								<input type="hidden" name="uid" value="{{$data->uid}}">
                                <div class="form-group row">
								  <label for="example-number-input" class="col-sm-2 col-form-label">Description</label>
								  <div class="col-sm-10">
									<input class="form-control" type="text" name="des" id="example-number-input">
								  </div>
								</div>
                                <div class="box-footer">
								<input type="submit" value="approve"  name="action" class="btn btn-success pull-right" />
								<input type="submit" value="decline" name="action"  class="btn btn-danger pull-right" />
                                <!-- <button type="submit" name="action" value="approve" class="btn btn-success pull-right">Approve</button>
								<button type="submit"  name="action" value="decline" class="btn btn-danger pull-right">Decline</button> -->
							</div>
							</form>
                        @endforeach
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

  @include('admin.layout.footer')
  
</div>
</div>
<!-- ./wrapper -->
@include('admin.layout.script')
<script src="{{ asset('admin/js/pages/advanced-form-element.js') }}"></script>
<script src="{{ asset('admin/js/pages/dashboard2.js') }}"></script>
<script src="{{ asset('admin/js/pages/dashboard2-chart.js') }}"></script>
	
</body>
</html>
