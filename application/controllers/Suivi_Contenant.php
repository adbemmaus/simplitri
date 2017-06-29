<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suivi_Contenant extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$result=$this->Simplitri_Model->select_all_contenant();
		foreach ($result->result() as $row)
		{
			/*$data_table['table_data_build'][]=(array(
				'num_contenant'=>'aaa',
				'num_fa'=>'bbb',
				'date_reception'=>'05/06/2017',
		   	'date_cloture'=>'15/06/2017',
		   	'presence_cel'=>'OUI',
		   	'nb_tn'=>'1',
		   	'nb_tne'=>'2',
		   	'nb_t1'=>'3',
		   	'nb_t2'=>'4',
		   	'nb_t3'=>'5',
		   	'nb_celn'=>'6',
		   	'nb_celne'=>'7',
		   	'nb_cel1'=>'8',
		   	'nb_cel2'=>'9',
		   	'nb_cel3'=>'10',
			));*/
			$data_table['table_data_build'][]=(array(
				'num_contenant'=>$row->contenant_num,
				'num_fa'=>$row->fa_num,
				'date_reception'=>$row->contenant_create_date,
		   	'date_cloture'=>$row->contenant_close_date,
		   	'presence_cel'=>$row->contenant_cel_bool,
		   	'nb_tn'=>$row->contenant_laser_n,
		   	'nb_tne'=>$row->contenant_laser_ne,
		   	'nb_t1'=>$row->contenant_laser_1,
		   	'nb_t2'=>$row->contenant_laser_2,
		   	'nb_t3'=>$row->contenant_laser_3,
		   	'nb_celn'=>$row->contenant_cel_n,
		   	'nb_celne'=>$row->contenant_cel_ne,
		   	'nb_cel1'=>$row->contenant_cel_1,
		   	'nb_cel2'=>$row->contenant_cel_2,
		   	'nb_cel3'=>$row->contenant_cel_3,
			));
		}
		$this->data['table_data'] = $this->parser->parse('suivi_contenant/table', $data_table, true);

    $this->data['title'] = '';
		$this->data['pagetitle'] = 'Simplitri';
    $this->data['welcome_message'] = 'Bienvenue sur Simplitri';
    $this->data['pagebody'] = 'suivi_contenant/suivi';
    $this->data['maintitle'] = 'Suivi';

		//$this->data['bdd_data'] = $this->Simplitri_Model->select_num_ecobox('ADB 17/S18/10');


		$this->render();
	}
}
