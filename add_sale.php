<?php

  $page_title = 'Add Sale';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(3);
?>
<?php

  if(isset($_POST['add_sale'])){
    $req_fields = array('s_id','quantity','price','total', 'date' );
    validate_fields($req_fields);
        if(empty($errors)){
          $p_id      = $db->escape((int)$_POST['s_id']);
          $s_qty     = $db->escape((int)$_POST['quantity']);
          $s_total   = $db->escape($_POST['total']);
          $date      = $db->escape($_POST['date']);
          $s_date    = make_date();

          $sql  = "INSERT INTO sales (";
          $sql .= " product_id,qty,price,date";
          $sql .= ") VALUES (";
          $sql .= "'{$p_id}','{$s_qty}','{$s_total}','{$s_date}'";
          $sql .= ")";

                if($db->query($sql)){
                  update_product_qty($s_qty,$p_id);
                  $session->msg('s',"Sale added. ");
                  redirect('add_sale.php', false);
                } else {
                  $session->msg('d',' Sorry failed to add!');
                  redirect('add_sale.php', false);
                }
        } else {
           $session->msg("d", $errors);
           redirect('add_sale.php',false);
        }
  }

?>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
    <link rel="stylesheet" href="libs/css/main.css" />
</head>

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
  .col-md-6 {
    padding-right: 70;
    padding-left: 70;
  }
  .col-md-12 {
    padding-right: 70;
    padding-left: 70;
  }

input[class="form control quantity"]{
    text-align: center;
    font-size: 15px;
    border: none;
    background-color: #ffffff;
    color: #202030;
    background-color: #51aded;
    padding: 7px 0px 7px 0px;
    width: 30%;
    color: white;
}

input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button{
    -webkit-appearance: none;
    margin: 0;
}

button {
    background-color: #51aded;
    border: none;
    font-size: 15px;
    cursor: pointer;
}

#decrement{
    padding: 7px 5px 7px 15px;
    border-radius: 45px 0 0 45px;
    color: white;
}
#increment{
    padding: 7px 15px 7px 5px;
    border-radius: 0 45px 45px 0;
    color: white;
}

button:hover {
  background-color: #3F6791;
}

</style>

<!-- Search Box Add to Sale -->
<div class="row">
  <div class="col-md-6">
    <?php echo display_msg($msg); ?>
    <form method="post" action="ajax.php" autocomplete="off" id="sug-form">
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-btn">
            <button type="submit" class="btn btn-primary">Add to Sale</button>
            </span>
            <input type="text" id="sug_input" class="form-control" name="title"  placeholder="Search for product barcode">
         </div>
         <div id="result" class="list-group"></div>
        </div>
    </form>
  </div>
</div>
<!-- Search Box Add to Sale -->


<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Sale Edit</span>
       </strong>
      </div>
      <div class="panel-body">
        <form method="post" action="add_sale.php">
         <table class="table table-bordered">
           <thead>
            <th> Item </th>
            <th> Price </th>
            <th> Qty </th>
            <th> Total </th>
            <th> Date</th>
            <th> Action</th>
           </thead>
       
             <tbody  id="product_info"> </tbody>

         </table>
         <button onclick="location.reload()" type="button" class="btn btn-primary" style="background-color: red; color: white;">Cancel</button>
       </form>
      </div>
    </div>
  </div>

</div>

<script>
  document.getElementById('sug-form').addEventListener('submit', function() {
    setTimeout(function() {
      document.getElementById('sug_input').value = '';
    }, 0);
  });
</script>

<?php include_once('layouts/footer.php'); ?>


