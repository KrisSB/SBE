<?php
	// sets up what the servername, user, password and database that we are going to be using
     $host = "127.0.0.1";
     $user = "root";
     $pass = "";
     $data = "calc";
     //connects you to the server and then selects the database we're going to be using'
          $conn = mysqli_connect($host, $user, $pass) or die(mysql_error());
               mysqli_select_db($conn,$data) or die(mysql_error());
               
?>