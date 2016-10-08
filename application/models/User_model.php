<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
/**
 * @name: Login model
 * @author: Fred
 */
class User_model extends CI_Model
{
	var $table      = "users";
	var $table_role = "role";
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
 
    public function liste_utilisateur() {
		$this->db->select('id_user');
		$this->db->select('nom');
		$this->db->select('prenom');
		$this->db->select('role_id');
		$this->db->select('username');
		$this->db->select('password');
        $this->db->from('users');
        $q = $this->db->get();
        if($q->num_rows() > 0)
        {
            return $q->result();
        }
        return array();
    }
	
	public function role(){
		$this->db->select('id_role');
		$this->db->select('lib_role');
		$this->db->from('role');
		$res = $this->db->get();
		if($res->num_rows() >0)
		{
			return $res->result();
		}
		return array();
	}
	
	function getById($id)
    {      
        $q = $this->db->get($this->table);
        if($q->num_rows() > 0)
            {
                return $q->row();
            }   
        return false;
    }
	
	
    function add($data)
    {
        $this->db->insert($this->table,$data);
    }
	
	
	function update($data,$id)
    {
        $this->db->where("id",$id);
        $this->db->update($this->table,$data);
    }
	
	function delete($id){
		$this->db->where("id_user",$id);
        $this->db->delete($this->table);
	}
	
	function delete_role($id){
		$this->db->where("id_role",$id);
        $this->db->delete($this->table_role);
	}
 
    function __destruct() {
        $this->db->close();
    }
}