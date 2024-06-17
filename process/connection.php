<?php
function getConnection(){
      $hostname = "localhost";
      $username = "root";
      $password = "";
      $database = "wt_asian_2024";
      $conn = mysqli_connect($hostname,$username,$password,$database);

      if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
      }else{
        return $conn;
      }
}