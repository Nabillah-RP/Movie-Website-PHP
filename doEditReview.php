<?php
session_start();

// Database Server
$host = "localhost";
$username = "root";
$password = "";
$database = "c203_moviereviewdb";

$reviewId = $_GET['reviewId'];
$theID = $_GET['id'];
$review = $_POST['comments'];
$rating = $_POST['rating'];

$userId = $_SESSION['user_id'];

// Open Connection
$link = mysqli_connect($host, $username, $password, $database);

// Fetch movie title
$query2 = "SELECT movieTitle FROM movies WHERE movieId = '$theID'";
$result2 = mysqli_query($link, $query2) or die(mysqli_error($link));

$movieTitle = mysqli_fetch_assoc($result2)['movieTitle'];


//retrieve date
$sql2 = "SELECT * FROM reviews where reviewId = $reviewId";

//TODO: Execute the SQL statement 
$status2 = mysqli_query($link, $sql2) or die(mysqli_error($link));

// create query to retrieve a single record based on the value of $theID
$query = "UPDATE reviews 
          SET review = '$review', rating = '$rating', datePosted = CURDATE()
          WHERE reviewId = '$reviewId' AND movieId = '$theID'";

// execute the query
$update = mysqli_query($link, $query) or die(mysqli_error($link));

while ($row = mysqli_fetch_assoc($status2)) {
    $datePosted = $row['datePosted'];
}

if (!isset($_SESSION['user_id'])) {
    header("location: login.php");
}

//TODO: Close the Database conection 
mysqli_close($link);

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

        <div style="color: white; font-size: 20px; text-align: right; margin-right: 25px;">
            <?php
            if (isset($_SESSION['user_id'])) {
                echo "<i>Welcome " . $_SESSION['name'] . "!</i>";
            }
            ?> 

            <div style="text-align: center; padding-top: 25px; padding-bottom: 25px;" class="container my-5 border bg-secondary text-black">
                <h2 style="text-align: center;">Review Edited for <?php echo $movieTitle; ?> </h2><br/>
                Comments: <?php echo $review ?><br/><br/>

                Ratings: <?php echo $rating ?> <br/><br/>

                Date: <?php echo $datePosted ?> <br/><br/>

                Proceed back to <a href='movieReview.php?id=<?php echo $theID; ?>&reviewId=<?php echo $reviewId; ?>'> Review</a> Page!

         </div>
            </div>
            <?php  ?>
    </body>
</html>