<?php
// File: tambah.php
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Model Fashion</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f5f5f5;
            line-height: 1.6;
            color: #333;
        }

        .alert {
            padding: 1rem;
            margin: 1rem auto;
            border-radius: 8px;
            max-width: 600px;
            text-align: center;
            animation: fadeOut 5s forwards;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        @keyframes fadeOut {
            0% { opacity: 1; }
            70% { opacity: 1; }
            100% { opacity: 0; }
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 2rem;
        }

        h1 {
            color: #333;
            text-align: center;
            margin: 2rem 0;
            font-size: 2.5rem;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .form-container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            max-width: 600px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: #444;
        }

        input[type="text"],
        select,
        textarea {
            width: 100%;
            padding: 0.8rem;
            border: 2px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus,
        select:focus,
        textarea:focus {
            border-color: #4CAF50;
            outline: none;
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        .radio-group {
            display: flex;
            gap: 1.5rem;
            margin-top: 0.5rem;
        }

        .radio-group label {
            display: flex;
            align-items: center;
            font-weight: normal;
            cursor: pointer;
        }

        .radio-group input[type="radio"] {
            margin-right: 0.5rem;
            cursor: pointer;
        }

        .btn-container {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
        }

        .btn {
            display: inline-block;
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .btn-primary {
            background-color: #4CAF50;
            color: white;
        }

        .btn-primary:hover {
            background-color: #45a049;
        }

        .btn-secondary {
            background-color: #6c757d;
            color: white;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        @media (max-width: 768px) {
            .container {
                padding: 1rem;
            }

            .form-container {
                padding: 1.5rem;
            }

            .radio-group {
                flex-direction: column;
                gap: 0.5rem;
            }
        }
    </style>
</head>
<body>
    <?php if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i>
            <?= $_SESSION['success'] ?>
            <?php unset($_SESSION['success']); ?>
        </div>
    <?php endif; ?>

    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-error">
            <i class="fas fa-exclamation-circle"></i>
            <?= $_SESSION['error'] ?>
            <?php unset($_SESSION['error']); ?>
        </div>
    <?php endif; ?>

    <div class="container">
        <h1>Tambah Model Fashion</h1>
        
        <div class="form-container">
            <form id="formTambah" method="POST" action="index.php?page=simpan">
                <div class="form-group">
                    <label for="nama_model">Nama Model</label>
                    <input 
                        type="text" 
                        name="nama_model" 
                        id="nama_model" 
                        placeholder="Masukkan nama model"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <select name="kategori" id="kategori" required>
                        <option value="">Pilih kategori</option>
                        <option value="Casual">Casual</option>
                        <option value="Formal">Formal</option>
                        <option value="Sport">Sport</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <div class="radio-group">
                        <label>
                            <input type="radio" name="status" value="Aktif" checked>
                            Aktif
                        </label>
                        <label>
                            <input type="radio" name="status" value="Nonaktif">
                            Nonaktif
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="foto">Foto (URL)</label>
                    <input 
                        type="text" 
                        name="foto" 
                        id="foto" 
                        placeholder="Masukkan URL foto"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="deskripsi">Deskripsi Model</label>
                    <textarea 
                        name="deskripsi" 
                        id="deskripsi" 
                        placeholder="Tulis deskripsi model"
                        required
                    ></textarea>
                </div>

                <div class="form-group">
                    <label for="asal_negara">Asal Negara</label>
                    <input 
                        type="text" 
                        name="asal_negara" 
                        id="asal_negara" 
                        placeholder="Masukkan asal negara"
                        required
                    >
                </div>

                <div class="btn-container">
                    <a href="index.php" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>