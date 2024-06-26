<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Register</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    
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
        
        <br><br>
        <div class="container my-5 border bg-secondary text-black">
            
        <font color="red">*</font> - Mandatory Fields
        <br><br>
        <form method="post" action="doUserRegistration.php">
            <fieldset>
            <legend style="text-decoration:underline;">Personal Details</legend>
            <label for="idFirstName">First Name<font color="red">*</font>: 
            <input name="firstName" type="text" required size="20" maxlength="100"
            placeholder="Enter first name" autofocus id="idFirstName"/> 
            <br><br>
            
            <label for="idLastName">Last Name<font color="red">*</font>: </label>
            <input name="lastName" type="text" required size="20" maxlength="100"
            placeholder="Enter last name" id="idLastName"/>
            <br><br>
            
            
            <label for="idDOB">Date of Birth<font color="red">*</font>: </label>
            <input name="dateOfBirth" type="date" id="idDOB"/>
            <br><br>
            
            Gender: 
            <label for="idMale"><input type="radio" name="gender" value="male" id="idMale">Male </label>
            <label for="idFemale"><input type="radio" name="gender" value="female" id="idFemale">Female </label>
            <br><br>
            
            </fieldset>
            <br><br>
            
            <fieldset>
                <legend style="text-decoration:underline;">Contact Information</legend> 
            <label for="idEmail">Email<font color="red">*</font>: <input name="email" type="email" required size="20" maxlength="100"
            placeholder="john@gmail.com" id="idEmail"/> </label>
            <br><br>
            
            <label for="idConEmail">Confirm Email<font color="red">*</font>: <input name="email" type="email" required size="20" maxlength="100"
            placeholder="john@gmail.com" id="idConEmail"/> </label>
            <br><br>
            
            <label for="idMobile">Mobile Number<font color="red">*</font>: <input name="mobileNumber" type="text" maxlength="8" required
            placeholder="91234567" id="idMobile"/> </label>
            <br><br>
            </fieldset>
            <br><br>
            
            
            <fieldset> 
                <legend style="text-decoration:underline;">Account Information</legend>
                <label for="idUsername">Username<font color="red">*</font>: <input name="username" type="text" required size="20" maxlength="12"
            placeholder="Enter username" id="idUsername"/> </label>
                
            <br><br>
            
            <label for="idPassword">Password<font color="red">*</font>: <input name="password" type="password" required size="20" maxlength="15"
            placeholder="Enter password" id="idPassword"/> </label>
            <br><br>
            
            <label for="idConPassword">Confirm Password<font color="red">*</font>: <input name="Confirm Password" type="password" required size="25" maxlength="15"
            placeholder="Enter confirmed password" id="idConPassword"/> </label>
            <br><br>
            
            </fieldset>
            <br><br>
            <input type="submit" value="Register"/>
            <input type="reset" value="Reset"/>
        
        </form> 
        </div>
    </body>
</html>
