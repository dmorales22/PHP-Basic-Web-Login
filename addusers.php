<?php
    require('db.php');
    session_start();
    if (!isset($_SESSION['admin'])) {
        echo "<div class='form'>This page is restricted! Click here to <a href='login.php'>Login</a></div>";
        exit();
    }
    else {
        if (isset($_REQUEST['username'])) { // Gets form contents to create users.
            $username = stripslashes($_REQUEST['username']); 
            $username = mysqli_real_escape_string($con,$username);
            $firstname = stripslashes($_REQUEST['firstname']); 
            $firstname = mysqli_real_escape_string($con,$firstname);
            $lastname = stripslashes($_REQUEST['lastname']); 
            $lastname = mysqli_real_escape_string($con,$lastname);
            $password = stripslashes($_REQUEST['password']);
            $password = mysqli_real_escape_string($con,$password);
            $password_hashed = password_hash($password, PASSWORD_DEFAULT);
            $admin = stripslashes($_REQUEST['admin']);
            $admin = mysqli_real_escape_string($con,$admin);
            $query = "INSERT INTO users (username, firstname, lastname, password, admin) VALUES ('$username', '$firstname', '$lastname', '$password_hashed', '$admin')";
            $result = mysqli_query($con, $query); // Creates new user
            echo "User successfully added.";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Add Users</title>
</head>
<body>
<div class="form">
<h1>Add Users</h1>
<form name="addusers" action="addusers.php" method="post">
  <input type="text" name="username" placeholder="Username" required />
  <input type="text" name="firstname" placeholder="First Name" required />
  <input type="text" name="lastname" placeholder="Last Name" required />
  <input type="password" name="password" placeholder="Password" required />
  <input type="number" name="admin" placeholder="Input 1 for admin rights" required />
  <input type="submit" name="submit" value="Register" />
</form>
</div>
<div class='form'><a href='admin.php'>Back to Admin Page</a></div>
</body>
</html>