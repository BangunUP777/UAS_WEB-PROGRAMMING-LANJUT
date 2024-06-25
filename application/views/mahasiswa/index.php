<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <style>
        .container {
            margin-top: 50px;
        }
        .table img {
            width: 100px;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Data Mahasiswa</h1>
        <div class="d-flex justify-content-between mb-3">
            <a href="<?php echo site_url('auth/logout'); ?>" class="btn btn-danger">Logout</a>
            <a href="<?php echo site_url('mahasiswa/add'); ?>" class="btn btn-success">Tambah Mahasiswa</a>
        </div>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Agama</th>
                    <th>Status</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($mahasiswa as $mhs): ?>
                    <tr>
                        <td><?php echo $mhs['id']; ?></td>
                        <td><?php echo $mhs['nim']; ?></td>
                        <td><?php echo $mhs['nama']; ?></td>
                        <td><?php echo $mhs['alamat']; ?></td>
                        <td><?php echo $mhs['email']; ?></td>
                        <td><?php echo $mhs['tempat_lahir']; ?></td>
                        <td><?php echo $mhs['tgl_lahir']; ?></td>
                        <td><?php echo $mhs['agama']; ?></td>
                        <td><?php echo $mhs['status']; ?></td>
                        <td><img src="<?php echo base_url('uploads/' . $mhs['foto']); ?>" alt="Foto Mahasiswa"></td>
                        <td>
                            <a href="<?php echo site_url('mahasiswa/edit/' . $mhs['id']); ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="<?php echo site_url('mahasiswa/delete/' . $mhs['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/popper.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
</body>
</html>
