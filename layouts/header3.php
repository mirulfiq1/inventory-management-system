<?php $user = current_user(); ?>
<?php  if ($session->isUserLoggedIn(true)): ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Rashidah Bookstore</title>
    
      <!-- Google Font: Source Sans Pro -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
      <!-- Theme style -->
      <link rel="stylesheet" href="dist/css/adminlte.min.css">
      <!-- overlayScrollbars -->
      <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    </head>

    <style>
      .header-date {
           padding: 10px;
           border-radius: 5px;
           font-size: 15px;
           font-weight: bold;
           display: flex;
           align-items: center;
       }
    
       #yo {
           position: fixed;
           z-index: 9999;
           top: 0;
           left: 0;
           width: 100%;
       } 
   
       #header {
           z-index: 100;
           top: 0;
           left: 0;
           width: 100%;
       }
   
      .profile a.toggle{
           width: 150px; 
           height: 35px; 
           background-color: #f5f5f5;
           border-radius: 50px;
           top: 10px;
           right: 20px;
           padding-right: 10px;
           padding-left: 10px;
           float: right;
           position: absolute;  
       }
   
      .profile a.toggle {
           display: flex;
           align-items: center;
       }
   
      .profile a.toggle img {
           width: 30px;
           height: 30px;
           border-radius: 50%;
           margin-right: 10px;
       }
      .profile a.toggle span {
           font-size: 14px;
       }
       
       </style>  
</head>

<title>
  <?php if (!empty($page_title))
      echo remove_junk($page_title);
  elseif(!empty($user))
      echo ucfirst($user['name']);
  else echo "Inventory Management System";?>
</title>

    <header id="yo"> 
      <nav class="main-header navbar navbar-expand navbar-dark">


          <!-- Nav 1 -->
          <ul class="navbar-nav">
          <header id="header"> 
            <div class="header-content">
            <div class="pull-right clearfix">
          <ul class="info-menu list-inline list-unstyled">
          <ul class="nav homelog">
           <li class="info">
             
           </li>
           <li class="info">
              <a href="logout.php" class="nav-link">Logout</a>
           </li>
          </ul>
            <li class="profile">
          <a href="#" data-toggle="dropdown" class="toggle" aria-expanded="false">
              <img src="uploads/users/<?php echo $user['image'];?>" alt="user-image" class="img-circle img-inline">
              <span><?php echo remove_junk(ucfirst($user['name']));?> <i class="caret"></i></span>
          </a>
          <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <li class="nav-item">
          <a href="profile.php?id=<?php echo (int)$user['id'];?>" class="dropdown-item">
            <i class="glyphicon glyphicon-user"></i>
              Profile
          </a>
        </li>
        <div class="dropdown-divider"></div>
        <li class="nav-item">
          <a href="edit_account.php" class="dropdown-item">
            <i class="glyphicon glyphicon-cog"></i>
              Settings
            </a>
          </li>
            </ul>
          </li>
            </ul>
            </div>
            </div>
          </header>
        </ul>
      </nav>

<body class="hold-transition sidebar-mini layout-fixed dark-mode" data-panel-auto-height-mode="height">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <div class="header-date pull-left">
        <strong><?php echo date("F j, Y, g:i a");?></strong>
        </div>

        <a class="nav-link" href="https://t.me/RashidahBookstoreTelegram" target="_blank">
          <i class="far fa-comments"></i>
        </a>
    
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>

    </ul>
  </nav>
  <!-- /.navbar -->

 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="admin.php" class="brand-link">
    <img src="dist/img/R2.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Rashidah Bookstore</span>
  </a>

  
  <!-- Sidebar -->
<div class="sidebar">



    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-solid fa-chart-pie"></i>
            <p>
              Sales
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="sales.php" class="nav-link">
                <i class="fas fa-minus nav-icon"></i>
                <p>Manage Sales</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="add_sale.php" class="nav-link">
                <i class="fas fa-minus nav-icon"></i>
                <p>Add Sales</p>
              </a>
            </li>

          </ul>
        </li>
        
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-solid fa-file"></i>
            <p>
              Report
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="sales_report.php" class="nav-link">
                <i class="fas fa-minus nav-icon"></i>
                <p>Sales By Dates</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="monthly_sales.php" class="nav-link">
                <i class="fas fa-minus nav-icon"></i>
                <p>Monthly Sales</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="daily_sales.php" class="nav-link">
                <i class="fas fa-minus nav-icon"></i>
                <p>Daily Sales</p>
              </a>
            </li>
          </ul>
        </li> 
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper iframe-mode bg-dark" data-widget="iframe" data-auto-dark-mode="true" data-loading-screen="750">
    <div class="nav navbar navbar-expand-lg navbar-dark border-bottom border-dark p-0">
      <a class="nav-link bg-danger" href="#" data-widget="iframe-close">Close</a>
     
      <ul class="navbar-nav" role="tablist">
      </ul>
      
      <a class="nav-link bg-dark" href="#" data-widget="iframe-fullscreen"><i class="fas fa-expand"></i></a>
    </div>
    <div class="tab-content">
      <div class="tab-empty">
      <h2 class="display-4">Welcome to <hr>Rashidah Rashid <br> Inventory Management <br> System</h2>
      <style>
        .display-4{
          text-align: center;
        }
        </style>
      </div>
      <div class="tab-loading">
        <div>
          <h2 class="display-4">Tab is loading <i class="fa fa-sync fa-spin"></i></h2>
        </div>
      </div>
    </div>
  </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer dark-mode">
      <strong>Copyright &copy; 2024 <a href="https://businessreport.ctoscredit.com.my/oneoffreport_api/single-report/malaysia-business/SA0110453P/RASHIDAH-RASHID-ENTERPRISE">Rashidah Bookstore</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.0.0
      </div>
    </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

<?php endif;?>
</body>
</html>