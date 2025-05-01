<?php
require_once 'Jurusan.php';
require_once 'db.php';

$jurusan = new Jurusan($pdo);
$data = $jurusan->getAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Jurusan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <h2>Data Jurusan</h2>
    <a href="form_jurusan.php" class="btn btn-primary mb-2">+ Tambah Jurusan</a>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Kode Jurusan</th>
                <th>Nama Jurusan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $row): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= htmlspecialchars($row['kode_jurusan']) ?></td>
                <td><?= htmlspecialchars($row['nama_jurusan']) ?></td>
                <td>
                    <a href="form_jurusan.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="proses_jurusan.php?hapus=<?= $row['id'] ?>" 
                       class="btn btn-danger btn-sm" 
                       onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="index.php" class="btn btn-secondary">Kembali ke Mahasiswa</a>
</body>
</html>