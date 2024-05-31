<?php
    session_start();

    include('../database/connection.php');

     
    if($_SERVER["REQUEST_METHOD"] == "POST") {

        $usernames = $_POST['username'];
        $passwords = md5($_POST['password']);
        // $_SESSION["username"] = $usernames;

        if($conn->connect_error){
            die("Connection Failed! ". $conn->connect_error);
        }

        $sql = "SELECT id, username, password FROM users WHERE username = '$usernames' AND password = '$passwords'";

        // $sql = "SELECT id, username, password FROM users ()'$usernames' AND password = '$passwords'";

        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC); 
        $_SESSION["id"] = $row['id'];
        $_SESSION["username"] = $row['username'];
        $count = mysqli_num_rows($result);
          
        if($count == 1){
            
            header("location: ../products/products.php");
        }  
        else{  
            echo "`<script>alert('Password Incorrect')</script>` ";
        }    

        $conn->close();
     }  
    
