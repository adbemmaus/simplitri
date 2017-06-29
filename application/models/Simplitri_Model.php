<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*****************************************************************************
******************************************************************************
*	CLASS Simplitri
******************************************************************************
******************************************************************************
*
*  T.PAPIN 22/06/2017
*  # Descritpion de la class
*
******************************************************************************
*****************************************************************************/

class Simplitri_Model extends CI_Model {

	private $DB1 = null;
	private $DB2 = null;

	/*****************************************************************************
	*	FUNCTION __contruct
	******************************************************************************
	*
	*  T.PAPIN 22/06/2017
	*  # Descritpion de la fonction
	*
	******************************************************************************
	*****************************************************************************/

	public function __construct()
	{
		parent::__construct();

		$this->DB1=$this->load->database('default',TRUE);
		$this->DB2=$this->load->database('coltri',TRUE);

	}

	/*****************************************************************************
	*	FUNCTION select_num_ecobox
	******************************************************************************
	*
	*	T.PAPIN 19/06/2017
	* # Fonction retournant le nombre de contenant réceptionné
	*	# Controlle effectuer en fonction du type de contenant
	*
	******************************************************************************
	*****************************************************************************/

	public function select_num_ecobox($data)
	{
		$this->DB2->db_select();
		$query = $this->DB2->select('frecept_id')
		  ->where ('frecept_num',$data)
		  ->get('fiches_receptions');

		$string=$query->row()->frecept_id;

		$query = $this->DB2->select('fiche_receptione')
		  ->where ('fiche_id',$string)
		  ->get('receptions_contenu');

		$string=$query->row()->fiche_receptione;

		//cherche si palette ou ecobox
		if ((strstr($string,'palette'))==FALSE)
		{
		  // manipulation de chaine pour obtenir que le chiffre
		  $result=strstr($string, '"ecobox";i:1;s:1:"');
		  $result=strstr($result, '";}}',true);
		  $result=substr($result,18);
		  //Convertion d'un string en installation
		  $result= intval($result);
		}
		else
		{
		  // manipulation de chaine pour obtenir que le chiffre
		  $result=strstr($string, '"palette";i:1;s:1:"');
		  $result=strstr($result, '";}}',true);
		  $result=substr($result,19);
		  //Convertion d'un string en installation
		  $result= intval($result);
		}

		return $result;
	}

	/*****************************************************************************
	*	FUNCTION select_fa_id
	******************************************************************************
	*
	*	T.PAPIN 19/06/2017
	* # Fonction retournant le numéro d'ID du FA
	*	# Si celui-ci n'existe pas renvoi null
	*
	******************************************************************************
	*****************************************************************************/

	public function select_fa_id($data)
	{
		$this->DB1->db_select();
		$query = $this->DB1->select('fa_id')
		  ->where('fa_num',$data)
		  ->get('tbl_fa');

		$result=$query->row();

		if (isset($result))
		{
			$return_value=$result->fa_id;
		}
		else
		{
			$return_value=null;
		}

		return $return_value;

	}

	/*****************************************************************************
	*	FUNCTION insert_new_fa
	******************************************************************************
	*
	*	T.PAPIN 19/06/2017
	* # Fonction ajoutant un numéro FA au système
	*
	******************************************************************************
	*****************************************************************************/

  public function insert_new_fa($data)
  {
		$data_array = array(
        'fa_num' => $data
		);
    $this->DB1->db_select();
    $query = $this->DB1->insert('tbl_fa',$data_array);
		$result=$this->select_fa_id($data);
    return $result;
  }

	/*****************************************************************************
	*	FUNCTION update_new_chrono
	******************************************************************************
	*
	*	T.PAPIN 19/06/2017
	* # Fonction retournant le numéro chrono
	*	# Vérifie si les champs année et mois sont à jour vant de retourné l'information
	*
	******************************************************************************
	*****************************************************************************/

  public function update_new_chrono()
  {
    $this->DB1->db_select();
    $query=$this->DB1->select('*')
      -> where('chrono_id','1')
      -> get('tbl_chrono_number');
    $result=$query->row();
    if($result->chrono_years!=date('y'))
    {
      $query=$this->DB1->set('chrono_years',date('y'))
        ->where('chrono_id','1')
        ->update('tbl_chrono_number');
    }

    if($result->chrono_month!=date('n'))
    {
      $query=$this->DB1->set('chrono_month',date('n'))
        ->set('chrono_inc','1')
        ->where('chrono_id','1')
        ->update('tbl_chrono_number');
        $this->DB1->db_select();
        $query=$this->DB1->select('*')
          -> where('chrono_id','1')
          -> get('tbl_chrono_number');
        $result=$query->row();
    }
    else
    {
      $query=$this->DB1->set('chrono_inc',(intval($result->chrono_inc)+1))
        ->where('chrono_id','1')
        ->update('tbl_chrono_number');
        $this->DB1->db_select();
        $query=$this->DB1->select('*')
          -> where('chrono_id','1')
          -> get('tbl_chrono_number');
        $result=$query->row();
    }
    return $result;
  }

