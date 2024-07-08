<?php
  $page_title = 'Change Password';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(3);
?>
<?php $user = current_user(); ?>
<?php
  if(isset($_POST['update'])){

    $req_fields = array('new-password','old-password','id' );
    validate_fields($req_fields);

    if(empty($errors)){

             if(sha1($_POST['old-password']) !== current_user()['password'] ){
               $session->msg('d', "Your old password not match");
               redirect('change_password.php',false);
             }

            $id = (int)$_POST['id'];
            $new = remove_junk($db->escape(sha1($_POST['new-password'])));
            $sql = "UPDATE users SET password ='{$new}' WHERE id='{$db->escape($id)}'";
            $result = $db->query($sql);
                if($result && $db->affected_rows() === 1):
                  $session->logout();
                  $session->msg('s',"Login with your new password.");
                  redirect('index.php', false);
                else:
                  $session->msg('d',' Sorry failed to updated!');
                  redirect('change_password.php', false);
                endif;
    } else {
      $session->msg("d", $errors);
      redirect('change_password.php',false);
    }
  }
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
    <link rel="stylesheet" href="libs/css/main.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">

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
    background-color: #202b38;
  }

.login-page {
    width: 350px;
    padding: 0 20px;
    background-color: #212121;
    border: 1px solid #333;
    margin: 0 auto;
    justify-content: center;
    position: absolute;
    top: 50%; 
    left: 50%;
    transform: translate(-50%, -50%); 
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    color: #fff;
}

.login-page .text-center {
    color: #fff; /* White text color for headings */
}

.login-page .form-control {
    background-color: #333; /* Dark gray input background */
    border: 1px solid #444; /* Dark gray input border */
    color: #fff; /* White input text color */
}

.login-page .btn-danger {
    background-color: #660000; /* Dark red button background */
    border-color: #660000; /* Dark red button border */
    color: #fff; /* White button text color */
}

.login-page .forget a, .login-page .register a {
    color: #fff; /* White link color */
    text-decoration: underline;
}

.login-page .forget a:hover, .login-page .register a:hover {
    color: #ccc; /* Light gray link hover color */
}

.btn {
    border-radius: 3px;
    -webkit-transition: all 300ms ease-in-out;
    -moz-transition: all 300ms ease-in-out;
    transition: all 300ms ease-in-out;
}
.btn-info {
    color: #fff;
    background-color: #5bc0de;
    border-color: #46b8da;
}
.btn {
    display: inline-block;
    padding: 6px 12px;
    margin-bottom: 0;
    font-size: 14px;
    font-weight: 400;
    line-height: 1.42857143;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -ms-touch-action: manipulation;
    touch-action: manipulation;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-image: none;
    border: 1px solid transparent;
    border-radius: 4px;
    display: block;
    margin: 0 auto;
    display: flex;
    justify-content: center;
}

</style>




<div class="login-page">
    <div class="text-center">
       <h3>Change your password</h3>
     </div>
     <?php echo display_msg($msg); ?>
      <form method="post" action="change_password.php" class="clearfix">
        <div class="form-group">
              <label for="newPassword" class="control-label">New password</label>
              <input type="password" class="form-control" name="new-password" placeholder="New password">
        </div>
        <div class="form-group">
              <label for="oldPassword" class="control-label">Old password</label>
              <input type="password" class="form-control" name="old-password" placeholder="Old password">
        </div>
        <div class="form-group clearfix">
               <input type="hidden" name="id" value="<?php echo (int)$user['id'];?>">
                <button type="submit" name="update" class="btn btn-info">Change</button>
        </div>
    </form>
</div>
<?php include_once('layouts/footer.php'); ?>
