<!DOCTYPE html>
<html>
<head>
	<title>Cetak SPK</title>
	<style>
	table, td, th {
	  border: 1px solid black;
	  vertical-align: top;
	}

	table {
	  width: 100%;
	  border-collapse: collapse;
	}
	.square {
	  height: 20px;
	  width: 20px;
	  background-color: ;
	  border:1px solid #000;
	  display: inline-block;
	  /*margin-right: 75px;*/
	}
	</style>
</head>
<body onload="window.print()">
<!-- <body> -->
	<img src="<?=base_url().'assets/dist/banner.png'?>" alt="" style="width: 100%">
	<h5 style="margin-bottom: 5px;">I. GENERAL INFORMATION</h5>
	<table>
		<tr>
			<td>No.SPK</td>
			<td><?=$row['no_spk']?></td>
			<td>Process</td>
			<td><?=$row['proses']?></td>
		</tr>
		<tr>
			<td>Date</td>
			<td><?=$row['tgl']?></td>
			<td>Sub Process</td>
			<td><?=$row['sub_proses']?></td>
		</tr>
		<tr>
			<td>Sample Recevied Date</td>
			<td><?=$row['tgl_terima']?></td>
			<td>Source</td>
			<td><?=$row['kode_source']?></td>
		</tr>
		<tr>
			<td>Item Name/Code Supplier</td>
			<td><?=$row['nama_item']?></td>
			<td>Case</td>
			<td><?=$row['case']?></td>
		</tr>
		<tr>
			<td>Price</td>
			<td><?=$row['harga']?></td>
			<td width="150">PIC</td>
			<td width="200"><?=strtoupper($row['pic'])?></td>
		</tr>
		<tr>
			<td width="150">Supplier</td>
			<td width="200">
				<?=$row['nama_supplier']?><br>
				<?=$row['alamat_supplier']?><br>
				<?=$row['kota_supplier']?><br>
				<?=$row['nohp_supplier']?><br>
				<?=$row['fax_supplier']?>
			</td>
			<td>Est.Consumption</td>
			<td><?=$row['est_consumtion']?></td>
		</tr>
		<tr>
			<td>Contact Person</td>
			<td>
				<?=$row['cp_supplier']?><br>
				<?=$row['tlp_supplier']?><br>
				<?=$row['email_supplier']?>
			</td>
			<td>Est.Rencana pemakaian</td>
			<td><?=$row['est_rencana_pemakaian']?></td>
		</tr>
		<tr>
			<td>Country</td>
			<td><?=$row['kota_supplier']?></td>
			<td>Priority</td>
			<td><?=$row['prioritas']?></td>
		</tr>
	</table>
	<h5 style="margin-bottom: 5px;">II. DOCUMENT (<img src="<?=base_url().'assets/icons/cek.png'?>" width="15" alt="">)</h5>
	<div class="square">
		<?=$row['doc_option']=='Sample'?'<img src="'.base_url().'assets/icons/cek.png" width="20" alt="">':''?>
	</div><span>&nbsp;SAMPLE&nbsp;</span>
	<div class="square">
		<?=$row['doc_option']=='MSDS'?'<img src="'.base_url().'assets/icons/cek.png" width="20" alt="">':''?>
	</div><span style="bottom: 2px;">&nbsp;MSDS&nbsp;</span>
	<div class="square">
		<?=$row['doc_option']=='SVLK'?'<img src="'.base_url().'assets/icons/cek.png" width="20" alt="">':''?>
	</div><span style="bottom: 2px;">&nbsp;SVLK&nbsp;</span>
	<div class="square">
		<?=$row['doc_option']=='Quotation'?'<img src="'.base_url().'assets/icons/cek.png" width="20" alt="">':''?>
	</div><span style="bottom: 2px;">&nbsp;Quotation&nbsp;</span>
	<div class="square">
		<?=$row['doc_option']=='Test Report'?'<img src="'.base_url().'assets/icons/cek.png" width="20" alt="">':''?>
	</div><span style="bottom: 2px;">&nbsp;Test Report</span>
	<h5 style="margin-bottom: 5px;">III. OBJECTIVE</h5>
	<table>
		<tr>
			<td>
				<?= htmlspecialchars_decode(html_entity_decode($row['ket_objective'])) ?>
			</td>
		</tr>
	</table>
</body>
</html>