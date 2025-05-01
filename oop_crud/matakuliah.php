<?php
require_once 'db.php';

class Matakuliah {
    private $db;

    public function __construct($pdo) {
        $this->db = $pdo;
    }

    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM matakuliah");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM matakuliah WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($kode_matkul, $nama_matkul, $sks) {
        $stmt = $this->db->prepare("INSERT INTO matakuliah (kode_matkul, nama_matkul, sks) VALUES (?, ?, ?)");
        return $stmt->execute([$kode_matkul, $nama_matkul, $sks]);
    }

    public function update($id, $kode_matkul, $nama_matkul, $sks) {
        $stmt = $this->db->prepare("UPDATE matakuliah SET kode_matkul = ?, nama_matkul = ?, sks = ? WHERE id = ?");
        return $stmt->execute([$kode_matkul, $nama_matkul, $sks, $id]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM matakuliah WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>