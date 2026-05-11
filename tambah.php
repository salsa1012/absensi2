<?php
require_once 'config/koneksi.php';

if (isset($_POST['simpan'])) {
    $nama  = $_POST['nama_siswa'];
    $kelas = $_POST['kelas'];
    $ket   = $_POST['keterangan'];
    $tgl   = $_POST['tanggal'];

    $query = "INSERT INTO tb_absensi (nama_siswa, kelas, keterangan, tanggal)
              VALUES ('$nama', '$kelas', '$ket', '$tgl')";

    if ($conn->query($query)) {
        header("Location: index.php");
    } else {
        echo "Gagal: " . $conn->error;
    }
}
?>

<h2>Tambah Data Absensi</h2>

<form method="POST">
    <table border="1" cellpadding="8">
        <tr>
            <td>Nama Siswa</td>
            <td>
                <input type="text" name="nama_siswa" required>
            </td>
        </tr>

        <tr>
            <td>Kelas</td>
            <td>
                <input type="text" name="kelas" required>
            </td>
        </tr>

        <tr>
            <td>Keterangan</td>
            <td>
                <select name="keterangan">
                    <option value="Hadir">Hadir</option>
                    <option value="Izin">Izin</option>
                    <option value="Sakit">Sakit</option>
                </select>
            </td>
        </tr>

        <tr>
            <td>Tanggal</td>
            <td>
                <input type="date" name="tanggal" required>
            </td>
        </tr>

        <tr>
            <td colspan="2" align="center">
                <button type="submit" name="simpan">Simpan</button>
            </td>
        </tr>
    </table>
</form>
