<?php
 // function to connect to database
  function doDB() {
      global $mysqli;

      //connect to server and select database
      $mysqli = mysqli_connect("localhost", "root","", "mima");

      //if connection fails, stop script execution
    if (mysqli_connect_errno()) {
         printf("Connect failed: %s\n", mysqli_connect_error());
          exit();
     }
  }
?>
