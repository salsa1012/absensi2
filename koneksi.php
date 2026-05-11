<?php
// Membuat koneksi
$conn=new mysqli("localhost", "root", "", "db_absensi_pplg2");

// Cek koneksi
if ($conn->connect_error) {
die("Koneksi gagal: ". $conn->connect_error);
}

// Set charset
$conn->set_charset("utf8");