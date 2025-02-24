<?php 

    session_start(); 
    
    

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
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
        <div class="login">
            <div class="container d-flex justify-content-center">
                <div class="wrapper">
                    <div class="box">
                        <h1>Login</h1>
                        <form action="signin_db.php" method="post">
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
                            
                            <div class="input">
                                <div class="in">
                                  <input type="email" name="email" placeholder="Email" >
                                </div>
                            </div>
                            <div class="input">
                                <div class="in">
                                 <input type="password" name="password" placeholder="Password" id="password"  require>
                                 <img src="eye-close.png" id="eyeicon">
                                </div>
                            </div>
                            <div class="forgot">
                                <a href="#">Forgot Password?</a>
                            </div>
    
                            <button type="submit" name="signin" class="btn">Login</button>
                            <div class="register">
                                <p>Don't have acccount? <a href="Register.php">Register</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <a href="#"><img src="img/image.png" alt=""></a>   
    <script src="js/script.js"></script>
</body>
</html>