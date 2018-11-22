<?php
    session-session_start();
    if(isset($_POST['submit'])){
        //Clear SESSION
        session_unset();
        //delete all session from website.
        session_destroy();

        header("Location:../index.php");
    }
?>