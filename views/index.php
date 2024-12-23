<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Model Fashion</title>
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
        }

        .alert {
            padding: 1rem;
            margin: 1rem auto;
            border-radius: 8px;
            max-width: 800px;
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
            max-width: 1200px;
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

        .btn {
            display: inline-flex;
            align-items: center;
            padding: 0.8rem 1.5rem;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: all 0.3s ease;
            font-weight: 500;
            border: none;
            cursor: pointer;
        }

        .btn-add {
            background-color: #4CAF50;
            margin-bottom: 2rem;
        }

        .btn-edit {
            background-color: #2196F3;
        }

        .btn-delete {
            background-color: #f44336;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
        }

        .btn i {
            margin-right: 8px;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 2rem;
        }

        .card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .card-content {
            padding: 1.5rem;
        }

        .card-actions {
            display: flex;
            gap: 1rem;
            padding: 0 1.5rem 1.5rem;
        }

        .card h2 {
            color: #333;
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .card p {
            margin: 0.5rem 0;
            color: #666;
        }

        .card strong {
            color: #333;
        }

        .status-badge {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.875rem;
            font-weight: 500;
        }

        .status-active {
            background-color: #e3f2fd;
            color: #1565c0;
        }

        .status-inactive {
            background-color: #fafafa;
            color: #616161;
        }

        .empty-state {
            text-align: left ;
            padding: 3rem;
            color: #666;
            font-size: 1.2rem;
        }

        .profile-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 2rem;
            border-radius: 15px;
            color: white;
            margin: 2rem auto;
            max-width: 1200px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .profile-content {
            display: grid;
            grid-template-columns: 3.5fr 4fr;
            gap: 4rem;
            align-items: center;
        }

        .profile-info h2 {
            font-size: 1.8rem;
            margin-bottom: 0.5rem;
            font-weight: 600;
        }

        .profile-details {
            list-style: none;
            padding: 0;
        }

        .profile-details li {
            display: flex;
            align-items: center;
            margin: 0.5rem 0;
        }

        .profile-details i {
            margin-right: 0.8rem;
            width: 20px;
        }

        .profile-image {
            text-align: right;
        }

        .profile-image img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .footer {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 2rem;
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
        }

        .footer-item {
            padding: 1rem;
            text-align: center;
            border-right: 1px solid #eee;
        }

        .footer-item:last-child {
            border-right: none;
        }

        .footer-item i {
            font-size: 1.5rem;
            color: #667eea;
            margin-bottom: 0.5rem;
        }

        .footer-label {
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 0.3rem;
        }

        .footer-value {
            font-size: 1.1rem;
            color: #333;
            font-weight: 500;
        }

        @media (max-width: 768px) {
            .container {
                padding: 1rem;
            }
            
            .cards {
                grid-template-columns: 1fr;
            }

            .card-actions {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }

            .profile-card {
                margin: 1rem;
            }
            
            .profile-content {
                grid-template-columns: 1fr;
                text-align: center;
            }
            
            .profile-details li {
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <?php if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i> <?= $_SESSION['success'] ?>
            <?php unset($_SESSION['success']); ?>
        </div>
    <?php endif; ?>

    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-error">
            <i class="fas fa-exclamation-circle"></i> <?= $_SESSION['error'] ?>
            <?php unset($_SESSION['error']); ?>
        </div>
    <?php endif; ?>

    <div class="profile-card">
        <div class="profile-content">
            <div class="profile-image">
                <img src="assets/images/profile.jpg" alt="Muhammad Faisal Safira">
            </div>
            <div class="profile-info">
                <h2>Muhammad Faisal Safira</h2>
                <ul class="profile-details">
                    <li><i class="fas fa-id-card"></i> 121140130</li>
                    <li><i class="fas fa-book"></i> Pemrograman Web</li>
                    <li><i class="fas fa-users"></i> Kelas RB</li>
                </ul>
            </div>
            
        </div>
    </div>

    <div class="container">
        <h1>Daftar Model Fashion</h1>
        
        <a href="index.php?page=tambah" class="btn btn-add">
            <i class="fas fa-plus"></i>Tambah Model
        </a>

        <div class="cards">
            <?php if (!empty($data)): ?>
                <?php foreach ($data as $item): ?>
                    <div class="card">
                        <img 
                            src="<?= htmlspecialchars($item['foto']) ?>" 
                            alt="<?= htmlspecialchars($item['nama_model']) ?>" 
                            class="card-img"
                        >
                        <div class="card-content">
                            <h2><?= htmlspecialchars($item['nama_model']) ?></h2>
                            <p><strong>Kategori:</strong> <?= htmlspecialchars($item['kategori']) ?></p>
                            <p><strong>Status:</strong> 
                                <span class="status-badge <?= $item['status'] === 'Aktif' ? 'status-active' : 'status-inactive' ?>">
                                    <?= htmlspecialchars($item['status']) ?>
                                </span>
                            </p>
                            <p><strong>Deskripsi:</strong> <?= htmlspecialchars($item['deskripsi']) ?></p>
                            <p><strong>Asal Negara:</strong> <?= htmlspecialchars($item['asal_negara']) ?></p>
                        </div>
                        <div class="card-actions">
                            <a href="index.php?page=edit&id=<?= $item['id'] ?>" class="btn btn-edit">
                                <i class="fas fa-edit"></i>Edit
                            </a>
                            <a href="index.php?page=delete&id=<?= $item['id'] ?>" 
                               class="btn btn-delete"
                               onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                <i class="fas fa-trash"></i>Hapus
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="empty-state">
                    <i class="fas fa-folder-open" style="font-size: 3rem; color: #ccc; margin-bottom: 1rem;"></i>
                    <p>Tidak ada data yang tersedia.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="footer">
    <div class="footer-content">
        <div class="footer-item">
            <i class="fas fa-globe"></i>
            <div class="footer-label">IP Address</div>
            <div class="footer-value"><?= $_SERVER['REMOTE_ADDR'] ?></div>
        </div>
        <div class="footer-item">
            <i class="fas fa-desktop"></i>
            <div class="footer-label">Browser</div>
            <div class="footer-value"><?= $_SERVER['HTTP_USER_AGENT'] ?></div>
        </div>
        <div class="footer-item">
            <i class="fas fa-adjust"></i>
            <div class="footer-label">Mode</div>
            <div class="footer-value"><?= isset($mode) ? $mode : 'Light' ?></div>
        </div>
    </div>
</div>
</body>
</html>