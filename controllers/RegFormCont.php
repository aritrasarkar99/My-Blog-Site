<?php
include_once 'dbconfig.php';
if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['password'])){
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($pass)){
        $sql = "INSERT INTO `user` (`firstname`, `lastname`, `email`, `password`) 
        VALUES ('$fname', '$lname', '$email', '$pass')";
        $result = mysqli_query($conn,$sql);
        if($result>0){
            header("Location: ../views/LogInForm.html");
        }
        else{
            echo "Data could not be entered";
        }
    }
    else{
        echo "Post value empty";
    }
}
else{
    echo "Post not set";
}


?>