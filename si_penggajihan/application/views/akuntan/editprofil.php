<div class="container my-5">
  <div class="row">
    <div class="col-md-6 mx-auto mt-5">
      <div class="card">
        <div class="card-header text-center">
          Edit Profil
        </div>
        <div class="card-body">
          <form action="<?= base_url('akuntan/edit_profil') ?>" method="post">
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" id="username" name="username" value="<?= $user['username']; ?>" readonly>
              <?= form_error('username', '<small class="form-text text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama']; ?>">
              <?= form_error('nama', '<small class="form-text text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label for="jk">Jenis Kelamin</label>
              <select class="form-control" name="jk" id="jk">
                <?php foreach ($jenis_kelamin as $jk) : ?>
                  <?php if ($jk == $karyawan['jk']) : ?>
                    <option value="<?= $jk; ?>" selected><?= $jk; ?></option>
                  <?php else : ?>
                    <option value="<?= $jk; ?>"><?= $jk; ?></option>
                  <?php endif; ?>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label for="nik">Nomor Induk Keluarga (NIK)</label>
              <input type="text" class="form-control" id="nik" name="nik" value="<?= $user['nik']; ?>">
              <?= form_error('nik', '<small class="form-text text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>">
              <?= form_error('email', '<small class="form-text text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label for="nohp">No. HP</label>
              <input type="text" class="form-control" id="nohp" name="nohp" value="<?= $user['no_hp']; ?>">
              <?= form_error('nohp', '<small class="form-text text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label for="alamat">Alamat</label>
              <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $user['alamat']; ?>">
              <?= form_error('alamat', '<small class="form-text text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group row">
              <div class="col-sm-2">Foto</div>
              <div class="col-sm-10">
                <div class="row">
                  <div class="col-sm-3">
                    <img src="<?= base_url('assets/img/') . $user['foto'] ?>" alt="akuntan" class="img-thumbnail">
                  </div>
                  <div class="col-sm-9">
                    <div class="custom-file">
                      <input type="file" name="img" id="img" class="custom-file-input">
                      <label for="img" class="custom-file-label">Pilih File</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-primary float-right">Edit Profil</button>
            <a href="<?= base_url('akuntan/profil') ?>" class="btn btn-secondary">Kembali</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>