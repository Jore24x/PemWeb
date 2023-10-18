<?php
$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "uts";

$conn = mysqli_connect($serverName,$userName,$password,$dbName);

if(!$conn){
    die("Koneksi gagal");
}
?>


