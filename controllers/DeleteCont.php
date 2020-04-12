<?php
    include_once '../controllers/dbconfig.php';
    if(isset($_GET['pid'])){
        $pid = $_GET['pid'];
        if(!empty($pid)){
            $sql = "DELETE FROM `articles` WHERE `articles`.`id` = $pid";
            $result = mysqli_query($conn,$sql);
            if($result>0){
                header('Location:../views/MyPost.php');
            }
        }
    }


?>