<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Spk extends CI_Controller {

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

	public function cetak()
	{
		$data['title']  = "Data spk";
		$data['row'] = $this->model_app->view_two_join_wheres('t_spk','t_source','t_supplier','id_source','id_supplier',array('id_spk'=>$this->uri->segment(3)),'id_spk','DESC')->row_array();
		$this->load->view('backend/mod_spk/cetak', $data, FALSE);
	}
	
	function index()
	{
		redirect('/','refresh');
	}

	function indeks()
	{
		$data['title']  = "Data spk";
		$data['record'] = $this->model_app->view_ordering('t_spk','id_spk','DESC');
		$this->template->load('layout/template','backend/mod_spk/view',$data);
	}

	function tambah_spk()
	{
		if (isset($_POST['submit'])) {
			$hasil = array();
			$config['upload_path'] = 'assets/uploads/spk';
			$config['allowed_types'] = 'gif|jpg|png';
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
				'no_spk' => $this->db->escape_str($this->input->post('a')),
				'tgl' => $this->input->post('b'),
				'tgl_terima' => $this->input->post('c'),
				'id_source' => $this->db->escape_str($this->input->post('d')),
				'kode_item' => $this->input->post('e'),
				'nama_item' => $this->input->post('f'),
				'harga' => $this->input->post('g'),
				'id_supplier' => $this->db->escape_str($this->input->post('h')),
				'proses' => $this->db->escape_str($this->input->post('i')),
				'sub_proses' => $this->db->escape_str($this->input->post('j')),
				'case' => $this->db->escape_str($this->input->post('k')),
				'pin' => $this->db->escape_str($this->input->post('l')),
				'pic' => $this->db->escape_str($this->input->post('m')),
				'est_consumtion' => $this->db->escape_str($this->input->post('n')),
				'est_rencana_pemakaian' => $this->db->escape_str($this->input->post('o')),
				'prioritas' => $this->db->escape_str($this->input->post('p')),
				'visual' => cetak($this->input->post('q')),
				'aplikasi' => cetak($this->input->post('r')),
				'testing' => cetak($this->input->post('s')),
				'ket' => cetak($this->input->post('t')),
				'ket_backgroun' => $this->db->escape_str($this->input->post('u')),
				'file_background' => $hasil[1]['file_name']!='' ? $hasil[1]['file_name'] : '',
				'ket_objective' => $this->db->escape_str($this->input->post('v')),
				'file_objective' => $hasil[2]['file_name']!='' ? $hasil[2]['file_name'] : '',
				'doc_option' => $this->db->escape_str($this->input->post('w')),
				'tipe' => $this->db->escape_str($this->input->post('x')),
				'tipe_option' => $this->db->escape_str($this->input->post('y')),

			);
			$q = $this->model_app->insert('t_spk',$data);
			if ($q) {
				$this->session->set_flashdata('success', 'Data berhasil diproses!');
				logAct($this->session->userdata('id'),'Tambah user group',$this->input->post('a'));
				redirect('spk/indeks','refresh');
			}else{
				$this->session->set_flashdata('error', 'Data gagal diproses!');
				redirect('spk/indeks','refresh');
			}
		}else{
			$data['title'] = 'Tambah spk ';
			$data['source']   = $this->model_app->view('t_source')->result_array();
			$data['supplier']   = $this->model_app->view('t_supplier')->result_array();
			$this->template->load('layout/template','backend/mod_spk/add',$data);
		}
	}

	function ubah_spk()
	{
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$hasil = array();
			$config['upload_path'] = 'assets/uploads/spk';
			$config['allowed_types'] = 'gif|jpg|png';
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
				'no_spk' => $this->db->escape_str($this->input->post('a')),
				'tgl' => $this->input->post('b'),
				'tgl_terima' => $this->input->post('c'),
				'id_source' => $this->db->escape_str($this->input->post('d')),
				'kode_item' => $this->input->post('e'),
				'nama_item' => $this->input->post('f'),
				'harga' => $this->input->post('g'),
				'id_supplier' => $this->db->escape_str($this->input->post('h')),
				'proses' => $this->db->escape_str($this->input->post('i')),
				'sub_proses' => $this->db->escape_str($this->input->post('j')),
				'case' => $this->db->escape_str($this->input->post('k')),
				'pin' => $this->db->escape_str($this->input->post('l')),
				'pic' => $this->db->escape_str($this->input->post('m')),
				'est_consumtion' => $this->db->escape_str($this->input->post('n')),
				'est_rencana_pemakaian' => $this->db->escape_str($this->input->post('o')),
				'prioritas' => $this->db->escape_str($this->input->post('p')),
				'visual' => cetak($this->input->post('q')),
				'aplikasi' => cetak($this->input->post('r')),
				'testing' => cetak($this->input->post('s')),
				'ket' => cetak($this->input->post('t')),
				'ket_backgroun' => $this->db->escape_str($this->input->post('u')),
				'file_background' => $hasil[1]['file_name']!='' ? $hasil[1]['file_name'] : $this->input->post('f1'),
				'ket_objective' => $this->db->escape_str($this->input->post('v')),
				'file_objective' => $hasil[2]['file_name']!='' ? $hasil[2]['file_name'] : $this->input->post('f2'),
				'doc_option' => $this->db->escape_str($this->input->post('w')),
				'tipe' => $this->db->escape_str($this->input->post('x')),
				'tipe_option' => $this->db->escape_str($this->input->post('y')),
			);
			$where = array('id_spk'=>$this->input->post('id'));
			$q = $this->model_app->update('t_spk',$data,$where);
			if ($q) {
				$this->session->set_flashdata('success', 'Data berhasil diproses!');
				logAct($this->session->userdata('id'),'Ubah user group',$this->input->post('a'));
				redirect('spk/indeks','refresh');
			}else{
				$this->session->set_flashdata('error', 'Data gagal diproses!');
				redirect('spk/indeks','refresh');
			}
		}else{
			$data['title'] = 'Ubah spk';
			$data['row']   = $this->model_app->edit('t_spk',array('id_spk'=>$id))->row_array();
			$data['source']   = $this->model_app->view('t_source')->result_array();
			$data['supplier']   = $this->model_app->view('t_supplier')->result_array();
			$this->template->load('layout/template','backend/mod_spk/edit',$data);
		}
	}

	function hapus_spk()
	{
		$id = $this->uri->segment(3);
		$data = array('id_spk'=>$id);
		$q = $this->model_app->delete('t_spk',$data);
		if ($q) {
			$this->session->set_flashdata('success', 'Data berhasil diproses!');
			redirect('spk/indeks','refresh');
		}else{
			$this->session->set_flashdata('error', 'Data gagal diproses!');
			redirect('spk/indeks','refresh');
		}
	}

	
}

/* End of file Spk.php */
/* Location: .//D/xampp/htdocs/project_pelaporan_material/app/controllers/admin/Spk.php */