<?php 
    session_start();
    include('server.php');
    
    $errors = array();
    
    
    
    if (isset($_POST['btn_up'])) {
        
        $username =  $_POST['username'];
        $email =  $_POST['email'];
        $password =  $_POST['password'];
        $phone =  $_POST['phone'];
        $address =  $_POST['address'];
        

        if (empty($password)) {
            array_push($errors, "Password is required");
        }

        if (count($errors) == 0) {            
            $password = md5($password);
            $user_check_query = "SELECT * FROM user WHERE email = '$email'";
            $query = mysqli_query($conn, $user_check_query);
            $result = mysqli_fetch_assoc($query);

            if ($result['password'] === $password) {
                $_SESSION['id'] = $result["id"];
                $sql = "UPDATE user SET username='$username', phone='$phone', address='$address' WHERE email='$email' ";
                mysqli_query($conn, $sql);
                header('location: account.php');
            } else {
                array_push($errors, "Wrong Password");
                $_SESSION['error'] = "Wrong Password!";
                header("location: edit.php");
            }
        } else {
            array_push($errors, "Username & Password is required");
            $_SESSION['error'] = "Username & Password is required";
            header("location: edit.php");
        }
    }

    


?>
