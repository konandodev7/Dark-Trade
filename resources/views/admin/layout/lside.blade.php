<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar position-relative">	
	  	<div class="multinav">
		  <div class="multinav-scroll" style="height: 100%;">	
			  <!-- sidebar menu-->
			  <ul class="sidebar-menu" data-widget="tree">
			  <li><a href="{{ url('admin/dashboard')}}"><i data-feather="users"></i><span>Dashboard</span></a></li>
				<li class="treeview">
				  <a href="#">
					<i data-feather="users"></i>
					<span>Members</span>
					<span class="pull-right-container">
					  <i class="fa fa-angle-right pull-right"></i>
					</span>
				  </a>
				  <ul class="treeview-menu">
					<li><a href="{{ url('/admin/view-member')}}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>View</a></li>
				  </ul>
				</li>

				<li class="treeview">
				  <a href="#">
					<i data-feather="users"></i>
					<span>Finance</span>
					<span class="pull-right-container">
					  <i class="fa fa-angle-right pull-right"></i>
					</span>
				  </a>
				  <ul class="treeview-menu">
					<li><a href="{{ url('/admin/edit-percentage')}}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Manage Percentage </a></li>
				  </ul>
				</li>

				<li><a href="{{ url('/admin/view-payment-add-request')}}"><i data-feather="users"></i><span>Payment Add Request</span></a></li>

				<li><a href="{{ url('/admin/view-withdrawal')}}"><i data-feather="users"></i><span>Withdrawal Request</span></a></li>

				<li><a href="{{ url('/admin/view-transaction')}}"><i data-feather="users"></i><span>Transaction History</span></a></li>

				<li class="treeview">
				  <a href="#">
					<i data-feather="users"></i>
					<span>Promo Code</span>
					<span class="pull-right-container">
					  <i class="fa fa-angle-right pull-right"></i>
					</span>
				  </a>
				  <ul class="treeview-menu">
					<li><a href="{{ url('admin/create-promocode')}}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Create </a></li>
					<li><a href="{{ url('admin/view-promocode')}}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>View</a></li>
				  </ul>
				</li>
				<!-- <li><a href="{{ url('/admin/change-password')}}"><i data-feather="users"></i><span>Change Password</span></a></li>
				<li><a href="{{ url('/admin/change-key')}}"><i data-feather="users"></i><span>Change Payment Keys</span></a></li> -->
				<li><a href="{{ url('/logout')}}"><i data-feather="users"></i><span>Logout</span></a></li>     
			  </ul>
			  
		  </div>
		</div>
    </section>
  </aside>