<?php 
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
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
				@if(session()->has('success'))
                <div class = "alert alert-success">
                {{ session()->get('success') }}
				</div>
                @endif
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
								<th>UID</th>
								<th>Name</th>
								<th>Amount</th>
								<th>Status</th>
								<th>Date</th>
								<th>Transaction Id</th>
								<th>Action</th>
								
							</tr>
						</thead>
						<tbody>
						@foreach ($lists as $data)
							<tr>
								<?php  $data1=DB::table('members')->get()->where('uid','=',$data->uid); 
								?>
								@foreach ($data1 as $member)
								<td>{{$data->uid}}</td>
								<td>{{$member->name}}</td>
								<td>{{$data->amount	}}</td>
								<td><button type="submit" class="btn btn-primary">{{$data->status}}</button></td>
								<td>{{$data->created_at}}</td>
                                <td>{{$data->transaction_id	}}</td>
								@endforeach
								<td><a href=""><input type="submit" value="Action" class="btn btn-success pull-right" /></a></td>
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

  @include('admin.layout.footer')
  
</div>
<!-- ./wrapper -->
@include('admin.layout.script')
<script src="{{ asset('admin/js/pages/dashboard2.js') }}"></script>
<script src="{{ asset('admin/js/pages/dashboard2-chart.js') }}"></script>	
</body>
</html>
