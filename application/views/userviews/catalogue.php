
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
             <!-- ASIDE -->
             <div id="aside" class="col-md-3">
                     <!-- aside Widget -->
                     <div class="aside">
                    <h3 class="aside-title">Brand</h3>
                    <div class="checkbox-filter">
                        <!-- Semua Brand -->
                        <div class="input-checkbox">
                            <input type="checkbox" id="brand-all" onchange="filterByBrand('ALL')">
                            <label for="brand-all">
                                <span></span>
                                Semua Brand
                            </label>
                        </div>

                        <!-- MSI -->
                        <div class="input-checkbox">
                            <input type="checkbox" id="brand-1" onchange="filterByBrand('MSI')" <?= $brand_filter === 'MSI' ? 'checked' : ''; ?>>
                            <label for="brand-1">
                                <span></span>
                                MSI
                            </label>
                        </div>

                        <!-- LENOVO -->
                        <div class="input-checkbox">
                            <input type="checkbox" id="brand-2" onchange="filterByBrand('LENOVO')" <?= $brand_filter === 'LENOVO' ? 'checked' : ''; ?>>
                            <label for="brand-2">
                                <span></span>
                                LENOVO
                            </label>
                        </div>

                        <!-- ACER -->
                        <div class="input-checkbox">
                            <input type="checkbox" id="brand-3" onchange="filterByBrand('ACER')" <?= $brand_filter === 'ACER' ? 'checked' : ''; ?>>
                            <label for="brand-3">
                                <span></span>
                                ACER
                            </label>
                        </div>

                        <!-- ASUS -->
                        <div class="input-checkbox">
                            <input type="checkbox" id="brand-4" onchange="filterByBrand('ASUS')" <?= $brand_filter === 'ASUS' ? 'checked' : ''; ?>>
                            <label for="brand-4">
                                <span></span>
                                ASUS
                            </label>
                        </div>

                        <!-- HP -->
                        <div class="input-checkbox">
                            <input type="checkbox" id="brand-5" onchange="filterByBrand('HP')" <?= $brand_filter === 'HP' ? 'checked' : ''; ?>>
                            <label for="brand-5">
                                <span></span>
                                HP
                            </label>
                        </div>
                    </div>
                </div>
                <!-- /aside Widget -->
            </div>
            <!-- /ASIDE -->
            <!-- STORE -->
            <div id="store" class="col-md-9">
                <!-- store products -->
                <div class="row">
                        <?php if (!empty($result)): ?>
                            <?php foreach ($result as $product): ?>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <div class="product">
                                        <div class="product-img">
                                            <img src="<?= base_url('assets/images/') . $product['gambar']; ?>" alt="<?= $product['nama_produk']; ?>">
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category"><?= htmlspecialchars($product['brand']); ?></p>
                                            <h3 class="product-name">
                                                <a href="#"><?= htmlspecialchars($product['nama_produk']); ?></a>
                                            </h3>
                                            <h4 class="product-price">Rp <?= number_format($product['harga'], 0, ',', '.'); ?></h4>
                                            <p class="product-description"><?= htmlspecialchars($product['deskripsi']); ?></p>
                                             <!-- Form untuk menambahkan ke keranjang -->
                                            <form action="<?= base_url('cart/addToCart'); ?>" method="POST">
                                                <input type="hidden" name="id_produk" value="<?= $product['id_produk']; ?>">
                                                <input type="hidden" name="kuantitas" value="1"> <!-- Misalnya kuantitas 1 -->
                                                <button type="submit" class="add-to-cart-btn">
                                                    <i class="fa fa-shopping-cart"></i> Masukkan Keranjang
                                                </button>
                                            </form>


                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>Produk tidak ditemukan.</p>
                        <?php endif; ?>
                    </div>
                <!-- /store products -->
            </div>
            <!-- /STORE -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<style>
