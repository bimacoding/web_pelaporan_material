<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller
{
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
		$data['title']  = "Data Kategori";
		$data['record'] = $this->model_app->view_ordering('t_kat','id_kat','DESC');
		$this->template->load('layout/template','backend/mod_kat/view',$data);
	}

	function tambah_kategori()
	{
		if (isset($_POST['submit'])) {
			
			$data = array(
						'seo_kat'		=> seo_title($this->input->post('b')),
						'judul_kat' 	=> $this->db->escape_str($this->input->post('b')),
						'jenis'  		=> $this->db->escape_str($this->input->post('c')),
						'publish_kat'  	=> $this->db->escape_str($this->input->post('d'))

					);
			$q = $this->model_app->insert('t_kat',$data);
			if ($q) {
				$this->session->set_flashdata('success', 'Data berhasil diproses!');
				logAct($this->session->userdata('id'),'Tambah user group',$this->input->post('a'));
				redirect('kategori/indeks','refresh');
			}else{
				$this->session->set_flashdata('error', 'Data gagal diproses!');
				redirect('kategori/indeks','refresh');
			}
		}else{
			$data['title'] = 'Tambah Kategori ';
			$this->template->load('layout/template','backend/mod_kat/add',$data);
		}
	}

	function ubah_kategori()
	{
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$data = array(
						'seo_kat'		=> $this->db->escape_str($this->input->post('a')),
						'judul_kat' 	=> $this->db->escape_str($this->input->post('b')),
						'jenis'  		=> $this->db->escape_str($this->input->post('c')),
						'publish_kat'  	=> $this->db->escape_str($this->input->post('d'))

					);
			$where = array('id_kat'=>$this->input->post('id'));
			$q = $this->model_app->update('t_kat',$data,$where);
			if ($q) {
				$this->session->set_flashdata('success', 'Data berhasil diproses!');
				logAct($this->session->userdata('id'),'Ubah user group',$this->input->post('a'));
				redirect('kategori/indeks','refresh');
			}else{
				$this->session->set_flashdata('error', 'Data gagal diproses!');
				redirect('kategori/indeks','refresh');
			}
		}else{
			$data['title'] = 'Ubah Kategori';
			$data['row']   = $this->model_app->edit('t_kat',array('id_kat'=>$id))->row_array();
			$this->template->load('layout/template','backend/mod_kat/edit',$data);
		}
	}

	function hapus_kategori()
	{
		$id = $this->uri->segment(3);
		$data = array('id_kat'=>$id);
		$q = $this->model_app->delete('t_kat',$data);
		if ($q) {
			$this->session->set_flashdata('success', 'Data berhasil diproses!');
			redirect('kategori/indeks','refresh');
		}else{
			$this->session->set_flashdata('error', 'Data gagal diproses!');
			redirect('kategori/indeks','refresh');
		}
		// $dt = $this->model_app->view_where('t_level',$data)->row_array();
		// logAct($this->session->userdata('id'),'Hapus user group',$dt['nama_level']);
	}


}