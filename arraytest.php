<?php 
	$more_email = array('','','email');
	$flt = array_filter($more_email);
	$arrval = array_values($flt);
	if (count($flt)>1) {
		$lsmail = $flt;
	}else{
		$lsmail = $arrval[0];
	}

	print_r($lsmail);
?>