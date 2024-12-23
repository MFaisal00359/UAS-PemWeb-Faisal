<!DOCTYPE html>
<html>
<head>
    <title>Edit Model Fashion</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <h1 style="text-align: center;">Edit Model</h1>
    <div class="form-container">
        <form id="formEdit" method="POST" action="index.php?page=update">
            <input type="hidden" name="id" value="<?= $data['id'] ?>">

            <label>Nama Model:
                <input type="text" name="nama_model" id="nama_model" value="<?= htmlspecialchars($data['nama_model']) ?>">
            </label>
            <label>Kategori:
                <select name="kategori" id="kategori">
                    <option value="Casual" <?= $data['kategori'] === 'Casual' ? 'selected' : '' ?>>Casual</option>
                    <option value="Formal" <?= $data['kategori'] === 'Formal' ? 'selected' : '' ?>>Formal</option>
                    <option value="Sport" <?= $data['kategori'] === 'Sport' ? 'selected' : '' ?>>Sport</option>
                </select>
            </label>
            <label>Status:
                <div class="radio-group">
                    <label><input type="radio" name="status" value="Aktif" <?= $data['status'] === 'Aktif' ? 'checked' : '' ?>> Aktif</label>
                    <label><input type="radio" name="status" value="Nonaktif" <?= $data['status'] === 'Nonaktif' ? 'checked' : '' ?>> Nonaktif</label>
                </div>
            </label>
            <label>Foto (URL):
                <input type="text" name="foto" id="foto" value="<?= htmlspecialchars($data['foto']) ?>">
            </label>
            <label>Deskripsi Model:
                <textarea name="deskripsi" id="deskripsi"><?= htmlspecialchars($data['deskripsi']) ?></textarea>
            </label>
            <label>Asal Negara:
                <input type="text" name="asal_negara" id="asal_negara" value="<?= htmlspecialchars($data['asal_negara']) ?>">
            </label>
            <button type="submit" class="btn">Perbarui</button>
        </form>
    </div>
</body>
</html>
