<?php //Connects to DB server
$host = '';// Change as necessary
$data = ''; // Change as necessary
$user = ''; // Change as necessary
$pass = ''; // Change as necessary
$chrs = 'utf8mb4';
$attr = "mysql:host=$host;dbname=$data;charset=$chrs";

$con = new mysqli($host, $user, $pass, $data);

if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
?>
