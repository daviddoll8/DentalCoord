<!doctype html>
<?php
  session_start();
  include("includes/databaseHandler.inc.php");

  if(empty($_SESSION['user'])){
    $_SESSION['errormsg'] = "Please login first!";
    header("Location: index.php");
  }

  if($_SESSION['user_key'] == 1){
    header("Location: user_home.php");
  }elseif($_SESSION['user_key'] == 2){
    header("Location: dentist_home.php");
  }
?>



<html lang = "en">
  <head>
    <meta charset="utf-8" />
    <link rel='stylesheet' href='fullcalendar/fullcalendar.css' />
    <link rel='stylesheet' href='Styles/style.css' />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src='fullcalendar/lib/moment.min.js'></script>
    <script src='fullcalendar/fullcalendar.js'></script>
    <title>Admin</title>
  </head>

  <body>
    <nav>
      <a href = "logout.php">Logout</a>
    </nav>
    <h1><?php echo "Welcome " . $_SESSION['user'];?></h1>
    <div id = 'calendar'>
      <script>
        $(document).ready(function() {
          // page is now ready, initialize the calendar...
        $('#calendar').fullCalendar({
          // put your options and callbacks here
        })
      });
      </script>
    </div>

    <div id = 'container' name = 'add_user'>
      <form class = 'add_user' method= "POST" action = "add_user.php">
        <h4>Please fill out form to add a Patient, Dentist, or Admin account:</h4>
        <input type = "text" name = "firstname" placeholder= "First Name" required>
        <br />
        <input type = "text" name = "lastname" placeholder= "Last Name" required>
        <br />
        <input type = "email" name = "email" placeholder= "E-Mail" required>
        <br />
        <input type = "password" name = "pwd" placeholder= "Password" required>
        <br />
        <input type = "text" name = "phone" placeholder = "Phone Number" required>
        <br />
        <input type = "text" name = "address" placeholder = "Address" required  >
        <h4>What type of user would you like to add?</h4>
        <input type = "radio" name = "userkey" value = 0 required>  Admin<br />
        <input type = "radio" name = "userkey" value = 1 required>  Patient<br />
        <input type = "radio" name = "userkey" value = 2 required>  Dentist/Hygienist<br /><br />
        <button type = "submit">Add User</button><br />
      </form>
      <div id = 'errormsg' name = 'error'>
        <?php
        if(isset($_SESSION['addmsg'])){
          $error = $_SESSION['addmsg'];
          unset($_SESSION['addmsg']);
        }else{
          $error = "";
        }
        echo $error . '<br>';
        ?>
      </div>
    </div>


  </body>

</html>
