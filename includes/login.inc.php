<?php
    include_once 'dbh.inc.php';

    session_start();
    if(isset($_POST['submit'])){
        $uid = $_POST['uid'];
        $pwd = $_POST['pwd'];

        if(empty($uid)||empty($pwd)){
            header("Location:../index.php?login=empty");
            exit();
        }
        else{
            if(filter_var($uid,FILTER_VALIDATE_EMAIL)){
                //checking wther input is email add or userid
                $sql = "SELECT * FROM users WHERE user_email=?;";
            }
            else {
                $sql = "SELECT * FROM users WHERE user_id=?;";
            }

            $stmt = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmt,$sql)){
                header("Location:../index.php?login=statementNotPrepared");
                exit();
            }
            else{
                mysqli_stmt_bind_param($stmt,"s",$uid);

                mysqli_stmt_execute($stmt);

                $result = mysqli_stmt_get_result($stmt);

                if($record = mysqli_fetch_assoc($result)){
                        $check = password_verify($pwd,$record['user_pwd']);
                    //Somthing wrong with this function..
                        if($check == true){
                        /* Storing suers info in SESSION */
                            $_SESSION['curr_id'] = $record['id'];
                            $_SESSION['curr_first'] = $record['user_fname'];
                            $_SESSION['curr_last'] = $record['user_lname'];
                            $_SESSION['curr_email'] = $record['user_email'];
                            $_SESSION['curr_userid'] = $record['user_id'];

                            header("Location:../index.php?login=successfull");
                            exit();
                        }
                        elseif($check==false){
                            header("Location:../index.php?login=WrongUserNameorPassword");
                            exit();
                        }
                }
                 else {
                    header("Location:../index.php?login=error");
                }

            }
        }


    }
    else {
        header("Location:../index.php?error=securityBreach");
        exit();
    }