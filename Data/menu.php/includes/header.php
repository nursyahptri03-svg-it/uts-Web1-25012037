```php
<?php
if (!isset($judulHalaman)) {
    $judulHalaman = "Pink Sweet Cafe";
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($judulHalaman) ?></title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<header class="navbar">
    <a href="index.php" class="logo">
        🎀 Pink Sweet Cafe
    </a>

    <nav>
        <a href="index.php">Beranda</a>
        <a href="index.php#menu">Menu</a>
        <a href="keranjang.php">
            🛒 Keranjang
            <span class="cart-count">
                <?= totalItem() ?>
            </span>
        </a>
    </nav>
</header>

<main class="container">
```