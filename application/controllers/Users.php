<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Users extends CI_Controller {
	
	function __construct()
    {
        parent::__construct();
        $this->load->model("User_model","user");
		if(!($this->session->userdata('id_user'))) {
        $this->session->set_flashdata('flash_data', 'Vous n\'avez pas d\'accaeacute;s!');
        redirect('Users/index');
		}
    }
	
    function index()
    {
        $data['user_list'] = $this->user->liste_utilisateur();
		$data['title'] = "Gestion utilisateur";		
		$this->load->view('/Layout/header',$data);
        $this->load->view("/Utilisateur/index",$data);
		$this->load->view('/Layout/footer');
    }
	
	function role()
	{
		$data['user_role'] = $this->user->role();
		$data['title'] = "Gestion utilisateur";		
		$this->load->view('/Layout/header',$data);
        $this->load->view("/Role/index",$data);
		$this->load->view('/Layout/footer');
	}
	

	function voir()
    {
        $id = $this->uri->segment(3);
		$sql = "select * 
					from users 
                WHERE id_user = '".$id."'
                      ";		
        $query =  $this->db->query($sql);         
        $resdirection = $query->result_array();
        $arr_user = array();
        foreach($resdirection as $r=>$t)
        {
             array_push($arr_user, $t);
        }
        $data['user'] = $arr_user;
        $this->load->view("Utilisateur/voir_utilisateur",$data);
    }
	
	function voir_role()
    {
        $id = $this->uri->segment(3);
		$sql = "select * 
					from role 
                WHERE id_role = '".$id."'
                      ";		
        $query =  $this->db->query($sql);         
        $resdirection = $query->result_array();
        $arr_user = array();
        foreach($resdirection as $r=>$t)
        {
             array_push($arr_user, $t);
        }
        $data['role'] = $arr_user;
        $this->load->view("Role/voir_role",$data);
    }
	
	
	function creer()
    {
        $data['role'] = $this->user->role();
		$this->load->view("Utilisateur/creer_utilisateur",$data);
    }
	
	function creer_role()
    {
		$this->load->view("Role/creer_role");
    }
	
	function insert_data(){
		$id         = nl2br($this->input->post('iduser'));
        $nom        = nl2br($this->input->post('nom'));
        $prenom     = nl2br($this->input->post('prenom'));
        $role       = nl2br($this->input->post('role'));
        $pseudo     = nl2br($this->input->post('pseudo'));
        $password   = nl2br($this->input->post('password'));
		$sql_insert = "
			insert into 
				users (nom,prenom,role_id,username,password) values( 
					'".$nom."',
					'".$prenom."',
					'".$role."',
					'".$pseudo."',
					'".md5($password)."')
		";
		$query = $this->db->query($sql_insert);
		echo $query;
		//redirect("Users/index");
		return $query;
	}
	
	function insert_data_role(){
		$librole         = nl2br($this->input->post('librole'));
		$sql_insert_role = "
			insert into 
				role (lib_role) values('".$librole."')
		";
		$query           = $this->db->query($sql_insert_role);
		redirect("Users/role");
		return $query;
	}
	
	function supprimer(){
		$id = $this->uri->segment(3);
        $this->user->delete($id);
        $this->session->set_flashdata('message',"<font color='red'>Suppression avec succèss</font>");
        redirect("Users/index");
	}
	
	function supprimer_role(){
		$id = $this->uri->segment(3);
        $this->user->delete_role($id);
        $this->session->set_flashdata('message',"<font color='red'>Suppression avec succèss</font>");
        redirect("Users/role");
	}
	
	function get_data_edited(){
		 $id_user = $this->uri->segment(3);
		 $sql = "select * 
					from users 
                WHERE id_user = '".$id_user."'
                ";		
        $query =  $this->db->query($sql);
        $resedit = $query->result_array();
        $arr_matr = array();
        foreach($resedit as $r=>$t)
        {
             array_push($arr_matr, $t);
        }
        $data['dir'] = $arr_matr;
        return($arr_matr);
	}
	
	function get_data_role_edited(){
		 $id = $this->uri->segment(3);
		 $sql = "select * 
					from role 
                WHERE id_role = '".$id."'
                ";		
        $query =  $this->db->query($sql);
        $rsrole = $query->result_array();
        $arr_matr = array();
        foreach($rsrole as $r=>$t)
        {
            array_push($arr_matr, $t);
        }
        $data['dir'] = $arr_matr;
        return($arr_matr);
	}
	
	function modifier()
    {
        $getmatr   = $this->get_data_edited();       
        $user_edit = array();
        foreach($getmatr as $index=>$val)
        {
            array_push($user_edit, $val);
        }
        $data['user_edit'] = $user_edit;
        $this->load->view("Utilisateur/modifier_utilisateur",$data);
    }
	
	function modifier_role()
    {
        $getmatr   = $this->get_data_role_edited();       
        $rol_edit = array();
        foreach($getmatr as $index=>$val)
        {
            array_push($rol_edit, $val);
        }
        $data['role_edit'] = $rol_edit;
        $this->load->view("Role/modifier_role",$data);
    }
	
	function execute_update(){
		$id         = nl2br($this->input->post('iduser'));
        $nom        = nl2br($this->input->post('nom'));
        $prenom     = nl2br($this->input->post('prenom'));
        $role       = nl2br($this->input->post('role'));
        $pseudo     = nl2br($this->input->post('pseudo'));
		$sql_update = "
			update 
				users set 
					nom = '".$nom."',
					prenom='".$prenom."',
					role_id='".$role."',
					username='".$pseudo."'
			where id_user = '".$id."'
		";
		$query = $this->db->query($sql_update);
		redirect("Users/index");
		return $query;
	}
	
	function execute_update_role(){
		$idrole         = nl2br($this->input->post('idrole'));
        $librole        = nl2br($this->input->post('librole'));
		$sql_update = "
			update 
				role set 
					lib_role = '".$librole."'		
			where id_role = '".$idrole."'
		";
		$query = $this->db->query($sql_update);
		redirect("Users/role");
		return $query;
	}
}