<?php
include_once "connection.php";

if ($_GET['aksi'] == "insert") {
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $detail = $_POST['detail'];


    $target_dir = "images/";
    $target_file = $target_dir. basename($_FILES['foto']['name']);
    $filename = basename($_FILES['foto']['name']);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) {
        echo "The file".basename($_FILES['foto']['name'])." has been uploaded.";
    }else {
        echo "Sorry, there was an error uploading your file";
    }

    $execute = mysqli_query($conn, "INSERT INTO tb_berita(id_berita,judul_berita,detail_berita,foto_berita) VALUES ('$id','$judul','$detail','$filename')") or die(mysqli_error($conn));

    if ($execute) {
        echo "
        <script>
            alert('Data berhasil ditambahkan');
            window.location.href = 'index.php';
        </script>
        ";
    }
}elseif ($_GET['aksi'] == "delete") {
    $id = $_GET['id'];
    $execute = mysqli_query($conn,"DELETE FROM tb_berita WHERE id_berita='$id'")or die(mysqli_error($conn));

    if ($execute) {
        echo "
        <script>
            alert('Data berhasil dihapus');
            window.location.href = 'index.php';
        </script>
        ";
    }
}elseif ($_GET['aksi'] == "edit") {
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $detail = $_POST['detail'];


    $target_dir = "images/";
    $target_file = $target_dir. basename($_FILES['foto']['name']);
    $filename = basename($_FILES['foto']['name']) ? basename($_FILES['foto']['name']) : $_GET['foto'];
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) {
        echo "The file".basename($_FILES['foto']['name'])." has been uploaded.";
    }else {
        echo "Sorry, there was an error uploading your file";
    }

    $execute = mysqli_query($conn, "UPDATE tb_berita SET judul_berita='$judul', detail_berita='$detail', foto_berita='$filename' WHERE id_berita='$id'") or die(mysqli_error($conn));

    if ($execute) {
        echo "
        <script>
            alert('Data berhasil diubahkan');
            window.location.href = 'index.php';
        </script>
        ";
    }
}
?>