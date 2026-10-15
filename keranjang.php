```php
<?php
require_once 'Data/menu.php/includes/fungsi.php';

$judulHalaman = "Keranjang | Pink Sweet Cafe";
require_once 'Data/menu.php/includes/header.php';
?>

<section class="cart-section">
    <div class="section-heading">
        <span class="label-pink">YOUR SHOPPING BAG 🛍️</span>
        <h1>Keranjang Belanja</h1>
        <p>Periksa pesanan favoritmu sebelum selesai.</p>
    </div>

    <?php if (empty($_SESSION['keranjang'])): ?>

        <div class="empty-cart">
            <div class="empty-icon">🛒</div>
            <h2>Keranjangmu masih kosong</h2>
            <p>Yuk, pilih makanan dan minuman kesukaanmu!</p>
            <a href="index.php#menu" class="btn-primary">
                Belanja Sekarang
            </a>
        </div>

    <?php else: ?>

        <div class="cart-table-wrapper">
            <table class="cart-table">
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($_SESSION['keranjang'] as $id => $jumlah): ?>
                        <?php if (isset($daftarMenu[$id])): ?>
                            <?php
                            $menu = $daftarMenu[$id];
                            $subtotal = $menu['harga'] * $jumlah;
                            ?>

                            <tr>
                                <td>
                                    <div class="cart-product">
                                        <img
                                            src="<?= htmlspecialchars($menu['gambar']) ?>"
                                            alt="<?= htmlspecialchars($menu['nama']) ?>"
                                        >
                                        <span>
                                            <?= htmlspecialchars($menu['nama']) ?>
                                        </span>
                                    </div>
                                </td>

                                <td><?= rupiah($menu['harga']) ?></td>

                                <td>
                                    <div class="quantity-control">
                                        <form action="proses.php" method="POST">
                                            <input type="hidden" name="aksi" value="kurang">
                                            <input type="hidden" name="id" value="<?= $id ?>">
                                            <button type="submit" class="btn-quantity">−</button>
                                        </form>

                                        <strong><?= $jumlah ?></strong>

                                        <form action="proses.php" method="POST">
                                            <input type="hidden" name="aksi" value="tambah">
                                            <input type="hidden" name="id" value="<?= $id ?>">
                                            <button type="submit" class="btn-quantity">+</button>
                                        </form>
                                    </div>
                                </td>

                                <td class="price"><?= rupiah($subtotal) ?></td>

                                <td>
                                    <form action="proses.php" method="POST">
                                        <input type="hidden" name="aksi" value="hapus">
                                        <input type="hidden" name="id" value="<?= $id ?>">
                                        <button type="submit" class="btn-delete">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="cart-summary">
            <h2>Ringkasan Belanja 💗</h2>

            <div class="summary-row">
                <span>Total item</span>
                <strong><?= totalItem() ?> barang</strong>
            </div>

            <div class="summary-row total-row">
                <span>Total pembayaran</span>
                <strong><?= rupiah(totalHarga($daftarMenu)) ?></strong>
            </div>

            <div class="cart-actions">
                <a href="index.php#menu" class="btn-secondary">
                    ← Lanjut Belanja
                </a>

                <form action="proses.php" method="POST"
                      onsubmit="return confirm('Kosongkan seluruh keranjang?')">
                    <input type="hidden" name="aksi" value="kosongkan">
                    <button type="submit" class="btn-delete">
                        Kosongkan Keranjang
                    </button>
                </form>
            </div>
        </div>

    <?php endif; ?>
</section>

<?php require_once 'Data/menu.php/includes/footer.php'; ?>
```