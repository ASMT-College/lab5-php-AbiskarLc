<?php

  include("./connection.php");
  $connect = getConnection();
  $email = $_POST['email'];
  $password = $_POST['password'];

  $query = "SELECT * FROM user WHERE email='$email' AND password='$password'";

      if(!$password || !$email){
          $error_message = "Enter both the credentials";
          header("Location: ../login.php?error_message=".$error_message);
      }

      $result = mysqli_query($connect,$query);
      $data = mysqli_fetch_assoc($result);
      if(mysqli_num_rows($result)==1){
            session_start();
            $_SESSION["logged_in"] = "yes";
            header("Location: ../dashboard.php");
      }else{
          header("Location:../login.php?error_message=Invalid Credentials");
      }

