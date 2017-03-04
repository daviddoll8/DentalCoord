<?php
//Start session to allow use of session variables
session_start();
include("includes/databaseHandler.inc.php");

$email = $_POST['email'];
if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
  $_SESSION['errormsg'] = "Please enter a valid e-mail!";
  header("Location: index.php");
}
$pwd = $_POST['pwd'];

if($stmt = mysqli_prepare($conn, "SELECT * FROM user WHERE email = ?")){
  mysqli_stmt_bind_param($stmt, "s", $email);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  $result = mysqli_fetch_assoc($result);
  //$num_of_rows = mysqli_num_rows($result);

  //mysqli_stmt_bind_result($stmt, $result);
  //mysqli_stmt_fetch($stmt);
  //$_SESSION['errormsg'] = $result;
  //header("Location index.php");
  if(empty($result)){
    $_SESSION['errormsg'] = "User not found, make sure email is correct!";
    header("Location: index.php");
  }elseif(password_verify($pwd, $result['pwd'])){
    $_SESSION['user'] = $result['firstname'] . " " . $result ['lastname'];
    $_SESSION['email'] = $email;
    $_SESSION['uid'] = $result['uid'];
    $_SESSION['user_key'] = $result['user_key'];
    if($result['user_key'] == 0){
      header("Location: admin_home.php");
    }elseif($result['user_key'] == 1){
      header("Location: user_home.php");
    }elseif($result['user_key'] == 2){
      header("Location: dentist_home.php");
    }
  }else{
    $_SESSION['errormsg'] = "Wrong Password! Try again!";
    header("Location: index.php");
  }
  //mysqli_close($conn);
}
?>
