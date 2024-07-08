<?php
  ob_start();
  require_once('includes/load.php');
  if($session->isUserLoggedIn(true)) { redirect('index.php', false);}
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
    <link rel="stylesheet" href="libs/css/main.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
<style>

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

.btn-danger {
    background-color: #ed5153; 
}
.btn {
    border-radius: 3px;
    -webkit-transition: all 300ms ease-in-out;
    -moz-transition: all 300ms ease-in-out;
    transition: all 300ms ease-in-out;
}
.btn-danger {
    color: #fff;
    background-color: #d9534f;
    border-color: #d43f3a;
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

.forget {
    display: flex;
    justify-content: center;
}

.register {
    display: flex;
    justify-content: center;
}

h6 {
  position: relative; 
  top: -20px; 
}

</style>

<div class="login-page">
    <div class="text-center">
       <h1>Account Sign In</h1>
       <h4>Rashidah Bookstore</h4>
       <h6>Inventory Management System</h6>
     </div>
     <?php echo display_msg($msg); ?>
      <form method="post" action="auth.php" class="clearfix">
      <div class="form-group">
        <label for="username" class="control-label">Username</label>
        <input type="text" class="form-control" name="username" placeholder="Username">
      </div>
        <div class="form-group">
            <label for="Password" class="control-label">Password</label>
            <input type="password" name= "password" class="form-control" placeholder="Password">
        </div>
        <div class="forget">
            <label for=""><a href="forgot-password.php">Forget Password</a></label>
        </div>
        <br>
        <div class="form-group">
                <button type="submit" class="btn btn-danger" style="border-radius:0%">Login</button>
        </div>
    </form>
</div>
