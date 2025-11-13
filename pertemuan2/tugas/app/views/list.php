<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar User</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <?php Flasher::flash(); ?>

    <div class="row mb-3">
        <div class="col-lg-6">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#formModal">
                Tambah Data User
            </button>
        </div>
    </div>

    <h3>Daftar User</h3>
    <ul class="list-group">
        <?php foreach ($data['users'] as $user) : ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <?= $user['name']; ?>
                <div>
                    <a href="<?= BASEURL; ?>/user/detail/<?= $user['id']; ?>" class="badge bg-primary text-decoration-none">Detail</a>
                    <a href="<?= BASEURL; ?>/user/hapus/<?= $user['id']; ?>" class="badge bg-danger text-decoration-none" onclick="return confirm('Hapus data?');">Hapus</a>
                    <!-- Tombol Ubah -->
                    <button type="button" class="badge bg-warning border-0" 
                            data-bs-toggle="modal" 
                            data-bs-target="#formModalEdit<?= $user['id']; ?>">
                        Ubah
                    </button>
                </div>
            </li>

            <!-- Modal Ubah per User -->
            <div class="modal fade" id="formModalEdit<?= $user['id']; ?>" tabindex="-1" aria-labelledby="formModalEditLabel<?= $user['id']; ?>" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="formModalEditLabel<?= $user['id']; ?>">Ubah Data User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                  </div>
                  <form action="<?= BASEURL; ?>/user/ubah" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="id" value="<?= $user['id']; ?>">

                        <div class="mb-3">
                            <label for="nama<?= $user['id']; ?>" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama<?= $user['id']; ?>" name="nama" value="<?= $user['name']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="email<?= $user['id']; ?>" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email<?= $user['id']; ?>" name="email" value="<?= $user['email']; ?>" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-warning">Ubah</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
        <?php endforeach; ?>
    </ul>

    <!-- Modal Tambah Data -->
    <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Tambah Data User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= BASEURL; ?>/user/tambah" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0
