<div class="container mt-5">
  <div class="row">
    <div class="col-md-8 mt-5 mx-auto">
      <?php if ($this->session->flashdata('msg')) : ?>
        <div class="row mt-3">
          <div class="col-md">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              Data Profil<strong> berhasil </strong> <?= $this->session->flashdata('msg'); ?>.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          </div>
        </div>
      <?php endif; ?>
      <div class="card profile mb-3 mx-auto bg-white" style="max-width: 540px;">
        <div class="row no-gutters">
          <div class="col-md-5" style="height: 200px;">
            <img src="<?= base_url('assets/img/') ?><?= $user['foto'] ?>" class="card-img" alt="user" style="height: 100%;">
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <h4 class="card-title mb-4"><?= $user['nama'] ?></h4>
              <h6 class="card-subtitle mb-3 text-muted"><?= $user['jk'] ?></h6>
              <h6 class="card-subtitle mb-3"><?= $user['username'] ?></h6>
              <h6 class="card-subtitle mb-3"><?= $user['nik'] ?></h6>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-5">
            <div class="card-body">
              <h6 class="card-subtitle mb-3"><?= $user['email'] ?></h6>
              <h6 class="card-subtitle mb-3"><?= $user['no_hp'] ?></h6>
            </div>
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <h6 class="card-subtitle mb-3"><?= $user['alamat'] ?></h6>
            </div>
          </div>
        </div>
        <a href="<?= base_url('admin/edit_profil') ?>" class="btn btn-warning">Edit Profil</a>
      </div>
    </div>
  </div>
</div>