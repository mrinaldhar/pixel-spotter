<?php
ob_start();
session_start(); 
  require_once('connectionvars.php'); 
  // Connect to the database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
 
 $username = mysqli_real_escape_string($dbc, trim($_GET['username'])); 
 $realname = mysqli_real_escape_string($dbc, trim($_GET['realname'])); 
 $password = mysqli_real_escape_string($dbc, trim($_GET['password'])); 
 $query = "SELECT * FROM admin WHERE username = '$username'"; 
 $data = mysqli_query($dbc, $query); 
      if (mysqli_num_rows($data) == 0) { 
		$query = "INSERT INTO admin (username, realname, password) VALUES ('$username', '$realname', '$password')"; 
    mysqli_query($dbc, $query); 
    echo '1';
      }
      else {
        echo '2';
      }

?>