```php
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$daftarMenu = [
    1 => [
        "nama" => "Strawberry Cake",
        "kategori" => "Makanan",
        "harga" => 25000,
        "gambar" => "https://placehold.co/400x250/ffe0ed/c44578?text=Strawberry+Cake"
    ],
    2 => [
        "nama" => "Pink Donut",
        "kategori" => "Makanan",
        "harga" => 12000,
        "gambar" => "https://placehold.co/400x250/ffe0ed/c44578?text=Pink+Donut"
    ],
    3 => [
        "nama" => "Strawberry Milk",
        "kategori" => "Minuman",
        "harga" => 18000,
        "gambar" => "https://placehold.co/400x250/ffe0ed/c44578?text=Strawberry+Milk"
    ],
    4 => [
        "nama" => "Pink Latte",
        "kategori" => "Minuman",
        "harga" => 20000,
        "gambar" => "https://placehold.co/400x250/ffe0ed/c44578?text=Pink+Latte"
    ],
    5 => [
        "nama" => "Chocolate Brownies",
        "kategori" => "Makanan",
        "harga" => 15000,
        "gambar" => "https://placehold.co/400x250/ffe0ed/c44578?text=Brownies"
    ],
    6 => [
        "nama" => "Ice Tea",
        "kategori" => "Minuman",
        "harga" => 8000,
        "gambar" => "https://placehold.co/400x250/ffe0ed/c44578?text=Ice+Tea"
    ]
];

if (!isset($_SESSION['keranjang'])) {
    $_SESSION['keranjang'] = [];
}

function rupiah($angka)
{
    return 'Rp ' . number_format($angka, 0, ',', '.');
}

function totalItem()
{
    return array_sum($_SESSION['keranjang']);
}

function totalHarga($daftarMenu)
{
    $total = 0;

    foreach ($_SESSION['keranjang'] as $id => $jumlah) {
        if (isset($daftarMenu[$id])) {
            $total += $daftarMenu[$id]['harga'] * $jumlah;
        }
    }

    return $total;
}
?>
```