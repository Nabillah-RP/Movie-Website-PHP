<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("location: login.php"); // auto redirect to login.php
}

$userID = $_SESSION['user_id'];

$theID = $_GET['id'];

// Database Server
$host = "localhost";
$username = "root";
$password = "";
$database = "c203_moviereviewdb";

//Open Connection
$link = mysqli_connect($host, $username, $password, $database);

if (!empty($_POST['comments']) && !empty($_POST['rating'])) 
{
    //TODO: Assign data retrieved from form to the following variables $review, $rating
    $review = $_POST['comments'];
    $rating = $_POST['rating'];
    
    $sql = "INSERT INTO reviews (userId, review, rating, movieId, datePosted) 
            VALUES ('$userID' ,'$review', '$rating', '$theID', CURDATE())";
     
    //TODO: Execute the SQL statement 
    $status = mysqli_query($link, $sql) or die(mysqli_error($link));
    
    //retrieve date
    $sql2 = "SELECT datePosted FROM reviews";
    
    //TODO: Execute the SQL statement 
    $status2 = mysqli_query($link, $sql2) or die(mysqli_error($link));
   
    while ($row = mysqli_fetch_assoc($status2)) {
        $datePosted = $row['datePosted'];
    }
    ?>

    <!-- Show welcome message in the top right corner -->
    <p style="color: white; text-align: right; margin-top: 90px; font-size: 20px; margin-right: 25px;">
    <?php
    if (isset($_SESSION['user_id'])) {
        echo "<i>Welcome " . $_SESSION['name'] . "!</i>";
    }
    ?>
</p>   
   
    

    <?php
    if ($status && $status2) {
        ?>
        <div style="text-align: center;" class="container p-5 my-5 bg-secondary text-black">
        
            <h2>Review Added!</h2>
            
            Comments: <?php echo $review ?><br/><br/>
           
            Ratings: <?php echo $rating ?> <br/><br/>
            
            Date: <?php echo $datePosted ?> <br/>
            
            <br/>
            Proceed back to <a href='movieReview.php?id=<?php echo $theID; ?>'> Review</a> Page!
            </p> 
        </div>
        
        <?php
        } 
    } 

//TODO: Close the Database conection 
mysqli_close($link);


?>
<!DOCTYPE HTML>
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
        
        <p>
            <?php
            ?>
        </p>
    </body>
</html>