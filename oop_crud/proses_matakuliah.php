<?php
require_once 'Matakuliah.php';
require_once 'db.php';

$matakuliah = new Matakuliah($pdo);

// Simpan atau Update
if (isset($_POST['simpan'])) {
    $id = $_POST['id'];
    $kode_matkul = $_POST['kode_matkul'];
    $nama_matkul = $_POST['nama_matkul'];
    $sks = $_POST['sks'];
    
    if ($id) {
        $matakuliah->update($id, $kode_matkul, $nama_matkul, $sks);
    } else {
        $matakuliah->insert($kode_matkul, $nama_matkul, $sks);
    }
    header("Location: index_matakuliah.php");
    exit;
}

// Hapus
if (isset($_GET['hapus'])) {
    $matakuliah->delete($_GET['hapus']);
    header("Location: index_matakuliah.php");
    exit;
}
?>