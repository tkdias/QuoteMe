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
        <li class="header">Patients Platform</li>
        <!-- Optionally, you can add icons to the links -->

		  <li class="treeview">
          <a href="#"><i class="fa fa-users"></i> <span>Profile Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="patient_edit.php"><i class="fa fa-user-plus"></i>Update Profile</a></li>
			<li class="active"><a href="patient_other.php"><i class="fa fa-medkit"></i>Other Informations</a></li>
          </ul>
        </li>
		
		<li class="treeview">
          <a href="#"><i class="fa fa-credit-card"></i> <span>RFID Card Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="rfid_p_view.php"><i class="fa fa-exclamation-circle"></i>RFID Card Information</a></li>
			<li class="active"><a href="rfid_p_form.php"><i class="fa fa-search"></i>Get New RFID Card</a></li>
          </ul>
        </li>
		
		<li class="treeview">
          <a href="#"><i class="fa fa-map-pin"></i> <span>Portal information</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
			<li class="active"><a href="portal_p_table.php"><i class="fa fa-search"></i>Portal Informations</a></li>
			<li class="active"><a href="portal_p_livetraffic_table.php"><i class="fa fa-refresh"></i>Portal Live traffic</a></li>
          </ul>
        </li>
		
		<li class="treeview">
          <a href="#"><i class="fa fa-calendar-plus-o"></i> <span>Appointment Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="appointment_p_form.php"><i class="fa fa-clock-o"></i>Add an Appoinment</a></li>
			<li class="active"><a href="appointment_p_table.php"><i class="fa fa-search"></i>View Appoinment</a></li>
          </ul>
        </li>
		
		
		<li class="treeview">
          <a href="#"><i class="fa fa-medkit"></i> <span>Checkup Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
		  <ul class="treeview-menu">
		  <!------------------------------------------------------------------ -->
		  <li class="treeview">
              <a href="#"><i class="fa fa-eye"></i> Vision Checkup
                <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
              </a>
              <ul class="treeview-menu">
                <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i>Color blindness test
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="Vision_cb_p_table.php"><i class="fa fa-circle-o"></i>View Test Result</a></li>
                    <!-- <li><a href="#"><i class="fa fa-circle-o"></i>Graphical View</a></li> -->
                  </ul>
                </li>
				<li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i>Long Distance test
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="Vision_ld_p_table.php"><i class="fa fa-circle-o"></i>View Test Result</a></li>
                    <!-- <li><a href="#"><i class="fa fa-circle-o"></i>Graphical View</a></li> -->
                  </ul>
                </li>
				<li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i>Short Distance test
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="Vision_sd_p_table.php"><i class="fa fa-circle-o"></i>View Test Result</a></li>
                    <!-- <li><a href="#"><i class="fa fa-circle-o"></i>Graphical View</a></li> -->
                  </ul>
                </li>
              </ul> 
			 </li> 
		<!------------------------------------------------------------------ -->
		  <!------------------------------------------------------------------ -->
		  <li class="treeview">
              <a href="#"><i class="fa fa-volume-up"></i> Hearing Checkup
                <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
              </a>
              <ul class="treeview-menu">
                <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i>Frequency test
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="hearing_fr_p_table.php"><i class="fa fa-circle-o"></i>View Test Result</a></li>
                   <!-- <li><a href="#"><i class="fa fa-circle-o"></i>Graphical View</a></li> -->
                  </ul>
                </li>
				<li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i>Word Identification Test
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="hearing_wi_p_table.php"><i class="fa fa-circle-o"></i>View Test Result</a></li>
                   <!-- <li><a href="#"><i class="fa fa-circle-o"></i>Graphical View</a></li> -->
                  </ul>
                </li>
              </ul> 
			 </li> 
		<!------------------------------------------------------------------ -->
			<li><a href="#"><i class="fa fa-stethoscope"></i>Sugessions</a></li>
          </ul>
        </li>
		
		
		<li class="treeview">
          <a href="#"><i class="fa fa-calendar"></i> <span>Attendance Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="patient_attendance.php"><i class="fa fa-calendar-check-o"></i>View Atendance</a></li>
			<!--<li class="active"><a href="pet_table.php"><i class="fa fa-search"></i>View/Edit/Delete Pet</a></li>-->
          </ul>
        </li>
		
		<li class="treeview">
          <a href="#"><i class="fa fa-bell"></i> <span>Notification Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
			<li class="active"><a href=""><i class="fa fa-search"></i>Read/Delete Notifications</a></li>
          </ul>
        </li>
		
		<li class="treeview">
          <a href="#"><i class="fa fa-money"></i> <span>Payment Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="payment_p_form.php"><i class="fa fa-plus"></i>Add Payment</a></li>
			<li class="active"><a href="payment_p_table.php"><i class="fa fa-search"></i>View Payment</a></li>
          </ul>
        </li>
		
		
		
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>