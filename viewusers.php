<?php 
    require('db.php');
    session_start();
    if (!isset($_SESSION['admin'])) {
        echo "<div class='form'>This page is restricted! Click here to <a href='login.php'>Login</a></div>";
        exit();
    }

    $query = "SELECT username, firstname, lastname, dateOfCreation, lastLogin, admin FROM users";
    $result = mysqli_query($con,$query) or die(mysql_error());
    
    if ($result->num_rows > 0) { // Prints all users.
        echo "<table class='log'><tr class='log-header'><th>Username</th><th>First Name</th><th>Last Name</th><th>Date of Creation</th><th>Last Login<th></th><th>Admin (1==Yes 0==No)</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>". $row["username"]. "</td><td>" . $row["firstname"]. "</td><td>". $row["lastname"]. "</td><td>". $row["dateOfCreation"]. "</td><td>" . $row["lastLogin"]. "</td><td>". $row["admin"]. "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "No users found.";
    }
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Users</title>
</head>
<body>
<div class='form'><a href='admin.php'>Back to Admin Page</a></div>
</body>
</html>