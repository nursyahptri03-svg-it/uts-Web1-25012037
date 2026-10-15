```php
<?php
require_once 'Data/menu.php/includes/fungsi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$aksi = $_POST['aksi'] ?? '';
$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

if ($aksi === 'kosongkan') {
    $_SESSION['keranjang'] = [];
    header('Location: keranjang.php');
    exit;
}

if ($id !== false && $id !== null && isset($daftarMenu[$id])) {
    switch ($aksi) {
        case 'tambah':
            $_SESSION['keranjang'][$id] =
                ($_SESSION['keranjang'][$id] ?? 0) + 1;
            break;

        case 'kurang':
            if (isset($_SESSION['keranjang'][$id])) {
                $_SESSION['keranjang'][$id]--;

                if ($_SESSION['keranjang'][$id] <= 0) {
                    unset($_SESSION['keranjang'][$id]);
                }
            }
            break;

        case 'hapus':
            unset($_SESSION['keranjang'][$id]);
            break;
    }
}

$tujuan = ($aksi === 'tambah') ? 'index.php' : 'keranjang.php';

header('Location: ' . $tujuan);
exit;
?>
```