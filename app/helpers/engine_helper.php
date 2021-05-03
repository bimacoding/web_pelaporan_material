<?php 
    function cek_session_akses($link,$level){
        $ci = & get_instance();
        $session = $ci->db->query("SELECT link,level_akses FROM t_menu WHERE link = '".$link."' AND level_akses='".$level."'")->num_rows();
        if ($session == '0'){
            redirect(base_url().'siteman/home');
        }
    }

    function background(){
        $ci = & get_instance();
        $bg = $ci->db->query("SELECT gambar FROM background ORDER BY id_background DESC LIMIT 1")->row_array();
        return $bg['gambar'];
    }

    function namaUser($id=0){
        $ci = & get_instance();
        $bg = $ci->db->query("SELECT nama FROM t_users WHERE id_users = '".$id."' ORDER BY id_users DESC LIMIT 1")->row_array();
        return $bg['nama'];
    }

    function lvl($id){
        $ci = & get_instance();
        $bg = $ci->db->query("SELECT nama_level FROM t_level WHERE id_level = '". $id ."' ORDER BY id_level DESC LIMIT 1")->row_array();
        return $bg['nama_level'];
    }

    function logo(){
        $ci = & get_instance();
        $logo = $ci->db->query("SELECT logo FROM t_identitas WHERE id_identitas = 1 ORDER BY id_identitas LIMIT 1")->row_array();
        return base_url().'assets/images/'.$logo['logo'];
    }

    function title(){
        $ci = & get_instance();
        $title = $ci->db->query("SELECT nama_website FROM t_identitas ORDER BY id_identitas DESC LIMIT 1")->row_array();
        return $title['nama_website'];
    }

    function about(){
        $ci = & get_instance();
        $title = $ci->db->query("SELECT tentang FROM t_identitas ORDER BY id_identitas DESC LIMIT 1")->row_array();
        return $title['tentang'];
    }

    function title_post($str){
        $ci = & get_instance();
        $title = $ci->db->query("SELECT judul_post FROM t_post WHERE seo_post = '".$str."' ORDER BY id_post DESC LIMIT 1")->row_array();
        return $title['judul_post'];
    }

    function description(){
        $ci = & get_instance();
        $title = $ci->db->query("SELECT meta_deskripsi FROM t_identitas ORDER BY id_identitas DESC LIMIT 1")->row_array();
        return $title['meta_deskripsi'];
    }

    function keywords(){
        $ci = & get_instance();
        $title = $ci->db->query("SELECT meta_keyword FROM t_identitas ORDER BY id_identitas DESC LIMIT 1")->row_array();
        return $title['meta_keyword'];
    }

    function alamat(){
        $ci = & get_instance();
        $title = $ci->db->query("SELECT alamat FROM t_identitas ORDER BY id_identitas DESC LIMIT 1")->row_array();
        return $title['alamat'];
    }

    function facebook(){
        $ci = & get_instance();
        $title = $ci->db->query("SELECT facebook FROM t_identitas ORDER BY id_identitas DESC LIMIT 1")->row_array();
        return $title['facebook'];
    }

    function instagram(){
        $ci = & get_instance();
        $title = $ci->db->query("SELECT instagram FROM t_identitas ORDER BY id_identitas DESC LIMIT 1")->row_array();
        return $title['instagram'];
    }

    function twitter(){
        $ci = & get_instance();
        $title = $ci->db->query("SELECT twitter FROM t_identitas ORDER BY id_identitas DESC LIMIT 1")->row_array();
        return $title['twitter'];
    }

    function email(){
        $ci = & get_instance();
        $title = $ci->db->query("SELECT email FROM t_identitas ORDER BY id_identitas DESC LIMIT 1")->row_array();
        return $title['email'];
    }

    function telp(){
        $ci = & get_instance();
        $title = $ci->db->query("SELECT no_telp FROM t_identitas ORDER BY id_identitas DESC LIMIT 1")->row_array();
        return $title['no_telp'];
    }

    function maps(){
        $ci = & get_instance();
        $title = $ci->db->query("SELECT maps FROM t_identitas ORDER BY id_identitas DESC LIMIT 1")->row_array();
        return $title['maps'];
    }

    function author(){
        $ci = & get_instance();
        $title = $ci->db->query("SELECT author FROM t_identitas ORDER BY id_identitas DESC LIMIT 1")->row_array();
        return $title['author'];
    }

    function favicon(){
        $ci = & get_instance();
        $fav = $ci->db->query("SELECT favicon FROM t_identitas ORDER BY id_identitas DESC LIMIT 1")->row_array();
        return base_url().'/assets/images/'.$fav['favicon'];
    }

    function get_name($k){
        $ci = & get_instance();
        $nm = $ci->db->query("SELECT nama_menu FROM t_menu WHERE id_menu = '".$k."' ORDER BY id_menu DESC LIMIT 1")->row_array();
        if ($nm!='') {
            return $nm['nama_menu'];
        }else{
            return 'Tidak Ada';
        }
        
    }

    function getLevel($k){
        $ci = & get_instance();
        $nm = $ci->db->query("SELECT nama_level FROM t_level WHERE id_level = '".$k."' ORDER BY id_level DESC LIMIT 1")->row_array();
        return $nm['nama_level'];
        
    }

    function get_name_front($k){
        $ci = & get_instance();
        $nm = $ci->db->query("SELECT nama_menu FROM t_front_menu WHERE id_menu = '".$k."' ORDER BY id_menu DESC LIMIT 1")->row_array();
        if ($nm!='') {
            return $nm['nama_menu'];
        }else{
            return 'Tidak Ada';
        }
        
    }

    function getMode() {
        //mengatur zona waktu
        date_default_timezone_set("Asia/Jakarta");
        //variables 
        $welcome_string="light"; 
        $numeric_date=date("G"); 
         
        //kondisioal untuk menampilkan ucapan menurut waktu/jam 
        if($numeric_date>=0&&$numeric_date<=11) 
        $welcome_string="light"; 
        else if($numeric_date>=12&&$numeric_date<=14) 
        $welcome_string="light";
        else if($numeric_date>=15&&$numeric_date<=17) 
        $welcome_string="light"; 
        else if($numeric_date>=18&&$numeric_date<=23) 
        $welcome_string="light"; 
         
        return $welcome_string; 
    }
    /*
        
    */
    function cekAksesUser($level = null, $link = '' , $child = false)
    {
        $ci = & get_instance(); 
        $xpl = explode('/', $link);
        if ($child==true) {
            $modul = $xpl[0];
        }else{
            $modul = $xpl[0].'/'.$xpl[1];
        }
        $modelCek = $ci->model_app->view_where('t_role',array('id_level'=>$level,'module'=>$modul));
        $cek = $modelCek->num_rows();
        $field = $modelCek->row_array();
        if ($cek>=1) {
            $validation = $field['akses'];
            if ($validation == 0) {
                return redirect('/','refresh');
            }
        }else{
            return redirect('/','refresh');
        }
        
    }

    function getIDs($str=''){
        $ci = & get_instance();
        $ci->load->library('mongo_db');
        $nm = $ci->mongo_db->where(['kategori' => $str]);
        $data = $nm[0]['_id'];
        return $data;
        
    }

    function get_users($k){
        $ci = & get_instance();
        $nm = $ci->db->query("SELECT nama FROM t_users WHERE id_users = '".$k."' ORDER BY id_users DESC LIMIT 1")->row_array();
        if ($nm!='') {
            return $nm['nama'];
        }else{
            return 'Tidak Ada';
        }
        
    }

    function cek_session_admin(){
        $ci = & get_instance();
        $session = $ci->session->userdata('level');
        if ($session != 'admin'){
            redirect(base_url());
        }
    }

    function cek_sessions(){
        $ci = & get_instance();
        $session = $ci->session->userdata('level');
        switch ($session) {
            case 6:
                echo '';
                break;
            case 8:
                echo '';
                break;
            case 9:
                echo '';
                break;
            case 1:
                echo '';
                break;
            case 2:
                echo '';
                break;
            
            default:
                echo "class='hide'";
                break;
        }
    }

    function cek_session_user(){
        $ci = & get_instance();
        $session = $ci->session->userdata('level');;
        if ($session == ''){
            redirect(base_url());
        }
    }
