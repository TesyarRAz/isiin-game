<main class="container my-5">
    <h4>Daftar Game</h4>
    <hr>

    <div class="row mt-3">
        <?php foreach ($games as $game) : ?>
            <div class="card col-lg-3 col-md-4 col-6">
                <img src="<?= base_url($game['gambar_game']) ?>" class="card-img-top img-fluid" alt="Gambar <?= $game['nama_game'] ?>">
                <div class="card-body">
                    <h5 class="card-title"><?= $game['nama_game'] ?></h5>
                    <p class="card-text"><?= $game['deskripsi_game'] ?></p>
                    <span class="text-muted small">Ukuran : <?= number_format($game['ukuran_game'], 0, ',', '.') ?> MB</span>

                    <div class="d-flex justify-content-end">
                        <button class="btn btn-sm btn-dark">
                            <i class="fas fa-fw fa-plus"></i>
                            Tambah
                        </button>
                    </div>
                </div>
            </div>
        <?php endforeach ?>

        <?php if (empty($games)) : ?>
            <div class="col text-center">
                Tidak ada game
            </div>
        <?php endif ?>
    </div>
</main>