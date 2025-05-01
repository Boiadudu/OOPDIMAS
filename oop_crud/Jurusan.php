<?php
require_once 'db.php';

class Jurusan {
    private $db;

    public function __construct($pdo) {
        $this->db = $pdo;
    }

    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM jurusan");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM jurusan WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($kode_jurusan, $nama_jurusan) {
        $stmt = $this->db->prepare("
            INSERT INTO jurusan (kode_jurusan, nama_jurusan) 
            VALUES (?, ?)
        ");
        return $stmt->execute([$kode_jurusan, $nama_jurusan]);
    }

    public function update($id, $kode_jurusan, $nama_jurusan) {
        $stmt = $this->db->prepare("
            UPDATE jurusan 
            SET kode_jurusan = ?, nama_jurusan = ? 
            WHERE id = ?
        ");
        return $stmt->execute([$kode_jurusan, $nama_jurusan, $id]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM jurusan WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>