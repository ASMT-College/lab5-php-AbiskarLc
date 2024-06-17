<?php 
require("./connection.php");


$connect = getConnection();

if(isset($_POST['form_submit'])){
    
         $username = $_POST['username'];
         $email = $_POST['email'];
         $password = $_POST['password'];
         $cpassword = $_POST['cpassword'];
         $number = $_POST['number'];
         $address = $_POST['address'];
         $reg_email = "/^[a-zA-Z]+[a-zA-Z0-9]*(?:\W[a-zA-Z0-9])*[\w\W]*\@[a-zA-Z]{2,8}\.[a-zA-Z]{2,3}$/";

         if(!$username || !$email || !$password || !$number){

            $error_message = "All fields are required";
            header("Location: ../signup.php?error_message=".$error_message);
        }else if(!preg_match($reg_email,$email)){
            $error_message = "Not a valid email";
            header("Location: ../signup.php?error_message=".$error_message);
         }else if($cpassword != $password){

            $error_message = "Password mismatched";
            header("Location: ../signup.php?error_message=".$error_message);
         }else if(strlen($password) < 5 || strlen($number) != 10){
            $error_message = "the length of password must be at least 5 character and number must be 10 digits";
            header("Location: ../signup.php?error_message=".$error_message);
         }else{
               
            
            
            $query = "INSERT INTO user (username,email,password,address,contact) VALUES ('$username','$email','$password','$address','$number')";

            if(mysqli_query($connect,$query)){
               echo "User Created Successfully";
               header("Location: ../login.php");
            }else{
               echo "Failed to create User";
            }
         }

        

        


        
}

