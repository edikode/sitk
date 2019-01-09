<?php 

use App\Library\Commond;

function cekRiwayat($pegawai_id){
	$cek = new Commond();
	$data = $cek->cekRiwayat($pegawai_id);
	return $data->jumlah;
}

//parent kategori
function ParentKategori($id){
	$parent = new Commond();
	$data = $parent->ParentKategori($id);
	return $data;
}

?>