<?php
$conn = new mysqli('localhost:3306','root','','cook');
if ($conn->connect_error) {
    die("Koneksi Gagal: " . $conn->connect_error);
}
$setting = $conn->query("SELECT * FROM setting");
$set = $setting->fetch_object();
?>