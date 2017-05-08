<?php
require 'functions/koneksi_ukt.php';
session_start();

function cek(){
	$nopes = $_POST['no_peserta'];
	 $query = "SELECT tb_user.no_peserta, tb_cmahasiswa.nama_mahasiswa, ref_fakultas.nama as fakultas, 
        ref_prodi.nama as prodi, ref_ukt.besar_ukt as ukt
         FROM tb_user, tb_cmahasiswa, ref_fakultas, ref_prodi, ref_ukt
         WHERE tb_user.userid=tb_cmahasiswa.userid 
         AND tb_cmahasiswa.fakultas=ref_fakultas.kode
         AND tb_cmahasiswa.prodi = ref_prodi.kode
         AND tb_cmahasiswa.golongan_id = ref_ukt.id_golongan
         AND no_peserta=$nopes";

	$stmt = $koneksi_ukt->prepare($query);
	$stmt->execute();

	$row = $stmt->fetch();

	header("Location: index.php");
}