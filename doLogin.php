<?php 

session_start();

// php file that contains the common database connection code
        $host = "localhost";
        $username = "root";
        $password = "";
        $database = "c203_moviereviewdb";
        $link = mysqli_connect($host,$username,$password,$database) or die(mysqli_connect_error());

$entered_username = $_POST['username'];
$entered_password = $_POST['password'];


if (isset($_POST['rmb_me'])) {
    // Set the remember me cookie for 1 month
    $expiration = time() + (30 * 24 * 60 * 60);
    setcookie('username', $_POST['username'], $expiration);
    $rememberUsername = $_COOKIE['username'];  
}

$msg = "";

$queryCheck = "SELECT * FROM users
          WHERE username='$entered_username'
          AND password = SHA1('$entered_password')";

$resultCheck = mysqli_query($link, $queryCheck) or die(mysqli_error($link));

if (mysqli_num_rows($resultCheck) == 1) 
{
    $row = mysqli_fetch_array($resultCheck);
    $_SESSION['user_id'] = $row['userId'];
    $_SESSION['username'] = $row['username'];
    $_SESSION['name'] = $row['name'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['dob'] = $row['dob'];
    
    $name = $row['name']; // Fetch the 'name' from the $row array
    $dob = $row['dob']; // Fetch the 'dob' from the $row array
    $email = $row['email']; // Fetch the 'email' from the $row array
 
    ?>


<!-- Show welcome message in the top right corner -->
<p style="color: white; text-align: right; margin-top: 90px; font-size: 20px; margin-right: 25px;">
    <?php
    if (isset($_SESSION['user_id'])) {
        echo "<i>Welcome " . $_SESSION['name'] . "!</i>";
    }
    ?>
</p>   
   
    <div style="text-align: center;" class="container p-5 my-5 bg-secondary text-black">
        
            <h2>Welcome!</h2>
            
            <?php echo $msg = "<p><i>You are logged in as " .$_SESSION['username'] . "</i></p>"; ?>
            <p>
            Username: <?php echo $entered_username ?> <br/>
            Name: <?php echo $name ?> <br/>
            Date of Birth: <?php echo $dob ?> <br/>
            Email: <?php echo $email ?> <br/>
            <br/><br/>
            Proceed to view <br/> <a href='movies.php'> Movies List</a>
            </p> 
        </div>
    

<?php  
} else {
     ?>
   <div style="padding-top: 25px; padding-bottom: 25px;" class="container pt-5 my-5 bg-secondary text-black">
            <h2>Login Failed!</h2><br/>
            No Matching Record Found :( <br/>
            Please Enter a Valid Username and Password to Log In.<br/>
            Please <a href='login.php'> Login</a> Again.            
        </div> 
                   
<?php }
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
        <title></title>
    </head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        
        <style> 
             
        body {
      background-color: black;
      color: black;
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

        <?php
        // put your code here
        ?>
    </body>
</html>
