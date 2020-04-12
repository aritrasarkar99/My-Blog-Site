<?php
session_start();
    include_once 'dbconfig.php';
    if(isset($_POST['email']) && isset($_POST['password'])){
    
        $email = $_POST['email'];
        $pass = $_POST['password'];

        if(!empty($email) || !empty($pass)){
            $_SESSION['email'] = $email;
            $sql = "SELECT * FROM `user` WHERE `email` = '$email' AND `password` = '$pass'";
            
            $result = mysqli_query($conn,$sql);
            if(!$result>0){
                echo "Result 0";
            }
            $rescheck = mysqli_num_rows($result);
            
            if($rescheck > 0){
                while($rows = mysqli_fetch_assoc($result)){
                    if($rows['email']==$email && $rows['password']==$pass){
                        header('Location: ../views/Userpage.php');
                    }
                    else{
                        echo "Wrong Student ID or Password";
                    }
                }
            }else{
                echo "Query Wrong";
            }
        }else{
            echo "Post Empty";
        }
    }else{
        echo "Post Not Set";
    }
    ?>