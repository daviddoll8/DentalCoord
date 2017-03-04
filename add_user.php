<?php
  session_start();

  include("includes/databaseHandler.inc.php");

  $fname = $_POST['firstname'];
  $lname = $_POST['lastname'];
  $email = $_POST['email'];
  $password = password_hash($_POST['pwd'], PASSWORD_BCRYPT);
  $phone = $_POST['phone'];
  $address = $_POST['address'];
  if($_POST['userkey'] == 0){
    //admin user key
    $userkey = 0;
  }elseif($_POST['userkey'] == 1){
    //Patient/User key
    $userkey = 1;
  }elseif($_POST['userkey'] == 2){
    //Dentist/Hygienist Key
    $userkey = 2;
  }

  if($stmt = mysqli_prepare($conn, "INSERT INTO user (firstname, lastname, email, pwd, phone, address, user_key) VALUES (?, ?, ?, ?, ?, ?, ?)")){
    mysqli_stmt_bind_param($stmt, "ssssssi", $fname, $lname, $email, $password, $phone, $address, $userkey);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $_SESSION['addmsg'] = "Account was successfully added to the database" . $result;
    header("Location: admin_home.php");
  }else{
    $_SESSION['addmsg'] = "User was not added, make sure information is correct";
    header("Location: admin_home.php");
  }
?>
