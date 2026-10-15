```php
<?php
require_once 'Data/menu.php/includes/fungsi.php';

$judulHalaman = "Beranda | Pink Sweet Cafe";
require_once 'Data/menu.php/includes/header.php';
?>

<section class="hero">
    <div class="hero-content">
        <span class="label-pink">WELCOME TO OUR CAFE 💗</span>
        <h1>Manisnya Hari,<br>
            <span>Manisnya Kamu!</span>
        </h1>
        <p>
            Nikmati aneka makanan dan minuman favorit
            dengan rasa istimewa di Pink Sweet Cafe.
        </p>
        <a href="#menu" class="btn-primary">Lihat Menu ✨</a>
    </div>

    <div class="hero-decoration">🍰 🧋 🍓</div>
</section>

<section id="menu" class="menu-section">
    <div class="section-heading">
        <span class="label-pink">OUR FAVORITES</span>
        <h2>Menu Spesial Kami</h2>
        <p>Pilih camilan dan minuman favoritmu 💕</p>
    </div>

    <div class="menu-grid">
        <?php foreach ($daftarMenu as $id => $menu): ?>
            <article class="menu-card">
                <img
                    src="<?= htmlspecialchars($menu['gambar']) ?>"
                    alt="<?= htmlspecialchars($menu['nama']) ?>"
                    class="menu-image"
                >

                <div class="menu-info">
                    <span class="category">
                        <?= htmlspecialchars($menu['kategori']) ?>
                    </span>

                    <h3><?= htmlspecialchars($menu['nama']) ?></h3>

                    <p class="price">
                        <?= rupiah($menu['harga']) ?>
                    </p>

                    <form action="proses.php" method="POST">
                        <input type="hidden" name="aksi" value="tambah">
                        <input type="hidden" name="id" value="<?= $id ?>">

                        <button type="submit" class="btn-cart">
                            + Tambah ke Keranjang
                        </button>
                    </form>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</section>

<?php require_once 'Data/menu.php/includes/footer.php'; ?>
```