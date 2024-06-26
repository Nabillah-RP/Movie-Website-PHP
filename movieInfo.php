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
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <title>Movie Info</title>
         <style>

        .card {
            width: 450px;
            margin: 0 auto;
            text-align: center;
            
        }
        
        .card-img-bottom {
            width: 100%;
            object-fit: cover;
        }
             
        div {
            width: 450px;
            text-align: center;
            
        }
        
        body {
      background-color: black;
    }
    
       H2{
        color: white;
        text-align: center;
    }
        
        </style>
    
    </head>
    
    <body>
            
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
            
        </li>
        </ul>
             
        <form class="d-flex" action="doSearchMovies.php" method="POST">
        <input class="form-control me-2" type="text" placeholder="Search Movie Title" name="keyword">
        <button class="btn btn-primary" type="submit">Search</button>
       </form>
                
            </div>
        </div>
    </nav>
        
        <br><br><br>
        
        <p style="color: white; font-size: 20px; text-align: right; margin-right: 25px;">
           <?php 
    if(isset($_SESSION['user_id'])){
        echo "<i>Welcome ".$_SESSION['name']."!</i>";
    }   
    ?> 
        </p>
        
        <H2>MOVIE INFORMATION</H2>
        
        
        
    <?php
    // put your code here
    $id = $_GET['id'];

    //Database Server
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "c203_moviereviewdb";
        
    //Open Connection
    $link = mysqli_connect($host, $username, $password, $database);

    // Build SQL Query
    $queryMovieInfo = "SELECT movieTitle, movieGenre, runningTime, language, director, cast, synopsis, picture, movieId FROM movies WHERE movieId = $id";

    // Execute SQL Query
    $resultMovies = mysqli_query($link, $queryMovieInfo);

    // While Loop
    $row = mysqli_fetch_assoc($resultMovies); ?>
    
    
    <div class="card" style="width:450px">
                    <div class="card-body ">
                    <h4 style="font-size: 25px;" class="card-title"><?php echo $row['movieTitle']; ?></h4>
                    <br>
                    <p style="font-size: 15px;" class="card-text"><b>Movie Genre: </b><?php echo $row['movieGenre']; ?></p>
                    <p style="font-size: 15px;" class="card-text"><b>Running Time: </b> <?php echo $row['runningTime']; ?></p>
                    <p style="font-size: 15px;" class="card-text"><b>Language: </b> <?php echo $row['language']; ?></p>
                    <p style="font-size: 15px;" class="card-text"><b>Director: </b> <?php echo $row['director']; ?></p>
                    <p style="font-size: 15px;" class="card-text"><b>Casts: </b> <?php echo $row['cast']; ?></p>
                    <p style="font-size: 15px;" class="card-text"><?php echo $row['synopsis']; ?></p> 
               
                    <img class="card-img-bottom" src="images/<?php echo $row['picture']; ?>" alt="Card image" style="width:100%;">
                </div>
            </div> 
    
    
    
    <?php

//Close Connection
mysqli_close($link);        
?>    
        <?php
        // put your code here
        ?>
    </body>
</html>
