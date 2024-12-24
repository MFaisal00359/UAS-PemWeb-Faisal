# Project README

**Nama**: Muhammad Faisal Safira  
**NIM**: 121140139  

---

## Struktur Folder
```
project/
├── config/
│   └── database.php
├── controllers/
│   └── FashionController.php
├── models/
│   └── FashionModel.php
├── migrations/
│   └── migrate.php
├── public/
│   ├── index.php
│   ├── assets/
│   │   ├── script.js
│   │   └── style.css
├── views/
│   ├── tambah.php
│   ├── edit.php
│   ├── index.php
├── init.php
└── README.md
```

---

## Cara Instalasi
1. **Clone Repository**:
   ```bash
   git clone https://github.com/username/project.git
   ```
2. **Pindahkan folder proyek** ke folder server lokal:
   - XAMPP: `C:\xampp\htdocs\project`
   - WAMP: `C:\wamp\www\project`
   - Laragon: `C:\laragon\www\project`

3. **Migrasi Database**:
   Jalankan file migrasi untuk membuat database dan tabel:
   ```bash
   php migrations/migrate.php
   ```

4. **Akses aplikasi** melalui browser:
   ```
   http://localhost/project/public
   ```

---

## Bagian 1: Client-side Programming

### Manipulasi DOM dengan JavaScript
**File Path**: `public/assets/script.js`

**Contoh Kode:**
```javascript
document.addEventListener("DOMContentLoaded", () => {
    const formTambah = document.getElementById("formTambah");

    if (formTambah) {
        formTambah.addEventListener("submit", (e) => {
            e.preventDefault();

            // Validasi input
            const namaModel = document.getElementById("nama_model").value.trim();
            const kategori = document.getElementById("kategori").value;
            const status = document.querySelector('input[name="status"]:checked');
            const foto = document.getElementById("foto").value.trim();
            const deskripsi = document.getElementById("deskripsi").value.trim();
            const asalNegara = document.getElementById("asal_negara").value.trim();

            if (namaModel === "") {
                alert("Nama model wajib diisi!");
                return;
            }
            if (!status) {
                alert("Status wajib dipilih!");
                return;
            }
            if (foto === "" || !foto.startsWith("http")) {
                alert("Masukkan URL foto yang valid!");
                return;
            }
            if (deskripsi === "") {
                alert("Deskripsi wajib diisi!");
                return;
            }
            if (asalNegara === "") {
                alert("Asal negara wajib diisi!");
                return;
            }

            // Submit form jika validasi berhasil
            alert("Data berhasil divalidasi!");
            formTambah.submit();
        });
    }
});
```

---

### Event Handling
**File Path**: `public/assets/script.js`

**Contoh Kode:**
```javascript
// Event untuk kategori dropdown
document.getElementById("kategori").addEventListener("change", (e) => {
    console.log(`Kategori dipilih: ${e.target.value}`);
});

// Event untuk radio button status
const statusRadios = document.querySelectorAll("input[name='status']");
statusRadios.forEach((radio) => {
    radio.addEventListener("click", () => {
        console.log(`Status dipilih: ${radio.value}`);
    });
});
```

---

## Bagian 2: Server-side Programming

### Pengelolaan Data dengan PHP
**File Path**: `controllers/FashionController.php`

**Contoh Kode:**
```php
public function prosesTambahData($data) {
    if (empty($data['nama_model']) || empty($data['kategori']) || empty($data['status']) ||
        empty($data['foto']) || empty($data['deskripsi']) || empty($data['asal_negara'])) {
        $_SESSION['error'] = 'Semua kolom harus diisi!';
        header('Location: index.php?page=tambah');
        return;
    }

    $ip = $_SERVER['REMOTE_ADDR'];
    $browser = $_SERVER['HTTP_USER_AGENT'];

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
```

---

### Objek PHP Berbasis OOP
**File Path**: `models/FashionModel.php`

**Contoh Kode:**
```php
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
}
```

---

## Bagian 3: Database Management

### Pembuatan Tabel Database
**File Path**: `migrations/migrate.php`

**Contoh Kode:**
```php
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
```

---

## Bagian 4: State Management

### State Management dengan Session
**File Path**: `controllers/FashionController.php`

**Contoh Kode:**
```php
session_start();
$_SESSION['success'] = 'Data berhasil disimpan!'; // Simpan pesan sukses
if (isset($_SESSION['success'])) {
    echo $_SESSION['success']; // Tampilkan pesan
    unset($_SESSION['success']); // Hapus session setelah digunakan
}
```

---

### Pengelolaan Cookie
**File Path**: `controllers/FashionController.php`

**Contoh Kode:**
```php
// Set cookie
setcookie("user_visit", "last_visit", time() + 3600, "/");

// Ambil cookie
if (isset($_COOKIE['user_visit'])) {
    echo "Cookie found: " . $_COOKIE['user_visit'];
}

// Hapus cookie
setcookie("user_visit", "", time() - 3600, "/");
```

