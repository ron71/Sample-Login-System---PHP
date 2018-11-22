<?php
    include_once 'dbh.inc.php';

    if(isset($_POST['submit'])){

        $first = $_POST['fname'];
        $last = $_POST['lname'];
        $email = $_POST['email'];
        $userid = $_POST['userid'];
        $pwd = $_POST['pwd'];
       
        if(empty($first)||empty($last)||empty($email)||empty($userid)||empty($pwd)){
            header("Location:../signup.php?signup=noInputProvided");
            exit();
        }
        elseif (!preg_match("/^[a-zA-Z]*$/",$first)) {
            header("Location:../signup.php?signup=invalidFirstName&lname=$last&email=$email&userid=$userid");
        }

        elseif (!preg_match("/^[a-zA-Z]*$/",$last)) {
            header("Location:../signup.php?signup=invalidFirstName&fname=$first&email=$email&userid=$userid");
            exit();
        }

        elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            header("Location:../signup.php?signup=invalidEmailId&fname=$first&lname=$last&userid=$userid");
            exit();
        }
        else{
            $userid = mysqli_real_escape_string($conn,$_POST['userid']);

            $sql="SELECT * FROM users WHERE user_id='$userid'";

            $result = mysqli_query($conn,$sql);

            if(mysqli_num_rows($result) > 0){
                header("Location:../signup.php?signup=userIdExists&fname=$first&lname=$last&email=$email");
                exit();  
            }
            else{
       
                $sql = 'INSERT INTO users (user_fname,user_lname,user_email,user_id,user_pwd) VALUES(?,?,?,?,?);';

                $stmt = mysqli_stmt_init($conn);
                
                if(!mysqli_stmt_prepare($stmt,$sql)){
                    header("Location:../signup.php?signup=statementNotPrepared");
                    exit();
                }
                else{
                    $hashedpwd = password_hash($pwd,PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt,"sssss",$first,$last,$email,$userid,$hashedpwd);

                    mysqli_stmt_execute($stmt);

                    header("Location:../index.php?signup=successfull");
                }
            }
        }
    }
    else{
        header("Location:../index.php?error=securityBreach");
    }