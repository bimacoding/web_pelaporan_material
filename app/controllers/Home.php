<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$data['prod'] 			= $this->model_app->view_join_where_ordering_limit('t_produk','t_kat','id_kat',array('publish'=>'Y'),'id_produk','DESC',0,4)->result_array();
		$data['description'] 	= description();
		$data['keyword'] 		= keywords();
		$data['title'] 			= 'Home';
	    $this->template->load('f_layout/template','frontend/main',$data);
	}

}