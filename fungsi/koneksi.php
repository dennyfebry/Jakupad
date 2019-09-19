<?php
// $server 	= "127.0.0.1";
// $username 	= "root";
// $password 	= "";
// $database 	= "floyd";

$server = "localhost";
$username = "dene4871_denny";
$password = "inwardco24";
$database = "dene4871_zaman";

$connect = new mysqli($server, $username, $password, $database);

// cek koneksi yang kita lakukan berhasil atau tidak
if ($connect->connect_error) {
	// jika terjadi error, matikan proses dengan die() atau exit();
	die('Maaf koneksi gagal: ' . $connect->connect_error);
}
