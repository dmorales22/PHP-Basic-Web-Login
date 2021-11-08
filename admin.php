<?php //Admin page with all the links
    session_start();
    if (!isset($_SESSION['admin'])) {
        echo "<div class='form'>This page is restricted! Click here to <a href='login.php'>Login</a></div>";
        exit();
    }

    echo "<h1>Admin Page</h1>";
    echo "Hello admin!<br><br>";
    echo "<div class='form'><a href='mainpage.php'>Back to Main Page</a></div>";
    echo "<div class='form'><a href='modifyusers.php'>Modify Users</a></div>";
    echo "<div class='form'><a href='addusers.php'>Add Users</a></div>";
    echo "<div class='form'><a href='viewusers.php'>View Users</a></div>";
    echo "<div class='form'><a href='changepassword.php'>Reset Password</a></div>";
    echo "<div class='form'><a href='logout.php'>Sign Out</a></div>";
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Admin Page</title>
</head>
<body>
</body>
</html>