<header class="main-header">
        <!-- Logo -->
        <a href="<?php echo Request::base_url();?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini">KB CMS</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg">KB CMS</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <!-- Control Sidebar Toggle Button -->
              <li>
                  <a href="<?php echo Request::base_url();?>/login/logout" title="Logout"><i class="fa fa-sign-out"></i> Logout</a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo Request::base_url();?>/assets/dist/img/avatar5.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>Admin</p>
            </div>
          </div>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li>
              <a href="<?php echo Request::base_url();?>">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-table"></i> <span>Manage Articles</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo Request::base_url();?>/articles/all"><i class="fa fa-circle-o"></i> View All Posts</a></li>
                <li><a href="<?php echo Request::base_url();?>/articles/add"><i class="fa fa-circle-o"></i> Add New</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-table"></i> <span>Manage Category</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo Request::base_url();?>/categories/all"><i class="fa fa-circle-o"></i> View All Categories</a></li>
                <li><a href="<?php echo Request::base_url();?>/categories/add"><i class="fa fa-circle-o"></i> Add New</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-table"></i> <span>Media File</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo Request::base_url();?>/media/all"><i class="fa fa-circle-o"></i> View All Files</a></li>
                <li><a href="<?php echo Request::base_url();?>/media/add"><i class="fa fa-circle-o"></i> Add New</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-table"></i> <span>Manage Users</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo Request::base_url();?>/users/all"><i class="fa fa-circle-o"></i> View All Users</a></li>
                <li><a href="<?php echo Request::base_url();?>/users/add"><i class="fa fa-circle-o"></i> Add New</a></li>
              </ul>
            </li>
            <!--<li>
              <a href="<?php echo Request::base_url();?>/settings"> 
                <i class="fa fa-table"></i> <span>Settins</span>
              </a>
            </li>-->
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>