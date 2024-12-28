<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="breadcrumb-header">Shopping Cart</h3>
            </div>
        </div>
    </div>
</div>

<!-- SECTION -->
<div class="section">
    <div class="container">
        <div class="row">
            <!-- Cart Items -->
            <div class="col-md-12">
                <div class="cart-details">
                    <div class="section-title">
                        <h3 class="title">Your Cart</h3>
                    </div>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Subtotal</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Dynamic Cart Items -->
                            <?php if (!empty($cart_items)) : ?>
                                <?php foreach ($cart_items as $id_produk => $item) : ?>
                                    <tr>
                                        <td>
                                            <div class="cart-product">
                                                <!-- Ensure 'gambar' exists and fallback to default image if not -->
                                                <img src="<?= base_url('assets/images/' . (isset($item['gambar']) ? $item['gambar'] : 'default.jpg')); ?>" alt="<?= $item['nama_produk']; ?>" width="50">
                                                <span><?= $item['nama_produk']; ?></span>
                                            </div>
                                        </td>
                                        <td>Rp <?= number_format($item['harga'], 0, ',', '.'); ?></td>
                                        <td>
                                            <form action="<?= base_url('cart/update_quantity/' . $id_produk); ?>" method="post">
                                                <input type="number" name="kuantitas" class="form-control quantity-input" value="<?= $item['kuantitas']; ?>" min="1">
                                                <button type="submit" class="btn btn-primary btn-sm mt-1">Update</button>
                                            </form>
                                        </td>
                                        <td>Rp <?= number_format($item['harga'] * $item['kuantitas'], 0, ',', '.'); ?></td>
                                        <td>
                                            <a href="<?= base_url('cart/remove/' . $id_produk); ?>" class="btn btn-danger btn-sm">Remove</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="5" class="text-center">Your cart is empty.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>

                     <!-- Checkout Button -->
                     <?php if (!empty($cart_items)) : ?>
                        <div class="text-right">
                            <a href="<?= base_url('Transaksi'); ?>" class="btn btn-success btn-lg">Proceed to Checkout</a>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- /SECTION -->

<style>
.cart-product img {
    border-radius: 5px;
    margin-right: 10px;
}
.quantity-input {
    width: 70px;
    text-align: center;
}
</style>
