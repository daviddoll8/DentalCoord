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
    <!--For bootstrap-->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content = "IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--For fullcalendar-->
    <link rel='stylesheet' href='fullcalendar/fullcalendar.css' />
    <script src='fullcalendar/lib/jquery.min.js'></script>
    <script src='fullcalendar/lib/jquery-ui.min.js'></script>
    <link rel="stylesheet" href='fullcalendar/lib/cupertino/jquery-ui.min.css'/>
    <script src='fullcalendar/lib/moment.min.js'></script>
    <script src='fullcalendar/fullcalendar.js'></script>
    <!--For boostrap-->
    <link href = "Styles/style.css" rel= "stylesheet"  />
    <link href= "css/bootstrap.min.css" rel= "stylesheet" />
    <link href= "css/bootstrap-theme.min.css" rel = "stylesheet"  />
    <title>Admin Home</title>
    <script>
      $(document).ready(function() {
        // page is now ready, initialize the calendar...
      $('#calendar').fullCalendar({
        header:{
          left:'prev, next, today',
          center:'title',
          right: 'month, agendaWeek, agendaDay, listDay'
        },
        businessHours: {
          dow: [1, 2, 3, 4, 5],

          start: "09:00",
          end: "17:00",
        },
        minTime: "09:00",
        maxTime: "17:00",
        weekends: false,
        slotDuration: "01:00:00",
        defaultView: "agendaWeek",
        allDaySlot: false,
        selectable: false,
        theme: true,

        dayClick: function(date, jsEvent, view) {

          alert('Clicked on: ' + date.format());

          alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);

          alert('Current view: ' + view.name);
        }
      })

      $(".container .starter-template h1").click(function(event) {
        alert("Test");
      })
    });
    </script>
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
          <a class="navbar-brand" href="admin_home.php"><span class="glyphicon glyphicon-home"></span>MAD Dental</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="admin_home.php">Admin Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="logout.php">Logout</a></li>
            <li><a href="admin/add_account.php">Add Accounts</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
      <div class="starter-template">
        <h1><?php echo "Welcome " . $_SESSION['user'];?> </h1>
      </div>
    </div><!-- /.container -->

   <div id = "calendar"></div>


   <script src="js/bootstrap.min.js"></script>
  </body>

</html>
