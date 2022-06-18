<div class="container">
  <div class="row">
    <div class="col-md">
      <div class="card my-3" style="max-width: 600px;">
        <div class="row no-gutters">
          <div class="col-md-5">
            <img src="..." class="card-img" alt="...">
          </div>
          <div class="col-md-7">
            <div class="card-header">
              Detail Data Karyawan
            </div>
            <div class="card-body">
              <h5 class="card-title"><?= $karyawan['nama']; ?></h5>
              <h6 class="card-subtitle mb-2 text-muted"><?= $karyawan['jk']; ?></h6>
              <div class="row">
                <div class="col-sm">
                  <p class="card-text"><?= $karyawan['nik']; ?></p>
                  <p class="card-text"><?= $karyawan['email']; ?></p>
                  <p class="card-text"><?= $karyawan['no_hp']; ?></p>
                  <p class="card-text"><?= $tgl_masuk; ?></p>
                </div>
                <div class="col-sm">
                  <p class="card-text"><?= $karyawan['alamat']; ?></p>
                </div>
              </div>
              <a href="<?= base_url('admin/data_karyawan') ?>" class="btn btn-secondary mt-3">Kembali</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>