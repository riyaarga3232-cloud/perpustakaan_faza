<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <title>Daftar Anggota</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-size: 14px;
            background-color: var(--bs-body-bg);
        }

        .card {
            border-radius: 10px;
        }

        h4 {
            font-size: 18px;
        }

        table th, table td {
            vertical-align: middle;
            font-size: 14px;
        }

        .btn-action {
            width: 80px;
            font-size: 13px;
        }

        .toggle-btn {
            min-width: 120px;
        }
    </style>
</head>

<body>

<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="mb-0">📋 Daftar Anggota</h4>

                <div class="d-flex gap-2">
                    <button id="themeToggle" class="btn btn-outline-secondary toggle-btn">
                        🌙 Dark Mode
                    </button>

                    <a href="tambah_anggota.php" class="btn btn-success">
                        + Tambah
                    </a>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-hover text-center">
                    <thead class="table-primary">
                        <tr>
                            <th width="50">No</th>
                            <th>NIS</th>
                            <th class="text-start">Nama</th>
                            <th>Kelas</th>
                            <th width="190">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no = 1;
                    $data = mysqli_query($conn, "SELECT * FROM anggota");
                    while($d = mysqli_fetch_array($data)){
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $d['nis']; ?></td>
                            <td class="text-start"><?= $d['nama']; ?></td>
                            <td><?= $d['kelas']; ?></td>
                            <td>
                                <a href="edit_anggota.php?id=<?= $d['id_anggota']; ?>"
                                   class="btn btn-warning btn-sm btn-action">
                                    Edit
                                </a>
                                <a href="hapus_anggota.php?id=<?= $d['id_anggota']; ?>"
                                   class="btn btn-danger btn-sm btn-action"
                                   onclick="return confirm('Yakin ingin menghapus data ini?')">
                                    Hapus
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    const toggleBtn = document.getElementById('themeToggle');
    const html = document.documentElement;

    toggleBtn.addEventListener('click', () => {
        const theme = html.getAttribute('data-bs-theme');
        if (theme === 'dark') {
            html.setAttribute('data-bs-theme', 'light');
            toggleBtn.innerHTML = '☀️ Light Mode';
        } else {
            html.setAttribute('data-bs-theme', 'dark');
            toggleBtn.innerHTML = '🌙 Dark Mode';
        }
    });
</script>

</body>
</html>
