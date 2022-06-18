<div class="container mb-3">
  <div class="row">
    <div class="col-md-6 mx-auto">
      <div class="card mt-3">
        <div class="card-header text-center">
          Form Tambah Data Karyawan
        </div>
        <div class="card-body">
          <form action="<?= base_url('admin/tambah'); ?>" method="post">
            <div class="form-group">
              <label for="username">Kode Karyawan</label>
              <input type="text" class="form-control" name="username" id="username" placeholder="Masukkan kode karyawan" value="<?= set_value('username'); ?>">
              <?= form_error('username', '<small class="form-text text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan nama lengkap" value="<?= set_value('nama'); ?>">
              <?= form_error('nama', '<small class="form-text text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label for="jk">Jenis Kelamin</label>
              <select class="form-control" name="jk" id="jk">
                <?php foreach ($jenis_kelamin as $jk) : ?>
                  <option value="<?= $jk; ?>"><?= $jk; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label for="alamat">Alamat</label>
              <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Masukkan alamat (tempat tinggal)" value="<?= set_value('alamat'); ?>">
              <?= form_error('alamat', '<small class="form-text text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label for="nohp">No. HP</label>
              <input type="text" class="form-control" name="nohp" id="nohp" placeholder="Masukkan No HP" value="<?= set_value('nohp'); ?>">
              <?= form_error('nohp', '<small class="form-text text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" class="form-control" name="email" id="email" placeholder="Masukkan alamat email" value="<?= set_value('email'); ?>">
              <?= form_error('email', '<small class="form-text text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label for="nik">NIK</label>
              <input type="text" class="form-control" name="nik" id="nik" placeholder="Masukkan Nomor Induk Keluarga" value="<?= set_value('nik'); ?>">
              <?= form_error('nik', '<small class="form-text text-danger pl-3">', '</small>'); ?>
            </div>
            <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Karyawan</button>
          </form>
          <a href="<?= base_url('admin/data_karyawan'); ?>" class="btn btn-secondary">Kembali</a>
        </div>
      </div>
    </div>
  </div>
</div>