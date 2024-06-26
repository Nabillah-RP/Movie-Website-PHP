
<?php
session_start();
if (isset($_SESSION['user_id'])) {
    session_destroy();
    $_SESSION = array();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <title>Logout</title>
        
        <style>
        
        body {
            color:white;
            background-color: black;
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
                    <a style="font-size: 20px;" class="nav-link" href="login.php">Login/Registration</a>
                </li>
            </ul>
            <form class="d-flex" action="doSearchMovies.php" method="POST">
                <input class="form-control me-2" type="text" placeholder="Search Movie Title" name="keyword">
                <button class="btn btn-primary" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
        
        <div style="text-align: center; padding-bottom: 20px;" class="container pt-5 my-5 bg-secondary text-black">
            <h2>Logout</h2>
            You have Logged Out! <br/>
            <br/>
            Click Here to <a href='login.php'> Login</a> Again.            
        </div> 
        
        <?php
        //
        ?>
    </body>
</html>