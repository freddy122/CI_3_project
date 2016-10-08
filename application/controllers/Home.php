<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 

class Home extends CI_Controller
{
 
    function __construct() {
        parent::__construct();
		//$this->load->library('session');
        if(!($this->session->userdata('id_user'))) {
            $this->session->set_flashdata('flash_data', 'You don\'t have access!');
            redirect('home');
        }
    }
 
    public function index() {
		$this->load->library('calendar');
		$pp = $this->calendar->generate();
		$this->load->library('cart');
		$this->load->helper('form');
		$this->load->library('encrypt');
		$this->encrypt;
		$data['library_src'] = $this->cart;
		
		$msg = 'O9EEnfyjtM2cpRaZHCRmCWODyFXbLVfEykjRgUcDpqGQUbQwfaKfEP+aX2VO8fm21BioKkHHsv5L7t/kf1iHmQ== ';
		$key = 'super-secret-key';

		$data['encrypted_string'] = $this->encrypt->decode($msg);
		
		$data['title'] = 'Page d\'accueil';
		$data['pp'] = $pp;
		$this->load->view('Layout/header',$data);
        $this->load->view('home');
        $this->load->view('Layout/footer');
		$this->load->library('session');
		
		/*$pp =  "aaayyyyyyyyyyyyyyyyy";
		$this->session->userdata('fred') = $pp;*/
		
    }
 
    public function logout() {
        $data = array('id_user','username');
        $this->session->unset_userdata($data);
        //redirect('login');
		redirect("login");
    }
}