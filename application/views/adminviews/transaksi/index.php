<body>
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Data Transaksi</h4>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th> ID Transaksi </th>
                      <th> Total Harga </th>
                      <!-- <th> Status  </th> -->
                      <th> Tanggal Transaksi </th>
                      <!-- <th> Aksi </th> -->
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($transaksi as $transaksi): ?>
                        <tr>
                        <td><?php echo $transaksi['id_transaksi']; ?></td>
                        <td>Rp <?php echo number_format($transaksi['total_harga'], 0, ',', '.'); ?></td>
                        <!-- <td><?php echo $transaksi['status']; ?></td> -->
                        <td><?php echo date('d-m-Y', strtotime($transaksi['tanggal_transaksi'])); ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
