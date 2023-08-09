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
						  <h4 class="box-title">Add</h4>
						</div><br/>
							<span style="color:red; bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Info : Maintain Rs. 10,000 atleast for daily profit</span>
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
								<form method="post" action="{{ url('/user/create-withdrawal-req')}}" enctype="multipart/form-data">
								@csrf	
								<div class="form-group row">
								  <label for="example-number-input" class="col-sm-2 col-form-label">Amount</label>
								  <div class="col-sm-10">
									<input class="form-control" type="number" name="amount"  id="example-number-input">
								  </div>
								</div>
								<div class="box-footer">

								<!-- <button type="submit" class="btn btn-success pull-right">Withdraw</button> -->
								<input type="submit" value="Withdraw" class="btn btn-success pull-right" />
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
        <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">All Withdrawal List</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
                                <th>ID</th>
								<th>Amount</th>
								<th>Description</th>
								<th>Status</th>
								<th>Date</th>
							</tr>
						</thead>
						<tbody>
						@foreach ($lists as $data)
							<tr>
								<td>{{$data->id}}</td>
								<td>{{$data->amount	}}</td>
								<td>{{$data->des}}</td>
								<td><button type="submit" class="btn btn-primary">{{$data->status}}</button></td>
								<td>{{$data->created_at}}</td>
							</tr>
                        @endforeach
						</tbody>
					  </table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
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
