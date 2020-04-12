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
                  if(isset($_GET['id'])){
                      $id = $_GET['id'];
                        $result = 0;
                        if(!empty($id)){
                          
                          $sql = "SELECT * FROM `articles` WHERE `id` = $id";
                          $result = mysqli_query($conn,$sql);
                          $rescheck = mysqli_num_rows($result);
                          if($rescheck>0){
                            while($rows=mysqli_fetch_assoc($result)){?>
                              <div class="jumbotron">
                                <form action="../controllers/EditPostCont.php" method="POST" >
                                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                                        <div class="form-group ">
                                          <label for="inputEmail4">Author Name</label>
                                          <input type="text" name="author" value="<?php echo $rows['author'];?>" class="form-control" id="inputEmail4">
                                        </div>
            
                                      <div class="form-group">
                                        <label for="exampleInputEmail1">Title</label>
                                        <input name="title" type="text" value="<?php echo $rows['title'];?>" class="form-control" id="exampleInputEmail1" >
                                      </div>
                
                                      <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Content</label>
                                        <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="5"><?php echo $rows['content'];?></textarea>
                                      </div>
                                       
                                    <input class="btn btn-primary" type="submit" value="Edit Post"> &nbsp <input class="btn btn-primary" type="reset" value="Clear"><p><p>
                                </form>
                            </div>
            
                            <?php }
                          }
                        }
                      }
                         ?>
                </div>
            </div>
            
        </div>
    
    
</body>
<?php }else{
               header('Location:./LogInForm.html');
           }?>