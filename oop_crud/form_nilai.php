<?php
require_once 'Nilai.php';
require_once 'Mahasiswa.php';
require_once 'Matakuliah.php';
require_once 'db.php';

$nilai = new Nilai($pdo);
$mahasiswa = new Mahasiswa($pdo);
$matakuliah = new Matakuliah($pdo);

$id = $_GET['id'] ?? '';
$data = [
    'mahasiswa_id' => '',
    'matakuliah_id' => '',
    'nilai' => ''
];
if ($id) {
    $data = $nilai->getById($id);
}

$mahasiswaList = $mahasiswa->getAll();
$matakuliahList = $matakuliah->getAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title><?= $id ? 'Edit' : 'Tambah' ?> Nilai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <h2><?= $id ? 'Edit' : 'Tambah' ?> Nilai</h2>
    <form action="proses_nilai.php" method="POST">
        <input type="hidden" name="id" value="<?= $id ?>">
        <div class="mb-3">
            <label>Mahasiswa</label>
            <select name="mahasiswa_id" class="form-control" required>
                <option value="">Pilih Mahasiswa</option>
                <?php foreach ($mahasiswaList as $mhs): ?>
                <option value="<?= $mhs['id'] ?>" <?= ($data['mahasiswa_id'] == $mhs['id']) ? 'selected' : '' ?>>
                    <?= $mhs['nama'] ?>
                </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label>Mata Kuliah</label>
            <select name="matakuliah_id" class="form-control" required>
                <option value="">Pilih Mata Kuliah</option>
                <?php foreach ($matakuliahList as $mk): ?>
                <option value="<?= $mk['id'] ?>" <?= ($data['matakuliah_id'] == $mk['id']) ? 'selected' : '' ?>>
                    <?= $mk['nama_matkul'] ?>
                </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label>Nilai</label>
            <input type="number" step="0.01" name="nilai" class="form-control" required value="<?= $data['nilai'] ?>">
        </div>
        <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
        <a href="index_nilai.php" class="btn btn-secondary">Kembali</a>
    </form>
</body>
</html>