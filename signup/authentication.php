<?php
    include('../database/connection.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $usernames = $_POST['username'];
        $password = md5($_POST['password']);
        $phone_number = $_POST['mobile-number'];

    if($conn){  
        $sql = "INSERT INTO `users` (username, phone_number, password)VALUES('$usernames', '$phone_number', '$password')";
        $result = mysqli_query($conn, $sql);
        if($result){
            
            header("Location: ../login/login.php");

        }else{
            echo "NOTHING HAPPENED";
        }
    }
    }


?>