<?php
  session_start();
  include("includes/databaseHandler.inc.php");

  if(empty($_SESSION['user'])){
    $_SESSION['errormsg'] = "Please login first!";
    header("Location: index.php");
  }

  if($_SESSION['user_key'] == 0){
    header("Location: admin_home.php");
  }elseif($_SESSION['user_key'] == 1){
    header("Location: user_home.php");
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
  </body>

</html>
