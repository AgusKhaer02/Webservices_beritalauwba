<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit data berita</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
    <h1>Edit Data Berita</h1>

    <div class="col-sm-4">
        <form action="aksi.php?aksi=edit&foto=<?= $_GET['foto']?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">ID Berita</label>
                <input type="text" name="id" id="" class="form-control" value="<?= $_GET['id']?>" readonly>
            </div>
            <div class="form-group">
                <label for="">Judul Berita</label>
                <input type="text" name="judul" id="" value="<?= $_GET['judul']?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Detail Berita</label>
                <input type="text" name="detail" id="" value="<?= $_GET['detail']?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Foto Berita</label>
                <p>Foto saat ini : <?= $_GET['foto']?></p>
                <input type="file" class="form-control" name="foto" id="">
            </div>

            <button style="margin-bottom:25px;" type="submit" class="btn btn-warning">Edit</button>
        </form>
    </div>
    
</body>
</html>