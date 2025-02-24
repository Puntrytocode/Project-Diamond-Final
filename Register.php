<?php

    session_start();
    require_once 'config/db.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="register.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
</head>
<body>
    <nav>
        <div class="container">
            <div class="wrapper">
                <div class="logo">
                    <a href="#"><img src="Logo.jpg" alt=""></a>
                </div>
                <ul class="menu ">                 
                    <li><a href="index.html">Home</a></li>
                    <li><a href="#"><i class="fas fa-search"></i></a></li>
                </ul>
                <div class="hamburger" onclick="openExpand()">
                    <i class="fas fa-bars"></i>
                </div>
            </div>
        </div>
        <div class="line">
            
        </div>  
    </nav>
    <header>
        <div class="register">
            <div class="container d-flex justify-content-center">
                <div class="wrapper">
                    <div class="box">
                      <h1>Register</h1>
                        <form action="signup_db.php" method="post" enctype="multipart/form-data">
                            <?php if(isset($_SESSION['error'])) { ?>
                                <div class="alert alert-danger" role='alert'>
                                    <?php 
                                      echo $_SESSION['error'];
                                      unset($_SESSION['error']);
                                    ?>
                                </div>
                            <?php } ?>
                            <?php if(isset($_SESSION['success'])) { ?>
                                <div class="alert alert-success" role='alert'>
                                    <?php 
                                      echo $_SESSION['success'];
                                      unset($_SESSION['success']);
                                    ?>
                                </div>
                            <?php } ?>
                            <?php if(isset($_SESSION['warning'])) { ?>
                                <div class="alert alert-warning" role='alert'>
                                    <?php 
                                      echo $_SESSION['warning'];
                                      unset($_SESSION['warning']);
                                    ?>
                                </div>
                            <?php } ?>
                            
                            <div class="input">
                               <label for="email">Email</label>
                               <div class="in">
                                  <input type="email" name="email" placeholder="Email" >
                                </div>
                            </div>
                            <div class="input">
                              <label for="username">Owner-name</label>
                              <div class="in">
                                <input type="username" name="username" placeholder="Owner-name" >
                              </div>
                             </div>
                             <div class="input">
                               <label for="password">Password</label>
                               <div class="in">
                                 <input type="password" name="password" placeholder="Password" id="password"  require>
                                 <img src="eye-close.png" id="eyeicon">
                                </div>
                            </div>
                            <div class="input">
                              <label for="password">Confirm Password</label>
                              <div class="in">
                                <input type="password"  name="c_password" placeholder="Confirm-Password" id="passwords" >
                                <img src="eye-close.png" id="eyeicons">
                             </div>
                            </div>
                            <div class="input">
                             <label for="Tel">Tel</label>
                             <div class="in">
                                <input type="tel" name="tel" placeholder="Phone Number" >
                             </div>
                            </div>
                            <div class="input">
                              <label for="pet-type" id="type">Your pet type</label>
                              <div class="in">
                                <input type="type" name="type" placeholder="Your pet type" >
                             </div>
                            </div>
                            <div class="input">
                              <label for="gender" id="gender">Gender</label>
                              <div class="i">
                                <label for="male" class="radio-inline"><input type="radio" name="gender"  value="Male" id="male" >Male</label>
                                <label for="female" class="radio-inline"><input type="radio" name="gender" value="Female" id="female" >Female</label>
                                <!-- <input type="text" id="Otherwas" name="type" value="o" class="Other" hidden  placeholder="Write Here" > -->
                             </div>
                            </div>
                            <div class="input">
                              <label for="Pet-name">Pet-Name</label>
                              <div class="in">
                                <input type="username"  name="petname" placeholder="Pet name" >
                              </div>
                            </div>
                            <div class="input">
                              <label for="weight">Weight</label>
                              <div class="in">
                                <input type="weight" name="weight" placeholder="Weight (KG)" > 
                              </div>
                            </div>
                            <div class="input">
                               <label for="Age">Age</label>
                               <div class="in">
                                <input type="age" name="birth" placeholder="Age" >
                               </div>
                            </div>
                            <div class="input">
                              <label for="species">Breed</label>
                              <div class="in">
                                <input type="text" name="species" placeholder="Breed" >
                              </div>
                            </div>
                            <div class="input">
                             <label for="overall-Health">Medical Conditions</label>
                             <div class="in">
                              <input type="overall-Health"  name="overall" placeholder="allergies, special needs" >
                             </div>
                            </div>
                            <div class="input">
                             <label for="Vaccination">Vaccination Info</label>
                             <div class="in">
                              <input type="Vaccination"  name="vaccine" placeholder="like rabies shot date" >
                             </div>
                            </div>
                            <div class="input">
                             <label for="picture">Picture of your pet</label>
                             <div class="in">
                              <input type="file"  name="image" placeholder="your pet picture" >
                             </div>
                            </div>
                            <button class="btn" name="signup" type="submit">Register</button>
                            <div class="login">
                             <p>Already have an account?<a href="Login.php">Login</a></p>
                            </div>
                        
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <script src="js/script.js"></script>

<script>
$(document).ready(function() {
    $("#other").click(function() {
      $("#Otherwas").show();
    });
    $("#cat").click(function() {
      $("#Otherwas").hide();
    });
    $("#dog").click(function() {
      $("#Otherwas").hide();
    });
});
</script>
</body>
</html>