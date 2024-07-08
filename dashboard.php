<?php
  $page_title = 'Admin Dashboard Page';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>
<?php
 $c_categorie     = count_by_id('categories');
 $c_product       = count_by_id('products');
 $c_sale          = count_by_id('sales');
 $c_user          = count_by_id('users');
 $products_sold   = find_higest_saleing_product('10');
 $recent_products = find_recent_product_added('5');
 $recent_sales    = find_recent_sale_added('10')
?>

<?php $user = current_user(); ?>
<!DOCTYPE html>
  <html lang="en">
    <head>
    <meta charset="UTF-8">
    <title><?php if (!empty($page_title))
           echo remove_junk($page_title);
            elseif(!empty($user))
           echo ucfirst($user['name']);
            else echo "Inventory Management System";?>
    </title>

    </head>
  <body>
  <?php  if ($session->isUserLoggedIn(true)): ?>
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

<body class="hold-transition sidebar-mini layout-fixed dark-mode" data-panel-auto-height-mode="height">
<div class="wrapper">
<header id="yo"> 
<nav class="navbar navbar-expand navbar-dark">


    <!-- Nav 1 -->
    <ul class="navbar-nav">
     <header id="header"> 
      <div class="header-content">
       <div class="pull-right clearfix">
        <ul class="info-menu list-inline list-unstyled">
         <ul class="nav homelog">
           <li class="info">
              <a href="admin.php" class="nav-link">Admin</a>
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
      
       </div>
      </div>
     </header>
    </ul>

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
    .rectangle {
    width: 100%;
    height: 60px;
    background-color: #343a40;
    }

.product-img-frame img {
  width: 10%;
  height: 10%;
  object-fit: cover;
  border-radius: 10px;
}

.product-title, .product-description {
  width: calc(100% - 150px); /* adjust this value based on the width of the image */
  margin-top: 0px;
  margin-left: -50px;
  vertical-align: top;
}
</style>
</nav>


  <!-- Navbar -->
  <nav class="navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
    </ul>
    

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    <div class="header-date pull-left">
    <strong><?php echo date("F j, Y, g:i a");?></strong>
    </div>


        <a class="nav-link" href="https://t.me/RashidahBookstoreTelegram">
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

  
  

 
  </header>


<div class="rectangle"></div>
<!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard v2</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v2</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-solid fa-user"></i></span>
              <a href="users.php" target="_blank" style="color:white;">
              <div class="info-box-content">
               
            <div class="panel-value pull-right" style="text-align: center;">
            <h2 class="margin-top"><?php echo $c_user['total']; ?></h2>
             <p class="text-muted">Users</p>
            </div>
               
             </a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-solid fa-layer-group"></i></span>
              <a href="categorie.php" target="_blank" style="color:white;">
              <div class="info-box-content">
        <div class="panel-value pull-right" style="text-align: center;">
          <h2 class="margin-top"> <?php  echo $c_categorie['total']; ?> </h2>
          <p class="text-muted">Categories</p>
        </div>
  </a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>
              <a href="sales.php" target="_blank" style="color:white;">
              <div class="info-box-content">
              <div class="panel-value pull-right" style="text-align: center;">
          <h2 class="margin-top"> <?php  echo $c_sale['total']; ?></h2>
          <p class="text-muted">Sales</p>
        </div>
  </a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-solid fa-box"></i></span>
              <a href="sales.php" target="_blank" style="color:white;">
              <div class="info-box-content">
              <div class="panel-value pull-right" style="text-align: center;">
          <h2 class="margin-top"> <?php  echo $c_product['total']; ?> </h2>
          <p class="text-muted">Products</p>
        </div>
  </a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
       
    
            <div class="row">
              <div class="col-md-6">
                 <!-- TABLE: LATEST ORDERS -->
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Highest Selling Products</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>Title</th>
                      <th>Total Sold</th>
                      <th>Total Quantity</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($products_sold as  $product_sold): ?>
                    <tr>
                      <td><a href="sales.php" target="_blank" ><?php echo remove_junk(first_character($product_sold['name'])); ?></a></td>
                      <td><span class="sparkbar" data-color="#00a65a" data-height="20"><?php echo (int)$product_sold['totalSold']; ?></span></td>
                      <td>
                        <div class="sparkbar" data-color="#00a65a" data-height="20"><?php echo (int)$product_sold['totalQty']; ?></div>
                      </td>
                    </tr>
                    <?php endforeach; ?>
                    
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->

            <div class="col-md-6">
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Latest Sales</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>Num.</th>
                      <th>Product Name</th>
                      <th>Date</th>
                      <th>Total Sale</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($recent_sales as  $recent_sale): ?>
                    <tr>
                    <td class="text-center"><?php echo count_id();?></td>
                      <td> <a target="_blank" href="edit_sale.php?id=<?php echo (int)$recent_sale['id']; ?>">
             <?php echo remove_junk(first_character($recent_sale['name'])); ?>
           </a></td>
                      <td><span class="sparkbar" data-color="#00a65a" data-height="20"><?php echo remove_junk(ucfirst($recent_sale['date'])); ?></td>
                      <td>
                        <div class="sparkbar" data-color="#00a65a" data-height="20">RM<?php echo remove_junk(first_character($recent_sale['price'])); ?></div>
                      </td>
                    </tr>
                    <?php endforeach; ?>
                  
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
  </div>

         
  <section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <!-- PRODUCT LIST -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Recently Added Products</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            <ul class="products-list product-list-in-card pl-2 pr-2">
              <?php foreach ($recent_products as $recent_product): ?>
                <li class="item">
                  <?php if ($recent_product['media_id'] === '0'): ?>
                    <div class="product-img-frame">
                      <img alt="Product Image" class="img-size-100" src="uploads/products/no_image.png" alt="">
                    </div>
                  <?php else: ?>
                    <div class="product-img-frame">
                      <img class="img-avatar img-circle" src="uploads/products/<?php echo $recent_product['image'];?>" alt="" />
                    </div>
                  <?php endif;?>
                  <div class="product-info">
                    <a target="_blank"  href="edit_product.php?id=<?php echo (int)$recent_product['id']; ?>" class="product-title">
                    <?php echo remove_junk(first_character($recent_product['categorie'])); ?>
                      <span class="badge badge-warning float-right">RM<?php echo (int)$recent_product['sale_price']; ?></span>
                    </a>
                    <span class="product-description">
                      <?php echo remove_junk(first_character($recent_product['name']));?>
                    </span>
                  </div>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
          <!-- /.card-body -->
          <div class="card-footer text-center">
            <a href="javascript:void(0)" class="uppercase">View All Products</a>
          </div>
          <!-- /.card-footer -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>
<!-- /.content -->


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
</body>
</html>

<?php endif;?>
<div class="page">
  <div class="container-fluid">
