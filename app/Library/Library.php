<?php 
use Illuminate\Support\Facades\Cache;

date_default_timezone_set('Asia/Jakarta');

function set_active( $route ) {
    if( is_array( $route ) ){
        return in_array(Request::path(), $route) ? 'active open' : '';
    }
    return Request::path() == $route ? 'active open' : '';
}

// function ceklink( $route ) {
//     if( is_array( $route ) ){
//         return in_array(Request::path(), $route) ? 'true' : '';
//     }
//     return Request::path() == $route ? 'true' : '';
// }

function tgl_id($tanggal){
	$tanggal2 = substr($tanggal,8,2);
	$bulan = substr($tanggal,5,2);
	$tahun = substr($tanggal,0,4);
	return $tanggal2.'-'.$bulan.'-'.$tahun;		 
}

function tgl_en($tanggal){
	$tanggal2 = substr($tanggal,0,2);
	$bulan = substr($tanggal,3,2);
	$tahun = substr($tanggal,6,4);
	return $tahun.'-'.$bulan.'-'.$tanggal2;		 
}

function tgl_slash($tanggal){
    $tanggal2 = substr($tanggal,8,2);
    $bulan = substr($tanggal,5,2);
    $tahun = substr($tanggal,0,4);
    return $tanggal2.'/'.$bulan.'/'.$tahun;      
}

?>