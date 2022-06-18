<div class="container">
  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header text-center">
          Edit Profil
        </div>
        <div class="card-body">
          <form action="<?= base_url('owner/edit_profil') ?>" method="post">
            <div class="form-group">
              <label for="nama">Nama Profil</label>
              <input type="text" class="form-control" id="nama" name="nama" value="<?= $perusahaan['nama']; ?>">
              <?= form_error('nama', '<small class="form-text text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" class="form-control" id="email" name="email" value="<?= $perusahaan['email']; ?>">
              <?= form_error('email', '<small class="form-text text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label for="fax">No. FAX</label>
              <input type="text" class="form-control" id="fax" name="fax" value="<?= $perusahaan['fax']; ?>">
              <?= form_error('fax', '<small class="form-text text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label for="notlp">No. Telpon</label>
              <input type="text" class="form-control" id="notlp" name="notlp" value="<?= $perusahaan['no_tlp']; ?>">
              <?= form_error('notlp', '<small class="form-text text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label for="alamat">Alamat</label>
              <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $perusahaan['alamat']; ?>">
              <?= form_error('alamat', '<small class="form-text text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group row">
              <div class="col-sm-2">Logo</div>
              <div class="col-sm-10">
                <div class="row">
                  <div class="col-sm-3">
                    <img src="<?= base_url('assets/img/') . $perusahaan['logo'] ?>" alt="perusahaan" class="img-thumbnail">
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
            <button type="submit" class="btn btn-primary ">Edit Profil Perusahaan</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>