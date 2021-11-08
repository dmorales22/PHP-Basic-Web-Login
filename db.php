<?php //Connects to UTEP's DB server
$host = 'cssrvlab01.utep.edu';// Change as necessary
$data = 'dmorales22_f21_db'; // Change as necessary
$user = 'dmorales22'; // Change as necessary
$pass = '*utep2021!'; // Change as necessary
$chrs = 'utf8mb4';
$attr = "mysql:host=$host;dbname=$data;charset=$chrs";

$con = new mysqli($host, $user, $pass, $data);

if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
?>