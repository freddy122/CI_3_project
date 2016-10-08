<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Ged extends CI_Controller {
	function __construct()
    {
        parent::__construct();
        $this->load->model("Ged_model","ged");
		if(!($this->session->userdata('id_user'))) {
        $this->session->set_flashdata('flash_data', 'Vous n\'avez pas d\'accaeacute;s!');
        redirect('Users/index');
		}
    }
	
	function index()
	{
		$data['client']    	 = $this->ged->getallclient();
		$data['presta']   	 = $this->ged->getallpresta();
		$data['commande'] 	 = $this->ged->getallcommande();
		$data['lot']      	 = $this->ged->getalllot();
		//$data['statut_pli']  = $this->ged->getStatutpli();
		
		$data['title'] = "G.E.D";
		$this->load->view('/Layout/header',$data);
		$this->load->view("Ged/index",$data);
		$this->load->view('/Layout/footer');
	}
	
	/*clique client*/
	function getprestation()
	{
		$idclient = $this->input->post('idcli');
		$prest = $this->ged->getPresta($idclient);
		$i=1; 
		foreach($prest as $val):
			echo ('<option value='.$val->presta_id.'>'.$val->libelle_presta.'_'.$val->nom_presta.'</option>');
		$i++; 
		endforeach;
	}
	
	function getcommande()
	{
		$idclient = $this->input->post('idcli');
		$commande = $this->ged->getCommandefromclient($idclient);
		$i=1; 
		foreach($commande as $val):
			echo ('<option value='.$val->commande_id.'>'.$val->commande_id.'</option>');
		$i++; 
		endforeach;
	}
	
	function getlotclient()
	{
		$idclient = $this->input->post('idcli');
		$presta = $this->ged->getPrestafromclient($idclient);
		$i=1; 
		foreach($presta as $val):
			echo ('<option value='.$val->lot_id.'>'.$val->nom_lot.'</option>');
		$i++; 
		endforeach;
		
	}
	
	/*clique presta*/
	function getcommandepresta()
	{
		$idpresta = $this->input->post('idprest');
		$commande = $this->ged->getcommandefrompresta($idpresta);
		$i=1; 
		foreach($commande as $val):
			echo ('<option value='.$val->commande_id.'>'.$val->commande_id.'</option>');
		$i++; 
		endforeach;
	}
	
	function getlotpresta()
	{
		$idpresta = $this->input->post('idprest');
		$lot      = $this->ged->getLotpresta($idpresta);
		$i=1; 
		foreach($lot as $val):
			echo ('<option value='.$val->lot_id.'>'.$val->nom_lot.'</option>');
		$i++; 
		endforeach;
	}
	
	/*click commande */
	function getlotcommande()
	{
		$idcom    = $this->input->post('idcom');
		$lotcom   = $this->ged->getlotcommande($idcom);
		$i=1; 
		foreach($lotcom as $val):
			echo ('<option value='.$val->lot_id.'>'.$val->nom_lot.'</option>');
		$i++; 
		endforeach;		
	}
	
	function getResultat()
	{
		$p = array('1','2');
		echo json_encode(array('0'=>$p[0]));
	}
	
	
}