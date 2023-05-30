<main class="container mt-5">
    <h4>Daftar Game</h4>
    <hr>

    <div class="row mt-3">
        <?php foreach ($games as $game): ?>
            <div class="col-lg-4">
                <div class="card h-100">
                    <div class="card-body h-100">

                    </div>
                </div>
            </div>
        <?php endforeach ?>

        <?php if (empty($games)): ?>
            <div class="col text-center">
                Tidak ada game
            </div>
        <?php endif ?>
    </div>
</main>