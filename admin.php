<?php 

    session_start();
    require_once 'config/db.php';
    if (!isset($_SESSION['admin_log'])) {
        $_SESSION['error'] = 'Please Login';
        header("location: Login.php");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
    <link rel="stylesheet" href="admin.css">
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
                    <li><a href="Login.php">Login</a></li>
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
        
        <div class="Profile d-flex justify-content-center">
          <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="insert.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="email" class="col-form-label">Email:</label>
                        <input type="email"  name="email" placeholder="Email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="owner" class="col-form-label">Owner-Name:</label>
                        <input type="text"  name="username" placeholder="Owner-Name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="col-form-label">Password:</label>
                        <input type="password" name="password" placeholder="Password" id="password" class="form-control"  require>
                        <img src="eye-close.png" id="eyeicon">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="col-form-label">Confirm Password</label>
                        <input type="password"  name="c_password" placeholder="Confirm-Password" class="form-control" id="passwords" >
                        <img src="eye-close.png" id="eyeicons">
                    </div>
                    <div class="mb-3">
                        <label for="tel" class="col-form-label">Phone:</label>
                        <input type="text"  name="tel" placeholder="Phone-number" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="type" class="col-form-label">Your pet type:</label>
                        <input type="text"  name="type" placeholder="Your pet type" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="col-form-label">Gender:</label>
                        <label for="male" class="radio-inline"><input type="radio" name="gender"  value="Male" id="male" >Male</label>
                        <label for="female" class="radio-inline"><input type="radio" name="gender" value="Female" id="female" >Female</label>
                    </div>
                    <div class="mb-3">
                        <label for="Pet-name" class="col-form-label">Pet-Name:</label>
                        <input type="text"  name="petname" placeholder="Pet Name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="weight" class="col-form-label">Weight:</label>
                        <input type="text"  name="weight" placeholder="Weight" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="Age" class="col-form-label">Age:</label>
                        <input type="text"  name="birth" placeholder="Age" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="breed" class="col-form-label">Breed:</label>
                        <input type="text"  name="species" placeholder="Breed" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="medical-con" class="col-form-label">Medical Conditions:</label>
                        <input type="text"  name="overall" placeholder="Allergies, special needs" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="vaccine" class="col-form-label">Vaccination info:</label>
                        <input type="text"  name="type" placeholder="Vaccination info" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="vaccine" class="col-form-label">Vaccination info:</label>
                        <input type="text"  name="type" placeholder="Vaccination info" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="picture" class="col-form-label">Picture of your pet:</label>
                        <input type="file"  name="image" id="ImgInput" placeholder="Picture of your pet" class="form-control">
                        <img id="previewImg" alt="">
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="signup" class="btn btn-success">Send message</button>
                    </div>
                    </form>
                </div>
            </div>
         </div>
        <div class="container mt-5">
                <div class="row">
                    <div class="col-md-6 ">
                        <h1>Welcome, Admin</h1>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#userModal">Add user</button>
                    </div>
                </div>
            </div>
        </div>
        <a href="logout.php" class="logout">Logout</a>
    </header>
    <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>