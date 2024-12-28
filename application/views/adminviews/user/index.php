<body>

  <div class="main-panel">

    <div class="content-wrapper">
      <div class="row">
      <div class="mb-3">
    </div>
      </div>
      <div class="row">
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Data User</h4>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th> ID </th>
                      <th> Nama User </th>
                      <th> Username </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($user as $user): ?>
                      <tr>
                        <td><?php echo $user['id_user']; ?></td>
                        <td><?php echo $user['nama']; ?></td>
                        <td><?php echo $user['username']; ?></td>
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
