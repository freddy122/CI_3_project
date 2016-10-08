<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
/**
 * @name Login.php
 * @author Imron rosdiana
 */
class Login extends CI_Controller
{
 
    function __construct() {
        parent::__construct();
        $this->load->model("login_model", "login");
        if(!empty($_SESSION['id_user']))
            redirect('home');
    }
 
    public function index() {
        if($_POST) {
            $result = $this->login->validate_user(@$_POST);
            if(!empty($result)) {
                $data = array(
                    'id_user' => $result->id_user,
                    'username' => $result->username,
					'nom' => $result->nom,
					'prenom' => $result->prenom,
					'role' => $result->role
                );
 
                $this->session->set_userdata($data);
                redirect('home');
            }
			else{
                $this->session->set_flashdata('flash_data', '<font color="red">Erreur login et/ou mot de passe</font>');
			
                redirect('login');
            }
        }
 
        $this->load->view("login");
    }
}