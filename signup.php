<?php
    include_once 'header.php';
?>

<section class = "main-container">
     <div class = "main-wrapper">
            <h2>Sign up</h2>
            <form class = "sign-up" action = "includes/signup.inc.php" method = "POST">
            <?php
                if(!isset($_GET['fname'])){
                    
                    echo ' <input type="text" name="fname" placeholder = "FIRST NAME"/><br><br>';
                }
                else {
                    $fname = $_GET['fname'];
                    echo ' <input type="text" name="fname" placeholder = "FIRST NAME" value = "'.$fname.'"/><br><br>';
                }

                if(!isset($_GET['lname'])){
                    echo ' <input type="text" name="lname" placeholder = "LAST NAME"/><br><br>';
                }
                else {
                   
                    $lname = $_GET['lname'];
                    echo ' <input type="text" name="lname" placeholder = "LAST NAME" value = "'.$lname.'"/><br><br>';
                }

                if(!isset($_GET['email'])){
                    echo ' <input type="text" name="email" placeholder = "abc@gmail.com" /><br><br>';
                }
                else {
                     $email = $_GET['email'];
                    echo ' <input type="text" name="email" placeholder = "abc@gmail.com" value = "'.$email.'"/><br><br>';
                   
                }

                if(!isset($_GET['userid'])){
                    echo ' <input type="text" name="userid" placeholder = "USER ID"/><br><br>';
                }
                else {
                    $userid = $_GET['userid'];
                    echo ' <input type="text" name="userid" placeholder = "USER ID" value = "'.$userid.'"/><br><br>';
                }
                
            ?>
                <input type="password" name="pwd" placeholder = "PASSWORD"/>
                <button type="submit" name = "submit">Signup</button>
            </form>
            <?php
                if(isset($_GET['signup'])){
                    
                    $signup = $_GET['signup'];
                    if($signup == "invalidFirstName"){

                    }
                    elseif($signup == "invalidLastName") {
                        # code...
                    }
                    elseif($signup == "invalidEmailId") {
                        # code...
                    }
                    elseif ($signup == "statementNotPrepared") {
                        # code...
                    }
                    elseif ($signup == "userIdExists") {
                        # code...
                    }
                }
            ?>
           
     </div>

</section>


<?php
    include_once 'footer.php';
?>