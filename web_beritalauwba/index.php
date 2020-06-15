<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEB API Berita Lauwba</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
    <h1>WEB API Berita Lauwba</h1>

    <!--  form input data berita -->
    <div class="col-sm-4">
        <form action="aksi.php?aksi=insert" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">ID Berita</label>
                <input type="text" class="form-control" name="id" id="" required>
            </div>
            <div class="form-group">
                <label for="">Judul Berita</label>
                <input type="text" class="form-control" name="judul" id="" required>
            </div>
            <div class="form-group">
                <label for="">Detail Berita</label>
                <input type="text" class="form-control" name="detail" id="" required>
            </div>
            <div class="form-group">
                <label for="">Foto Berita</label>
                <input type="file" class="form-control" name="foto" id="" required>
            </div>

            <button style="margin-bottom:25px;" class="btn btn-success">Save</button>
        </form>
    </div>

    <!-- Tabel data berita -->
    <table class="table table-stripped table-bordered" width="100">
        <thead>
            <tr>
                <th>ID Berita</th>
                <th>Judul Berita</th>
                <th>Detail Berita</th>
                <th>Tanggal Input</th>
                <th>Foto Berita</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include_once("connection.php");

            $query = mysqli_query($conn, "SELECT id_berita,judul_berita,detail_berita,DATE_FORMAT(tgl_input, '%m/%d/%Y') as tgl_input,foto_berita FROM tb_berita ORDER BY STR_TO_DATE('tgl_input','%m/%d/%Y')");

            while ($data = mysqli_fetch_array($query)) {
            ?>
            <tr>
                <td><?= $data['id_berita']?></td>
                <td><?= $data['judul_berita']?></td>
                <td><?= $data['detail_berita']?></td>
                <td><?= $data['tgl_input']?></td>
                <td>
                    <img width="100" height="100" src="images/<?= $data['foto_berita']?>" alt="<?= $data['foto_berita']?>">
                </td>
                <td>
                    <a href="aksi.php?aksi=delete&id=<?= $data['id_berita']?>" class="btn btn-danger" onclick="return confirm('Apakah anda akan hapus data ini?')">Delete</a>
                    <a href="editform.php?id=<?= $data['id_berita']?>&judul=<?= $data['judul_berita']?>&detail=<?= $data['detail_berita']?>&tanggal=<?= $data['tgl_input']?>&foto=<?= $data['foto_berita']?>" class="btn btn-warning">Edit</a>
                </td>
            </tr>
            <?php              
            }
            ?>
        </tbody>
    </table>
</body>
</html>