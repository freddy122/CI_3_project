<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
/**
 * @name: Login model
 * @author: Fred
 */
 
class Ged_model extends CI_Model
{
	var $table_client   = "client";
	var $table_presta   = "presta";
	var $table_commande = "commande";
	var $table_lot      = "lot";
	var $table_com = "role";
    function __construct() 
	{
        parent::__construct();
        $this->load->database();
    }
	
	public function getallclient()
	{
		$this->db->select('client_id');
		$this->db->select('libelle_client');
		$this->db->from('client');
		$res = $this->db->get();
		if($res->num_rows() >0)
		{
			return $res->result();
		}
		return array();
	}
	
	public function getallpresta()
	{
		$this->db->select('*');
		$this->db->from('presta');
		$res = $this->db->get();
		if($res->num_rows() >0)
		{
			return $res->result();
		}
		return array();
	}
	
	public function getallcommande()
	{
		$this->db->select('*');
		$this->db->from('commande');
		$res = $this->db->get();
		if($res->num_rows() >0)
		{
			return $res->result();
		}
		return array();
	}
	
	public function getalllot()
	{
		$this->db->select('*');
		$this->db->from('lot');
		$this->db->order_by('nom_lot', 'DESC');
		$res = $this->db->get();
		if($res->num_rows() >0)
		{
			return $res->result();
		}
		return array();
	}
	
	/* select client */
	function getPresta($id)
    {
        $this->db->select('*');
		$this->db->from('presta');
		$this->db->where_in('client_id', $id);
        $q = $this->db->get();
        if($q->num_rows() > 0)
		{
			return $q->result();
		}   
        return array();
    }
	
	function getCommandefromclient($id)
    {
        $this->db->select('*');
		$this->db->from('commande');
		
		$this->db->join('presta', 'presta.presta_id = commande.presta_id', 'left');
		$this->db->join('client', 'client.client_id = presta.client_id', 'left');
		
		$this->db->where_in('client.client_id', $id);
        $q = $this->db->get();
        if($q->num_rows() > 0)
		{
			return $q->result();
		}   
        return array();
    }
	
	function getPrestafromclient($id)
    {
        $this->db->select('*');
		$this->db->from('lot');
		
		$this->db->join('commande', 'commande.commande_id = lot.commande_id', 'left');
		$this->db->join('presta', 'commande.presta_id = presta.presta_id', 'left');
		$this->db->join('CLIENT', 'client.client_id = presta.client_id', 'left');
		
		$this->db->where_in('client.client_id', $id);
        $q = $this->db->get();
        if($q->num_rows() > 0)
		{
			return $q->result();
		}   
        return array();	
    }
	
	/*fin select client */
	
	
	
	
	/* select presta  */
	function getcommandefrompresta($id)
    {
        $this->db->select('*');
		$this->db->from('commande');
		$this->db->where_in('presta_id', $id);
        $q = $this->db->get();
        if($q->num_rows() > 0)
		{
			return $q->result();
		}   
        return array();
    }
	
	function getLotpresta($id)
    {
        $this->db->select('*');
		$this->db->from('lot');
		
		$this->db->join('commande', 'commande.commande_id = lot.commande_id', 'left');
		$this->db->join('presta', 'commande.presta_id = presta.presta_id', 'left');
		
		$this->db->where_in('presta.presta_id', $id);
        $q = $this->db->get();
        if($q->num_rows() > 0)
		{
			return $q->result();
		}   
        return array();
    }
	/* fin select presta  */
	
	/* select commande*/
	function getlotcommande($id)
    {
        $this->db->select('*');
		$this->db->from('lot');
		$this->db->where_in('commande_id', $id);
        $q = $this->db->get();
        if($q->num_rows() > 0)
		{
			return $q->result();
		}   
        return array();
    }
	/* fin select commande*/
	
	/* load statut pli*/
	/*public function getStatutpli()
	{
		$this->db->distinct("statut_pli");
		$this->db->from("pli");
		//$this->db->where("statut_pli","<>''");
		$res = $this->db->get();
		if($res->num_rows() >0)
		{
			return $res->result();
		}
		return array();
	}*/
	/* fin load statut pli*/
}	