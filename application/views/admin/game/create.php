<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Game</h1>
</div>

<form action="<?= site_url('admin/game/store') ?>" class="card card-body" method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="font-weight-bold" for="nama_game">Nama Game <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="nama_game" id="nama_game" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="font-weight-bold" for="id_kategori">Kategori <span class="text-danger">*</span></label>
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Pilih</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($kategori as $item) : ?>
                            <tr>
                                <td><?= $item['nama_kategori'] ?></td>
                                <td>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" id="kategori-<?= $item['id_kategori'] ?>">
                                        <label class="form-check-label" for="kategori-<?= $item['id_kategori'] ?>"></label>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="font-weight-bold" for="ukuran_game">Ukuran <span class="text-danger">*</span></label>
                <input type="integer" class="form-control" name="ukuran_game" id="ukuran_game" required> MB
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="font-weight-bold" for="gambar">Gambar <span class="text-danger">*</span></label>
                <input type="file" class="form-control" name="gambar" id="gambar" required>
            </div>
        </div>
    </div>
    <div class="d-flex">
        <button class="btn btn-primary ml-auto">
            <i class="fas fa-fw fa-save"></i>
            Simpan
        </button>
    </div>
</form>