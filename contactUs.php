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
        <title>Contact Us</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        
        <style> 

        body {
      background-color: black;
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
                 <a style="font-size: 20px;;" class="nav-link" href="contactUs.php">Contact Us</a>
             </li>  
         </ul>
                
            <ul class="navbar-nav">
                <li class="nav-link">
                    
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
        
        <div style="color: white; font-size: 20px; text-align: center; margin-left: 1200px;">
        <?php 
            if(isset($_SESSION['user_id'])){
                echo "<i>Welcome ".$_SESSION['name']."!</i>";
        }  

        ?> 
        </div>

        <div style="text-align: center;" class="container my-5 border bg-secondary text-black">
        <form style="padding-top: 25px; padding-bottom: 25px;">
        <H4 style="text-decoration: underline;">Please feel free to contact us at the following:</H4>
        <p style="font-size:20px;">MovieZone Pte Ltd<br>            
        <i class="fa fa-envelope"></i>Email: <a href="mailto:MovieZone@email.com">MovieZone@email.com</a><br/>
        <i class="fa fa-phone"></i>Tel: 5172 9629 (ext 800)<br><br>
        <a href="https://twitter.com/i/flow/login" class="btn btn-dark" target="blank">Tweet Us!</a>
        <a href="https://www.instagram.com/?hl=en" class="btn btn-dark" target="blank">Find Us on Instagram!</a>
        </form>
        <p style="font-size:15px;"> copyrights &copy; MovieZone</p>
        
        </div>
        
    </body>
</html>
