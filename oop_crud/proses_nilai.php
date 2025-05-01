<?php
require_once 'Nilai.php';
require_once 'db.php';

$nilai = new Nilai($pdo);

// Simpan atau Update
if (isset($_POST['simpan'])) {
    $id = $_POST['id'];
    $mahasiswa_id = $_POST['mahasiswa_id'];
    $matakuliah_id = $_POST['matakuliah_id'];
    $nilai_value = $_POST['nilai'];
    
    if ($id) {
        $nilai->update($id, $mahasiswa_id, $matakuliah_id, $nilai_value);
    } else {
        $nilai->insert($mahasiswa_id, $matakuliah_id, $nilai_value);
    }
    header("Location: index_nilai.php");
    exit;
}

// Hapus
if (isset($_GET['hapus'])) {
    $nilai->delete($_GET['hapus']);
    header("Location: index_nilai.php");
    exit;
}
?>