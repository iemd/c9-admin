<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Admin</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
     <!--- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>--->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">

    <li class="active treeview">
      <a href="index.php">
        <i class="glyphicon glyphicon-th-large"></i> <span>Dashboard</span>
        <!-- <span class="label label-primary pull-right">1</span>-->
      </a>
	  
    </li>
          <li class="treeview">
      <a href="#">
        <i class="glyphicon glyphicon-user"></i>
        <span>News Buletin</span><i class="fa fa-angle-left pull-right"></i>
      </a>
        <ul class="treeview-menu">
          <li><a href="news_buletin_create"><i class="glyphicon glyphicon-hand-right"></i>Create News Buletin</a></li>
		  <li><a href="news_buletin_view"><i class="glyphicon glyphicon-hand-right"></i>List All News Buletin</a></li>
	   </ul>
    </li>
       
        
          <li class="treeview">
      <a href="#">
        <i class="glyphicon glyphicon-user"></i>
        <span>Manage Event</span><i class="fa fa-angle-left pull-right"></i>
      </a>
        <ul class="treeview-menu">
          <li><a href="event_create"><i class="glyphicon glyphicon-hand-right"></i>Create Event</a></li>
		  <li><a href="event_view"><i class="glyphicon glyphicon-hand-right"></i>List All Event</a></li>
	   </ul>
    </li>
      
          <li class="treeview">
      <a href="#">
        <i class="glyphicon glyphicon-user"></i>
        <span>Paid Item</span><i class="fa fa-angle-left pull-right"></i>
      </a>
        <ul class="treeview-menu">
          <li><a href="admin_create.php"><i class="glyphicon glyphicon-hand-right"></i>Create New Paid Item</a></li>
		  <li><a href="admin_view.php"><i class="glyphicon glyphicon-hand-right"></i>List All Paid Item</a></li>
	   </ul>
    </li>
                <li class="active treeview">
      <a href="introducer"><i class="glyphicon glyphicon-th-large"></i> <span>Introducer</span>
        <!-- <span class="label label-primary pull-right">1</span>-->
      </a>
	  
    </li>
          <!--<li class="treeview">
      <a href="#">
        <i class="glyphicon glyphicon-user"></i>
        <span><strong>Transaction Manager</strong></span><i class="fa fa-angle-left pull-right"></i>
      </a>
              <ul class="treeview-menu">
          <li><a href="transaction_create.php"><i class="glyphicon glyphicon-hand-right"></i>Create Transaction</a></li>
		  <li><a href="transaction.php"><i class="glyphicon glyphicon-hand-right"></i>List All Transaction</a></li>
	   </ul>
    </li>-->
          <li class="active treeview">
      <a href="transaction.php"><i class="glyphicon glyphicon-th-large"></i> <span>Transaction Manager</span>
        <!-- <span class="label label-primary pull-right">1</span>-->
      </a>
	  
    </li>
          <li class="active treeview">
      <a href="assistance.php"><i class="glyphicon glyphicon-th-large"></i> <span>Parking Assistance</span>
        <!-- <span class="label label-primary pull-right">1</span>-->
      </a>
	  
    </li>
	 
	<!--<li class="treeview">
      <a href="#">
        <i class="glyphicon glyphicon-user"></i>
        <span><strong>Employee</strong></span><i class="fa fa-angle-left pull-right"></i>
      </a>
        <ul class="treeview-menu">
          <li><a href="employee_registration.php"><i class="glyphicon glyphicon-hand-right"></i>New Employee</a></li>
		  <li><a href="employee_detail.php"><i class="glyphicon glyphicon-hand-right"></i>View All</a></li>
	   </ul>
    </li>-->


 </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <style>
  table td {font-family:'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;}
      .sidebar-menu li a {font-family:'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif; }
  .user-panel>.image>img {    max-width: 58px !important;
    height: 55px !important;}
	.user-panel>.info { left:68px !important}
	.dist { width:100px}
.dist .btn{padding: 1px 5px !important;
    margin-right: 13px !important;}
  </style>
