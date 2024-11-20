<?php
$connect = mysqli_connect("localhost", "root", "", "hospital"); // Adjust parameters as needed

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
