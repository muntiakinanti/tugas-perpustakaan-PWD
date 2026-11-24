<?php
require_once "koneksi.php";

$hasil = mysqli_query($koneksi, "SELECT * FROM anggota ORDER BY id DESC");

if (!$hasil) {
    die("Query gagal: " . htmlspecialchars(mysqli_error($koneksi)));
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Data Anggota Perpustakaan</title>
<style>
    body { font-family: Arial, sans-serif; margin: 40px; }
    h1 { color: #1f3864; }
    table { border-collapse: collapse; }
    th, td { border: 1px solid #808080; padding: 6px 12px; text-align: left; }
    th { background: #d9e2f3; }
</style>
</head>
<body>
<h1>Data Anggota Perpustakaan</h1>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nomor Anggota</th>
            <th>Nama Lengkap</th>
            <th>Email</th>
            <th>Nomor HP</th>
            <th>Jenis Anggota</th>
            <th>Alamat</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php while ($row = mysqli_fetch_assoc($hasil)) { ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= htmlspecialchars($row['no_anggota']); ?></td>
            <td><?= htmlspecialchars($row['nama_lengkap']); ?></td>
            <td><?= htmlspecialchars($row['email']); ?></td>
            <td><?= htmlspecialchars($row['no_hp']); ?></td>
            <td><?= htmlspecialchars($row['jenis_anggota']); ?></td>
            <td><?= htmlspecialchars($row['alamat']); ?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<p><a href="form_anggota.php">Kembali ke form pendaftaran</a></p>
</body>
</html>