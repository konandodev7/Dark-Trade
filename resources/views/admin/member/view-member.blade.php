<!DOCTYPE html>
<html lang="en">
<?php 
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
?>
  
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
				  <h3 class="box-title">All User List</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
                                <th>ID</th>
								<th>Name</th>
								<th>Email</th>
								<th>Phone</th>	
								<th>Deposit</th>
								<th>Wallet</th>
								<th>Bank Details</th>
								<th>UPI</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						@foreach ($lists as $member)
							<tr>
							<?php  $data=DB::table('wallets')->get()->where('uid','=',$member->uid); 
                            ?>
								<td>{{$member->uid}}</td>
								<td>{{$member->name}}</td>
								<td>{{$member->email}}</td>
								<td>{{$member->phone}}</td>
								@foreach ($data as $wallet)
								<td>{{$wallet->security_amount}}</td>
								<td>{{$wallet->wallet_balance}}</td>
								@endforeach
								<td>name - {{$member->account_holder}}<br/>
								    a/c no - {{$member->account_no}}<br/>
								    Ifsc - {{$member->account_ifsc}}</td>
								 <td>{{$member->upi}}</td> 
								<td><a href="edit-member/{{$member->uid}}"><input type="submit" value="Edit" class="btn btn-success pull-right" /></a></td>
							</tr>
                        @endforeach
						</tbody>
						<tfoot>
							<tr>
								<<th>ID</th>
								<th>Name</th>
								<th>Email</th>
								<th>Phone</th>	
								<th>Deposit</th>
								<th>Wallet</th>
								<th>Bank Details</th>
								<th>UPI</th>
								<th>Action</th>
							</tr>
						</tfoot>
					  </table>
					</div>
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
