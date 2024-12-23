<?php
session_start();
require_once '../config/database.php';
require_once '../models/FashionModel.php';

class FashionController {
    private $model;

    public function __construct() {
        // Koneksi database dan inisialisasi model
        $db = (new Database())->connect();
        $this->model = new FashionModel($db);
    }

    // Menampilkan semua data
    public function tampilkanData() {
        return $this->model->getData();
    }

    // Menampilkan data berdasarkan ID
    public function tampilkanDataById($id) {
        return $this->model->getDataById($id);
    }

    // Memproses tambah data
    public function prosesTambahData($data) {
        if (empty($data['nama_model']) || empty($data['kategori']) || empty($data['status']) ||
            empty($data['foto']) || empty($data['deskripsi']) || empty($data['asal_negara'])) {
            $_SESSION['error'] = 'Semua kolom harus diisi!';
            header('Location: index.php?page=tambah');
            return;
        }

        $ip = $_SERVER['REMOTE_ADDR']; // Ambil IP pengguna
        $browser = $_SERVER['HTTP_USER_AGENT']; // Ambil informasi browser

        $success = $this->model->tambahData(
            htmlspecialchars($data['nama_model']),
            htmlspecialchars($data['kategori']),
            htmlspecialchars($data['status']),
            htmlspecialchars($data['foto']),
            htmlspecialchars($data['deskripsi']),
            htmlspecialchars($data['asal_negara']),
            $ip,
            $browser
        );

        if ($success) {
            $_SESSION['success'] = 'Data berhasil disimpan!';
            header('Location: index.php?page=index');
        } else {
            $_SESSION['error'] = 'Gagal menyimpan data.';
            header('Location: index.php?page=tambah');
        }
    }

    // Memproses update data
    public function prosesUpdateData($id, $data) {
        if (empty($data['nama_model']) || empty($data['kategori']) || empty($data['status']) ||
            empty($data['foto']) || empty($data['deskripsi']) || empty($data['asal_negara'])) {
            $_SESSION['error'] = 'Semua kolom harus diisi!';
            header('Location: index.php?page=edit&id=' . $id);
            return;
        }

        $success = $this->model->updateData(
            $id,
            htmlspecialchars($data['nama_model']),
            htmlspecialchars($data['kategori']),
            htmlspecialchars($data['status']),
            htmlspecialchars($data['foto']),
            htmlspecialchars($data['deskripsi']),
            htmlspecialchars($data['asal_negara'])
        );

        if ($success) {
            $_SESSION['success'] = 'Data berhasil diperbarui!';
            header('Location: index.php?page=index');
        } else {
            $_SESSION['error'] = 'Gagal memperbarui data.';
            header('Location: index.php?page=edit&id=' . $id);
        }
    }

    // Memproses hapus data
    public function prosesHapusData($id) {
        $success = $this->model->deleteData($id);

        if ($success) {
            $_SESSION['success'] = 'Data berhasil dihapus!';
            header('Location: index.php?page=index');
        } else {
            $_SESSION['error'] = 'Gagal menghapus data.';
            header('Location: index.php?page=index');
        }
    }
}
?>
