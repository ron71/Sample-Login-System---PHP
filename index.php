<?php
    include_once 'header.php';
    include_once 'includes/dbh.inc.php';
   
?>

<section class = "main-container">
     <div class = "main-wrapper">
            <h2>HOME</h2>
     </div>
     <div class = "logedin-content">
            <?php
            
                if(!isset($_SESSION['curr_userid'])){
                   
                }
                else {
                    $sql = "SELECT * FROM profileimg WHERE user_id='".$_SESSION['curr_userid']."'; ";
                    $result = mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result)>0){
                       // echo'<h2>NO USER SIGNED IN!</h2>';
                        while ($row = mysqli_fetch_assoc($result)) {
                            if($row['profile_status']==0){
                                echo '<center>
                                 <div class = "profile-detail">
                                    <form action="includes/uploadprofile.inc.php" method="post" enctype="multipart/form-data">
                                        <!--uploadform-->
                                    <img class="profile-pic" height=150px width =150px  src="uploads/defaultprofile.jpg" />
                                    <input type="file"class="profile-upload" name = "file">Update Profile Pic</input>
                                    <button type = "submit" name = "submit">Upload<button>
                                    <form action = "includes/deleteProfile.inc.php" method = "post" enctype="multipart/form-data">
                                    <button type= "submit" name = "delete">DELETE PROFILE</button>
                                    </form>
                                    </form>
                                   
                                <center><h4>NAME : '.$_SESSION['curr_first'].' '.$_SESSION['curr_last'].'<br><br>EMAIL : '.$_SESSION['curr_email'].'</h4></center>
                                     </div></center>'; 
                            }
                            else if($row['profile_status']== 1) {
                                    if(isset($_GET['upload'])){
                                        echo '<center><div class = "profile-detail">
                                            <form action="includes/uploadprofile.inc.php" method="post" enctype="multipart/form-data">
                                            <img class="profile-pic" height=150px width =150px  src="uploads/'.$_SESSION['curr_userid'].'.jpg" />
                                            <input type="file"class="profile-upload" name = "file">Update Profile Pic</input>
                                            <button type = "submit" name = "submit">Upload<button>
                                            </form>';
                                            //we cant keep delete in previous form as inside that form whichever button is clicked upload thread will run as it is the thread of parent form.

                                            echo'<br><form action = "includes/deleteProfile.inc.php" method = "post" enctype="multipart/form-data">
                                            <button type= "submit" name = "delete">DELETE PROFILE</button>
                                            </form><center><h4>NAME : '.$_SESSION['curr_first'].' '.$_SESSION['curr_last'].'<br><br>EMAIL : '.$_SESSION['curr_email'].'</h4></center>
                                        </div></center>';
                                    }
                                    else{
                                        //this will run when we are opening index page but not uploaded any new pic.
                                        echo '<center><div class = "profile-detail">
                                        <form action="includes/uploadprofile.inc.php" method="post" enctype="multipart/form-data">
                                        <img class="profile-pic" height=150px width =150px  src="uploads/'.$_SESSION['curr_userid'].'.jpg" />
                                        <input type="file"class="profile-upload" name = "file">Update Profile Pic</input>
                                        <button type = "submit" name = "submit">Upload<button>
                                        </form>';
                                        //we cant keep delete in previous form as inside that form whichever button is clicked upload thread will run as it is the thread of parent form.

                                        echo'<br><form action = "includes/deleteProfile.inc.php" method = "post" enctype="multipart/form-data">
                                        <button type= "submit" name = "delete">DELETE PROFILE</button>
                                        </form><center><h4>NAME : '.$_SESSION['curr_first'].' '.$_SESSION['curr_last'].'<br><br>EMAIL : '.$_SESSION['curr_email'].'</h4></center>
                                    </div></center>';

                                    }
                            }
                         }
                     }
                    else {
                        echo ' <center>
                                <div class = "profile-detail">
                                    <form action="includes/uploadprofile.inc.php" method="post" enctype="multipart/form-data">
                                        <!--uploadform-->
                                    <img class="profile-pic" height=150px width =150px  src="uploads/defaultprofile.jpg" />
                                    <input type="file"class="profile-upload" name = "file">Update Profile Pic</input>
                                    <button type = "submit" name = "submit">Upload<button>
                                    </form>';
                                    echo '<center><h4>NAME : '.$_SESSION['curr_first'].' '.$_SESSION['curr_last'].'<br><br>EMAIL : '.$_SESSION['curr_email'].'</h4></center>
                                 </div>
                            </center>'; 
                    }
                }
                
            ?>
            <!--
          <center>
                <div class = "profile-detail">
                    <form action="uploadprofile.php" method="post">
                        
                    <img class="profile-pic" height=150px width =150px  src="uploads/defaultprofile.jpg" />
                    <input type="file"class="profile-upload" name = "file">Update Profile Pic</input>
                    </form>
                 </div>
            </center>
            -->
     </div>
</section>

<?php
    include_once 'footer.php';
?> 

