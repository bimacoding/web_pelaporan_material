<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Material_spesification extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$lv = $this->session->userdata('level');
		if ($lv=='1' || $lv='6' || $lv='8' || $lv='9') {
			cekAksesUser($lv, uri_string(),true);
		}else{
			cekAksesUser($lv, uri_string());
		}
	}

	function generateRandomString($length = 25) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ-_';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}

	function index()
	{
		$insertId = $this->generateRandomString();
		redirect('material_spesification/tambah_material_spesification/'.$insertId,'refresh');
	}

	function indeks()
	{
		$data['title'] = 'Semua material spesification';
		$data['record'] = $this->model_app->view_join_one('t_material_spesification','t_supplier','id_supplier','id_material_spesification','DESC');
		$this->template->load('layout/template','backend/mod_material_spesification/view',$data);
	}

	// function pending()
	// {
	// 	$data['title'] = 'Semua material_spesification Pending';
	// 	$data['record'] = $this->model_app->view_join_where('t_material_spesification','t_kat','id_kat',array('publish'=>'P'),'id_material_spesification','DESC');
	// 	$this->template->load('layout/template','backend/mod_material_spesification/view',$data);
	// }

	// function blokir()
	// {
	// 	$data['title'] = 'Semua material_spesification Diblokir';
	// 	$data['record'] = $this->model_app->view_join_where('t_material_spesification','t_kat','id_kat',array('publish'=>'N'),'id_material_spesification','DESC');
	// 	$this->template->load('layout/template','backend/mod_material_spesification/view',$data);
	// }

	function tambah_material_spesification(){
		if (isset($_POST['submit'])) {
			$config['upload_path'] = 'assets/uploads/file_material';
			$config['allowed_types'] = "gif|jpg|png|doc|docx|xls|xlsx|pdf";
			$config['max_size']  = '2000'; //Kb
			$config['encrypt_name'] = TRUE;
			$this->load->library('upload', $config);
			for ($i=1; $i <=2 ; $i++) { 
	            if(!empty($_FILES['filefoto'.$i]['name'])){
	                if(!$this->upload->do_upload('filefoto'.$i))
	                    $this->upload->display_errors();  
	                else
	                    $this->upload->do_upload('filefoto'.$i);
	                	$hasil[$i] = $this->upload->data();
	            }
	        }
			$data = array(
				'id_supplier' => $this->db->escape_str($this->input->post('a')),
				'pin' => $this->db->escape_str($this->input->post('b')),
				'tgl' => $this->db->escape_str($this->input->post('c')),
				'nama_item' => $this->db->escape_str($this->input->post('d')),
				'kategori' => $this->db->escape_str($this->input->post('e')),
				'tipe' => $this->db->escape_str($this->input->post('f')),
				'warna' => $this->db->escape_str($this->input->post('g')),
				'harga' => $this->db->escape_str($this->input->post('h')),
				'moq' => $this->db->escape_str($this->input->post('i')),
				'packaging' => $this->db->escape_str($this->input->post('j')),
				'tr_reference' => $this->db->escape_str($this->input->post('k')),
				'file' => $hasil[1]['file_name']!='' ? $hasil[1]['file_name'] : '',
				'file_product_spesification' => $hasil[2]['file_name']!='' ? $hasil[2]['file_name'] : '',
				'app_tipe_mesin' => $this->db->escape_str($this->input->post('l')),
				'app_detil_mesin' => $this->db->escape_str($this->input->post('m')),
				'ket' => $this->db->escape_str($this->input->post('n')),
				'id_asman' => $this->input->post('o'),
				'email_asman' => $this->input->post('p'),
				'id_man' => $this->input->post('q'),
				'email_man' => $this->input->post('r'),
				'id_chief' => $this->input->post('s'),
				'email_chief' => $this->input->post('t'),
			);
			
			$q = $this->model_app->update('t_material_spesification',$data,array('kode_material_spesification'=>$this->input->post('kode')));
			if ($q) {
				$this->session->set_flashdata('success', 'Data berhasil diproses!');
				logAct($this->session->userdata('id'),'Add material_spesification',$this->input->post('judul'));
				redirect('material_spesification/indeks','refresh');
			}else{
				$this->session->set_flashdata('error', 'Data gagal diproses!');
				redirect('material_spesification/indeks','refresh');
			}
		}else{
			$insertId = $this->uri->segment(3);
			recordUnique($insertId);
			$data['title'] = 'Tambah material spesification';
			$data['random'] = $insertId;
			$data['asman'] = $this->model_app->view_where('t_users',array('id_level'=>8))->result_array();
			$data['man'] = $this->model_app->view_where('t_users',array('id_level'=>6))->result_array();
			$data['chief'] = $this->model_app->view_where('t_users',array('id_level'=>9))->result_array();
			$data['supplier']   = $this->model_app->view('t_supplier')->result_array();
			$this->template->load('layout/template','backend/mod_material_spesification/add',$data);
		}
	}

	function ubah_material_spesification(){
		if (isset($_POST['submit'])) {
			$config['upload_path'] = 'assets/uploads/file_material';
			$config['allowed_types'] = "gif|jpg|png|doc|docx|xls|xlsx|pdf";
			$config['max_size']  = '2000'; //Kb
			$config['encrypt_name'] = TRUE;
			$this->load->library('upload', $config);
			for ($i=1; $i <=2 ; $i++) { 
	            if(!empty($_FILES['filefoto'.$i]['name'])){
	                if(!$this->upload->do_upload('filefoto'.$i))
	                    $this->upload->display_errors();  
	                else
	                    $this->upload->do_upload('filefoto'.$i);
	                	$hasil[$i] = $this->upload->data();
	            }
	        }

			$data = array(
				'id_supplier' => $this->db->escape_str($this->input->post('a')),
				'pin' => $this->db->escape_str($this->input->post('b')),
				'tgl' => $this->db->escape_str($this->input->post('c')),
				'nama_item' => $this->db->escape_str($this->input->post('d')),
				'kategori' => $this->db->escape_str($this->input->post('e')),
				'tipe' => $this->db->escape_str($this->input->post('f')),
				'warna' => $this->db->escape_str($this->input->post('g')),
				'harga' => $this->db->escape_str($this->input->post('h')),
				'moq' => $this->db->escape_str($this->input->post('i')),
				'packaging' => $this->db->escape_str($this->input->post('j')),
				'tr_reference' => $this->db->escape_str($this->input->post('k')),
				'file' => $hasil[1]['file_name']!='' ? $hasil[1]['file_name'] : $this->input->post('f1'),
				'file_product_spesification' => $hasil[2]['file_name']!='' ? $hasil[2]['file_name'] : $this->input->post('f2'),
				'app_tipe_mesin' => $this->db->escape_str($this->input->post('l')),
				'app_detil_mesin' => $this->db->escape_str($this->input->post('m')),
				'ket' => $this->db->escape_str($this->input->post('n')),
				'id_asman' => $this->input->post('o'),
				'email_asman' => $this->input->post('p'),
				'id_man' => $this->input->post('q'),
				'email_man' => $this->input->post('r'),
				'id_chief' => $this->input->post('s'),
				'email_chief' => $this->input->post('t'),
			);
			$this->sendEmailto($this->input->post('p'),$this->input->post('r'), $this->input->post('t'));
			$q = $this->model_app->update('t_material_spesification',$data,array('kode_material_spesification'=>$this->input->post('kode')));
			if ($q) {
				$this->session->set_flashdata('success', 'Data berhasil diproses!');
				logAct($this->session->userdata('id'),'Uabh material_spesification',$this->input->post('judul'));
				redirect('material_spesification/indeks','refresh');
			}else{
				$this->session->set_flashdata('error', 'Data gagal diproses!');
				redirect('material_spesification/indeks','refresh');
			}
		}else{
			$insertId 	   = $this->uri->segment(3);
			$data['title'] = 'Ubah material spesification';
			$data['random']= $insertId;
			$data['row']   = $this->model_app->edit('t_material_spesification',array('kode_material_spesification'=>$insertId))->row_array();
			$data['asman'] = $this->model_app->view_where('t_users',array('id_level'=>8))->result_array();
			$data['man'] = $this->model_app->view_where('t_users',array('id_level'=>6))->result_array();
			$data['chief'] = $this->model_app->view_where('t_users',array('id_level'=>9))->result_array();
			$data['supplier']   = $this->model_app->view('t_supplier')->result_array();
			$this->template->load('layout/template','backend/mod_material_spesification/edit',$data);
		}
	}

	function sendEmailto($assman = '',$man = '', $chief = '')
	{
		$more_email = array('','','email');
		$flt = array_filter($more_email);
		$arrval = array_values($flt);
		if (count($flt)>1) {
			$lsmail = $flt;
		}else{
			$lsmail = $arrval[0];
		}
		$temp ='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
					<html xmlns="http://www.w3.org/1999/xhtml">
					<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
					<meta name="viewport" content="width=320, initial-scale=1" />
					<title>Optimisdeveloper</title>
					<style type="text/css">
					#outlook a {
					padding: 0;
					}
					.ReadMsgBody {
					width: 100%;
					}
					.ExternalClass {
					width: 100%;
					}
					.ExternalClass,
					.ExternalClass p,
					.ExternalClass span,
					.ExternalClass font,
					.ExternalClass td,
					.ExternalClass div {
					line-height: 100%;
					}
					body, table, td, p, a, li, blockquote {
					-webkit-text-size-adjust: 100%;
					-ms-text-size-adjust: 100%;
					}
					table, td {
					mso-table-lspace: 0pt;
					mso-table-rspace: 0pt;
					}
					img {
					-ms-interpolation-mode: bicubic;
					}
					html,
					body,
					.body-wrap,
					.body-wrap-cell {
					margin: 0;
					padding: 0;
					background: #ffffff;
					font-family: Arial, Helvetica, sans-serif;
					font-size: 14px;
					color: #464646;
					text-align: left;
					}
					img {
					border: 0;
					line-height: 100%;
					outline: none;
					text-decoration: none;
					}
					table {
					border-collapse: collapse !important;
					}
					td, th {
					text-align: left;
					font-family: Arial, Helvetica, sans-serif;
					font-size: 14px;
					color: #464646;
					line-height:1.5em;
					}
					b a,
					.footer a {
					text-decoration: none;
					color: #464646;
					}
					a.blue-link {
					color: blue;
					text-decoration: underline;
					}
					td.center {
					text-align: center;
					}
					.left {
					text-align: left;
					}
					.body-padding {
					padding: 24px 40px 40px;
					}
					.border-bottom {
					border-bottom: 1px solid #D8D8D8;
					}
					table.full-width-gmail-android {
					width: 100% !important;
					}
					.stars {
					width: 55px;
					height: 55px;
					}
					.rating {
					width: 140px;
					font-weight: bold;
					}
					.header {
					font-weight: bold;
					font-size: 16px;
					line-height: 16px;
					height: 16px;
					padding-top: 19px;
					padding-bottom: 7px;
					}
					.header a {
					color: #464646;
					text-decoration: none;
					}
					.footer a {
					font-size: 12px;
					}
					</style>
					<style type="text/css" media="only screen and (max-width: 650px)">
					@media only screen and (max-width: 650px) {
					* {
					font-size: 16px !important;
					}
					img[class="stars"] {
					width: 35px !important;
					height: 35px !important;
					}
					td[class="rating"] {
					font-size: 12px !important;
					}
					table[class*="w320"] {
					width: 320px !important;
					}
					td[class="mobile-center"],
					div[class="mobile-center"] {
					text-align: center !important;
					}
					td[class*="body-padding"] {
					padding: 20px !important;
					}
					td[class="mobile"] {
					text-align: right;
					vertical-align: top;
					}
					}
					</style>
					</head>
					<body style="padding:0; margin:0; display:block; background:#ffffff; -webkit-text-size-adjust:none">
					<table border="0" cellpadding="0" cellspacing="0" width="100%">
					<tr>
					<td valign="top" align="left" width="100%" style="background:repeat-x url(https://www.filepicker.io/api/file/al80sTOMSEi5bKdmCgp2) #f9f8f8;">
					<center>
					<table class="w320 full-width-gmail-android" bgcolor="#f9f8f8" background="https://www.filepicker.io/api/file/al80sTOMSEi5bKdmCgp2" style="background-color:transparent" cellpadding="0" cellspacing="0" border="0" width="100%">
					<tr>
					<td width="100%" height="48" valign="top">
					<table class="full-width-gmail-android" cellspacing="0" cellpadding="0" border="0" width="100%">
					<tr>
					<td class="header center" width="100%">
					<a href="'.base_url().'">
					Menunggu Approval dari anda
					</a>
					</td>
					</tr>
					</table>
					</td>
					</tr>
					</table>
					<table cellspacing="0" cellpadding="0" width="100%" bgcolor="#ffffff">
					<tr>
					<td align="center">
					<center>
					<table class="w320" cellspacing="0" cellpadding="0" width="500">
					<tr>
					<td class="body-padding mobile-padding">
					<table cellpadding="0" cellspacing="0" width="100%">
					<tr>
					<td style="padding-bottom:20px;">
					Assalamualaikum wr.wb, <br>
					<br/>
					Urgent, sistem menginfokan bahwa request material menunggu approval dari anda.silahkan login atau cek pada backend website anda
					</td>
					</tr>
					</table>
					<table cellspacing="0" cellpadding="0" width="100%">
					<tr>
					<td>
					</td>
					</tr>
					<tr>
					<td>
					</td>
					</tr>
					</table>
					<table cellspacing="0" cellpadding="0" width="100%">
					<tr>
					<td class="left" style="text-align:left;">
					<br />
					<br />
					Terimakasih,
					</td>
					</tr>
					<tr>
					<td class="left" width="129" height="20" style="padding-top:10px; text-align:left;">
					<p>Sistem</p>
					</td>
					</tr>
					</table>
					</td>
					</tr>
					</table>
					</center>
					</td>
					</tr>
					</table>
					<table class="w320" bgcolor="#E5E5E5" cellpadding="0" cellspacing="0" border="0" width="100%">
					<tr>
					<td style="border-top:1px solid #B3B3B3;" align="center">
					</td>
					</tr>
					<tr>
					<td style="border-top:1px solid #B3B3B3; border-bottom:1px solid #B3B3B3;" align="center">
					</td>
					</tr>
					</table>
					</center>
					</td>
					</tr>
					</table>
					</body>
					</html>';

	        $dibuat = date("d-m-Y H:i:s");
	        $message      = $temp;
	        
	        
	        $this->load->library('email');
	        $this->email->from(email(), 'Memory Site');
	        $this->email->to($lsmail);
	        $this->email->cc('');
	        $this->email->bcc('');

	        $this->email->subject('Menunggu Tanggapan Anda');
	        $this->email->message($message);
	        $this->email->set_mailtype("html");
	        $this->email->send();
	        
	        $config['protocol'] = 'sendmail';
	        $config['mailpath'] = '/usr/sbin/sendmail';
	        $config['charset'] = 'utf-8';
	        $config['wordwrap'] = TRUE;
	        $config['mailtype'] = 'html';
	        $this->email->initialize($config);
	}


}

/* End of file Material_spesification.php */
/* Location: .//D/xampp/htdocs/project_pelaporan_material/app/controllers/admin/Material_spesification.php */