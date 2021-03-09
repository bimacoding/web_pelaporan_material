<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

	public function index()
	{
		redirect('siteman/index','refresh');
	}

	//===================================================================
	// Ajax manage log
	//===================================================================

	public function getHistory()
	{
		$this->load->model('model_ajax');
		if( $this->input->is_ajax_request()  )  {
			$datatables  = $_POST;
			$datatables['table']    = 't_histori';
			$datatables['id-table'] = 'id_histori';
			$datatables['col-display'] = array(
			                "id_histori",
			                "id_users",
			                "kegiatan",
			                "data",
			                "ip",
			                "browser",
			             );
			$this->model_ajax->get_Datatables($datatables);
		}
		return;
    }

    //===================================================================
	// Ajax manage role
	//===================================================================

    function roleSave(){
    	$data = array(
    		'id_level' 	=> $this->input->post('level'),
    		'module'   	=> $this->input->post('module'),
    		'akses' 	=> $this->input->post('akses001'),
    	);
    	$q = $this->model_app->insert('t_role',$data);
    	if ($q) {
    		$id = $this->db->insert_id();
    		$dt = $this->model_app->view_where('t_role',array('id_role'=>$id))->row_array();
    		$json = array(
    					'feed' => 1,
    					'id_level' 	=> getLevel($dt['id_level']),
			    		'module'   	=> $dt['module'],
			    		'akses' 	=> $dt['akses']
    				);
    		echo json_encode($json);
    	}else{
    		$json = array('feed' => 0);
    		echo json_encode($json);
    	}
    }

    function getRoles(){
    	$json = array();
		$dt = $this->model_app->view('t_role')->result_array();
		foreach ($dt as $key => $j) {
			$json[] = array(
					'id_role' 	=> $j['id_role'],
					'id_level' 	=> getLevel($j['id_level']),
		    		'module'   	=> $j['module'],
		    		'akses' 	=> $j['akses']
				);
		}
		echo json_encode($json);
    }

    function updateRoles(){
		$id 		= $this->input->post('id');
		$field 		= $this->input->post('field');
		$n 		    = $this->input->post('n');
		if ($n=='0') {
			$up = '1';
			$q = $this->model_app->update('t_role',array($field=>$up),array($field=>'0','id_role'=>$id));
		}else{
			$up = '0';
			$q = $this->model_app->update('t_role',array($field=>$up),array($field=>'1','id_role'=>$id));
		}
		if ($q) {
			echo 1;
		}else{
			echo 0;
		}
    }


    function deleteRoles(){
		$id 		= $this->input->post('id');
		$q = $this->model_app->delete('t_role',array('id_role'=>$id));
		if ($q) {
			echo 1;
		}else{
			echo 0;
		}
    }

    //===================================================================
	// Ajax manage role end!!
	//===================================================================
    function _create_thumbs($file_name){
        // Image resizing config
        $config = array(
            // Image Large
            array(
                'image_library' => 'GD2',
                'source_image'  => 'assets/uploads/product/'.$file_name,
                'maintain_ratio'=> FALSE,
                'width'         => 500,
                'height'        => 500,
                'new_image'     => 'assets/product/thumbnail/large/'.$file_name
                ),
            // image Medium
            array(
                'image_library' => 'GD2',
                'source_image'  => 'assets/uploads/product/'.$file_name,
                'maintain_ratio'=> FALSE,
                'width'         => 350,
                'height'        => 350,
                'new_image'     => 'assets/product/thumbnail/medium/'.$file_name
                ),
            // Image Small
            array(
                'image_library' => 'GD2',
                'source_image'  => 'assets/uploads/product/'.$file_name,
                'maintain_ratio'=> FALSE,
                'width'         => 200,
                'height'        => 200,
                'new_image'     => 'assets/product/thumbnail/small/'.$file_name
            )
        );
 
        $this->load->library('image_lib', $config[0]);
        foreach ($config as $item){
            $this->image_lib->initialize($item);
            if(!$this->image_lib->resize()){
                return false;
            }
            $this->image_lib->clear();
        }
    }

	function upload_foto_product()
	{
		 $ret = array();
		 $config['upload_path'] = 'assets/uploads/product/';
		 $config['allowed_types'] = 'gif|jpg|png|jpeg';
		 $config['encrypt_name'] = TRUE;
		 $this->load->library('upload', $config);

		 $error = $this->upload->display_errors('<p>', '</p>');

		 if ($this->upload->do_upload('uploadFile')) {
		 	$data = array('xyz'=>$this->upload->data());
		 	$file = $data['xyz']['file_name'];
		 	$this->_create_thumbs($file);
		 	$q = $this->model_app->insert('t_pict',array('kode_produk'=>$this->input->post('id'),'img'=>$file));
		 	if ($q) {
		 		$ret[] = $file;
		 		echo json_encode($ret);
		 	}else{
		 		echo "error";
		 	}
		 	
		 }
	}

	function delete_foto_product()
	{
		$output_dir = 'assets/uploads/product/';
		$output_dir_large = 'assets/product/thumbnail/large/';
		$output_dir_medium = 'assets/product/thumbnail/medium/';
		$output_dir_small = 'assets/product/thumbnail/small/';
		if(isset($_POST["op"]) && $_POST["op"] == "delete" && isset($_POST['name']))
		{
			$fileName =$_POST['name'];
			$filePath = $output_dir. $fileName;
			$filePathLarge = $output_dir_large. $fileName;
			$filePathMedium = $output_dir_medium. $fileName;
			$filePathSmall = $output_dir_small. $fileName;
			if (file_exists($filePath)) 
			{
				$this->model_app->delete('t_pict',array('kode_produk'=>$this->input->post('id'),'img'=>$fileName));
		        unlink($filePath);
		        unlink($filePathLarge);
		        unlink($filePathMedium);
		        unlink($filePathSmall);
		    }
			echo "Deleted File ".$fileName."<br>";
		}
	}

	function saveproduk()
	{
		$sts = $this->input->post('sts');
		if ($sts=='add') {
			$data = array(
				'id_kat'    => $this->db->escape_str($this->input->post('kategori')),
				'seo'       => seo_title($this->input->post('judul')),
				'judul'     => $this->db->escape_str($this->input->post('judul')),
				'ket'      	=> cetak($this->input->post('ket')),
				'isi'      	=> cetak($this->input->post('isi')),
				'harga'     => cetak($this->input->post('harga')),
				'manfaat'   => cetak($this->input->post('manfaat')),
				'keunggulan'=> cetak($this->input->post('keunggulan')),
				'pemakaian' => cetak($this->input->post('pemakaian')),
				'stok'      => $this->db->escape_str($this->input->post('stok')),
				'berat'		=> $this->db->escape_str($this->input->post('berat')),
				'createdAt' => date('Y-m-d H:i:s'),
				'createdBy' => $this->session->userdata('nama'),
				'publish'   => 'Y'
			);
			$q = $this->model_app->update('t_produk',$data,array('kode_produk'=>$this->input->post('kode')));
			if ($q) {
				logAct($this->session->userdata('id'),'Add Produk',$this->input->post('judul'));
				echo 1;
			}else{
				echo 0;
			}
		}elseif($sts=='edit'){
			$data = array(
				'id_kat'    => $this->db->escape_str($this->input->post('kategori')),
				'seo'       => seo_title($this->input->post('judul')),
				'judul'     => $this->db->escape_str($this->input->post('judul')),
				'ket'      	=> cetak($this->input->post('ket')),
				'isi'      	=> cetak($this->input->post('isi')),
				'harga'     => cetak($this->input->post('harga')),
				'manfaat'   => cetak($this->input->post('manfaat')),
				'keunggulan'=> cetak($this->input->post('keunggulan')),
				'pemakaian' => cetak($this->input->post('pemakaian')),
				'stok'      => $this->db->escape_str($this->input->post('stok')),
				'berat'		=> $this->db->escape_str($this->input->post('berat')),
				'modifAt'   => date('Y-m-d H:i:s'),
				'modifBy'   => $this->session->userdata('nama'),
				'publish'   => 'Y'
			);
			$q = $this->model_app->update('t_produk',$data,array('kode_produk'=>$this->input->post('kode')));
			if ($q) {
				logAct($this->session->userdata('id'),'Edit Produk',$this->input->post('judul'));
				echo 1;
			}else{
				echo 0;
			}
		}

	}

	function hapus_data()
	{
		$id = $this->input->post('ids');
		$tbl = $this->input->post('tbl');
		$table = 't_'.$tbl;
		$param = 'id_'.$tbl;
		$q = $this->model_app->delete($table,array($param=>$id));
		if ($q) {
			logAct($this->session->userdata('id'),'Hapus Produk','data produk dihapus');
			echo 1;
		}else{
			echo 0;
		}
	}

	function filterp($str){
		$str 	= filter_input(INPUT_POST, $str, FILTER_SANITIZE_STRING);
		return $str;
	}
	function filterg($str){
		$str 	= filter_input(INPUT_GET, $str, FILTER_SANITIZE_STRING);
		return $str;
	}
	function nes_menu_save()
	{

		$label = $this->input->get('label');
		$level = $this->input->get('level');

		if ($this->input->get('link')!='') {
			$link = $this->input->get('link');
		}elseif ($this->input->get('page')!='') {
			$link = 'hal/'.$this->input->get('page');
		}elseif ($this->input->get('kategori')) {
			$link = 'category/'.$this->input->get('kategori');
		}
		
		$aktif = $this->input->get('aktif');
		$id = $this->input->get('id');

		if($id != ''){

			$this->db->query("UPDATE t_front_menu SET nama_menu = '".$label."', link  = '".$link."', level_akses = '".$level."' WHERE id_menu = '".$id."' ");

			$arr['type']  = 'edit';
			$arr['label'] = $label;
			$arr['link']  = $link;
			$arr['id']    = $id;
			$arr['level'] = $level;
		} else {
			$sql = $this->db->query("SELECT max(urutan)+1 as urutan FROM t_front_menu");
			$row = $sql->row_array();
			$this->db->query("INSERT INTO t_front_menu (nama_menu,link,aktif,urutan,level_akses) values ('".$label."', '".$link."', 'Ya', '".$row['urutan']."','".$level."')");
			$lastid = $this->db->insert_id();
			$arr['menu'] = '<li class="dd-item dd3-item" data-id="'.$lastid.'" >
			                    <div class="dd-handle dd3-handle"></div>
			                    <div class="dd3-content"><span id="label_show'.$lastid.'">'.$label.'</span>
			                        <span class="float-right">/<span id="link_show'.$lastid.'">'.$link.'</span> &nbsp;&nbsp; 
			                        	<a class="edit-button" id="'.$lastid.'" label="'.$label.'" link="'.$link.'" ><i class="fa fa-pencil"></i></a>
		                           		<a class="del-button" id="'.$lastid.'"><i class="fa fa-trash"></i></a>
			                        </span> 
			                    </div>';
			$arr['type'] = 'add';

		}
		echo json_encode($arr);
	}

	function recursiveDelete($id) {
	    $query = $this->db->query("SELECT * FROM t_front_menu where id_parent = '".$id."' ");
	    if ($query->num_rows() > 0) {
	       foreach ($query->result_array() as $current) {
	            $this->recursiveDelete($current['id_menu']);
	       }
	    }
	    $this->db->query("DELETE FROM t_front_menu where id_menu = '".$id."' ");
	   
	}

	function nes_menu_delete()
	{
		$getid = $this->input->get('id');
		$this->recursiveDelete($getid);
	}

	function nes_menu_update()
	{
		$data = json_decode($_GET['data']);
		function parseJsonArray($jsonArray, $parentID = 0) {
		  $return = array();
		  foreach ($jsonArray as $subArray) {
		    $returnSubSubArray = array();
		    if (isset($subArray->children)) {
		 		$returnSubSubArray = parseJsonArray($subArray->children, $subArray->id);
		    }
		    $return[] = array('id' => $subArray->id, 'parentID' => $parentID);
		    $return = array_merge($return, $returnSubSubArray);
		  }
		  return $return;
		}

		$readbleArray = parseJsonArray($data);

		$i=0;
		foreach($readbleArray as $row){
			$qry = $this->db->query("UPDATE t_front_menu SET id_parent= '".$row['parentID']."', urutan='$i' WHERE id_menu = '".$row['id']."' ");
		  $i++;
		}

		if($qry){
			echo 1;
		}else{
			echo 2;
		}
	}



}

/* End of file Ajax.php */
/* Location: ./application/controllers/Ajax.php */