<body>

  <div class="main-panel">

    <div class="content-wrapper">
      <div class="row">
      <div class="mb-3">
        <form action="<?php echo site_url('produk/search'); ?>" method="GET">
            <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Cari produk..." value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">
                        <i class="mdi mdi-magnify"></i> Cari
                    </button>
                </div>
            </div>
        </form>
    </div>
      </div>
      <div class="row">
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Produk</h4>
              <div class="mb-3">
                    <a href="<?php echo site_url('produk/create'); ?>" class="btn btn-primary btn-sm">
                        <i class="mdi mdi-plus"></i> Create
                    </a>
                </div>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th> ID </th>
                      <th> Nama Produk </th>
                      <th> Brand </th>
                      <th> Deskripsi </th>
                      <th> Harga </th>
                      <th> Stok </th>
                      <th> Gambar </th>
                      <th> Aksi </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($produk as $product): ?>
                      <tr>
                        <td><?php echo $product['id_produk']; ?></td>
                        <td><?php echo $product['nama_produk']; ?></td>
                        <td><?php echo $product['brand']; ?></td>
                        <td><?php echo $product['deskripsi']; ?></td>
                        <td><?php echo 'Rp ' . number_format($product['harga'], 2); ?></td>
                        <td><?php echo $product['stok']; ?></td>
                        <td>
                          <img src="<?php echo base_url('assets/images/' . $product['gambar']); ?>" alt="product image" width="50" />
                        </td>
                        <td>
                          <a href="<?php echo site_url('produk/edit/' . $product['id_produk']); ?>" class="btn btn-warning btn-sm">Edit</a>
                          <a href="<?php echo site_url('produk/delete/' . $product['id_produk']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">Delete</a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
      
    </div>
    <!-- main-panel ends -->
  </div>
</body>
