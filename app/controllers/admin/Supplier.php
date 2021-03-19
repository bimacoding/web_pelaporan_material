<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {

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
		$data['title']  = "Data supplier";
		$data['record'] = $this->model_app->view_ordering('t_supplier','id_supplier','DESC');
		$this->template->load('layout/template','backend/mod_supplier/view',$data);
	}

	function tambah_supplier()
	{
		if (isset($_POST['submit'])) {
			
			$data = array(
						'kode_supplier' => $this->mylibrary->kdauto('t_supplier','id_supplier','SUP'),
						'nama_supplier' => $this->db->escape_str($this->input->post('a')),
						'alamat_supplier' => $this->db->escape_str($this->input->post('b')),
						'cp_supplier' => $this->db->escape_str($this->input->post('c')),
						'nohp_supplier' => $this->db->escape_str($this->input->post('d')),
						'kota_supplier' => $this->db->escape_str($this->input->post('e')),
						'tlp_supplier' => $this->db->escape_str($this->input->post('f')),
						'fax_supplier' => $this->db->escape_str($this->input->post('g')),
						'email_supplier' => $this->db->escape_str($this->input->post('h'))
					);
			$q = $this->model_app->insert('t_supplier',$data);
			if ($q) {
				$this->session->set_flashdata('success', 'Data berhasil diproses!');
				logAct($this->session->userdata('id'),'Tambah user group',$this->input->post('a'));
				redirect('supplier/indeks','refresh');
			}else{
				$this->session->set_flashdata('error', 'Data gagal diproses!');
				redirect('supplier/indeks','refresh');
			}
		}else{
			$data['title'] = 'Tambah supplier ';
			$this->template->load('layout/template','backend/mod_supplier/add',$data);
		}
	}

	function ubah_supplier()
	{
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$data = array(
						'nama_supplier' => $this->db->escape_str($this->input->post('a')),
						'alamat_supplier' => $this->db->escape_str($this->input->post('b')),
						'cp_supplier' => $this->db->escape_str($this->input->post('c')),
						'nohp_supplier' => $this->db->escape_str($this->input->post('d')),
						'kota_supplier' => $this->db->escape_str($this->input->post('e')),
						'tlp_supplier' => $this->db->escape_str($this->input->post('f')),
						'fax_supplier' => $this->db->escape_str($this->input->post('g')),
						'email_supplier' => $this->db->escape_str($this->input->post('h'))

					);
			$where = array('id_supplier'=>$this->input->post('id'));
			$q = $this->model_app->update('t_supplier',$data,$where);
			if ($q) {
				$this->session->set_flashdata('success', 'Data berhasil diproses!');
				logAct($this->session->userdata('id'),'Ubah user group',$this->input->post('a'));
				redirect('supplier/indeks','refresh');
			}else{
				$this->session->set_flashdata('error', 'Data gagal diproses!');
				redirect('supplier/indeks','refresh');
			}
		}else{
			$data['title'] = 'Ubah supplier';
			$data['row']   = $this->model_app->edit('t_supplier',array('id_supplier'=>$id))->row_array();
			$this->template->load('layout/template','backend/mod_supplier/edit',$data);
		}
	}

	function hapus_supplier()
	{
		$id = $this->uri->segment(3);
		$data = array('id_supplier'=>$id);
		$q = $this->model_app->delete('t_supplier',$data);
		if ($q) {
			$this->session->set_flashdata('success', 'Data berhasil diproses!');
			redirect('supplier/indeks','refresh');
		}else{
			$this->session->set_flashdata('error', 'Data gagal diproses!');
			redirect('supplier/indeks','refresh');
		}
		// $dt = $this->model_app->view_where('t_level',$data)->row_array();
		// logAct($this->session->userdata('id'),'Hapus user group',$dt['nama_level']);
	}

}

/* End of file Supplier.php */
/* Location: .//D/xampp/htdocs/project_pelaporan_material/app/controllers/admin/Supplier.php */