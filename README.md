# Project README

**Nama**: Muhammad Faisal Safira  
**NIM**: 121140139  

---

## Cara Instalasi
1. **Clone Repository**:
   ```bash
   git clone https://github.com/username/project.git
   ```
2. **Pindahkan folder proyek** ke folder server lokal:
   - XAMPP: `C:\xampp\htdocs\project`

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
Contoh kode berikut menunjukkan bagaimana sebuah form dengan elemen input (teks, checkbox, radio, dll.) dimanipulasi dengan JavaScript untuk memvalidasi data dan menampilkan data dari server dalam tabel HTML.

#### Contoh Kode:
```html
<!-- Form untuk input data -->
<form id="formTambah">
    <label>Nama Model: <input type="text" id="nama_model" required></label><br>
    <label>Kategori:
        <select id="kategori">
            <option value="Casual">Casual</option>
            <option value="Formal">Formal</option>
        </select>
    </label><br>
    <label>Status:
        <input type="radio" name="status" value="Aktif" checked> Aktif
        <input type="radio" name="status" value="Nonaktif"> Nonaktif
    </label><br>
    <label>Hobi:
        <input type="checkbox" id="hobi1" value="Menyanyi"> Menyanyi
        <input type="checkbox" id="hobi2" value="Menari"> Menari
    </label><br>
    <button type="submit">Simpan</button>
</form>

<!-- Tabel untuk menampilkan data -->
<table id="dataTable" border="1">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Kategori</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody></tbody>
</table>
```

#### JavaScript:
```javascript
// Manipulasi DOM dan Validasi Form
const form = document.getElementById("formTambah");
const dataTable = document.getElementById("dataTable").querySelector("tbody");

form.addEventListener("submit", (e) => {
    e.preventDefault();

    // Validasi input
    const namaModel = document.getElementById("nama_model").value;
    const kategori = document.getElementById("kategori").value;
    const status = document.querySelector('input[name="status"]:checked').value;

    if (!namaModel) {
        alert("Nama model harus diisi!");
        return;
    }

    // Tambahkan data ke tabel
    const row = document.createElement("tr");
    row.innerHTML = `<td>${namaModel}</td><td>${kategori}</td><td>${status}</td>`;
    dataTable.appendChild(row);

    alert("Data berhasil ditambahkan!");
    form.reset();
});
```

---

### Event Handling
Tiga event yang diimplementasikan:
1. **Submit**: Validasi input sblum form disubmit.
2. **Change**: Menampilkan pesan ketika kategori berubah.
3. **Click**: Menampilkan checkbox yang dipilih.

#### Contoh Kode Event:
```javascript
// Event untuk menampilkan kategori yang dipilih
document.getElementById("kategori").addEventListener("change", (e) => {
    console.log("Kategori dipilih: " + e.target.value);
});

// Event untuk checkbox
const checkboxes = document.querySelectorAll("input[type='checkbox']");
checkboxes.forEach((checkbox) => {
    checkbox.addEventListener("click", () => {
        console.log("Checkbox dipilih: " + checkbox.value);
    });
});
```

---

## Bagian 2: Server-side Programming

### Pengelolaan Data dengan PHP
Form data dikirim dengan metode **POST** dan divalidasi di server sebelum disimpan ke database.

#### Contoh Kode:
```php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_model = htmlspecialchars($_POST['nama_model']);
    $kategori = htmlspecialchars($_POST['kategori']);
    $status = htmlspecialchars($_POST['status']);
    $ip = $_SERVER['REMOTE_ADDR'];
    $browser = $_SERVER['HTTP_USER_AGENT'];

    if (empty($nama_model) || empty($kategori) || empty($status)) {
        die("Semua kolom harus diisi!");
    }

    // Simpan ke database
    $query = "INSERT INTO fashion (nama_model, kategori, status, ip, browser) VALUES (?,?,?,?,?)";
    $stmt = $db->prepare($query);
    $stmt->execute([$nama_model, $kategori, $status, $ip, $browser]);

    echo "Data berhasil disimpan.";
}
```

---

### Objek PHP Berbasis OOP
Objek dgn dua metode untuk menyimpan dan mengambil data.

#### Contoh Kode:
```php
class FashionModel {
    private $conn;
    private $table = 'fashion_model';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function tambahData($nama_model, $kategori, $status, $ip, $browser) {
        $query = 'INSERT INTO ' . $this->table . ' (nama_model, kategori, status, ip, browser) VALUES (?, ?, ?, ?, ?)';
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$nama_model, $kategori, $status, $ip, $browser]);
    }

    public function getData() {
        $query = 'SELECT * FROM ' . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
```

---

## Bagian 3: Database Management

### Pembuatan Tabel Database
#### Contoh SQL:
```sql
CREATE TABLE fashion (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_model VARCHAR(100) NOT NULL,
    kategori VARCHAR(50) NOT NULL,
    status VARCHAR(20) NOT NULL,
    ip VARCHAR(50) NOT NULL,
    browser VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

### Koneksi Database
#### Contoh Kode:
```php
class Database {
    private $host = 'localhost';
    private $db_name = 'fashion_model_db';
    private $username = 'root';
    private $password = '';
    public $conn;

    public function connect() {
        $this->conn = null;
        try {
            $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Koneksi Gagal: ' . $e->getMessage();
        }
        return $this->conn;
    }
}
```

---

## Bagian 4: State Management

### State Management dengan Session
#### Contoh Kode:
```php
session_start();
$_SESSION['user'] = 'Muhammad Faisal';
$_SESSION['role'] = 'Admin';

// Ambil informasi dari session
echo 'User: ' . $_SESSION['user'];
```

---

### Pengelolaan Cookie dan Browser Storage
#### Contoh Kode:
```php
// Set cookie
setcookie("username", "faisal", time() + 3600, "/"); // 1 jam

// Ambil cookie
if (isset($_COOKIE['username'])) {
    echo "Welcome, " . $_COOKIE['username'];
}

// Hapus cookie
setcookie("username", "", time() - 3600, "/");
```

#### Browser Storage (JavaScript):
```javascript
// Set data ke localStorage
localStorage.setItem("user", "Muhammad Faisal");

// Ambil data dari localStorage
console.log(localStorage.getItem("user"));

// Hapus data dari localStorage
localStorage.removeItem("user");
```

