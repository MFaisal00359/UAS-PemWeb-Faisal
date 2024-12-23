<?php
class FashionModel {
    private $conn;
    private $table = 'fashion_model';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function tambahData($nama_model, $kategori, $status, $foto, $deskripsi, $asal_negara, $ip, $browser) {
        $query = 'INSERT INTO ' . $this->table . ' 
            (nama_model, kategori, status, foto, deskripsi, asal_negara, ip, browser) 
            VALUES (:nama_model, :kategori, :status, :foto, :deskripsi, :asal_negara, :ip, :browser)';
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':nama_model', $nama_model);
        $stmt->bindParam(':kategori', $kategori);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':foto', $foto);
        $stmt->bindParam(':deskripsi', $deskripsi);
        $stmt->bindParam(':asal_negara', $asal_negara);
        $stmt->bindParam(':ip', $ip);
        $stmt->bindParam(':browser', $browser);

        return $stmt->execute();
    }

    public function getData() {
        $query = 'SELECT * FROM ' . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateData($id, $nama_model, $kategori, $status, $foto, $deskripsi, $asal_negara) {
        $query = 'UPDATE ' . $this->table . ' 
                  SET nama_model = :nama_model, kategori = :kategori, status = :status, 
                      foto = :foto, deskripsi = :deskripsi, asal_negara = :asal_negara 
                  WHERE id = :id';
        $stmt = $this->conn->prepare($query);
    
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nama_model', $nama_model);
        $stmt->bindParam(':kategori', $kategori);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':foto', $foto);
        $stmt->bindParam(':deskripsi', $deskripsi);
        $stmt->bindParam(':asal_negara', $asal_negara);
    
        return $stmt->execute();
    }
    
    public function deleteData($id) {
        $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
    
    public function getDataById($id) {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE id = :id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
}
?>
