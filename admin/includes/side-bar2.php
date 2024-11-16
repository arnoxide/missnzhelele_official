<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <!-- <img src="images/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
      <span class="brand-text font-weight-light">Miss Nzhelele Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
   <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
    <img src="dist/img/avatar.png" class="img-square elevation-3" style="width:30px;  border-radius:10%;" alt="User Image">        </div>
        <div class="info">
          <!-- <a href="#" class="d-block" style="margin-top: -12px"><?php //echo $_SESSION['username'];?></a> -->
         <a href="#" style="color: #239db1; font-size: 15px"><i class="fa fa-circle text-primary" style="font-size: 13px;"></i> Admin</a>
        </div>

      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="dashboard.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="postimages.php" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
              contestants
              </p>
            </a>
          </li>
          <!-- <li class="nav-item menu-open">
            <a href="postimages.php" class="nav-link active">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                contestants
              </p>
            </a>
          </li> -->
          <!-- <li class="nav-item">
            <a href="postcategory.php" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Post Category
              </p>
            </a>
          </li> -->
          <li class="nav-item">
            <a href="tickets.php" class="nav-link">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Tickets
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="memberinfo.php" class="nav-link">
              <i class="nav-icon fas fa-info-circle"></i>
              <p>
                Users
              </p>
            </a>
          </li>
         
          <li class="nav-item">
            <a href="usermanagement.php" class="nav-link">
              <i class="nav-icon fas fa-users-cog"></i>
              <p>
                User Management
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../ticket/qr/scan" class="nav-link">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Scan
              </p>
            </a>
          <li class="nav-item">
            <a href="../index.php" class="nav-link">
              <i class="nav-icon fas fa-power-off"></i>
              <p>
                Logout
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>