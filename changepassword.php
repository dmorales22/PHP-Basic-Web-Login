<?php 
    require('db.php');
    session_start();
    if (!isset($_SESSION['username'])) {
        echo "<div class='form'>This page is restricted! Click here to <a href='login.php'>Login</a></div>";
        exit();
    }

    if (isset($_POST['new_password'])){ 
        $username = $_SESSION['username'];
        $old_password = stripslashes($_REQUEST['old_password']);
        $old_password = mysqli_real_escape_string($con,$old_password);
        $new_password = stripslashes($_REQUEST['new_password']);
        $new_password = mysqli_real_escape_string($con,$new_password);
        $new_password_hashed = password_hash($new_password, PASSWORD_DEFAULT);
        $query = "SELECT * FROM users WHERE username='$username'"; // Gets user
        $result = mysqli_query($con,$query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        $row = $result->fetch_assoc();

        if($rows==1){
            if (password_verify($old_password , $row["password"])) { // Checks old password is valid
                $_SESSION['username'] = $username;
                $update = "update users SET password='$new_password_hashed' WHERE username='$username'"; // Constructs query to update password field 
                $update_result = mysqli_query($con, $update) or die(mysql_error()); // Runs update command
                echo "Password changed!";
            }
            else {
                echo "Wrong password! Try again.";
            }
        }
        else {
            echo "Error. Username not found.";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Change Password</title>
</head>
<body>
<div class="form">
<h1>Reset Password</h1>
<form name="resetpassword" action="changepassword.php" method="post">
  <input type="password" name="old_password" placeholder="Old Password" required />
  <input type="password" name="new_password" placeholder="New Password" required />
  <input type="submit" name="submit" value="Register" />
</form>
</div>
<div class='form'><a href='user.php'>Back to User Page</a></div>
</body>
</html>