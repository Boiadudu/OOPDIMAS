<?php
require_once 'Mahasiswa.php';
require_once 'db.php';

$mahasiswa = new Mahasiswa($pdo);

// Simpan atau Update
if (isset($_POST['simpan'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $jurusan_id = !empty($_POST['jurusan_id']) ? $_POST['jurusan_id'] : null;
    
    if ($id) {
        $mahasiswa->update($id, $nama, $nim, $jurusan_id);
    } else {
        $mahasiswa->insert($nama, $nim, $jurusan_id);
    }
    header("Location: index.php");
    exit;
}

// Hapus
if (isset($_GET['hapus'])) {
    $mahasiswa->delete($_GET['hapus']);
    header("Location: index.php");
    exit;
}
?>