	/*****************************************************************************
	*	FUNCTION insert_new_contenant
	******************************************************************************
	*
	*	T.PAPIN 19/06/2017
	* #
	*
	******************************************************************************
	*****************************************************************************/

	public function insert_new_contenant($data)
	{
		$data_array = array(
        'contenant_num' => $data['ctn_num'],
				'fa_num'=>$data['fa_num'],
				'contenant_create_date'=> date('Y-m-d'),
				'contenant_last_edit'=> date('Y-m-d')
		);
		$this->DB1->db_select();
		$query = $this->DB1->insert('tbl_contenant',$data_array);
	}


	/*****************************************************************************
	*	FUNCTION update_contenant_toner
	******************************************************************************
	*
	*	T.PAPIN 22/06/2017
	* #
	*
	******************************************************************************
	*****************************************************************************/
	public function update_contenant_toner($data)
	{
		//$result=$this->select_contenant_toner($data);

		$this->DB1->db_select();
		$this->DB1->set($data['contenant_laser_n'], ''.$data['contenant_laser_n'].'+'.$data['value'],FALSE)
			->set('contenant_last_edit', date('Y-m-d'),FALSE)
			->where('contenant_num',$data['num_ctn'])
			->update('tbl_contenant');

		//return $result;

	}

	/*****************************************************************************
	*	FUNCTION update_cel_value
	******************************************************************************
	*
	*	T.PAPIN 22/06/2017
	* #
	*
	******************************************************************************
	*****************************************************************************/
	public function update_cel_value($data)
	{
		$array = array(
			'contenant_cel_bool'=>$data['contenant_cel_bool'],
			'contenant_last_edit'=> date('Y-m-d'),
		);

		$this->DB1->db_select();
		$this->DB1->set($array,TRUE)
			->where('contenant_num',$data['num_ctn'])
			->update('tbl_contenant');

	}

	/*****************************************************************************
	*	FUNCTION select_contenant_toner
	******************************************************************************
	*
	*	T.PAPIN 22/06/2017
	* #
	*
	******************************************************************************
	*****************************************************************************/
	public function select_all_contenant_toner($data)
	{

		$this->DB1->db_select();
		$query = $this->DB1->select('*')
			->where('contenant_num',$data['num_ctn'])
			->get('tbl_contenant');
		$result=$query->row();

		return $result;
	}
	/*****************************************************************************
	*	FUNCTION select_all_contenant
	******************************************************************************
	*
	*	T.PAPIN 22/06/2017
	* # Retourne toute la table tbl_contenant
	*
	******************************************************************************
	*****************************************************************************/
	public function select_all_contenant()
	{

		$this->DB1->db_select();
		$query = $this->DB1->select('*')
			->get('tbl_contenant');
		$result=$query;

		return $result;
	}

	/*****************************************************************************
	*	FUNCTION select_suivi_jour
	******************************************************************************
	*
	*	T.PAPIN 19/06/2017
	* # Vérifie si le compteur existe
	*
	******************************************************************************
	*****************************************************************************/

	public function select_suivi_jour($data)
	{
		$this->DB1->db_select();
		$query = $this->DB1->where('jour',$data['jour'])
			-> from('tbl_tri_jour')
			->count_all_results();

		return $query;
	}

	/*****************************************************************************
	*	FUNCTION insert_suivi_jour
	******************************************************************************
	*
	*	T.PAPIN 19/06/2017
	* # Créer un nouveau compteur
	*
	******************************************************************************
	*****************************************************************************/

	public function insert_suivi_jour($data)
	{
		$data_array = array(
				'jour' => $data['jour'],
		);
		$this->DB1->db_select();
		$query = $this->DB1->insert('tbl_tri_jour',$data_array);
	}

	/*****************************************************************************
	*	FUNCTION update_suivi_jour
	******************************************************************************
	*
	*	T.PAPIN 19/06/2017
	* # Met à jour le compteur journalier
	*
	******************************************************************************
	*****************************************************************************/

	public function update_suivi_jour($data)
	{

		$this->DB1->db_select();
		$this->DB1->set(''.$data['type'].'',''.$data['type'].'+'.$data['value'].'',FALSE)
			-> where('jour',$data['jour'])
			->update('tbl_tri_jour');
	}

	/*****************************************************************************
	*	FUNCTION select_suivi_jour
	******************************************************************************
	*
	*	T.PAPIN 19/06/2017
	* # Vérifie si le compteur existe
	*
	******************************************************************************
	*****************************************************************************/

	public function select_last_contenant()
	{
		$this->DB1->db_select();
		$query = $this->DB1->select('contenant_num')
			-> order_by('contenant_id', 'DESC')
			-> limit(1)
			-> get('tbl_contenant');
		$result=$query->row()->contenant_num;

		return $result;
	}
}
