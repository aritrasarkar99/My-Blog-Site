<!DOCTYPE html>
<?php 
session_start();
if(isset($_SESSION['email'])){
?>
<head>
  <?php include_once '../controllers/dbconfig.php'   ?>
    <meta name = "viewport" content="width=device-width,initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

        <title>Student Sign up</title>
</head>

<body>
        <!-- ----------NAVBAR--------------------- -->
        <nav class="navbar fixed-top navbar-expand-md  navbar-dark bg-info">
            <a class="navbar-brand" style="font-size: 25px;" href="#">MyBlog</a>
            <button class="navbar-toggler"  type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"  ></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ml-auto" style="font-size: 20px;" >
                <li class="nav-item  px-3">
                  <a class="nav-link " href="Userpage.php">Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active px-3">
                  <a class="nav-link " href="#">Add Post</a>
                </li>
                <li class="nav-item px-3">
                    <a class="nav-link " href="MyPost.php">My Posts</a>
                  </li>
                  <li class="nav-item px-3">
                <a class="nav-link " href="../controllers/LogOutCont.php">
                    <button class="btn btn-danger my-2 my-sm-0"  type="submit" >Log Out</button>
                </a>
              </li>
                  
              </ul>
            </div>
          </nav>
          <div style="height: 5rem;"></div>
          
          <!-- -----ADD POST-------------------- -->
          <div class="container">
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-6 col-md-8  ">
          <?php
                  if(isset($_POST['author']) && isset($_POST['title']) && isset($_POST['content'])){
                    $email = $_SESSION['email'];
                      $author = $_POST['author'];
                      $title = $_POST['title'];
                      $content = $_POST['content'];
                        $error = "";
                        $result = 0;
                        if(!empty($author) || !empty($title) || !empty($content)){
                          
                          $sql = "INSERT INTO `articles` (`email`,`title`, `content`, `author`, `timestamp`) 
                          VALUES ('$email','$title', '$content', '$author', current_timestamp())";
                          $result = mysqli_query($conn,$sql);
                          if($result<=0){
                            $error = "Post was not added due to some problem !!!";
                          }
                        }
                        else{
                          $error = "One or more fields are empty !!!";
                        } ?>
       
                <?php if($result > 0){ ?>

                          <div class="alert alert-success" role="alert">
                          Successfully added post
                          </div>

               <?php } ?>
               <?php if($error != ""){?>
                    <div class="alert alert-danger" role="alert">
                         <?php echo $error;?>
                    </div><?php }  ?>
                    
                    <?php }
          ?>
                    <div class="jumbotron">
                    <form action="#" method="POST" >
                        
                            <div class="form-group ">
                              <label for="inputEmail4">Author Name</label>
                              <input type="text" name="author" class="form-control" id="inputEmail4">
                            </div>

                          <div class="form-group">
                            <label for="exampleInputEmail1">Title</label>
                            <input name="title" type="text" class="form-control" id="exampleInputEmail1" >
                          </div>
    
                          <div class="form-group">
                            <label for="exampleFormControlTextarea1">Content</label>
                            <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                          </div>
                           
                        <input class="btn btn-primary" type="submit" value="Add Post"> &nbsp <input class="btn btn-primary" type="reset" value="Clear"><p><p>
                    </form>
                </div>
                </div>
            </div>
            
        </div>
    
    
</body>
<?php }else{
               header('Location:./LogInForm.html');
           }?>