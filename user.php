<?php 

    session_start();
    require_once 'config/db.php';
    if (!isset($_SESSION['user_log'])) {
        $_SESSION['error'] = 'Please Login';
        header("location: Login.php");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Paage</title>
    <link rel="stylesheet" href="user.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

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
        <div class="Profile">
            <div class="container">
                <div class="wrapper">
                    <?php 
                    
                        if (isset($_SESSION['user_log'])) {
                            $user_id = $_SESSION['user_log'];
                            $stmt = $conn->query("SELECT * FROM users WHERE id = $user_id");
                            $stmt->execute();
                            $row = $stmt->fetch(PDO::FETCH_ASSOC);
                        }

                    ?>
                    <div class="box">
                        <h1><?php echo $row['petname'] ?> Profile</h1>
                        <div class="profile-pic">
                            <img src="images/<?php echo $row['image'] ?>" alt="">
                        </div>
                        <div class="pet-info">
                            <h3>Pet-Infomation</h3>
                            <p><strong>Name:</strong> <?php echo $row['petname'] ?></p>
                            <p><strong>Type:</strong> <?php echo $row['type'] ?></p>
                            <p><strong>Breed:</strong> <?php echo $row['species'] ?></p>
                            <p><strong>Age:</strong> <?php echo $row['birth'] ?> Years</p>
                            <p><strong>Gender:</strong> <?php echo $row['gender'] ?></p>
                            <p><strong>Weight:</strong> <?php echo $row['weight'] ?> kg</p>
                        </div>
                        <div class="owner">
                            <h3>Owner-Infomation</h3>
                            <p><strong>Name:</strong> <?php echo $row['username'] ?></p>
                            <p><strong>Phone:</strong> <?php echo $row['tel'] ?></p>
                            <p><strong>email:</strong> <?php echo $row['email'] ?></p>
                        </div>
                        <div class="medical">
                            <h3>Medical-Infomation</h3>
                            <p><strong>Medical:</strong> <?php echo $row['overall'] ?></p>
                            <p><strong>Vaccination:</strong> <?php echo $row['vaccine'] ?></p>
                        </div>
                        <a href="logout.php" class="logout">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <script src="js/script.js"></script>
</body>
</html>