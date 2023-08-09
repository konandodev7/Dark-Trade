<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar position-relative">	
	  	<div class="multinav">
		  <div class="multinav-scroll" style="height: 100%;">	
			  <!-- sidebar menu-->
			  <ul class="sidebar-menu" data-widget="tree">
			  <li><a href="{{ url('user/dashboard')}}"><i data-feather="users"></i><span>Dashboard</span></a></li>
			  <li><a href="{{ url('/user/add-fund')}}"><i data-feather="users"></i><span>Add Money</span></a></li>
			  <!-- <li><a href="{{ url('/user/add-security-money')}}"><i data-feather="users"></i><span>Add Security Money</span></a></li> -->
			  <li><a href="{{ url('/user/view-withdraw')}}"><i data-feather="users"></i><span> Withdrawal Req</span></a></li>
			  <li><a href="{{ url('/user/view-transaction')}}"><i data-feather="users"></i><span>Transaction History</span></a></li>
			  <li><a href="{{ url('/user/apply-promocode')}}"><i data-feather="users"></i><span>Apply Promo Code</span></a></li>
			  <li><a href="{{ url('/user/edit-profile')}}"><i data-feather="users"></i><span>Profile Update</span></a></li>
			  <li class="treeview">
				  <a href="#">
					<i data-feather="users"></i>
					<span>Setting</span>
					<span class="pull-right-container">
					  <i class="fa fa-angle-right pull-right"></i>
					</span>
				  </a>
				  <ul class="treeview-menu">
					<li><a href="{{ url('/user/change-password')}}"></i>Change password</a></li>
				  </ul>
				</li>
				<li><a href="{{ url('/logout')}}"><i data-feather="users"></i><span>Logout</span></a></li>   
			  </ul>
			  
		  </div>
		</div>
    </section>
  </aside>