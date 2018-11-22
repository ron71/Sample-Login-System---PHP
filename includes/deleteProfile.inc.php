<?php
    include_once 'dbh.inc.php';
    session_start();

    if(!isset($_SESSION['curr_userid'])){
        header("Location: ../index.php?error=deletionSecurityBreach");
    }
    else{
        if(!isset($_POST['delete'])){
            header("Location: ../index.php?error=deletionButtonSecurityBreach");
        }
        else{
            $filename = '../uploads/'.$_SESSION['curr_userid'].'*';
            //above line is just a string which on passed to search file containing userId in its name.
            //glob function stores an array of elemnts containg userId in its name.
            //Its obivious that there would be one file contaning userId in name. So we just check its extension.
            $fileinfo = glob($filename);
            $fileExt = explode('.',$fileinfo[0]);
            $fileactualExt = $fileExt[3];
           // print_r($fileactualExt);

            $file = '../uploads/'.$_SESSION['curr_userid'].'.'.$fileactualExt;
            
            //now to delete we will be using unlink() function.

            if(!unlink($file)){
                //it executes if file is not deleted.
                 header("Location: ../index.php?deleteMsg=fileNOTDeleted");
            }
            else{
                    $sql = "SELECT * FROM profileimg WHERE user_id='".$_SESSION['curr_userid']."'; ";
                $result = mysqli_query($conn,$sql);
                if(mysqli_num_rows($result)>0){
                // echo'<h2>NO USER SIGNED IN!</h2>';
                    while ($row = mysqli_fetch_assoc($result)) {
                        $sql = "DELETE FROM profileimg WHERE user_id='".$_SESSION['curr_userid']."'; ";
                        mysqli_query($conn,$sql);
                        header("Location: ../index.php?deleteMsg=profileDeleted");
                        }
                }
                else{
                    header("Location: ../index.php?deleteMsg=NoProfilePicUploaded");
                }
            }

        }
         
        
    }
?>