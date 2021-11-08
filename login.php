<?php
    require('db.php');
    session_start();
    if (isset($_POST['username'])){ //Gets form
        $username = stripslashes($_REQUEST['username']); // Removes any backslashes
        $username = mysqli_real_escape_string($con,$username); 
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con,$password);
        $query = "SELECT * FROM users WHERE username='$username'"; // Creates query string
        $result = mysqli_query($con,$query) or die(mysql_error()); // Queries database 
        $rows = mysqli_num_rows($result);
        $row = $result->fetch_assoc();

        if($rows==1){
            if (password_verify($password , $row["password"])) {
                $_SESSION['username'] = $username; // Creates user session
                $update = "update users SET lastLogin=current_timestamp() WHERE username='$username'"; //Updates login time
                $update_result = mysqli_query($con, $update) or die(mysql_error());
                if($row['admin'] == 1) { // Checks for admin bit
                    $_SESSION['admin'] = $username; // Creates admin session
                    header("Location: admin.php"); // Redirects to admin page
                }
                else {
                    header("Location: user.php"); //
                }
            }
            else {
                echo "Wrong password/username";
            }
        }
        else {
            echo "Wrong password/username";
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
<title>Login</title>
</head>
<body>
<div class="form">
<h1>Log In</h1>
<form action="login.php" method="post" name="login">
  <input type="text" name="username" placeholder="Username" required />
  <input type="password" name="password" placeholder="Password" required />
  <input name="submit" type="submit" value="Login" />
</form>
<p>Not registered yet? <a href='register.php'>Register Here</a></p>
</div>
<div class='form'><a href='mainpage.php'>Back to Main Page</a></div>
</body>
</html>