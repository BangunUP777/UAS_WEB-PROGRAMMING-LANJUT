<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Mahasiswa</title>
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
    <h2>Tambah Mahasiswa</h2>
    <?php echo form_open_multipart('mahasiswa/add_action'); ?>
        <div class="form-group">
            <label for="nim">NIM:</label>
            <input type="text" name="nim" id="nim">
        </div>
        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" name="nama" id="nama">
        </div>
        <div class="form-group">
            <label for="alamat">Alamat:</label>
            <input type="text" name="alamat" id="alamat">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email">
        </div>
        <div class="form-group">
            <label for="tempat_lahir">Tempat Lahir:</label>
            <input type="text" name="tempat_lahir" id="tempat_lahir">
        </div>
        <div class="form-group">
            <label for="tgl_lahir">Tanggal Lahir:</label>
            <input type="date" name="tgl_lahir" id="tgl_lahir">
        </div>
        <div class="form-group">
            <label for="agama">Agama:</label>
            <input type="text" name="agama" id="agama">
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <input type="text" name="status" id="status">
        </div>
        <div class="form-group">
            <label for="foto">Foto:</label>
            <input type="file" name="foto" id="foto">
        </div>
        <div class="form-group">
            <input type="submit" value="Tambah">
        </div>
    <?php echo form_close(); ?>
</body>
</html>
