<!doctype html>
<?php
  session_start();
  if(isset($_SESSION['user'])){
    if($_SESSION['user_key'] == 0){
      header("Location: admin_home.php");
    }elseif($_SESSION['user_key'] == 1){
      header("Location: user_home.php");
    }elseif($_SESSION['user_key'] == 2){
      header("Location: dentist_home.php");
    }
  }
?>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Dental Coordination</title>
  <meta name= "Dental Coordination Scheduling Web-App" content= "The HTML5 Herald">
  <meta name= "David Doll, Michael Pearson, Alexander Grunwald">
  <link rel= "stylesheet" href= "Styles/style.css">
  <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
</head>

<body>
  <header class = "welcome">
    <h1 class = "welcome_message">Dental Connection</h1>
  </header>

  <?php
    if(isset($_SESSION['errormsg'])){
      $error = $_SESSION['errormsg'];
      unset($_SESSION['errormsg']);
    }else{
      $error = "";
    }
    echo $error . '<br>';
  ?>

  <form class = "login_form" method = "POST" action = "login.php">
    <h4>LOGIN</h4>
    <input type = "text" name = "email" placeholder= "E-Mail" required>
    <br />
    <input type = "password" name = "pwd" placeholder= "Password" required>
    <br />
    <button type = "submit">Sign in</button><br>
  </form>
</body>
</html>
