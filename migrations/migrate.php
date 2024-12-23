<?php
try {
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $db_name = 'fashion_model_db';

    $pdo = new PDO("mysql:host=$host", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Buat database jika belum ada
    $pdo->exec("CREATE DATABASE IF NOT EXISTS $db_name");
    echo "Database '$db_name' berhasil dibuat atau sudah ada.\n";

    // Pilih database
    $pdo->exec("USE $db_name");

    // Buat tabel `fashion` atau perbarui tabel yang sudah ada
    $query = "
        CREATE TABLE IF NOT EXISTS fashion_model (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nama_model VARCHAR(100) NOT NULL,
            kategori VARCHAR(50) NOT NULL,
            status VARCHAR(20) NOT NULL,
            foto VARCHAR(255),
            deskripsi TEXT,
            asal_negara VARCHAR(100),
            ip VARCHAR(50) NOT NULL,
            browser VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        );
    ";
    $pdo->exec($query);
    echo "Tabel 'fashion_model' berhasil dibuat atau sudah ada.\n";

} catch (PDOException $e) {
    die("Gagal melakukan migrasi database: " . $e->getMessage());
}
?>
