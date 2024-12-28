<div class="container">
    <h2>Keranjang Belanja</h2>
    <?php if (!empty($cart)): ?>
        <table class="table">
            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cart as $item): ?>
                    <tr>
                        <td><?= htmlspecialchars($item['name']); ?></td>
                        <td>Rp <?= number_format($item['price'], 0, ',', '.'); ?></td>
                        <td><?= $item['qty']; ?></td>
                        <td>Rp <?= number_format($item['price'] * $item['qty'], 0, ',', '.'); ?></td>
                        <td>
                            <button class="btn btn-danger btn-sm" onclick="removeFromCart(<?= $item['id']; ?>)">Hapus</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Keranjang belanja kosong.</p>
    <?php endif; ?>
</div>
