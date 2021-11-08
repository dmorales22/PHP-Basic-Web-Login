<?php
    require('db.php');
    if (isset($_REQUEST['username'])) { // Gets form informaton
        $username = stripslashes($_REQUEST['username']); 
        $username = mysqli_real_escape_string($con,$username);
        $firstname = stripslashes($_REQUEST['firstname']); 
        $firstname = mysqli_real_escape_string($con,$firstname);
        $lastname = stripslashes($_REQUEST['lastname']); 
        $lastname = mysqli_real_escape_string($con,$lastname);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con,$password);
        $password_hashed = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO users (username, firstname, lastname, password, admin) VALUES ('$username', '$firstname', '$lastname', '$password_hashed', 0)";
        $result = mysqli_query($con, $query); // Creates new account 
        echo "<div class='form'>Account created! Click here to <a href='login.php'>login </a></div>";
    }
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
</head>
<body>
<div class="form">
<h1>Sign Up</h1> 
<form name="registration" action="register.php" method="post"> <!--- User form -->
  <input type="text" name="username" placeholder="Username" required />
  <input type="text" name="firstname" placeholder="First Name" required />
  <input type="text" name="lastname" placeholder="Last Name" required />
  <input type="password" name="password" placeholder="Password" required />
  <input type="submit" name="submit" value="Register" />
</form>
</div>
<div class='form'><a href='mainpage.php'>Back to Main Page</a></div>
</body>
</html>