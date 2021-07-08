<?php
$showError = "false";


if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';
    $email = $_POST['loginEmail'];
    $pass = $_POST['loginPass'];

    $existsql = "select * from `users` where user_email = '$email' ";
    $result = mysqli_query($conn, $existsql);
    $numRows = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    $dno = $row['sno'];
    
    if($numRows==1){
        while($row){
            if(password_verify($pass, $row['user_pass'] )){
                session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['useremail'] = $email;
            $_SESSION['sno'] = $dno;
            echo "<script>window.location.href='https://dkforum.herokuapp.com/index.php';</script>";
            exit;
            }
            else{
            echo "<script>window.location.href='https://dkforum.herokuapp.com/index.php?login=failed && password doesnot matched';</script>";
                exit;
            }
        }          
        

    } else{
        echo "<script>window.location.href='https://dkforum.herokuapp.com/index.php?login=failed&&email not found';</script>";
                exit;
          
        }  

}
?>
