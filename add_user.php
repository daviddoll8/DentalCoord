<?php
  session_start();

  include("includes/databaseHandler.inc.php");

  $response_array['message'] = "";
  $fname = $_POST['firstname'];
  $lname = $_POST['lastname'];
  $email = $_POST['email'];
  $password = password_hash($_POST['pwd'], PASSWORD_BCRYPT);
  $phone = $_POST['phone'];
  $address = $_POST['address'] . " " . $_POST['city'] . ", " . $_POST['state'] . " " . $_POST['zip'];
  if($_POST['userkey'] != 0 || $_POST['userkey'] != 1 || $_POST['userkey'] != 3){
    $response_array['message'] = "Please select a type of user to add!";
    header("Location: admin/add_account.php");
  }
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
    $response_array['message'] = "Account was successfully added to the database";
    header("Location: admin/add_account.php");
  }else{
    $response_array['message'] = "User was not added, make sure information is correct";
    header("Location: admin/add_account.php");
  }
?>
