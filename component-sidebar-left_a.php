<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="images/<?php echo $_SESSION['profile_image']; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['first_name']; echo" "; echo $_SESSION['last_name']; ?></p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Admin Platform</li>
        <!-- Optionally, you can add icons to the links -->

		  <li class="treeview">
          <a href="#"><i class="fa fa-user-secret"></i> <span>Admin profile Mgm</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="signup_a.php"><i class="fa fa-user-plus"></i>Add Profile</a></li>
			<li class="active"><a href="admin_table.php"><i class="fa fa-search"></i>Edit/Delete Profile</a></li>
          </ul>
        </li>
		
		<li class="treeview">
          <a href="#"><i class="fa fa-users"></i> <span>Patients profile Mgm.</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="admin_patient_list-approved.php"><i class="fa fa-plus-square"></i>Profile list</a></li>
		 <!-- 	<li class="active"><a href="admin_patient_list-notapproved.php"><i class="fa fa-search"></i>Pending Profile list</a></li> -->
          </ul>
        </li>
		
         <li class="treeview">
          <a href="#"><i class="fa fa-users"></i> <span>Doctors profile Mgm.</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="admin_doctor_list-approved.php"><i class="fa fa-plus-square"></i>Profile list</a></li>
			<li class="active"><a href="admin_doctor_list-notapproved.php"><i class="fa fa-search"></i>Pending Profile list</a></li>
          </ul>
        </li>
		
		<li class="treeview">
          <a href="#"><i class="fa fa-credit-card"></i> <span>RFID Card Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
			<li class="active"><a href="rfid_a_view.php"><i class="fa fa-search"></i>View/Delete RFID Card</a></li>
          </ul>
        </li>
		
		<li class="treeview">
          <a href="#"><i class="fa fa-map-pin"></i> <span>Portal Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
		  	<li class="active"><a href="portal form.php"><i class="fa fa-user-plus"></i>Add New Portal</a></li>
			<li class="active"><a href="portal_table.php"><i class="fa fa-search"></i>View/Delete Portal</a></li>
			<li class="active"><a href="portal_a_livetraffic_table.php"><i class="fa fa-refresh"></i>Portal Live traffic</a></li>
			<li class="active"><a href=""><i class="fa fa-warning"></i>Portal Warnings and Errors</a></li>
			<li class="active"><a href=""><i class="fa fa-wrench"></i>Portal maintanance</a></li>			
          </ul>
        </li>


        <li class="treeview">
          <a href="#"><i class="fa fa-calendar-plus-o"></i> <span>Appointment Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
			<li class="active"><a href="appointment_a_table.php"><i class="fa fa-search"></i>View/Delete Appoinment</a></li>
          </ul>
        </li>

		
		<li class="treeview">
          <a href="#"><i class="fa fa-money"></i> <span>Payment Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="payment_a_table_approved.php"><i class="fa fa-check"></i>Approved Paid list</a></li>
            <li class="active"><a href="payment_a_table_notapproved.php"><i class="fa fa-refresh"></i>Pending Paid list</a></li>
           <!-- <li class="active"><a href=""><i class="fa fa-close"></i>Not Paid list</a></li> -->
          </ul>
        </li>
		

      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>