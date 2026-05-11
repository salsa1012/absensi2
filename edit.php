<?php
require_once 'config/koneksi.php';

$id = $_GET['id'];

// Ambil data lama
$data = $conn->query("SELECT * FROM db_absensi2 WHERE id='$id'")
             ->fetch_assoc();

if (isset($_POST['update'])) {

$nama=$_POST['nama_siswa'];
$kelas=$_POST['kelas'];
$ket=$_POST['keterangan'];
$tgl=$_POST['tanggal'];

$query="UPDATE db_absensi2 SET
              nama_siswa='$nama',
              kelas='$kelas',
              keterangan='$ket',
              tanggal='$tgl'
              WHERE id='$id'";

if ($conn->query($query)) {
header("Location: index.php");
    }else {
echo "Gagal update";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
<title>Edit Data</title>

<style>
table {
border-collapse: collapse;
width: 50%;
}

table, th, td {
border: 1px solid black;
padding: 8px;
}

th {
background-color: #eee;
}
</style>

</head>

<body>

<h2>Edit Data</h2>

<form method="POST">

<table>

<tr>
<td>Nama Siswa</td>
<td>
<input type="text" name="nama_siswa"
value="<?=$data['nama_siswa'];?>">
</td>
</tr>

<tr>
<td>Kelas</td>
<td>
<input type="text" name="kelas"
value="<?=$data['kelas'];?>">
</td>
</tr>

<tr>
<td>Keterangan</td>
<td>
<select name="keterangan">

<option <?=$data['keterangan']=='Hadir'?'selected':'';?>>
Hadir
</option>

<option <?=$data['keterangan']=='Izin'?'selected':'';?>>
Izin
</option>

<option <?=$data['keterangan']=='Sakit'?'selected':'';?>>
Sakit
</option>

</select>
</td>
</tr>

<tr>
<td>Tanggal</td>
<td>
<input type="date" name="tanggal"
value="<?=$data['tanggal'];?>">
</td>
</tr>

<tr>
<td colspan="2" align="center">
<button name="update">Update</button>
</td>
</tr>

</table>

</form>

</body>
</html>