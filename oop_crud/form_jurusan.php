<?php
require_once 'Jurusan.php';
require_once 'db.php';

$jurusan = new Jurusan($pdo);

$id = $_GET['id'] ?? '';
$data = [
    'kode_jurusan' => '',
    'nama_jurusan' => ''
];
if ($id) {
    $data = $jurusan->getById($id);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title><?= $id ? 'Edit' : 'Tambah' ?> Jurusan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <h2><?= $id ? 'Edit' : 'Tambah' ?> Jurusan</h2>
    <form action="proses_jurusan.php" method="POST">
        <input type="hidden" name="id" value="<?= $id ?>">
        <div class="mb-3">
            <label class="form-label">Kode Jurusan</label>
            <input type="text" name="kode_jurusan" class="form-control" required 
                   value="<?= htmlspecialchars($data['kode_jurusan']) ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Nama Jurusan</label>
            <input type="text" name="nama_jurusan" class="form-control" required 
                   value="<?= htmlspecialchars($data['nama_jurusan']) ?>">
        </div>
        <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
        <a href="index_jurusan.php" class="btn btn-secondary">Kembali</a>
    </form>
</body>
</html>