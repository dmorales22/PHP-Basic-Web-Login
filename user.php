<?php //User page with all links 
    session_start();
    if (!isset($_SESSION['username'])) {
        echo "<div class='form'>This page is restricted! Click here to <a href='login.php'>Login</a></div>";
        exit();
    }

    echo "Hello user!<br><br>";
    echo "<div class='form'><a href='mainpage.php'>Back to Main Page</a></div>";
    echo "<div class='form'><a href='changepassword.php'>Reset Password</a></div>";
    echo "<div class='form'><a href='logout.php'>Sign Out</a></div>";
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>User Page</title>
</head>
<body>
</body>
</html>
