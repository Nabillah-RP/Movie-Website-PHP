<?php
session_start();

// Database Server
$host = "localhost";
$username = "root";
$password = "";
$database = "c203_moviereviewdb";

$theID = $_GET['id'];
$reviewId = $_GET['reviewId'];

// Open Connection
$link = mysqli_connect($host, $username, $password, $database);

$userId = $_SESSION['user_id'];

// create query to retrieve a single record based on the value of $theID
$query = "SELECT * FROM reviews
          WHERE movieId = '$theID' AND reviewId='$reviewId'";

// execute the query
$result = mysqli_query($link, $query) or die(mysqli_error($link));

// fetch the execution result to an array
//$reviews = mysqli_fetch_array($result);

// Fetch movie title
$query2 = "SELECT movieTitle FROM movies WHERE movieId = '$theID'";
$result2 = mysqli_query($link, $query2) or die(mysqli_error($link));

$movieTitle = mysqli_fetch_assoc($result2)['movieTitle'];


//Close the Database conection 
mysqli_close($link);

$row = mysqli_fetch_array($result);
if (!empty($row)) {
    //TODO: Assign data retrieved from form to the following variables $review, $rating
    $review = $row['review'];
    $rating = $row['rating'];
    $datePosted = $row['datePosted'];
    //$reviewId = $row['reviewId'];
}

if (!isset($_SESSION['user_id'])) {
    header("location: login.php");
}

?>


<!DOCTYPE html>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <title></title>
    </head>
        <style>
        
        body {
            color:white;
            background-color: black;
        }
         
        </style>
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
                            <a style="font-size: 20px;" class="nav-link" href="logout.php">Logout</a>
                        </li>
                    </ul>
                    <form class="d-flex" action="doSearchMovies.php" method="POST">
                        <input class="form-control me-2" type="text" placeholder="Search Movie Title" name="keyword">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
        
        <br/><br/><br/>
        <form method="post" action="doDeleteReview.php?id=<?php echo $theID?>&reviewId=<?php echo $reviewId; ?>">
        <div style="color: white; font-size: 20px; text-align: right; margin-right: 25px;">
            <?php
            if (isset($_SESSION['user_id'])) {
                echo "<i>Welcome " . $_SESSION['name'] . "!</i>";
            }
            ?> 

            <div style="text-align: center; padding-top: 25px; padding-bottom: 25px;" class="container my-5 border bg-secondary text-black">
                <h2 style="text-align: center;">Delete Review for <?php echo $movieTitle; ?> </h2><br/>
                Comments: <?php echo $review ?><br/><br/>

                Ratings: <?php echo $rating ?> <br/><br/>

                Date: <?php echo $datePosted ?> <br/><br/>

                <input type="hidden" name="id" value="<?php echo $reviewId; ?>">
                <input type="submit" value="Confirm Delete Review" /><br/><br/>
                
                Proceed back to <a href='movieReview.php?id=<?php echo $theID; ?>&reviewId=<?php echo $reviewId; ?>'> Review</a> Page!
            
         </div>
            </div>
              </form>
    </body>
</html>