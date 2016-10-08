<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Tacheproduction extends CI_Controller {
	function __construct()
    {
        parent::__construct();
        $this->load->model("Tacheprod_model","tprod");
		if(!($this->session->userdata('id_user'))) {
        $this->session->set_flashdata('flash_data', 'Vous n\'avez pas d\'accaeacute;s!');
        redirect('Users/index');
		}
    }
	
	function index()
	{
		$data['title'] = 'Plannnification tache production';
		$getdept = $this->getAll_dept();
        $depts = array();
        foreach($getdept as $r=>$t)
        {
            array_push($depts, $t);
        }
		
        $data['depts'] = $depts;
		$this->load->view('Layout/header',$data);
		$this->load->view('Tacheprod/index',$data);
		$this->load->view('Layout/footer');
	}
	
	function getAll_dept()
	{
		$sql = "
					select 
						DISTINCT  dept_direction.nom_dir as dept
					from personnel
					inner join dept on dept.iddept2 = personnel.deptcourant
					inner join dept_direction on dept_direction.id_dept = dept.deptparent 
					where nom_dir <> 'aucun'
					ORDER BY  dept_direction.nom_dir                     
				";
        $query =  $this->db->query($sql);         
        $resdept = $query->result_array();
        $dept = array();
        foreach($resdept as $r=>$t)
        {
            array_push($dept, $t);
        }
        $data['dept'] = $dept;
		return $dept;
	}
	
	
	function getup()
	{	
		$iddept    = $this->input->post('iddept');
		$sql = "";
		$sql = "
				SELECT 
				DISTINCT dd.nom_dir,iddept2 AS dept,deptparent
				FROM dept d 
				LEFT JOIN personnel p ON p.deptcourant = d.iddept2
				LEFT JOIN dept_direction dd ON dd.id_dept = d.deptparent
				WHERE 1=1 AND actifpers='Active' 
				   AND nompersonnel != 'ged' 
				   AND nompersonnel NOT LIKE '%test%' 
				   AND nompersonnel != 'TEST' 
				   AND actifpers= 'Active'
				   AND nompersonnel NOT LIKE 'Test%'
				   AND prenompersonnel != 'a' and 1 = 1 ";
		if(isset($iddept) && $iddept != '' && $iddept != 'null'){	   
			$sql .= " and dd.nom_dir in ('".str_replace(",","','",join(',',$iddept))."')";
		}else{
			$sql .= " and 1=1 ";
		}
		$sql .= " ORDER BY iddept2 asc
				";
		
		$query =  $this->db->query($sql);         
        $resup = $query->result_array();
        $up = array();
        foreach($resup as $r=>$t)
        {
            array_push($up, $t);
        }
		foreach($up as $val_up)
		{
			echo "<option value='".$val_up['dept']."'>".$val_up['dept']."</option>";
		}
	}
	
	function getfonction()
	{
		//echo 'a';		
		$idup    = $this->input->post('idup');
		$iddept  = $this->input->post('iddept');
		print_r($iddept);
		$sql = "";
		
			$sql = "
				SELECT DISTINCT
					fonctioncourante
				FROM dept d 
					LEFT JOIN personnel p ON p.deptcourant = d.iddept2
					LEFT JOIN dept_direction dd ON dd.id_dept = d.deptparent
				WHERE actifpers='Active'  
					AND actifpers= 'Active'
					AND fonctioncourante <> '' and 1=1 ";
			if(isset($iddept) && $iddept != 'null' && $iddept != ''){		
				$sql .= " AND deptparent in ('".str_replace(",","','",join(',',$iddept))."')";
			}else if(isset($idup) && $idup != 'null' && $idup != ''){
				$sql .= " and d.iddept2 in ('".str_replace(",","','",join(',',$idup))."')";
			}else{
				$sql .= " AND 1=1 ";
			}
			
			$sql .= " ORDER BY fonctioncourante ASC";
		
		$query    =  $this->db->query($sql);         
        $resfonct = $query->result_array();
        $fonct    = array();
        foreach($resfonct as $r=>$t)
        {
            array_push($fonct, $t);
        }
		foreach($fonct as $val_fonct)
		{
			echo "<option value='".$val_fonct['fonctioncourante']."'>".$val_fonct['fonctioncourante']."</option>";
		}	
	}
	
	function getpersonnel()
	{
		//$iddept  = $this->input->post('iddept');
		$iddept  = $this->input->post('iddept');
		$idup    = $this->input->post('idup');
		$idfoct  = $this->input->post('idfoct');
		$sql     = "";
		
		$sql     = "
					SELECT
						DISTINCT
						matricule AS matr, 
						prenompersonnel AS prenom, 
						nompersonnel AS nom 
					FROM personnel 
					INNER JOIN dept ON dept.iddept2 = personnel.deptcourant
					INNER JOIN dept_direction ON dept_direction.id_dept = dept.deptparent
					WHERE actifpers = 'Active' AND 1=1		
				";
		
		if(isset($iddept)) {
			if($iddept != "" && $iddept != "null"){		
				$sql .= " and dept_direction.nom_dir in  ('".str_replace(",","','",join(',',$iddept))."') ";
			}
			
			else{
				$sql .= " and 1=1 ";
			}
		}
		
		else 
		{
			if($idup != '' && $idup != 'null' )
			{
					$sql .= " and deptcourant in ('".str_replace(",","','",join(',',$idup))."')";			
			}else{
					$sql .= " and 1=1 ";
			}

			if(isset($idfoct)) 
			{
				if($idfoct != '' && $idfoct != 'null')
				{
						$sql .= " and fonctioncourante in ('".str_replace(",","','",join(',',$idfoct))."')";
				}else{
						$sql .= " and 1=1 ";
				}
			}
		
		}
		$sql .= "
			ORDER BY matricule asc
		";
		
		echo $sql;
		
		
		$query   = $this->db->query($sql);
		$respers = $query->result_array();
		$pers = array();
		foreach($respers as $val_pers)
		{
			array_push($pers, $val_pers);
		}
		foreach($pers as $val)
		{
			echo "<option value='".$val['matr']."'>".$val['matr'].' - '.$val['nom'].' - '.$val['prenom']."</option>";
		}
	}
	
	function ajax_resultat()
	{
		
		$sql = "
			select 
            dept_direction.nom_dir as dept,
            dept.iddept2 as up,
            personnel.fonctioncourante as fonction,
            personnel.matricule as matricule,
            personnel.nompersonnel as nomp,
            personnel.prenompersonnel as prenomp
         from personnel 
         inner join dept on dept.iddept2 = personnel.deptcourant 
         inner join dept_direction on dept_direction.id_dept = dept.deptparent 
         where nom_dir <> 'aucun' and 1=1
		";
		
		$query   = $this->db->query($sql);
		$resAjax = $query->result_array();
		$ajax = array();
		$arr_ajax = array();
		foreach($resAjax as $val_ajax)
		{
			array_push($ajax, $val_ajax);
		}
		foreach($ajax as $val)
		{
			array_push($arr_ajax,$val);
		}
		//print_r($arr_ajax);
		
		$datatables = json_encode(array
            (
               //"sEcho" 			   => intval($_GET['sEcho']), 
               /*"iTotalRecords"       => $tot,
               "iTotalDisplayRecords"  => $tot,*/
               "aaData" 			   => $arr_ajax
            )
		);
		echo $datatables;
		
	}
	

}