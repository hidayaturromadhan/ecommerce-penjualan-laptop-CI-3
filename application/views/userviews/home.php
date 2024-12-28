<!-- SECTION -->
<div class="section">
    <div class="container">
        <div class="row text-middle">
            <div class="col-sm-6">
                <br><br><br>
                <h1 class="mx-auto" style="font-size:48px;">Upgrade Your Workspace With the Perfect Technology</h1>
                <br>
                <p class="mx-auto">Welcome to the best place to discover a wide range of high-quality laptops at competitive prices. We offer top brands, from everyday laptops to premium devices for professionals and gamers.</p>
                <br>
                <div class="add-to-cart">
                    <a href="<?= base_url('user/catalogue') ?>" class="primary-btn add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Shop Now</a>
                </div>
            </div>
            <div class="col-sm-6">
                <img src="<?= base_url('assets/userassets/img/yogadisplay.png') ?>" alt="" class="img-fluid mainmage float-left">
            </div>
        </div>
    </div>
</div>

<!-- HOT DEAL SECTION -->
<div id="hot-deal" class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="hot-deal">
                    <ul class="hot-deal-countdown">
                        <li><div><h3>02</h3><span>Days</span></div></li>
                        <li><div><h3>10</h3><span>Hours</span></div></li>
                        <li><div><h3>34</h3><span>Mins</span></div></li>
                        <li><div><h3>60</h3><span>Secs</span></div></li>
                    </ul>
                    <h2 class="text-uppercase">hot deal this week</h2>
                    <p>New Collection Up to 50% OFF</p>
                    <a class="primary-btn cta-btn" href="#">Shop now</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- OUR PRODUCTS SECTION -->
<div id="our-products" class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-uppercase text-center">Our Products</h2>
                <p class="text-center">Explore our top products that are trending this week!</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <!-- Store Products Loop -->
            <?php if (!empty($result)): ?>
                <?php
                    // Limit the results to 4 products
                    $limited_result = array_slice($result, 0, 4);
                ?>
                <?php foreach ($limited_result as $product): ?>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="product-item">
                            <div class="product-img">
                                <img src="<?= base_url('assets/images/') . $product['gambar']; ?>" alt="<?= htmlspecialchars($product['nama_produk']); ?>" class="img-fluid">
                            </div>
                            <div class="product-body">
                                <h3 class="product-title"><?= htmlspecialchars($product['nama_produk']); ?></h3>
                                <p class="product-price">Rp <?= number_format($product['harga'], 0, ',', '.'); ?></p>
                                <p class="product-description"><?= htmlspecialchars($product['deskripsi']); ?></p>
                                  
                                <!-- Form to add to cart -->
                                <form action="<?= base_url('cart/addToCart'); ?>" method="POST">
                                    <input type="hidden" name="id_produk" value="<?= $product['id_produk']; ?>">
                                    <input type="hidden" name="kuantitas" value="1"> <!-- Default quantity -->
                                    <button type="submit" class="primary-btn add-to-cart-btn">
                                        <i class="fa fa-shopping-cart"></i> Add to Cart
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
    </div>
</div>
<!-- END OUR PRODUCTS SECTION -->


<style>
/* Styling untuk Section Produk */
#our-products {
    padding: 50px 0;
    background-color: #f8f9fa;
}

#our-products .container {
    max-width: 1200px;
}

#our-products .row {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
}

.product-item {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
    text-align: center;
    overflow: hidden;
    margin: 15px;
    min-height: 400px; /* Minimum height for card */
    max-height: 500px; /* Maximum height for card */
}

.product-item:hover {
    transform: translateY(-10px); /* Efek hover pada card */
}

.product-img img {
    width: 100%;
    height: 200px; /* Fix height for image */
    object-fit: cover; /* Keeps the image aspect ratio */
    border-bottom: 1px solid #ddd;
    min-height: 200px; /* Minimum height for image */
    max-height: 250px; /* Maximum height for image */
}

.product-body {
    padding: 15px;
    height: calc(100% - 200px); /* Ensures that the body takes up the remaining space */
}

.product-title {
    font-size: 1.2rem;
    font-weight: bold;
    margin: 10px 0;
    color: #333;
}

.product-price {
    font-size: 1.1rem;
    color: red;
    margin-bottom: 10px;
}

.product-description {
    font-size: 0.9rem;
    color: #555;
    margin-bottom: 15px;
}

.add-to-cart-btn {
    padding: 10px 20px;
    background-color: red;
    color: #fff;
    border: none;
    border-radius: 5px;
    font-size: 1rem;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.add-to-cart-btn:hover {
    background-color: red;
}

@media (max-width: 1199px) {
    .col-lg-3 {
        flex: 0 0 48%;
        max-width: 48%;
    }
}

@media (max-width: 991px) {
    .col-md-6 {
        flex: 0 0 48%;
        max-width: 48%;
    }
}

@media (max-width: 767px) {
    .col-sm-12 {
        flex: 0 0 100%;
        max-width: 100%;
    }
}

</style>

