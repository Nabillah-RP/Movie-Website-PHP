<?php
//start session
session_start();

// Database Server
$host = "localhost";
$username = "root";
$password = "";
$database = "c203_moviereviewdb";

$theID = $_GET['id'];

// Open Connection
$link = mysqli_connect($host, $username, $password, $database);

// Fetch movie title
$query = "SELECT movieTitle FROM movies WHERE movieId = '$theID';";
$result = mysqli_query($link, $query) or die(mysqli_error($link));

// Fetch reviews associated with the movie
$queryReviews = "SELECT * FROM reviews INNER JOIN users ON reviews.userId = users.userId WHERE reviews.movieId = '$theID';";
$resultReviews = mysqli_query($link, $queryReviews) or die(mysqli_error($link));

//close link
mysqli_close($link);

$movieTitle = mysqli_fetch_assoc($result)['movieTitle'];

//$arrContent = array();



?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Reviews</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

        <style>
            body {
                background-color: black;
                color: white;
                text-align: center;
            }

            .modal-body {
                text-align: center;
            }
        </style>
    </head>

    <body>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
            <div class="container-fluid">
                <a style="font-size: 25px; font-weight: bold;" class="navbar-brand" href="homepage.html">MovieZone</a>
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

        <br/><br/><br/>

        <p style="color: white; font-size: 20px; text-align: right; margin-right: 25px;">
            <?php
            if (isset($_SESSION['user_id'])) {
                echo "<i>Welcome " . $_SESSION['name'] . "!</i>";
            }
            ?> 
        </p>

        <div class="container mt-3">

            <h2>Movie Reviews for <?php echo $movieTitle; ?> </h2><br/>
            
            <?php
            if (isset($_SESSION['user_id'])) { ?>
                <a href="addReview.php?id=<?php echo $theID; ?>">Add New Review</a><br/><br/>
                <?php
            }
            ?> 

            

            <table class="table table-dark">
                <tr>
                    <th>Review</th>
                    <th>Rating</th>
                    <th>Date Posted</th>
                    <th>Username</th>
                    
                    <?php  if (isset($_SESSION['user_id'])) { ?>
                    <th>Edit</th>
                    <th>Delete</th>
                    <?php } ?>
                        
                </tr>

                <?php
                if (mysqli_num_rows($resultReviews) > 0){
                    while ($row = mysqli_fetch_assoc($resultReviews)) {
                    $arrContent[] = $row;
                    }
                
                $numReviews = count($arrContent);

                //if ($numReviews == 0) {
                    ?>
                    
                    <?php
               // } else {
                    for ($i = 0; $i < $numReviews; $i++) {
                        $review = $arrContent[$i]['review'];
                        $rating = $arrContent[$i]['rating'];
                        $datePosted = $arrContent[$i]['datePosted'];
                        $username = $arrContent[$i]['username'];
                        $reviewId = $arrContent[$i]['reviewId'];
                        $userId = $arrContent[$i]['userId'];
                        ?>
                        <tr>
                            <td><?php echo $review; ?></td>
                            <td><?php echo $rating; ?></td>
                            <td><?php echo $datePosted; ?></td>
                            <td><?php echo $username; ?></td>
                            
                            <!-- Check for user to ensure its a self edit -->
                            <?php  if (isset($_SESSION['user_id'])) {
                                     if ($_SESSION['username'] == $username && $_SESSION['user_id'] == $userId){
                                         
                                    ?>
                            <td><a href="editReview.php?id=<?php echo $theID; ?>&reviewId=<?php echo $reviewId ?>">Edit</a></td>
                            
                            
                            <!-- Check for user to ensure its a self delete -->                        
                            <td><a href="deleteReview.php?id=<?php echo $theID; ?>&reviewId=<?php echo $reviewId ?>">Delete</a></td>
                        </tr>
                        <?php
                        
                    } else { ?>
                        
                        <td><input type="hidden"/></td>
                        <td><input type="hidden"/></td>
                    <?php }
                    
                       } 
                            }
                
                } else { ?>
                    <tr>
                        <td style="text-align: center;" colspan="6">No reviews available for this movie.</td>
                    </tr>
                    
                <?php } ?>
            </table>
        </div>
    </body>
</html>
