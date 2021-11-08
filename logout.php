<?php

session_start();
if(session_destroy()) 
{
    echo "<div class='form'>You are signed out! Click here to <a href='login.php'>Login</a></div>";
}
?>