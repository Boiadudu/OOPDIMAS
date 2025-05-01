<?php
require_once 'Matakuliah.php';
require_once 'db.php';

$matakuliah = new Matakuliah($pdo);
$data = $matakuliah->getAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Mata Kuliah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <h2>Data Mata Kuliah</h2>
    <a href="form_matakuliah.php" class="btn btn-primary mb-2">+ Tambah Mata Kuliah</a>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Kode MK</th>
                <th>Nama MK</th>
                <th>SKS</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $row): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['kode_matkul'] ?></td>
                <td><?= $row['nama_matkul'] ?></td>
                <td><?= $row['sks'] ?></td>
                <td>
                    <a href="form_matakuliah.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="proses_matakuliah.php?hapus=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="index.php" class="btn btn-secondary">Kembali ke Mahasiswa</a>
</body>
</html>