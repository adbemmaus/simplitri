<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cartouches_Qualification_Toner extends MY_Controller {

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
    $num_ctn=$this->session->userdata('SESSION_CTN_NUMBER');
		if ($num_ctn==null)
		{
			$num_ctn=$this->Simplitri_Model->select_last_contenant();
		}

		if(isset($_POST["btn-up-LN"]))
    {
			$data = array(
				'num_ctn' => $num_ctn,
				'contenant_laser' => 'contenant_laser_n',
				'value' => 1,
				'type' => 'LN',
			);
      $this->update_contenant($data);
    }

		if(isset($_POST["btn-down-LN"]))
    {

			$data = array(
				'num_ctn' => $num_ctn,
				'contenant_laser' => 'contenant_laser_n',
				'value' => -1,
				'type' => 'LN',
			);
      $this->update_contenant($data);
    }

		if(isset($_POST["btn-up-LNE"]))
    {

			$data = array(
				'num_ctn' => $num_ctn,
				'contenant_laser' => 'contenant_laser_ne',
				'value' => 1,
				'type' => 'LNE',
			);
      $this->update_contenant($data);
    }

		if(isset($_POST["btn-down-LNE"]))
    {

			$data = array(
				'num_ctn' => $num_ctn,
				'contenant_laser' => 'contenant_laser_ne',
				'value' => -1,
				'type' => 'LNE',
			);
			$this->update_contenant($data);
    }

		if(isset($_POST["btn-up-L1"]))
    {

			$data = array(
				'num_ctn' => $num_ctn,
				'contenant_laser' => 'contenant_laser_1',
				'value' => 1,
				'type' => 'L1',
			);
      $this->update_contenant($data);
    }

		if(isset($_POST["btn-down-L1"]))
    {

			$data = array(
				'num_ctn' => $num_ctn,
				'contenant_laser' => 'contenant_laser_1',
				'value' => -1,
				'type' => 'L1',
			);
      $this->update_contenant($data);
    }

		if(isset($_POST["btn-up-L2"]))
    {

			$data = array(
				'num_ctn' => $num_ctn,
				'contenant_laser' => 'contenant_laser_2',
				'value' => 1,
				'type' => 'L2',
			);
      $this->update_contenant($data);
    }

		if(isset($_POST["btn-down-L2"]))
    {

			$data = array(
				'num_ctn' => $num_ctn,
				'contenant_laser' => 'contenant_laser_2',
				'value' => -1,
				'type' => 'L2',
			);
      $this->update_contenant($data);
    }

		if(isset($_POST["btn-up-L3"]))
    {

			$data = array(
				'num_ctn' => $num_ctn,
				'contenant_laser' => 'contenant_laser_3',
				'value' => 1,
				'type' => 'L3',
			);
      $this->update_contenant($data);
    }

		if(isset($_POST["btn-down-L3"]))
    {

			$data = array(
				'num_ctn' => $num_ctn,
				'contenant_laser' => 'contenant_laser_3',
				'value' => -1,
				'type' => 'L3',
			);
      $this->update_contenant($data);
    }

		if(isset($_POST["CEL_OUI"]))
    {

      $this->Simplitri_Model->update_cel_value(array('num_ctn'=>$num_ctn,'contenant_cel_bool'=>'OUI'));

    }
		if(isset($_POST["CEL_NON"]))
    {

      $this->Simplitri_Model->update_cel_value(array('num_ctn'=>$num_ctn,'contenant_cel_bool'=>'NON'));

    }

/******************************************************************************/

		if(isset($_POST["btn-updt-LN"]))
    {

			$data = array(
				'num_ctn' => $num_ctn,
				'contenant_laser' => 'contenant_laser_n',
				'value' => intval($this->input->post('in-updt-LN')),
				'type' => 'LN',
			);
      $this->update_contenant($data);

    }
		if(isset($_POST["btn-updt-LNE"]))
    {

			$data = array(
				'num_ctn' => $num_ctn,
				'contenant_laser' => 'contenant_laser_ne',
				'value' => intval($this->input->post('in-updt-LNE')),
				'type' => 'LNE',
			);
      $this->update_contenant($data);
    }

		if(isset($_POST["btn-updt-L1"]))
    {

			$data = array(
				'num_ctn' => $num_ctn,
				'contenant_laser' => 'contenant_laser_1',
				'value' => intval($this->input->post('in-updt-L1')),
				'type' => 'L1',
			);
      $this->update_contenant($data);
    }

		if(isset($_POST["btn-updt-L2"]))
    {

			$data = array(
				'num_ctn' => $num_ctn,
				'contenant_laser' => 'contenant_laser_2',
				'value' => intval($this->input->post('in-updt-L2')),
				'type' => 'L2',
			);
      $this->update_contenant($data);
    }

		if(isset($_POST["btn-updt-L3"]))
    {

			$data = array(
				'num_ctn' => $num_ctn,
				'contenant_laser' => 'contenant_laser_3',
				'value' => intval($this->input->post('in-updt-L3')),
				'type' => 'L3',
			);
      $this->update_contenant($data);
    }









		$result=$this->Simplitri_Model->select_all_contenant_toner(array('num_ctn'=>$num_ctn));
		$this->data['TOTAL_CONTENANT'] = $result->contenant_laser_n + $result->contenant_laser_ne + $result->contenant_laser_1 + $result->contenant_laser_2 + $result->contenant_laser_3 ;

		$this->data['CEL'] = $result->contenant_cel_bool;

    $this->data['title'] = '';
		$this->data['pagetitle'] = 'Simplitri';
    $this->data['welcome_message'] = 'Bienvenue sur Simplitri';
    $this->data['pagebody'] = 'tri_toner/cartouches_qualification_toner';
    $this->data['maintitle'] = 'Tri Toner';
		$this->data['CTN_NUMBER'] = $num_ctn;
		$this->data['FA_NUMBER'] = $result->fa_num;

		$data_tri_toner['tri_toner_build'][]=(array(
			'LASER' => $result->contenant_laser_n,
			'LASER_NAME'=> 'LASER N',
			'BTN_UP_CLASS' => 'btn-primary',
			'BTN_UP_NAME' => 'btn-up-LN',
			'BTN_DOWN_NAME' => 'btn-down-LN',
			'BTN_UPDT_NAME' => 'btn-updt-LN',
			'MODAL' => 'myModalLN',
			'INPUT_LASER' => 'in-updt-LN',
		));
		$data_tri_toner['tri_toner_build'][]=(array(
			'LASER' => $result->contenant_laser_ne,
			'LASER_NAME'=> 'LASER NE',
			'BTN_UP_CLASS' => 'btn-primary',
			'BTN_UP_NAME' => 'btn-up-LNE',
			'BTN_DOWN_NAME' => 'btn-down-LNE',
			'BTN_UPDT_NAME' => 'btn-updt-LNE',
			'MODAL' => 'myModalLNE',
			'INPUT_LASER' => 'in-updt-LNE',
		));
		$data_tri_toner['tri_toner_build'][]=(array(
			'LASER' => $result->contenant_laser_1,
			'LASER_NAME'=> 'LASER 1',
			'BTN_UP_CLASS' => 'btn-info',
			'BTN_UP_NAME' => 'btn-up-L1',
			'BTN_DOWN_NAME' => 'btn-down-L1',
			'BTN_UPDT_NAME' => 'btn-updt-L1',
			'MODAL' => 'myModalL1',
			'INPUT_LASER' => 'in-updt-L1',
		));
		$data_tri_toner['tri_toner_build'][]=(array(
			'LASER' => $result->contenant_laser_2,
			'LASER_NAME'=> 'LASER 2',
			'BTN_UP_CLASS' => 'btn-info',
			'BTN_UP_NAME' => 'btn-up-L2',
			'BTN_DOWN_NAME' => 'btn-down-L2',
			'BTN_UPDT_NAME' => 'btn-updt-L2',
			'MODAL' => 'myModalL2',
			'INPUT_LASER' => 'in-updt-L2',
		));
		$data_tri_toner['tri_toner_build'][]=(array(
			'LASER' => $result->contenant_laser_3,
			'LASER_NAME'=> 'LASER 3',
			'BTN_UP_CLASS' => 'btn-default',
			'BTN_UP_NAME' => 'btn-up-L3',
			'BTN_DOWN_NAME' => 'btn-down-L3',
			'BTN_UPDT_NAME' => 'btn-updt-L3',
			'MODAL' => 'myModalL3',
			'INPUT_LASER' => 'in-updt-L3',
		));
		$this->data['tri_toner'] = $this->parser->parse('tri_toner/tri_toner', $data_tri_toner, true);




		/*$time = microtime();
		$time = explode(' ', $time);
		$time = $time[1] + $time[0];
		$finish = $time;
		$total_time = round(($finish - $start), 4);
		$this->data['TIME'] = $total_time;*/

		$this->render();
	}

	public function new_contenant()
	{
		$this->session->set_userdata('SESSION_CTN_NUMBER',$this->input->post('ctn_number'));
		$this->index();
	}

	public function update_contenant($data)
	{
		$this->Simplitri_Model->update_contenant_toner(array('num_ctn'=>$data['num_ctn'],'contenant_laser_n'=>$data['contenant_laser'],'value'=>$data['value']));
		$result=$this->Simplitri_Model->select_suivi_jour(array('jour'=>date('Y-m-d')));
		if($result>0)
		{
			$this->Simplitri_Model->update_suivi_jour(array('jour'=>date('Y-m-d'),'type'=>$data['type'],'value'=>$data['value']));
		}
		else {
			$this->Simplitri_Model->insert_suivi_jour(array('jour'=>date('Y-m-d')));
			$this->Simplitri_Model->update_suivi_jour(array('jour'=>date('Y-m-d'),'type'=>$data['type'],'value'=>$data['value']));
		}
	}
}
