<?php

$rememberUsername = "";

//check if cookie is set, then set $rememberUsername to cookie
if (isset($_COOKIE['username'])) {
    $rememberUsername = $_COOKIE['username'];
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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <title>Login</title>
        <style>
        body {
      background-color: black;
       }
       
       div {
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
            <a style="font-size: 20px;" class="nav-link" href="login.php">Register/Login</a>
        </li>
        </ul>
             
        <form class="d-flex" action="doSearchMovies.php" method="POST">
        <input class="form-control me-2" type="text" placeholder="Search Movie Title" name="keyword">
        <button class="btn btn-primary" type="submit">Search</button>
       </form>
             
            </div>
            </div>
           </nav>
        
        <div class="container p-5 my-5 bg-secondary text-black">
            <h2>Login</h2>
            <p>
            <form method="post" action="doLogin.php">
                <label for="idName">Username: <font color="red">*</font></label><br>
                    <input type="text" id="idUser" name="username" autofocus placeholder="Enter username" required value="<?php echo $rememberUsername; ?>"/></td><br><br>

                <label for="idEmail">Password:<font color="red">*</font></label><br>
                    <input type="password" id="idPass" name="password" placeholder="Enter password" required><br><br>
            
                    <input type="checkbox" id="id_rmb" name="rmb_me" value="rmb_me"/><label for="id_rmb">Remember me</label><br><br>
                    <input name="btnsubmit" value="Login" type="submit">
            </form>
            </p>
            
        </div>
        <div style="color:white;">Not a member yet? <a href="userRegistration.php"> Register</a> now!</div>
        
        <?php
        // put your code here
        ?>
    </body>
</html>
