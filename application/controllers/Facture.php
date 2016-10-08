<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Facture extends CI_Controller {
	function __construct()
    {
        parent::__construct();
		if(!($this->session->userdata('id_user'))) {
        $this->session->set_flashdata('flash_data', 'Vous n\'avez pas d\'accaeacute;s!');
        redirect('Users/index');
		}
		$this->load->helper('date');
		$this->load->model("Facture_model","facture");
    }
	
	function index()
	{
		$data['title'] = "Gestion facture";
		$datestring = '%Y-%m-%d';
		$time = time();
		$dts = mdate($datestring, $time);
		$data['dates'] = $dts;
		$data['fact'] = $this->facture->getAll_facture();
		$data['fact_t'] = $this->facture->taux_fact();
		
		if(@$_POST['creer_facture'])
        {
            $data = $_POST['facture_f'];
			$this->facture->add($data);          
            redirect('Facture/index');           
        }
		$this->load->view('/Layout/header',$data);
		$this->load->view("Facture/index",$data);
		$this->load->view('/Layout/footer');
		/*$yy = $this->session->userdata('fred');
		echo $yy;*/
	}
	
	function modifier()
    {
        $data['title'] = "Modification facture";
		$id = $this->uri->segment(3);
        $factr = $this->facture->getById($id);
        if(!$factr)
        {
            redirect('Facture/index');
        }
        if(@$_POST['modifier_facture'])
        {
            $postdata = $_POST['facture_m'];
            $this->facture->update($postdata,$id);
            $this->session->set_flashdata('message',"<font color='red'>facture modifier avec succès</font>");
            redirect('Facture/index');
        }
        $data['factr'] = $factr;
		$data['fact'] = $this->facture->getAll_facture();
		$data['fact_t'] = $this->facture->taux_fact();
		$this->load->view('/Layout/header',$data);
        $this->load->view("Facture/modifier_facture",$data);
		$this->load->view('/Layout/footer');
    }
	
    function supprimer()
    {
        $id = $this->uri->segment(3);
        $this->facture->delete($id);
        $this->session->set_flashdata('message',"<font color='red'>Suppression avec succèss</font>");
        redirect('Facture/index');
    }
	
	function voir()
    {
        $data['title'] = "Voir Facture";
		$id = $this->uri->segment(3);
        $factr = $this->facture->getById($id);
        if(!$factr)
        {
            redirect('Facture/index');
        }
        
        $data['factr'] = $factr;
		$this->load->view('/Layout/header',$data);
        $this->load->view("Facture/voir_facture",$data);
		$this->load->view('/Layout/footer');
    }
	
	function recherche_avancer()
	{
		$datedeb = nl2br($this->input->post('datedeb'));
        $datefin = nl2br($this->input->post('datefin'));
		$sql = "SELECT * 
					FROM facture 
					WHERE date_deb BETWEEN '".$datedeb."' AND '".$datefin."'  
					AND date_fin BETWEEN '".$datedeb."' AND '".$datefin."'
					order by 
					date_deb asc
                ";
		$query        =  $this->db->query($sql);
		$resfacture   = $query->result_array();
		$arr_fact = array();
        foreach($resfacture as $r=>$t)
        {
             array_push($arr_fact, $t);
        }		
		$som_cons = array();
		echo ("
		<table class=\"table table-striped table-bordered\" width=\"100%\" cellspacing=\"0\">
				<tr>
					<td><h4><b>consommation</b></h4></td>
					<td><h4><b>Date debut</b></h4></td>
					<td><h4><b>Date fin</b></h4></td>					
					<td><center><h4><b>Action</b></h4></center></td>					
				</tr>");
		foreach($arr_fact as $key=>$val)
		{
			array_push($som_cons,$val['consommation']);
			$deb = new DateTime($val['date_deb']);
		    $fin = new DateTime($val['date_fin']);
			echo ("<tr>
							<td>".$val['consommation']." Kwh </td>
							<td>".$deb->format('d/m/Y')."</td>
							<td>".$fin->format('d/m/Y')."</td>
							<td><center>
									<a class=\"btn btn-primary\" href=\"".site_url('Facture/modifier/'.$val['id_fact'])."\">modifier</a>
									
									&nbsp;&nbsp;
									<a class=\"btn btn-danger\" href=\"".site_url('Facture/supprimer/'.$val['id_fact'])."\" onclick=\"return(confirm('voulez vous supprimer cet agent'))\">supprimer</a>&nbsp;&nbsp;
									<a  class=\"btn btn-success\" href=\"".site_url('Facture/Voir/'.$val['id_fact'])."\" >Voir</a>
								</center>
							</td>
				   </tr>				
				");
		}
		echo "</table>";		
		$dtdeb = new DateTime($datedeb);
		$dfin = new DateTime($datefin);
		echo "<h3>Total consommation du ".$dtdeb->format('d/m/Y')." au ".$dfin->format('d/m/Y')." :<u><font color=blue> ".array_sum($som_cons)." Kwh</font></u></h3>";
	}
	
	function statitistique()
	{
		$data['title'] = "stat Facture";
		
		//echo($json_data);
		
		$this->load->view('/Layout/header',$data);
        $this->load->view("Facture/stat",$data);
		$this->load->view('/Layout/footer');
		
		//echo $sql;
	}
	
	function getstat(){
		$datedeb = nl2br($this->input->post('datedeb'));
        $datefin = nl2br($this->input->post('datefin'));
		/*$sql = "
					SELECT  SUM(consommation) AS somme,
						    SUBSTR(date_fin,1,7) AS mois
					FROM facture 
					WHERE 
						date_fin BETWEEN '$datedeb' AND '$datefin'
						AND date_deb BETWEEN '$datedeb' AND '$datefin'
					GROUP BY SUBSTR(date_deb,1,7)
               ";*/
			   
		$sql = "
			SELECT  ROUND(SUM(consommation),1) AS somme,
					SUBSTR(date_fin,6,2) AS mois
			FROM facture 
			WHERE 
				date_fin BETWEEN '2015-12-01' AND '2016-05-14'
				AND date_deb BETWEEN '2015-12-01' AND '2016-05-14'
			GROUP BY SUBSTR(date_deb,6,2)
			ORDER BY date_fin ASC
		";
		
		/*echo '<pre>';
			print_r($sql);
		echo '</pre>';*/
		
		$query        =  $this->db->query($sql);
		$resfacture   = $query->result_array();
		
		$arr_fact_stat = array();
        foreach($resfacture as $r=>$t)
        {
            array_push($arr_fact_stat, $t);
        }
		$arr_cons  = array();
		$arr_deb   = array();
		$arr_fin   = array();
		$arr_data  = array();
		foreach($arr_fact_stat as $key => $valu){
			array_push($arr_cons,round($valu['somme'],2));
			
			array_push($arr_deb,$valu['mois']);
			$val_res = round($valu['somme'],2);
			$arr_data[$valu['somme']] = $valu['mois'];
			/*echo '<pre>';
				print_r($val_res);
			echo '</pre>';*/
			
		}
		/*[consommation] => 0.4
		[date_deb] => 2016-03-01
		[date_fin] => 2016-03-02
			*/	
		$json_data = json_encode(array(
			"cons"  => $arr_cons,
			"ddebs" => $arr_deb
		));
		
	   echo  (json_encode($arr_data));
	}
	

}