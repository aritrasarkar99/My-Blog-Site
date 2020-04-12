<!DOCTYPE html>
<html lang="en">
  <?php include_once 'controllers/dbconfig.php'   ?>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyBlog Posts</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/f72aa75778.js" crossorigin="anonymous"></script>
    <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
  <script>
   
    </script>
    <style>
      html{
        scroll-behavior: smooth;
      }
    </style>
  </head>
<body>
  <section id="home"></section>
    <!-- ----------NAVBAR--------------------- -->
    <nav class="navbar fixed-top navbar-expand-md  navbar-dark bg-info">
        <a class="navbar-brand" style="font-size: 25px;" href="#">MyBlog</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto" style="font-size: 20px;" >
            <li class="nav-item active px-3">
              <a class="nav-link " href="#home">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item px-3">
              <a class="nav-link " href="#">About Me</a>
            </li>
            <li class="nav-item px-3">
              <a class="nav-link " href="#">Contact</a>
            </li>
            <li class="nav-item px-3">
                <a class="nav-link " href="views/RegForm.html"><button type="button" class="btn btn-outline-light" style="border: 2px solid white;">Sign Up</button></a>
            </li>
            <li class="nav-item px-3">
              <a class="nav-link " href="views/LogInForm.html"><button type="button" class="btn btn-outline-light" style="border: 2px solid white;">Log In</button></a>
            </li>
          </ul>
        </div>
      </nav>
      <div style="height: 5rem;"></div>
      <section id="home"></section>
    <!-- SEARCHBOX -->
    <div class="container fluid-padding mt-9">
        <div class="row mt-4 ">
            <div class="col-lg-8" >
                <form action="views/SearchPg.php" method="POST" class="form-inline">
                    <div class="input-group mb-3 vw-100" >
                        <input name="search" id="searchart" type="text" class="form-control" placeholder="Search Article.." aria-label="Recipient's username" aria-describedby="button-addon2">
                        <div class="input-group-append">
                          <button class="btn btn-success"  type="submit" id="button-addon2">Search</button>
                        </div>
                      </div>                    
                    </form>
            </div>

            <div class="col-lg-4 d-flex justify-content-end " >
                 
            </div>
        </div>

        <div class="row mt-4" >
          <?php 
                              
          $sql = "SELECT * FROM `articles` ORDER BY `id` DESC";
          $result = mysqli_query($conn,$sql);
          $rescheck = mysqli_num_rows($result);
          if($rescheck>0){
            while($rows = mysqli_fetch_assoc($result)){?>
                  <div class="jumbotron jumbotron-fluid mt-3" style="background-color: bisque;">
                  <div class="container">
                  <h1 class="display-4" style="font-size: 2rem;"><?php echo $rows['title']; ?></h1><hr>
                  <p class="lead" style="font-size: 17px;"><?php echo $rows['content']; ?></p>
                  <hr><br>
                  <div class="d-flex justify-content-between"><label>By : <?php echo $rows['author']; ?></label><label>On : <?php echo $rows['timestamp']; ?></label></div>
                  </div>
                  </div>                   
            <?php }
          }
  
  ?>
        </div>

    </div>

    <div class="d-flex justify-content-end fixed-bottom pb-4 pr-4">
        <a href="#home" style="background-color: white; border-radius: 45px;">
            <i class="fas fa-chevron-circle-up fa-3x" style="color: rgb(250, 123, 19);">
        </i></a>
    </div>
    

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>