<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cartouches_Reception extends MY_Controller {

	/**
	 * T.PAPIN 16/06/2017
	 */
	public function index()
	{
		$this->form_validation->set_rules('form_num_fa', 'form_num_fa', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$this->data['bdd_data'] = '';
			$data_num=array('chrono_num'=>array(array('num'=>'')));

		}
		else
		{
      // 1 - Vérifier que le numéro FA n'est pas déjà existant
			$fa_exist=$this->Simplitri_Model->select_fa_id($this->input->post('form_num_fa'));
			// 1.1 - Si Oui informer et proposer la réedition des étiquettes
			if($fa_exist != null)
			{
					$this->data['bdd_data'] = 'FA déjà déclaré';
			}
			else
			{
				// 2 - Ajouter la FA au système avec les info de coltri
				$fa_id=$this->Simplitri_Model->insert_new_fa($this->input->post('form_num_fa'));
				// 3 - Générer des codes CTN et inscrire dans la bdd

				$this->data['bdd_data'] = $this->Simplitri_Model->select_num_ecobox($this->input->post('form_num_fa'));
				$count = $this->data['bdd_data'];
				while ($count > 0)
				{
					$row=$this->Simplitri_Model->update_new_chrono();
					$data_num['chrono_num'][]=(array('num'=>$row->chrono_type.' '.$row->chrono_years.'/'.$row->chrono_month.'/'.$row->chrono_inc));
					$this->Simplitri_Model->insert_new_contenant(array('fa_num'=>$this->input->post('form_num_fa'),'ctn_num'=>$row->chrono_type.' '.$row->chrono_years.'/'.$row->chrono_month.'/'.$row->chrono_inc));
					$count =$count -1;
			  }
				// 4 - Imprimer les codes
			}
		}
		$this->data['crn'] = '';//$this->parser->parse('theme/test', $data_num, true);
    $this->data['title'] = '';
		$this->data['pagetitle'] = 'Simplitri';
    $this->data['welcome_message'] = 'Bienvenue sur Simplitri';
    $this->data['pagebody'] = 'cartouches_reception';
    $this->data['maintitle'] = 'Tri Toner';

		$this->render();
		//$this->label($array);
	}


	public function label($data)
	{
		$this->load->view('label',$data);
	}
}
