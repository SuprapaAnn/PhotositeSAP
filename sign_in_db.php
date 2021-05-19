<?php 
    session_start();
    include('server.php');

    $errors = array();
    
    if (isset($_POST['sign_in_user'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (empty($email)) {
            array_push($errors, "email is required");
        }

        if (empty($password)) {
            array_push($errors, "Password is required");
        }
        

        if (count($errors) == 0) {
            $password = md5($password);
            $query = "SELECT * FROM user WHERE email= '$email' AND password = '$password' ";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) == 1) {
                $sql = "SELECT * FROM user WHERE email= '$email'";
                $objQuery = mysqli_query($conn, $sql);
                $objResult = mysqli_fetch_array($objQuery);
                $_SESSION['username'] = $objResult["username"];
                $_SESSION['email'] = $email;
                $_SESSION['phone'] = $objResult["phone"];
                $_SESSION['address'] = $objResult["address"];
                $_SESSION['id'] = $objResult["id"];
                $_SESSION['userlevel'] = $objResult["userlevel"];
                if($_SESSION['userlevel']=='m'){
                   header("location: account.php"); 
                }
                if ($_SESSION['userlevel'] == 'a') {
                    header("Location: admin.php");
                }
                
            } 
            else {
                array_push($errors, "Wrong Username or Password");
                $_SESSION['error'] = "Wrong Username or Password!";
                header("location: sign_in.php");
            }
        } else {
            array_push($errors, "Username & Password is required");
            $_SESSION['error'] = "Username & Password is required";
            header("location: sign_in.php");
        }
    }

?>
