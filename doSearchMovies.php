<?php 
session_start();
    
$searchWord = $_POST['keyword'];
    
//Database Server
$host = "localhost";
$username = "root";
$password = "";
$database = "c203_moviereviewdb";

//Open Connection
$link = mysqli_connect($host, $username, $password, $database);

// Build SQL Query
$query = "SELECT *
          FROM movies
          WHERE movieTitle LIKE '%$searchWord%'";    
    
// Execute SQL Query
$result = mysqli_query($link,$query) or die (mysqli_error($link));


//process the result
    while ($row = mysqli_fetch_array($result)) {
        $arrResult[] = $row;
    }
   
//Close Connection
mysqli_close($link);


// Display search results if there are any
?>
<br/><br/><br/>
<p style="color: white; font-size: 20px; text-align: right; margin-right: 25px;">
           <?php 
    if(isset($_SESSION['user_id'])){
        echo "<i>Welcome ".$_SESSION['name']."!</i>";
    }   
    ?> 
        </p>
<?php
if (mysqli_num_rows($result) > 0) {

    for ($i = 0; $i < count($arrResult); $i++) {
        $row = $arrResult[$i];
        ?>

        <div style="text-align: center; width:450px;" class="card">
            <div class="card-body ">
                <h4 style="font-size: 25px;" class="card-title"><?php echo $row['movieTitle']; ?></h4>
                <br>
                <img class="card-img-bottom" src="images/<?php echo $row['picture']; ?>" alt="Card image">
                <p style="font-size: 15px;" class="card-text"><b>Movie Genre: </b><?php echo $row['movieGenre']; ?></p>
                <p style="font-size: 15px;" class="card-text"><b>Running Time: </b> <?php echo $row['runningTime']; ?></p>
                <p style="font-size: 15px;" class="card-text"><b>Language: </b> <?php echo $row['language']; ?></p>
                <p style="font-size: 15px;" class="card-text"><b>Director: </b> <?php echo $row['director']; ?></p>
                <p style="font-size: 15px;" class="card-text"><b>Casts: </b> <?php echo $row['cast']; ?></p>
                <p style="font-size: 15px;" class="card-text"><?php echo $row['synopsis']; ?></p> 
                
                <a href="movieReview.php?id=<?php echo $row['movieId']; ?>" target="_blank">
                    <button type="button" class="btn btn-info" data-bs-dismiss="modal">See Reviews</button>
                </a>
                  </div>

            </div>

        <?php
            }
        } else {
            // Display a message if no results found
            ?> 
                <div style="text-align: center; padding-top: 25px;" class="container my-5 border bg-secondary text-black">
                <?php
                echo "No movies found with the given search term.";
            
        }


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
        <?php 
            ?>
        
    </body>
</html>
