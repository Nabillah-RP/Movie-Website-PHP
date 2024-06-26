<?php
// put your code here
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$fullName = $firstName." ".$lastName;
$dob = $_POST['dateOfBirth'];
$theUsername = $_POST['username'];
$thePassword = $_POST['password'];
$theEmail = $_POST['email'];
       
$message = "";

//Database Server
$host = "localhost";
$username = "root";
$password = "";
$database = "c203_moviereviewdb";
       
//Open Connection
$link = mysqli_connect($host, $username, $password, $database);

// Build SQL Query
$query = "INSERT INTO users(username, password, name, dob, email) VALUES ('$theUsername', SHA1('$thePassword'), '$fullName', '$dob', '$theEmail')";

// Execute SQL Query
$result = mysqli_query($link,$query) or die ('Error querying database');

//Process the result
if ($result){
    ?>
        <div style="text-align: center;" class="container p-5 my-5 bg-secondary text-black">
        
            <h2>Registration Completed!</h2>

            <br/>
            Proceed to <a href='login.php'>login</a> here!
            </p> 
        </div> 
<?php

}

//Close Connection
mysqli_close($link);
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
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
        
    </body>
</html>
