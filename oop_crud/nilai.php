<?php
require_once 'db.php';

class Nilai {
    private $db;

    public function __construct($pdo) {
        $this->db = $pdo;
    }

    public function getAllWithDetails() {
        $stmt = $this->db->query("
            SELECT n.id, m.nama as mahasiswa_nama, mk.nama_matkul, n.nilai 
            FROM nilai n
            JOIN mahasiswa m ON n.mahasiswa_id = m.id
            JOIN matakuliah mk ON n.matakuliah_id = mk.id
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("
            SELECT * FROM nilai 
            WHERE id = ?
        ");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($mahasiswa_id, $matakuliah_id, $nilai) {
        $stmt = $this->db->prepare("INSERT INTO nilai (mahasiswa_id, matakuliah_id, nilai) VALUES (?, ?, ?)");
        return $stmt->execute([$mahasiswa_id, $matakuliah_id, $nilai]);
    }

    public function update($id, $mahasiswa_id, $matakuliah_id, $nilai) {
        $stmt = $this->db->prepare("UPDATE nilai SET mahasiswa_id = ?, matakuliah_id = ?, nilai = ? WHERE id = ?");
        return $stmt->execute([$mahasiswa_id, $matakuliah_id, $nilai, $id]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM nilai WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function getMahasiswaList() {
        $stmt = $this->db->query("SELECT id, nama FROM mahasiswa");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getMatakuliahList() {
        $stmt = $this->db->query("SELECT id, nama_matkul FROM matakuliah");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>