/* Tambahkan styling untuk card produk */
.product {
    width: 100%;
    min-height: 400px; /* Tetapkan tinggi minimum */
    max-height: 450px; /* Batasi tinggi maksimum */
    border: 1px solid #eaeaea; /* Tambahkan border */
    border-radius: 10px; /* Tambahkan efek rounded */
    overflow: hidden; /* Sembunyikan elemen yang melampaui ukuran */
    margin-bottom: 20px; /* Jarak antar produk */
    padding: 10px; /* Spasi internal */
    display: flex;
    flex-direction: column; /* Membuat elemen vertikal */
    justify-content: space-between; /* Jaga jarak elemen */
    background-color: #fff; /* Latar belakang putih */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Efek bayangan */
}

.product .product-img {
    width: 100%;
    height: 180px; /* Tetapkan ukuran gambar tetap */
    object-fit: contain; /* Skala gambar tanpa memotong */
    margin-bottom: 15px; /* Jarak bawah gambar */
}

.product .product-body {
    flex-grow: 1; /* Agar isi body fleksibel */
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    text-align: center; /* Pusatkan teks */
}

.product .product-name {
    font-size: 16px;
    font-weight: bold;
    color: #333;
    height: 20px; /* Batasi tinggi nama produk */
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    margin-bottom: 10px; /* Jarak bawah nama */
}

.product .product-price {
    font-size: 18px;
    font-weight: bold;
    color: #ff6f61; /* Warna harga */
    margin-bottom: 15px;
}

.product .product-description {
    font-size: 14px;
    color: #666;
    height: 40px; /* Batasi tinggi deskripsi */
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

/* Responsif untuk layar besar */
.row {
    display: flex;
    flex-wrap: wrap; /* Membuat produk terbungkus dalam beberapa baris */
    justify-content: center; /* Mengatur agar produk terpusat secara horizontal */
}

/* Menentukan ukuran kolom 4 produk per baris */
.col-md-3 {
    width: 25%; /* 4 produk per baris */
    padding: 15px; /* Memberikan jarak antar produk */
}

/* Responsif untuk layar lebih kecil */
@media (max-width: 768px) {
    .col-md-3 {
        width: 50%; /* Dua produk per baris pada layar medium */
    }
}

@media (max-width: 576px) {
    .col-md-3, .col-sm-6, .col-xs-12 {
        width: 100%; /* Satu produk per baris pada layar kecil */
    }
}

/* Tombol Masukkan ke Keranjang */
.add-to-cart-btn {
    background-color: red; /* Warna tombol */
    color: #fff; /* Warna teks */
    font-size: 14px;
    font-weight: bold;
    padding: 10px 15px; /* Padding tombol */
    border: none;
    border-radius: 5px; /* Rounded corners */
    cursor: pointer;
    text-align: center;
    width: 100%; /* Tombol memenuhi lebar */
    transition: background-color 0.3s ease;
}

.add-to-cart-btn:hover {
    background-color: #e55d4f; /* Warna saat hover */
}

.add-to-cart-btn i {
    margin-right: 5px; /* Jarak ikon */
}

</style>

<script>
    function filterByBrand(brand) {
        const url = new URL(window.location.href);

        // Jika "Semua Brand" dipilih, hapus parameter brand
        if (brand === 'ALL') {
            url.searchParams.delete('brand');
        } else {
            url.searchParams.set('brand', brand); // Tambahkan parameter filter
        }

        window.location.href = url; // Redirect ke URL baru
    }

    function addToCart(product) {
    // Kirim data produk ke backend
    const data = {
        id_produk: produk.id_produk,
        kuantitas: 1 // Kamu bisa menyesuaikan kuantitas jika ada input user
    };

    fetch("<?= base_url('cart/addToCart'); ?>", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            alert('Produk berhasil ditambahkan ke keranjang!');
        }
    })
    .catch(error => console.error("Terjadi kesalahan:", error));
}


</script>