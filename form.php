<?php 
$frm = array(
		'a'=>'id_supplier',
		'b'=>'pin',
		'c'=>'tgl',
		'd'=>'nama_item',
		'e'=>'kategori',
		'f'=>'tipe',
		'g'=>'warna',
		'h'=>'harga',
		'i'=>'moq',
		'j'=>'packaging',
		'k'=>'tr_reference',
		'filefoto1'=>'file',
		'filefoto2'=>'file_product_spesification',
		'l'=>'app_tipe_mesin',
		'm'=>'app_detil_mesin',
		'n'=>'ket',
		'o'=>'id_asman',
		'p'=>'email_asman',
		'q'=>'id_man',
		'r'=>'email_man',
		's'=>'id_chief',
		't'=>'email_chief'
	);
foreach ($frm as $key => $value) {
	echo '
		<div class="form-group">
		    <label for="exampleInputEmail1">'.ucwords(str_replace('_', ' ', $value)).'</label>
		    <input type="text" class="form-control" name="'.$key.'" id="'.$value.'" placeholder="Masukan '.$value.'">
		</div>
	';
}
?>

