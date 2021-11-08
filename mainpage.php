<?php 
    // Start session
    session_start();
    echo "<h1>Welcome!</h1> <br>";
    if (!isset($_SESSION['username'])) {
        echo "<div class='form'>Click here to <a href='login.php'>Login</a></div>";
        exit();
    }
    else {
        if (!isset($_SESSION['admin'])) { // Checks admin privileges 
            echo "Welcome user!<br>";
            echo "<div class='form'><a href='user.php'>User Page</a></div>";
            echo "<div class='form'><a href='logout.php'>Sign Out</a></div>";
        }
        else {
            echo "Welcome admin!<br>"; // Goes to user version if not admin
            echo "<div class='form'><a href='user.php'>User Page</a></div>";
            echo "<div class='form'><a href='admin.php'>Admin Page</a></div>";
            echo "<div class='form'><a href='logout.php'>Sign Out</a></div>";
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
<title>Main Page</title>
</head>
<body>
</body>
</html>