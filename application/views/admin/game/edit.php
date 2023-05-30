<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Game</h1>
</div>

<form action="<?= site_url('admin/game/update/' . $id) ?>" class="card card-body" method="POST">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="font-weight-bold" for="judul_buku">Judul Buku <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="judul_buku" id="judul_buku" value="<?= $judul_buku ?>" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="font-weight-bold" for="id_kategori">Kategori <span class="text-danger">*</span></label>
                <select class="form-control" name="id_kategori" id="id_kategori" required>
                    <?php foreach ($kategori as $item) : ?>
                        <option value="<?= $item['id_kategori'] ?>" <?= $id_kategori == $item['id_kategori'] ? 'selected' : '' ?>><?= $item['nama_kategori'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="font-weight-bold" for="pengarang">Pengarang <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="pengarang" id="pengarang" value="<?= $pengarang ?>" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="font-weight-bold" for="penerbit">Penerbit <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="penerbit" id="penerbit" value="<?= $penerbit ?>" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="font-weight-bold" for="tahun_terbit">Tahun Terbit <span class="text-danger">*</span></label>
                <input type="number" class="form-control" name="tahun_terbit" id="tahun_terbit" value="<?= $tahun_terbit ?>" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="font-weight-bold" for="isbn">ISBN <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="isbn" id="isbn" value="<?= $isbn ?>" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="font-weight-bold" for="stok">Stok <span class="text-danger">*</span></label>
                <input type="number" class="form-control" name="stok" id="stok" value="<?= $stok ?>" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="font-weight-bold" for="dipinjam">Dipinjam <span class="text-danger">*</span></label>
                <input type="number" class="form-control" name="dipinjam" id="dipinjam" value="<?= $dipinjam ?>" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="font-weight-bold" for="dibooking">Dibooking <span class="text-danger">*</span></label>
                <input type="number" class="form-control" name="dibooking" id="dibooking" value="<?= $dibooking ?>" required>
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