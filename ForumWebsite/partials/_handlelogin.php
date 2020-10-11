<?php
session_start();
if($_SERVER['REQUEST_METHOD']=='POST'){
    include '_dbconnect.php';
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM `login` WHERE emailId='$email'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    $num = mysqli_num_rows($result);
    $check = password_verify("$password", $row['Password']);
    if($num==1 && $check){
        $_SESSION['loggedin']='true';
        $_SESSION['username']=$row['username'];
        header("location:/ForumWebsite/");
    }
    else{
        
       $showwrongAlert = true;
        header("location:/ForumWebsite/?alert=$showwrongAlert");
    }
}
?>