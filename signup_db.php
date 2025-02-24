<?php 

    session_start();
    require_once 'config/db.php';

    if (isset($_POST['signup'])) {
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $c_password = $_POST['c_password'];
        $type = $_POST['type'];
        $gender = $_POST['gender'];
        $petname = $_POST['petname'];
        $weight = $_POST['weight'];
        $tel = $_POST['tel'];
        $birth = $_POST['birth'];
        $species = $_POST['species'];
        $overall = $_POST['overall'];
        $vaccine = $_POST['vaccine'];
        $image = $_FILES['image']['name'];
        $temp = $_FILES['image']['tmp_name'];
        $folder = 'images/'.$image;
        $urole = 'user';
        move_uploaded_file($temp,$folder);

        if(empty($email)) {
            $_SESSION['error'] = 'required email';
            header("location: Register.php");
        }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error'] = 'email form please';
            header("location: Register.php");
        }else if (empty($username)) {
            $_SESSION['error'] = 'required username';
            header("location: Register.php");
        }else if (empty($password)) {
            $_SESSION['error'] = 'required password';
            header("location: Register.php");
        }else if (strlen($_POST['password'])>20 || strlen($_POST['password'])<5) {
            $_SESSION['error'] = 'Must be between 5-20 character';
            header("location: Register.php");
        }else if (empty($c_password)) {
            $_SESSION['error'] = 'required c_password';
            header("location: Register.php");
        }else if ($password != $c_password) {
            $_SESSION['error'] = 'not same password';
            header("location: Register.php");
        }else if (empty($tel)) {
            $_SESSION['error'] = 'required tel';
            header("location: Register.php");
        }else if (strlen($_POST['tel'])>10) {
            $_SESSION['error'] = 'please enter proper phone number';
            header("location: Register.php");
        }else if (empty($type)) {
            $_SESSION['error'] = 'required type of your pet';
            header("location: Register.php");
        }else if (empty($gender)) {
            $_SESSION['error'] = 'required gender of your pet';
            header("location: Register.php");
        }else if (empty($petname)) {
            $_SESSION['error'] = 'required your pet name';
            header("location: Register.php");
        }else if (empty($weight)) {
            $_SESSION['error'] = 'required weight';
            header("location: Register.php");
        }else if (empty($tel)) {
            $_SESSION['error'] = 'required tel';
            header("location: Register.php");
        }else if (empty($birth)) {
            $_SESSION['error'] = 'required birthdate';
            header("location: Register.php");
        }else if (empty($species)) {
            $_SESSION['error'] = 'required species';
            header("location: Register.php");
        }else if (empty($overall)) {
            $_SESSION['error'] = 'required overall';
            header("location: Register.php");
        }else if (empty($vaccine)) {
            $_SESSION['error'] = 'required vaccine';
            header("location: Register.php");
        }else {
            try {

                $check_email = $conn->prepare("SELECT email FROM users WHERE email = :email");
                $check_email->bindParam(":email", $email);
                $check_email->execute();
                $row = $check_email->fetch(PDO::FETCH_ASSOC);

                if ($row['email'] == $email) {
                    $_SESSION['warning'] = "This email is already used. <a href='Login.php'>Click Here</a> to login";
                    header("location: Register.php");
                }else if (!isset($_SESSION{'error'})) {
                    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                    $stmt = $conn->prepare("INSERT INTO users(email, username, password, type, gender, petname, weight, tel, birth, species, overall, vaccine, image, urole) 
                                             VALUES(:email, :username, :password, :type, :gender, :petname, :weight, :tel, :birth, :species, :overall, :vaccine, :image, :urole)");
                    $stmt->bindParam(":email", $email);
                    $stmt->bindParam(":username", $username);
                    $stmt->bindParam(":password", $passwordHash);
                    $stmt->bindParam(":type", $type);
                    $stmt->bindParam(":gender", $gender);
                    $stmt->bindParam(":petname", $petname);
                    $stmt->bindParam(":weight", $weight);
                    $stmt->bindParam(":tel", $tel);
                    $stmt->bindParam(":birth", $birth);
                    $stmt->bindParam(":species", $species);
                    $stmt->bindParam(":overall", $overall);
                    $stmt->bindParam(":vaccine", $vaccine);
                    $stmt->bindParam(":image", $image);
                    $stmt->bindParam(":urole", $urole);
                    $stmt->execute();
                    $_SESSION['success'] = "Sign up complete! <a href='Login.php' class='alert-link'>Click Here</a> to login";
                    header("location: Register.php");
                }else {
                    $_SESSION['error'] = "Something wrong";
                    header("location: Register.php");

                }

            }catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
    }

?>