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
        <li class="header">Doctors Platform</li>
        <!-- Optionally, you can add icons to the links -->

		  <li class="treeview">
          <a href="#"><i class="fa fa-users"></i> <span>Profile Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="doctor_edit.php"><i class="fa fa-user-plus"></i>Update Profile</a></li>
			<!-- <li class="active"><a href="doctor_edit.php"><i class="fa fa-certificate"></i>Qualifications</a></li> -->
          </ul>
        </li>
		
		  <li class="treeview" >
          <a href="#"><i class="fa fa-stethoscope"></i> <span>Specialist Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="doctor_edit.php"><i class="fa fa-user-plus"></i>Add Specialist</a></li>
			<li class="active"><a href="doctor_edit.php"><i class="fa fa-search"></i>View/Edit/Delete Specialist</a></li>
          </ul>
        </li>
		
		<li class="treeview">
          <a href="#"><i class="fa fa-calendar"></i> <span>Patients Attendance Mgm.</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="patient_attendance_d.php"><i class="fa fa-calendar-check-o"></i>View Atendance</a></li>
			<!--<li class="active"><a href="pet_table.php"><i class="fa fa-search"></i>View/Edit/Delete Pet</a></li>-->
          </ul>
        </li>
		
<!--------------------------------------------------------------------------------------------- -->		
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
                    <li><a href="Vision_cb_d_table.php"><i class="fa fa-circle-o"></i>View Test Result</a></li>
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
                    <li><a href="Vision_ld_d_table.php"><i class="fa fa-circle-o"></i>View Test Result</a></li>
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
                    <li><a href="Vision_sd_d_table.php"><i class="fa fa-circle-o"></i>View Test Result</a></li>
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
                    <li><a href="hearing_fr_d_table.php"><i class="fa fa-circle-o"></i>View Test Result</a></li>
                    <!--<li><a href="#"><i class="fa fa-circle-o"></i>Graphical View</a></li>-->
                  </ul>
                </li>
				<li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i>Word Identification Test
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="hearing_wi_d_table.php"><i class="fa fa-circle-o"></i>View Test Result</a></li>
                    <!--<li><a href="#"><i class="fa fa-circle-o"></i>Graphical View</a></li> -->
                  </ul>
                </li>
              </ul> 
			 </li> 
		<!------------------------------------------------------------------ -->
			<li><a href="#"><i class="fa fa-stethoscope"></i>Sugessions</a></li>
          </ul>
        </li>
<!--------------------------------------------------------------------------------------------- -->
		
		
		<li class="treeview">
          <a href="#"><i class="fa fa-exclamation-triangle"></i> <span>Critical Patients Mgm.</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
			<li class="active"><a href="doctor_patient_list-critical.php"><i class="fa fa-search"></i>View/notify Critical Patients</a></li>
          </ul>
        </li>
		
		<li class="treeview">
          <a href="#"><i class="fa  fa-file-text-o"></i> <span>Patients List</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
			<li class="active"><a href="doctor_patient_list-approved.php"><i class="fa fa-search"></i>View all Patients</a></li>
          </ul>
        </li>
		
		
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>