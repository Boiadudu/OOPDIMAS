<?php
require_once 'Matakuliah.php';
require_once 'db.php';

$matakuliah = new Matakuliah($pdo);

$id = $_GET['id'] ?? '';
$data = [
    'kode_matkul' => '',
    'nama_matkul' => '',
    'sks' => ''
];
if ($id) {
    $data = $matakuliah->getById($id);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title><?= $id ? 'Edit' : 'Tambah' ?> Mata Kuliah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <h2><?= $id ? 'Edit' : 'Tambah' ?> Mata Kuliah</h2>
    <form action="proses_matakuliah.php" method="POST">
        <input type="hidden" name="id" value="<?= $id ?>">
        <div class="mb-3">
            <label>Kode Mata Kuliah</label>
            <input type="text" name="kode_matkul" class="form-control" required value="<?= $data['kode_matkul'] ?>">
        </div>
        <div class="mb-3">
            <label>Nama Mata Kuliah</label>
            <input type="text" name="nama_matkul" class="form-control" required value="<?= $data['nama_matkul'] ?>">
        </div>
        <div class="mb-3">
            <label>SKS</label>
            <input type="number" name="sks" class="form-control" required value="<?= $data['sks'] ?>">
        </div>
        <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
        <a href="index_matakuliah.php" class="btn btn-secondary">Kembali</a>
    </form>
</body>
</html>