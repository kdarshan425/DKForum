<?php
$showError = "false";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';
    $user_email = $_POST['signupEmail'];
    $pass = $_POST['signupPassword'];
    $cpass = $_POST['signupcPassword'];

    //Check whether the email is already exist in the database
    $existsql = "select * from `users` where user_email = '$user_email'";
    $result = mysqli_query($conn, $existsql);
    $numRows = mysqli_num_rows($result);
    if($numRows>0){
        $showError = "Email already exist!";
    }
    else{
        if($pass==$cpass){
            $hash = password_hash($pass, PASSWORD_DEFAULT);
            $sql= "INSERT INTO `users` (`sno`, `user_email`, `user_pass`, `timestamp`) VALUES (NULL, '$user_email', '$hash', current_timestamp());";
            $result = mysqli_query($conn, $sql);

            if($result){
                $showAlert = true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['useremail'] = $email;
                $_SESSION['sno'] = $dno;
                header("Location: https://dkforum.herokuapp.com/index.php?signupsuccess=true");
                exit();
            }
        }
        else{
            $showError = "Password Does not match !";
        }    
    }
    header("Location: https://dkforum.herokuapp.com/index.php?signupsuccess=false&error=$showError");
}
?>
