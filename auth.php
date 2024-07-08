<?php include_once('includes/load.php'); ?>

<?php
$req_fields = array('username','password' );
validate_fields($req_fields);
$username = remove_junk($_POST['username']);
$password = remove_junk($_POST['password']);

if(empty($errors)){
  $user_id = authenticate($username, $password);
  if($user_id){
    //create session with id
    $session->login($user_id);
    //Update Sign in time
    updateLastLogIn($user_id);
    
    // Get the current user after login
    $user = current_user();
    
    $session->msg("s", "Welcome to Inventory Management System");
    if($user['user_level'] === '1'){
      redirect('dashboard.php', false);
    } elseif($user['user_level'] === '2'){
      redirect('special.php', false);
    } elseif($user['user_level'] === '3'){
      redirect('user.php', false);
    }

  } else {
    $session->msg("d", "Sorry Username/Password incorrect.");
    redirect('index.php',false);
  }

} else {
   $session->msg("d", $errors);
   redirect('index.php',false);
}
?>
