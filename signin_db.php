<?php 

    session_start();
    require_once 'config/db.php';

    if (isset($_POST['signin'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        

        if(empty($email)) {
            $_SESSION['error'] = 'required email';
            header("location: Login.php");
        }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error'] = 'email form please';
            header("location: Login.php");
        }else if (empty($password)) {
            $_SESSION['error'] = 'required password';
            header("location: Login.php");
        }else if (strlen($_POST['password'])>20 || strlen($_POST['password'])<5) {
            $_SESSION['error'] = 'Must be between 5-20 character';
            header("location: Login.php");
        }else {
            try {

                $check_data = $conn->prepare("SELECT * FROM users WHERE email = :email");
                $check_data->bindParam(":email", $email);
                $check_data->execute();
                $row = $check_data->fetch(PDO::FETCH_ASSOC);

                if ($check_data->rowCount() > 0) {

                    if ($email == $row['email']) {
                        if (password_verify($password, $row['password'])) {
                            if($row['urole'] == 'admin') {
                                $_SESSION['admin_log'] = $row['id'];
                                header("location: admin.php");
                            } else {
                                $_SESSION['user_log'] = $row['id'];
                                header("location: user.php");
                            }
                        } else {
                            $_SESSION['error'] = 'Wrong password';
                            header("location: Login.php");
                        }
                    }else {
                        $_SESSION['error'] = 'Not found this email';
                        header("location: Login.php");
                    }
                } else {
                    $_SESSION['error'] = "There is no data in server";
                    header("location: Login.php");

                }

            }catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
    }

?>