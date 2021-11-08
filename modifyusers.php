<?php
    require('db.php');
    session_start();
    if (!isset($_SESSION['admin'])) {
        echo "<div class='form'>This page is restricted! Click here to <a href='login.php'>Login</a></div>";
        exit();
    }
    else {
        if (isset($_REQUEST['username'])) {
            $username = stripslashes($_REQUEST['username']); 
            $username = mysqli_real_escape_string($con,$username);
            $query = "SELECT * FROM users WHERE username='$username'"; // Gets user
            $result = mysqli_query($con,$query) or die(mysql_error());
            $rows = mysqli_num_rows($result);

            if($rows != 1) { // Checks if user exists
                echo "<div class='form'>User not found. Click <a href='modifyusers.php'>here</a> to try again.</div>";
                exit();
            }

            $firstname = stripslashes($_REQUEST['firstname']); 
            $firstname = mysqli_real_escape_string($con,$firstname);
            $lastname = stripslashes($_REQUEST['lastname']); 
            $lastname = mysqli_real_escape_string($con,$lastname);
            $password = stripslashes($_REQUEST['password']);
            $password = mysqli_real_escape_string($con,$password);
            $password_hashed = password_hash($password, PASSWORD_DEFAULT);
            $admin = stripslashes($_REQUEST['admin']);
            $admin = mysqli_real_escape_string($con,$admin);

            if($firstname == "" && $lastname == "" && $password == "") { // Updates if certain fields are empty.
                $query = "update users SET admin=$admin WHERE username='$username'";
                $result = mysqli_query($con, $query) or die(mysql_error());
            }

            else if($firstname == "" && $lastname == "" && $password != "") {
                $query = "update users SET admin=$admin, password='$password_hashed' WHERE username='$username'";
                $result = mysqli_query($con, $query) or die(mysql_error());
            }

            else if($firstname == "") {
                $query = "update users SET admin=$admin, lastname='$lastname', password='$password_hashed' WHERE username='$username'";
                $result = mysqli_query($con, $query) or die(mysql_error());
            }

            else if($lastname == "") {
                $query = "update users SET admin=$admin, firstname='$firstname', password='$password_hashed' WHERE username='$username'";
                $result = mysqli_query($con, $query) or die(mysql_error());
            }

            else if($password == "") {
                $query = "update users SET admin=$admin, firstname='$firstname', lastname='$lastname' WHERE username='$username'";
                $result = mysqli_query($con, $query) or die(mysql_error());
            }

            else {
                $query = "update users SET admin=$admin, firstname='$firstname', lastname='$lastname', password='$password_hashed' WHERE username='$username'";
                $result = mysqli_query($con, $query) or die(mysql_error());
            }

            echo "User successfully changed!";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Modify User</title>
</head>
<body>
<div class="form">
<h1>Modify User</h1>
<p>*Username and admin rights (1 == admin or 0 == user) are required. Rest of the fields are optional.</p>
<form name="modifyusers" action="modifyusers.php" method="post">
  <input type="text" name="username" placeholder="Username" required />
  <input type="text" name="firstname" placeholder="First Name" />
  <input type="text" name="lastname" placeholder="Last Name" />
  <input type="password" name="password" placeholder="Password" />
  <input type="number" name="admin" placeholder="Input 1 for admin rights" required />
  <input type="submit" name="submit" value="Register" />
</form>
</div>
<div class='form'><a href='admin.php'>Back to Admin Page</a></div>
</body>
</html>