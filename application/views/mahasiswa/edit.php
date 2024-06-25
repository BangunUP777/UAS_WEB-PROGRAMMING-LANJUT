<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Mahasiswa</title>
    <style>
        .form-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 15px;
        }
        .form-group label {
            margin-bottom: 5px;
        }
        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group input[type="date"],
        .form-group input[type="file"] {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-group input[type="submit"] {
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .form-group input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Edit Mahasiswa</h2>
    <?php echo form_open_multipart('mahasiswa/update/'.$mahasiswa['id']); ?>
        <div class="form-group">
            <label for="nim">NIM:</label>
            <input type="text" name="nim" id="nim" value="<?php echo $mahasiswa['nim']; ?>">
        </div>
        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" name="nama" id="nama" value="<?php echo $mahasiswa['nama']; ?>">
        </div>
        <div class="form-group">
            <label for="alamat">Alamat:</label>
            <input type="text" name="alamat" id="alamat" value="<?php echo $mahasiswa['alamat']; ?>">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="<?php echo $mahasiswa['email']; ?>">
        </div>
        <div class="form-group">
            <label for="tempat_lahir">Tempat Lahir:</label>
            <input type="text" name="tempat_lahir" id="tempat_lahir" value="<?php echo $mahasiswa['tempat_lahir']; ?>">
        </div>
        <div class="form-group">
            <label for="tgl_lahir">Tanggal Lahir:</label>
            <input type="date" name="tgl_lahir" id="tgl_lahir" value="<?php echo $mahasiswa['tgl_lahir']; ?>">
        </div>
        <div class="form-group">
            <label for="agama">Agama:</label>
            <input type="text" name="agama" id="agama" value="<?php echo $mahasiswa['agama']; ?>">
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <input type="text" name="status" id="status" value="<?php echo $mahasiswa['status']; ?>">
        </div>
        <div class="form-group">
            <label for="foto">Foto:</label>
            <input type="file" name="foto" id="foto">
            <input type="hidden" name="old_foto" value="<?php echo $mahasiswa['foto']; ?>">
            <img src="<?php echo base_url('uploads/'.$mahasiswa['foto']); ?>" alt="Current Foto" style="max-width: 100px;">
        </div>
        <div class="form-group">
            <input type="submit" value="Update">
        </div>
    <?php echo form_close(); ?>
</body>
</html>
