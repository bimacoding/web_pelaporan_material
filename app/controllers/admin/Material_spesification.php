<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Material_spesification extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$lv = $this->session->userdata('level');
		if ($lv=='1') {
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


}

/* End of file Material_spesification.php */
/* Location: .//D/xampp/htdocs/project_pelaporan_material/app/controllers/admin/Material_spesification.php */