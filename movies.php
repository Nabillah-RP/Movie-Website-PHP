<?php
session_start();
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Movies</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
         
        <style>
    body {
      background-color: black;
    }
    
    H3 {
  color: white;
    }
    
    .modal-body{
        text-align: center;
    }
    
    
    

  </style>
  
    </head>
    <body>
        
        <!-- Carousel -->
    <div id="slide1" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
    <div id="slide2" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
    <div id="slide3" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
    <div id="slide4" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
    <div id="slide5" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">

  <!-- Indicators/dots -->
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#slide1" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#slide2" data-bs-slide-to="1"></button>
    <button type="button" data-bs-target="#slide3" data-bs-slide-to="2"></button>
    <button type="button" data-bs-target="#slide4" data-bs-slide-to="3"></button>
    <button type="button" data-bs-target="#slide5" data-bs-slide-to="4"></button>
  </div>
  
  <!-- The slideshow/carousel -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/john-wick-movie-poster.jpg" alt="John Wick 4" title="John Wick 4" class="d-block" height="400" style="width:100%"></a>
    </div>
    <div class="carousel-item" >
      <img src="images/Suzume.jpg" alt="Suzume" title="Suzume no Tojimari" class="d-block" height="400" style="width:100%"></a>
    </div>
    <div class="carousel-item">
      <img src="images/avatar-movie-poster.jpg" alt="Avatar" title="Avatar: The Way of Water" class="d-block" height="400" style="width:100%"></a>
    </div>
    <div class="carousel-item">  
      <img src="images/mummies-movie-poster.jpg" alt="Mummies" title="Mummies" class="d-block" height="400" style="width:100%"></a>
    </div>
    <div class="carousel-item">
      <img src="images/myheartpuppy-movie.jpg" alt="My Heart Puppy" title="My Heart Puppy" class="d-block" height="400" style="width:100%"></a>
    </div>  
    
  </div>
  
  <!-- Left and right controls/icons -->
  <button class="carousel-control-prev" type="button" data-bs-target="#slide1" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#slide2" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
    </div>
        
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
        <div class="container-fluid">
     <a style="font-size: 25px; font-weight: bold;" class="navbar-brand" href="movies.php">MovieZone</a>
     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
         <span class="navbar-toggler-icon"></span>
     </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
         <ul class="navbar-nav me-auto">
            
             <li class="nav-item">
                 <a style="font-size: 20px;" class="nav-link" href="movies.php">Movies</a>
             </li>
             
             <li class="nav-item">
                 <a style="font-size: 20px;" class="nav-link" href="contactUs.php">Contact Us</a>
             </li>  
         </ul>
                
           <ul class="navbar-nav">
        <li class="nav-link" style="color:white;">
            
            <?php
        if(isset($_SESSION['user_id'])) 
        {
        ?>
               
           <li> <a style="font-size: 20px;" class="nav-link" href="logout.php">Logout</a></li>
        <?php
        } else {
        ?>
           <li> <a style="font-size: 20px;" class="nav-link" href="login.php">Register/Login</a></li>
         <?php
        }
        ?>
            
           <!-- <a style="font-size: 20px;" class="nav-link" href="login.php">Register/Login</a> -->
        
        </ul>
             
        <form class="d-flex" action="doSearchMovies.php" method="POST">
        <input class="form-control me-2" type="text" placeholder="Search Movie Title" name="keyword"> 
        <button class="btn btn-primary" type="submit">Search</button>
       </form>
                
            </div>
        </div>
    </nav>
        
        <p style="color: white; font-size: 20px; text-align: right; margin-right: 25px;">
           <?php 
    if(isset($_SESSION['user_id'])){
        echo "<i>Welcome ".$_SESSION['name']."!</i>";
    }   
    ?> 
        </p>

      
        <H3 style="margin-left: 20px;">Now Showing</H3>
        <br/>
        
        
<div class="container-fluid">
<div class="row">
    

<?php

//Database Server
$host = "localhost";
$username = "root";
$password = "";
$database = "c203_moviereviewdb";
        
//Open Connection
$link = mysqli_connect($host, $username, $password, $database);

// Build SQL Query
$queryMovies = "SELECT movieTitle, movieGenre, runningTime, language, director, cast, synopsis, picture, movieId FROM movies";

// Execute SQL Query
$resultMovies = mysqli_query($link, $queryMovies);

// While Loop
while ($row = mysqli_fetch_assoc($resultMovies)) { ?>
    
    
    <div class="col-4">
            <div class="card " style="width:320px">
                <img class="card-img-top" alt="Card image" src="images/<?php echo $row['picture']; ?>" >
                <div class="card-body ">
                <h4 class="card-title"><?php echo $row['movieTitle']; ?> </h4>
                <p class="card-text"><?php echo $row['movieGenre']; ?></p>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal<?php echo $row['movieId']; ?>">See More</button>
                </div>
            </div>
        <br>
    </div>
       
    
            <!-- The Modal -->
       <div class="modal" id="myModal<?php echo $row['movieId']; ?>">
       <div class="modal-dialog modal-dialog-centered">
       <div class="modal-content">

      <!-- Modal Header -->
       <div class="modal-header">
       <h4 class="modal-title"><?php echo $row['movieTitle']; ?></h4>
       <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
       </div>

      <!-- Modal body -->
      <div class="modal-body">
        <img class="card-img-top thumbnail" src="images/<?php echo $row['picture']; ?>" alt="Card image">
        <p> <br/> <?php echo $row['synopsis']; ?></p>
        

        <a href="movieInfo.php?id=<?php echo $row['movieId']; ?>" target="_blank">
        <button type="button" class="btn btn-info" data-bs-dismiss="modal">View Full Description</button>
        </a>
        
        <a href="movieReview.php?id=<?php echo $row['movieId']; ?>" target="_blank">
        <button type="button" class="btn btn-info" data-bs-dismiss="modal">See Reviews</button>
       </a>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
      </div>
      </div>
      </div> 
    
    <?php
    }

//Close Connection
mysqli_close($link);        
?>
    </div>
</div>
        
        <?php 
        //  
    ?>
    </body>
</html>
