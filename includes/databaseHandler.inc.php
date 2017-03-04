<?php

  $conn = mysqli_connect("localhost", "root", "", "dental");

  if(!$conn){
    echo "you did not connect";
    die("Connection failed: ");
  }

 ?>
