<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'db_kasir';

$dbconnect = new mysqli("$host", "$user", "$pass", "$db");

if ($dbconnect-> connect_error) {
    echo 'Koneksi gagal -> ' . $dbconnect->connect_error;
}
?>
