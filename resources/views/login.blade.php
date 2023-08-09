<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">

    <title>Dark Trade Admin </title>
  
	<!-- Vendors Style-->
	<link rel="stylesheet" href="{{ asset('admin/css/vendors_css.css') }}">
	  
	<!-- Style-->  
	<link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('admin/css/skin_color.css') }}">	

</head>
	
<body class="hold-transition theme-primary bg-img" style="background-image: url({{ asset('admin/images/auth-bg/bg-1.jpg') }})">
	
	<div class="container h-p100">
		<div class="row align-items-center justify-content-md-center h-p100">	
			
			<div class="col-12">
				<div class="row justify-content-center g-0">
					<div class="col-lg-5 col-md-5 col-12">
						<div class="bg-white rounded10 shadow-lg">
							<div class="content-top-agile p-20 pb-0">
								<h2 class="text-primary">Let's Get Started</h2>
								<p class="mb-0">Log in to continue to Dark Trade</p>							
							</div>
							<div class="p-40">
								<form action="login" method="post">
                                @csrf
									<div class="form-group">
										<div class="input-group mb-3">
											<span class="input-group-text bg-transparent"><i class="ti-user"></i></span>
											<input type="text" class="form-control ps-15 bg-transparent" placeholder="Username" name="email">
										</div>
									</div>
									<div class="form-group">
										<div class="input-group mb-3">
											<span class="input-group-text  bg-transparent"><i class="ti-lock"></i></span>
											<input type="password" class="form-control ps-15 bg-transparent" placeholder="Password" name="password">
										</div>
									</div>
									  <div class="row">
										<!-- /.col -->
										<div class="col-12 text-center">
										  <button type="submit" class="btn btn-danger mt-10">SIGN IN</button>
										</div><br/><br/><br/>
										@if(session()->has('error'))
										<div class = "alert alert-error">
										{{ session()->get('error') }}
										</div>
										@endif
										<!-- /.col -->
									  </div>
								</form>		
							</div>						
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Vendor JS -->
	<script src="{{ asset('admin/js/vendors.min.js') }}"></script>
	<script src="{{ asset('admin/js/pages/chat-popup.js') }}"></script>
    <script src="{{ asset('admin/assets/icons/feather-icons/feather.min.js') }}"></script>	

</body>

</html>
