<div class="container mb-3">
  <div class="row">
    <div class="col-md-6 mx-auto">
      <div class="card mt-3">
        <div class="card-header text-center">
          Form Ubah Data Karyawan
        </div>
        <div class="card-body">
          <form action="<?= base_url('admin/ubah'); ?>" method="post">
            <input type="hidden" name="id" id="id" value="<?= $karyawan['id']; ?>">
            <div class="form-group">
              <label for="username">Kode Karyawan</label>
              <input type="text" class="form-control" name="username" id="username" placeholder="Masukkan kode karyawan" value="<?= $karyawan['username']; ?>">
              <?= form_error('username', '<small class="form-text text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan nama lengkap" value="<?= $karyawan['nama']; ?>">
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
              <label for="alamat">Alamat</label>
              <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Masukkan alamat (tempat tinggal)" value="<?= $karyawan['alamat']; ?>">
              <?= form_error('alamat', '<small class="form-text text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label for="nohp">No. HP</label>
              <input type="text" class="form-control" name="nohp" id="nohp" placeholder="Masukkan No HP" value="<?= $karyawan['no_hp']; ?>">
              <?= form_error('nohp', '<small class="form-text text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" class="form-control" name="email" id="email" placeholder="Masukkan alamat email" value="<?= $karyawan['email']; ?>">
              <?= form_error('email', '<small class="form-text text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label for="nik">NIK</label>
              <input type="text" class="form-control" name="nik" id="nik" placeholder="Masukkan Nomor Induk Keluarga" value="<?= $karyawan['nik']; ?>">
              <?= form_error('nik', '<small class="form-text text-danger pl-3">', '</small>'); ?>
            </div>
            <button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Karyawan</button>
          </form>
          <a href="<?= base_url('owner/data_karyawan'); ?>" class="btn btn-secondary">Kembali</a>
        </div>
      </div>
    </div>
  </div>
</div>