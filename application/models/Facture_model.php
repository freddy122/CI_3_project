<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Facture_model extends CI_Model 
{
    var $table = "facture";


    function __construct()
    {
        parent::__construct();
    }
	
	function getAll_facture()
    {
        $this->db->select('*');
        $this->db->from('facture');
	    $this->db->order_by('date_deb', 'ASC');
        $q = $this->db->get();
		//print_r($this->db);
        if($q->num_rows() > 0)
        {
            return $q->result();
        }
        return array();
		
    }
	
	function taux_fact()
    {
        $this->db->select('*');
        $this->db->from('taux_consomme');
        $this->db->order_by('val_cons', 'asc');
        $q = $this->db->get();
        if($q->num_rows() > 0)
        {
            return $q->result();
        }
        return array();
    }
	
	function add($data)
    {
        $this->db->insert($this->table,$data);
    }
	
	function getById($id)
    {
        $this->db->select('*');
		$this->db->from('facture');
		$this->db->where('id_fact', $id);
        $q = $this->db->get();
        if($q->num_rows() > 0)
            {
                return $q->result();
            }   
        return array();
    }

    function update($data,$id)
    {
        $this->db->where("id_fact",$id);
        $this->db->update($this->table,$data);
    }
	
	function delete($id)
    {
        $this->db->where("id_fact",$id);
        $this->db->delete($this->table);
	    
    }
}
