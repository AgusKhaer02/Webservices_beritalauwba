<?php

if (isset($_GET['cari']) && $_GET['cari'] == "1") {
    if (isset($_GET['judul']) && $_GET['judul'] != null) {
        $judul = $_GET['judul'];

        require_once('connection.php');
        $result = array();
        $query = mysqli_query($conn,"SELECT id_berita,judul_berita,detail_berita,DATE_FORMAT(tgl_input, '%d/%m/%Y') AS tgl_input,foto_berita FROM tb_berita WHERE judul_berita LIKE '%$judul%' ORDER BY tgl_input DESC");

        if (mysqli_num_rows($query) > 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                $result[] = $row;
            }
        } else {
            $message = "Data tidak ditemukan";
        }
        echo json_encode(array('result' => $result));
        
    } else {
        $message = "Data yang diberikan tidak valid, silahkan coba lagi";        
    }
} else {
    require_once('connection.php');
    $result = array();
    $query = mysqli_query($conn,"SELECT id_berita,judul_berita,detail_berita,DATE_FORMAT(tgl_input, '%d/%m/%Y') AS tgl_input,foto_berita FROM tb_berita ORDER BY tgl_input DESC");

    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
            $result[] = $row;
        }
    } else {
        $message = "Data tidak ditemukan";
    }
    echo json_encode(array('result' => $result));
}

?>