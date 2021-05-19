<?php 
    session_start();
    include('server.php');
    
    $errors = array();

    if (isset($_POST['btn_sub'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password_1 = $_POST['password_1'];
        $re_pass = $_POST['re_pass'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];

        if ($password_1 != $re_pass) {
            array_push($errors, "The two passwords do not match");
            $_SESSION['error'] = "The two passwords do not match";
        }

        $user_check_query = "SELECT * FROM user WHERE username = '$username' OR email = '$email' LIMIT 1";
        $query = mysqli_query($conn, $user_check_query);
        $result = mysqli_fetch_assoc($query);

        if ($result) { // if user exists
            if ($result['username'] === $username) {
                array_push($errors, "Username already exists");
                $_SESSION['error'] = "Username already exists";
            }
            if ($result['email'] === $email) {
                array_push($errors, "Email already exists");
                $_SESSION['error'] = "Email already exists";
            }
        }

        if (count($errors) == 0) {
            $password = md5($password_1);

            $sql = "INSERT INTO user (username, email, password, phone, address, userlevel) VALUES ('$username', '$email', '$password', '$phone', '$address','m')";
            mysqli_query($conn, $sql);

            $sql = "SELECT * FROM user WHERE email= '$email'";
            $objQuery = mysqli_query($conn, $sql);
            $objResult = mysqli_fetch_array($objQuery);
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            $_SESSION['phone'] = $phone;
            $_SESSION['address'] = $address;
            $_SESSION['id'] = $objResult["id"];
            header('location: account.php');
        } else {
            header("location: sign_up.php");
        }
    }

?>
