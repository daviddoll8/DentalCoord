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

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>MAD Dental</title>
  <meta name= "Dental Coordination Scheduling Web-App">
  <meta name= "David Doll, Michael Pearson, Alexander Grunwald">
  <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">

  <script src='fullcalendar/lib/jquery.min.js'></script>
  <link href = "Styles/style.css" rel= "stylesheet"  />
  <link href= "css/bootstrap.min.css" rel= "stylesheet" />
  <link href= "css/bootstrap-theme.min.css" rel = "stylesheet"  />
</head>

<body>
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">MAD Dental</a>
      </div>
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <li class="active"><a href="index.php">Login</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="contact.php">Contact Us</a></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </nav>

  <div class="container" id="signin-container">
    <form class="form-signin" method = "POST" action = "login.php">
      <h2 class="form-signin-heading">Please sign in</h2>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" name = "email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name = "pwd" id="inputPassword" class="form-control" placeholder="Password" required>
      <button class="btn btn-lg btn-info btn-block" type="submit">Sign in</button>
    </form>
  </div> <!-- /container -->

<?php
  if(isset($_SESSION['errormsg'])){
    $error = $_SESSION['errormsg'];
    unset($_SESSION['errormsg']);
    echo '<div class="alert alert-warning alert-dismissible" role="alert">
      <span type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span><strong>' . $error . '</strong></div>';
  }else{
    $error = "";
  }
?>

<script src="js/bootstrap.min.js"></script>
</body>
</html>
