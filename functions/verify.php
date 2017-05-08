<?php

require("koneksi_ukt.php");
header('Content-Type: application/json');

if($_GET['q'] == 'akademik'){
    akademik($koneksi_ukt);
}else if($_GET['q'] == 'bidikmisi'){
    bidikmisi($koneksi_ukt);
}

function akademik($koneksi){
    $query = $koneksi->prepare("SELECT * FROM tb_user WHERE no_peserta='$_POST[nopes]'");
    $query->execute();
    $user = $query->fetch(PDO::FETCH_OBJ);

    $sql = "UPDATE tb_cmahasiswa SET ver_akademik='$_POST[verifikasi_akademik]', ket_akademik='$_POST[keterangan_akademik]' WHERE userid='$user->userid'";
    $query = $koneksi->prepare($sql);
    echo json_encode($query->execute());
}

function bidikmisi($koneksi){
    $query = $koneksi->prepare("SELECT * FROM tb_user WHERE no_peserta='$_POST[nopes]'");
    $query->execute();
    $user = $query->fetch(PDO::FETCH_OBJ);

    $sql = "UPDATE tb_cmahasiswa SET ver_bidikmisi='$_POST[verifikasi_bidikmisi]', ket_bidikmisi='$_POST[keterangan_bidikmisi]' WHERE userid='$user->userid'";
    $query = $koneksi->prepare($sql);
    echo json_encode($query->execute());
}