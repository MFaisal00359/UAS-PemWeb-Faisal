<?php
require_once '../controllers/FashionController.php';

$controller = new FashionController();

$page = $_GET['page'] ?? 'index';

switch ($page) {
    case 'index':
        $data = $controller->tampilkanData();
        include '../views/index.php';
        break;

    case 'tambah':
        include '../views/tambah.php';
        break;

    case 'simpan':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->prosesTambahData($_POST);
        }
        break;

    case 'edit':
        $id = $_GET['id'] ?? null;
        if ($id) {
            $data = $controller->tampilkanDataById($id);
            include '../views/edit.php';
        }
        break;

    case 'update':
        $id = $_POST['id'] ?? null;
        if ($id) {
            $controller->prosesUpdateData($id, $_POST);
        }
        break;

    case 'delete':
        $id = $_GET['id'] ?? null;
        if ($id) {
            $controller->prosesHapusData($id);
        }
        break;

    default:
        echo '<h1>404 - Halaman Tidak Ditemukan</h1>';
}
?>
