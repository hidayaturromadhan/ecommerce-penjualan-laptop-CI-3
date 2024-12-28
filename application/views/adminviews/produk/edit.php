<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Product</h4>
                <form action="<?php echo site_url('produk/update/' . $produk['id_produk']); ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nama_produk">Nama Produk</label>
                        <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="<?php echo $produk['nama_produk']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="brand">Brand</label>
                        <input type="text" class="form-control" id="brand" name="brand" value="<?php echo  $produk['brand']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required><?php echo  $produk['deskripsi']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="number" class="form-control" id="harga" name="harga" value="<?php echo  $produk['harga']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="stok">Stok</label>
                        <input type="number" class="form-control" id="stok" name="stok" value="<?php echo  $produk['stok']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="gambar">Gambar Produk (Biarkan kosong jika tidak ingin mengganti)</label>
                        <input type="file" class="form-control" id="gambar" name="gambar">
                    </div>
                    <div class="form-group">
                        <img src="<?php echo base_url('assets/images/' .  $produk['gambar']); ?>" alt="Current Image" width="100">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="<?php echo site_url('produk'); ?>" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
