<?php

 include('./connection.php');
 $connect = getConnection();
$email = $_GET['email'];

 $query = "SELECT * FROM user WHERE email='$email'";

 $result = mysqli_query($connect,$query);

 
 if(mysqli_num_rows($result)==1){
    echo "User with this email already exists";
 }


