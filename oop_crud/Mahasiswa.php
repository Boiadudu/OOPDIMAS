<?php
require_once 'db.php';

class Mahasiswa {
    private $db;

    public function __construct($pdo) {
        $this->db = $pdo;
    }

    public function getAll() {
        $stmt = $this->db->query("
            SELECT m.*, j.nama_jurusan 
            FROM mahasiswa m
            LEFT JOIN jurusan j ON m.jurusan_id = j.id
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("
            SELECT m.*, j.nama_jurusan 
            FROM mahasiswa m
            LEFT JOIN jurusan j ON m.jurusan_id = j.id
            WHERE m.id = ?
        ");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($nama, $nim, $jurusan_id) {
        $stmt = $this->db->prepare("
            INSERT INTO mahasiswa (nama, nim, jurusan_id) 
            VALUES (?, ?, ?)
        ");
        return $stmt->execute([$nama, $nim, $jurusan_id]);
    }

    public function update($id, $nama, $nim, $jurusan_id) {
        $stmt = $this->db->prepare("
            UPDATE mahasiswa 
            SET nama = ?, nim = ?, jurusan_id = ? 
            WHERE id = ?
        ");
        return $stmt->execute([$nama, $nim, $jurusan_id, $id]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM mahasiswa WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function getJurusanList() {
        $stmt = $this->db->query("SELECT id, nama_jurusan FROM jurusan");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>