<?php
  $page_title = 'All sale';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(3);
?>
<?php
$sales = find_all_sale();
?>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
    <link rel="stylesheet" href="libs/css/main.css" />
</head>
<script type="text/javascript">
function mampus(id){
    sts = confirm('Are you sure you want to delete this?');
    if(sts) {
        document.location.href="delete_sale.php?id="+id;
    } else {
        return false;
    }
}
</script>

<header id="header">
  <div class="header-content">
    <div class="rectangle"></div>
  </div>
</header>

<style>
  #header {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
  }
 .rectangle {
    width: 100%;
    height: 200px;
    background-color: #f1f2f7;
  }
  .col-md-12{
    padding-right: 70;
    padding-left: 70;
  }
</style>

<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>All Sales</span>
        </strong>
        <div class="pull-right">
          <a href="add_sale.php" class="btn btn-primary">Add sale</a>
        </div>
      </div>
      <div class="panel-body">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th class="text-center" style="width: 50px;">#</th>
              <th> Product name </th>
              <th class="text-center" style="width: 15%;"> Quantity</th>
              <th class="text-center" style="width: 15%;"> Total </th>
              <th class="text-center" style="width: 15%;"> Date </th>
              <th class="text-center" style="width: 100px;"> Actions </th>
              <th class="text-center" style="width: 100px;"> Grand Total </th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $grand_total = 0;
            foreach ($sales as $sale):?>
            <tr>
              <td class="text-center"><?php echo count_id();?></td>
              <td><?php echo remove_junk($sale['name']); ?></td>
              <td class="text-center"><?php echo (int)$sale['qty']; ?></td>
              <td class="text-center"><?php echo remove_junk($sale['price']); ?></td>
              <td class="text-center"><?php echo $sale['date']; ?></td>
              <td class="text-center">
                <div class="btn-group">
                  <a href="edit_sale.php?id=<?php echo (int)$sale['id'];?>" class="btn btn-warning btn-xs"  title="Edit" data-toggle="tooltip">
                    <span class="glyphicon glyphicon-edit"></span>
                  </a>
                  <a href="javascript:void()" onclick="mampus(<?php echo (int)$sale['id'];?>)" class="btn btn-danger btn-xs" title="Delete" data-toggle="tooltip">
    <span class="glyphicon glyphicon-trash"></span>
</a>
                  </a>
                </div>
              </td>
              <td class="text-center"><?php echo remove_junk($sale['price']); ?></td>
            </tr>
            <?php 
            $grand_total += (double)$sale['price'];
            endforeach;?>
          </tbody>
          <tfoot>
            <tr>
              <th colspan="3" class="text-right">Grand Total:</th>
              <th class="text-center"><?php echo $grand_total; ?></th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
<?php include_once('layouts/footer.php'); ?>
