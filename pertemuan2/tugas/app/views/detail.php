<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail User</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container mt-5">
        <h3>Detail User</h3>
        <ul class="list-group">
            <li class="list-group-item">
                <strong>Nama:</strong> <?= $data['user']['name']; ?>
            </li>
            <li class="list-group-item">
                <strong>Email:</strong> <?= $data['user']['email']; ?>
            </li>
        </ul>
        <a href="<?= BASEURL; ?>/user" class="btn btn-secondary mt-3">Kembali</a>
    </div>

    <!-- Bootstrap JS (optional, untuk komponen interaktif) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
