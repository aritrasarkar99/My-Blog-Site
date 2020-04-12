<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/f72aa75778.js" crossorigin="anonymous"></script>
    <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


    <title>Document</title>
</head>
<body>
    <!-- SEARCHBOX -->
    <div class="container fluid-padding mt-9">
        <div class="row mt-4 ">
            <div class="col-lg-8" >
                <form method="POST" class="form-inline">
                    <div class="input-group mb-3 vw-100" style="width: ;">
                        <input name="search" id="searchart" type="text" class="form-control" placeholder="Search Article.." aria-label="Recipient's username" aria-describedby="button-addon2">
                        <div class="input-group-append">
                          <button class="btn btn-success" type="submit" id="button-addon2">Search</button>
                        </div>
                      </div>                    
                  </form>

                  
             </div>
    <?php
        include_once '../controllers/dbconfig.php';
        $error = "";
        if(isset($_POST['search'])){
            $search = mysqli_real_escape_string($conn,$_POST['search']);

            if(!empty($search)){
                $sql = "SELECT * FROM `articles` WHERE `title` LIKE '%$search%' OR
                `content` LIKE '%$search%' OR `author` LIKE '%$search%'";
                $res = mysqli_query($conn,$sql);
                $reschk = mysqli_num_rows($res);
                if($reschk>0){
                    while($rows=mysqli_fetch_assoc($res)){?>

                        
                        <div class="row mt-4" id="#result">
                        <div class="d-flex justify-content-end"><h1 class="display-4" style="font-size: 2rem;">Search Results</h1></div>
                        <div class="jumbotron jumbotron-fluid mt-3" style="background-color: bisque;">
                            <div class="container">
                            <h1 class="display-4" style="font-size: 2rem;"><?php echo $rows['title']; ?></h1><hr>
                            <p class="lead" style="font-size: 17px;"><?php echo $rows['content']; ?></p>
                            <hr><br>
                            <div class="d-flex justify-content-between"><label>By : <?php echo $rows['author']; ?></label><label>On : <?php echo $rows['timestamp']; ?></label></div>
                            </div>
                            </div>  
                        </div>                 
                    
                    <?php }
                }else{
                    $error = "No results found !!!";
                }
            }
        }else{
            $error = "Search field was not set";
        } 
    ?><?php if($error!=""){ ?>
    <h1 class="display-4 text-center"><?php echo $error ?></h1>
    <?php } ?>
</body>
</html>