<?php 

use App\Library\Commond;

//untuk menu backend
function DataSetting($id){
	$setting = new Commond();
	$data = $setting->DataSetting($id);
	return $data;
}

//parent kategori
function ParentKategori($id){
	$parent = new Commond();
	$data = $parent->ParentKategori($id);
	return $data;
}

?>