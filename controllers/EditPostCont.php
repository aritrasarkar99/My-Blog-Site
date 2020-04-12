<?php
include_once 'dbconfig.php';
if(isset($_POST['author']) && isset($_POST['title']) && isset($_POST['content']) && isset($_POST['id'])){
    $id = $_POST['id'];
    $author = $_POST['author'];
    $title = $_POST['title'];
    $content = $_POST['content'];
      
      if(!empty($author) || !empty($title) || !empty($content) || !empty($id)){
        
        $sql = "UPDATE `articles` 
        SET `title` = '$title', `content` = '$content',
         `author` = '$author'
         WHERE `articles`.`id` = $id";
        $result = mysqli_query($conn,$sql);
        if($result > 0){
            ?>
            <script>
                window.alert("Post has been Updated !!!");
                
                window.location.href = "/PROJECT/MyBlogPrj/views/MyPost.php";
                
            </script>
                

<?php

        }
      }
    }

?>