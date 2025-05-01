<?php
require_once 'Mahasiswa.php';
require_once 'db.php';

$mahasiswa = new Mahasiswa($pdo);

$id = $_GET['id'] ?? '';
$data = [
    'nama' => '',
    'nim' => '',
    'jurusan_id' => ''
];
if ($id) {
    $data = $mahasiswa->getById($id);
}

$jurusanList = $mahasiswa->getJurusanList();
?>

<!DOCTYPE html>
<html>
<head>
    <title><?= $id ? 'Edit' : 'Tambah' ?> Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <h2><?= $id ? 'Edit' : 'Tambah' ?> Mahasiswa</h2>
    <form action="proses.php" method="POST">
        <input type="hidden" name="id" value="<?= $id ?>">
        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" required 
                   value="<?= htmlspecialchars($data['nama']) ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">NIM</label>
            <input type="text" name="nim" class="form-control" required 
                   value="<?= htmlspecialchars($data['nim']) ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Jurusan</label>
            <select name="jurusan_id" class="form-select">
                <option value="">Pilih Jurusan</option>
                <?php foreach ($jurusanList as $jurusan): ?>
                <option value="<?= $jurusan['id'] ?>" 
                    <?= ($data['jurusan_id'] == $jurusan['id']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($jurusan['nama_jurusan']) ?>
                </option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
</body>
</html>