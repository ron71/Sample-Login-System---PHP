<?php
    include_once 'dbh.inc.php';
    session_start();
if (!isset($_POST['submit'])) {
    header("Location: ../index.php");
}
else {
        $fileName = $_FILES['file']['name'];
        $fileType = $_FILES['file']['type'];
        $fileTempName = $_FILES['file']['tmp_name'];
        $fileError = $_FILES['file']['error'];
        $fileSize = $_FILES['file']['size'];
    //Splitting the file name for changing it with userid as pic name
        $fileNameSplit = explode(".",$fileName);
        
        $extension = strtolower(end($fileNameSplit));

        $allowedExtensions = array('jpg','jpeg','png');

        if(in_array($extension,$allowedExtensions)){
            if($fileError == 0){
                if($fileSize<1000000){
                  
                //header("Location: ../index.php?upload=sucess");
                    //Now we can save the status of user's profile pic in DB.
                    //Now suppose there is already a pic status saved as 1 so no need to change the status 
                    
                 $sql = 'INSERT INTO profileimg (user_id,profile_status) values (?,?);';
                    $stmt = mysqli_stmt_init($conn); 
                    if(!mysqli_stmt_prepare($stmt,$sql)){
                        header("Location: ../index.php?error=stmtNotPrepared");
                    }
                    else {
                        $stat = 1;
                        mysqli_stmt_bind_param($stmt,'ss',$_SESSION['curr_userid'],$stat);
                        mysqli_stmt_execute($stmt);
                        $fileName = $_SESSION['curr_userid'].'.'.$extension;
                        $destination = '../uploads/'.$fileName;
                        move_uploaded_file($fileTempName,$destination);
                        header("Location: ../index.php?upload=success");
                    }
                }
                else {
                    header("Location: ../index.php?error=largefile");
                
                    }
                       
        }
        else {
            header("Location: ../index.php?error=Invalidfile");
            
        }
    }
}