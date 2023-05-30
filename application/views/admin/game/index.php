<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Kelola Game</h1>
    <a href="<?= site_url('admin/game/create') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i>
        Tambah Game
    </a>
</div>

<div class="card card-body">
    <div class="table-responsive-sm">
        <table class="table table-bordered">
            <thead class="thead-primary">
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Gambar</th>
                    <th>Ukuran</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $count = 0; ?>
                <?php foreach ($games as $item) : ?>
                    <tr>
                        <td><?= ++$count ?></td>
                        <td><?= $item['nama_game'] ?></td>
                        <td><span class="badge badge-primary"><?= $item['kategori'] ?></span></td>
                        <td><?= $item['gambar_game'] ?></td>
                        <td><?= $item['ukuran_game'] ?></td>
                        <td><?= $item['deskripsi'] ?></td>
                        <td>
                            <div>
                                <a href="<?= site_url('admin/game/edit' . $item['id']) ?>" class="btn btn-sm btn-primary">
                                    <i class="fas fa-fw fa-pencil-alt"></i>
                                    Edit
                                </a>
                                <a onclick="return confirm('Yakin ingin dihapus?')" href="<?= site_url('admin/game/destroy/' . $item['id']) ?>" class="btn btn-sm btn-danger">
                                    <i class="fas fa-fw fa-trash"></i>
                                    Hapus
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach ?>

                <?php if ($count == 0) : ?>
                    <tr>
                        <td colspan="9" class="text-center">
                            Belum ada data
                        </td>
                    </tr>
                <?php endif ?>
            </tbody>
        </table>
    </div>
</div>