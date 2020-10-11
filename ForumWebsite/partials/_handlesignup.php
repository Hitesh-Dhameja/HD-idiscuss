<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    include '_dbconnect.php';
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpass = $_POST['cpassword'];
    if($password==$cpass){
        $sql1 = "SELECT * FROM `login` WHERE emailId='$email'";
        $result1 = mysqli_query($conn,$sql1);
        $num = mysqli_num_rows($result1);
        if($num==0){
            $actualPass = password_hash("$password",PASSWORD_DEFAULT);
            $sql = "INSERT INTO `login` (`Sr.no.`, `username`, `emailId`, `Password`, `Created_Time`) VALUES (NULL, '$username', '$email', '$actualPass', current_timestamp());"; 
            $result = mysqli_query($conn,$sql);
            if($result){
                $successsignup = true;
                header("location:/ForumWebsite/?success=$successsignup");
            }
            else{
                echo'error';
            }
            
        }
        else{
            $showemailTakenAlert = true;
            
            header("location:/ForumWebsite/?emailerror=$showemailTakenAlert");
        }
        
    }
    else{
        $passworderror = true;
        header("location:/ForumWebsite/?passerror=$passworderror");
    }
    
}
?>