<div class="container">

  <?php if ($this->session->flashdata('msg')) : ?>
    <div class="row mt-3">
      <div class="col md-6">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          Data Karyawan<strong> berhasil </strong> <?= $this->session->flashdata('msg'); ?>.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <h1>Daftar Karyawan</h1>

  <div class="row my-3">
    <div class="col-md-4">
      <form action="<?= base_url('owner/data_karyawan'); ?>" method="post">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Cari karyawan ..." name="keyword" autocomplete="off" autofocus>
          <div class="input-group-append">
            <input type="submit" class="btn btn-primary" name="cari" value="Cari">
          </div>
        </div>
      </form>
    </div>
    <div class="col-md-4">
      <a href="<?= base_url('owner/tambah'); ?>" class="btn btn-primary">Tambah Data Karyawan</a>
    </div>
  </div>

  <div class="row">
    <div class="col-md">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">Bidang</th>
            <th scope="col">Email</th>
            <th scope="col">No. HP</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php if (empty($karyawan)) : ?>
            <tr>
              <td colspan="5">
                <div class="alert alert-danger" role="alert">
                  Data Karyawan tidak dapat ditemukan!
                </div>
              </td>
            </tr>
          <?php endif; ?>
          <?php $i = 1; ?>
          <?php foreach ($bagian as $bag) : ?>
            <tr>
              <th scope="row"><?= ++$start; ?></th>
              <td><?= $bag['nama']; ?></td>
              <td><?= $bag['level']; ?></td>
              <td><?= $bag['email']; ?></td>
              <td><?= $bag['no_hp']; ?></td>
              <td>
                <a href="<?= base_url('owner/detail'); ?>/<?= $bag['id']; ?>" class="badge badge-success">Detail</a>
                <a href="<?= base_url('owner/ubah'); ?>/<?= $bag['id']; ?>" class="badge badge-warning">Ubah</a>
                <a href="<?= base_url('owner/hapus'); ?>/<?= $bag['id']; ?>" class="badge badge-danger" onclick="return confirm('Apakah Anda yakin akan menghapus Karyawan ini?');">Hapus</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      <?= $this->pagination->create_links(); ?>
    </div>
  </div>
</div>