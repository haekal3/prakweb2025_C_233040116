<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['judul']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: #f8f9fa;">

    <!-- ===== HEADER / NAVBAR ===== -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background: linear-gradient(135deg, #28a745 0%, #20c997 100%);">
        <div class="container">
            <a class="navbar-brand fw-bold" href="<?= BASEURL; ?>">Website PHP(MVC)</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <a class="nav-link <?= ($data['judul'] == 'Home') ? 'active' : ''; ?>" href="<?= BASEURL; ?>">Home</a>
                    <a class="nav-link <?= ($data['judul'] == 'Daftar User') ? 'active' : ''; ?>" href="<?= BASEURL; ?>/user">Users</a>
                </ul>
            </div>
        </div>
    </nav>
