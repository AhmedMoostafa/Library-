<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library";

$connect = @ mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: ");

