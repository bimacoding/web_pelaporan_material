<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Source extends CI_Controller {

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
	
	function index()
	{
		redirect('/','refresh');
	}

	function indeks()
	{
		$data['title']  = "Data source";
		$data['record'] = $this->model_app->view_ordering('t_source','id_source','DESC');
		$this->template->load('layout/template','backend/mod_source/view',$data);
	}

	function tambah_source()
	{
		if (isset($_POST['submit'])) {
			
			$data = array(
						'kode_source'		=> $this->db->escape_str($this->input->post('a')),
					);
			$q = $this->model_app->insert('t_source',$data);
			if ($q) {
				$this->session->set_flashdata('success', 'Data berhasil diproses!');
				logAct($this->session->userdata('id'),'Tambah Source',$this->input->post('a'));
				redirect('source/indeks','refresh');
			}else{
				$this->session->set_flashdata('error', 'Data gagal diproses!');
				redirect('source/indeks','refresh');
			}
		}else{
			$data['title'] = 'Tambah source ';
			$this->template->load('layout/template','backend/mod_source/add',$data);
		}
	}

	function ubah_source()
	{
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$data = array(
						'kode_source'		=> $this->db->escape_str($this->input->post('a')),
					);
			$where = array('id_source'=>$this->input->post('id'));
			$q = $this->model_app->update('t_source',$data,$where);
			if ($q) {
				$this->session->set_flashdata('success', 'Data berhasil diproses!');
				logAct($this->session->userdata('id'),'Ubah source',$this->input->post('a'));
				redirect('source/indeks','refresh');
			}else{
				$this->session->set_flashdata('error', 'Data gagal diproses!');
				redirect('source/indeks','refresh');
			}
		}else{
			$data['title'] = 'Ubah source';
			$data['row']   = $this->model_app->edit('t_source',array('id_source'=>$id))->row_array();
			$this->template->load('layout/template','backend/mod_source/edit',$data);
		}
	}

	function hapus_source()
	{
		$id = $this->uri->segment(3);
		$data = array('id_source'=>$id);
		$q = $this->model_app->delete('t_source',$data);
		if ($q) {
			$this->session->set_flashdata('success', 'Data berhasil diproses!');
			redirect('source/indeks','refresh');
		}else{
			$this->session->set_flashdata('error', 'Data gagal diproses!');
			redirect('source/indeks','refresh');
		}
	}


}

/* End of file Source.php */
/* Location: .//D/xampp/htdocs/project_pelaporan_material/app/controllers/admin/Source.php */