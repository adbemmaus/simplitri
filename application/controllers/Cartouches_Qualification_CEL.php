<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cartouches_Qualification_CEL extends MY_Controller {

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

		if(isset($_POST["btn-up-CN"]))
    {
			$data = array(
				'num_ctn' => $num_ctn,
				'contenant_cel' => 'contenant_cel_n',
				'value' => 1,
				'type' => 'CN',
			);
      $this->update_contenant($data);
    }

		if(isset($_POST["btn-down-CN"]))
    {

			$data = array(
				'num_ctn' => $num_ctn,
				'contenant_cel' => 'contenant_cel_n',
				'value' => -1,
				'type' => 'CN',
			);
      $this->update_contenant($data);
    }

		if(isset($_POST["btn-up-CNE"]))
    {

			$data = array(
				'num_ctn' => $num_ctn,
				'contenant_cel' => 'contenant_cel_ne',
				'value' => 1,
				'type' => 'CNE',
			);
      $this->update_contenant($data);
    }

		if(isset($_POST["btn-down-CNE"]))
    {

			$data = array(
				'num_ctn' => $num_ctn,
				'contenant_cel' => 'contenant_cel_ne',
				'value' => -1,
				'type' => 'CNE',
			);
			$this->update_contenant($data);
    }

		if(isset($_POST["btn-up-C1"]))
    {

			$data = array(
				'num_ctn' => $num_ctn,
				'contenant_cel' => 'contenant_cel_1',
				'value' => 1,
				'type' => 'C1',
			);
      $this->update_contenant($data);
    }

		if(isset($_POST["btn-down-C1"]))
    {

			$data = array(
				'num_ctn' => $num_ctn,
				'contenant_cel' => 'contenant_cel_1',
				'value' => -1,
				'type' => 'C1',
			);
      $this->update_contenant($data);
    }

		if(isset($_POST["btn-up-C2"]))
    {

			$data = array(
				'num_ctn' => $num_ctn,
				'contenant_cel' => 'contenant_cel_2',
				'value' => 1,
				'type' => 'C2',
			);
      $this->update_contenant($data);
    }

		if(isset($_POST["btn-down-C2"]))
    {

			$data = array(
				'num_ctn' => $num_ctn,
				'contenant_cel' => 'contenant_cel_2',
				'value' => -1,
				'type' => 'C2',
			);
      $this->update_contenant($data);
    }

		if(isset($_POST["btn-up-C3"]))
    {

			$data = array(
				'num_ctn' => $num_ctn,
				'contenant_cel' => 'contenant_cel_3',
				'value' => 1,
				'type' => 'C3',
			);
      $this->update_contenant($data);
    }

		if(isset($_POST["btn-down-C3"]))
    {

			$data = array(
				'num_ctn' => $num_ctn,
				'contenant_cel' => 'contenant_cel_3',
				'value' => -1,
				'type' => 'C3',
			);
      $this->update_contenant($data);
    }


/******************************************************************************/

		if(isset($_POST["btn-updt-CN"]))
    {

			$data = array(
				'num_ctn' => $num_ctn,
				'contenant_cel' => 'contenant_cel_n',
				'value' => intval($this->input->post('in-updt-CN')),
				'type' => 'CN',
			);
      $this->update_contenant($data);

    }
		if(isset($_POST["btn-updt-CNE"]))
    {

			$data = array(
				'num_ctn' => $num_ctn,
				'contenant_cel' => 'contenant_cel_ne',
				'value' => intval($this->input->post('in-updt-CNE')),
				'type' => 'CNE',
			);
      $this->update_contenant($data);
    }

		if(isset($_POST["btn-updt-C1"]))
    {

			$data = array(
				'num_ctn' => $num_ctn,
				'contenant_cel' => 'contenant_cel_1',
				'value' => intval($this->input->post('in-updt-C1')),
				'type' => 'C1',
			);
      $this->update_contenant($data);
    }

		if(isset($_POST["btn-updt-C2"]))
    {

			$data = array(
				'num_ctn' => $num_ctn,
				'contenant_cel' => 'contenant_cel_2',
				'value' => intval($this->input->post('in-updt-C2')),
				'type' => 'C2',
			);
      $this->update_contenant($data);
    }

		if(isset($_POST["btn-updt-C3"]))
    {

			$data = array(
				'num_ctn' => $num_ctn,
				'contenant_cel' => 'contenant_cel_3',
				'value' => intval($this->input->post('in-updt-C3')),
				'type' => 'C3',
			);
      $this->update_contenant($data);
    }









		$result=$this->Simplitri_Model->select_all_contenant_toner(array('num_ctn'=>$num_ctn));
		$this->data['TOTAL_CONTENANT'] = $result->contenant_cel_n + $result->contenant_cel_ne + $result->contenant_cel_1 + $result->contenant_cel_2 + $result->contenant_cel_3 ;


    $this->data['title'] = '';
		$this->data['pagetitle'] = 'Simplitri';
    $this->data['welcome_message'] = 'Bienvenue sur Simplitri';
    $this->data['pagebody'] = 'tri_cel/cartouches_qualification_cel';
    $this->data['maintitle'] = 'Tri CEL';
		$this->data['CTN_NUMBER'] = $num_ctn;
		$this->data['FA_NUMBER'] = $result->fa_num;

		$data_tri_cel['tri_cel_build'][]=(array(
			'CEL' => $result->contenant_cel_n,
			'CEL_NAME'=> 'CEL N',
			'BTN_UP_CLASS' => 'btn-primary',
			'BTN_UP_NAME' => 'btn-up-CN',
			'BTN_DOWN_NAME' => 'btn-down-CN',
			'BTN_UPDT_NAME' => 'btn-updt-CN',
			'MODAL' => 'myModalCN',
			'INPUT_CEL' => 'in-updt-CN',
		));
		$data_tri_cel['tri_cel_build'][]=(array(
			'CEL' => $result->contenant_cel_ne,
			'CEL_NAME'=> 'CEL NE',
			'BTN_UP_CLASS' => 'btn-primary',
			'BTN_UP_NAME' => 'btn-up-CNE',
			'BTN_DOWN_NAME' => 'btn-down-CNE',
			'BTN_UPDT_NAME' => 'btn-updt-CNE',
			'MODAL' => 'myModalCNE',
			'INPUT_CEL' => 'in-updt-CNE',
		));
		$data_tri_cel['tri_cel_build'][]=(array(
			'CEL' => $result->contenant_cel_1,
			'CEL_NAME'=> 'CEL 1',
			'BTN_UP_CLASS' => 'btn-info',
			'BTN_UP_NAME' => 'btn-up-C1',
			'BTN_DOWN_NAME' => 'btn-down-C1',
			'BTN_UPDT_NAME' => 'btn-updt-C1',
			'MODAL' => 'myModalC1',
			'INPUT_CEL' => 'in-updt-C1',
		));
		$data_tri_cel['tri_cel_build'][]=(array(
			'CEL' => $result->contenant_cel_2,
			'CEL_NAME'=> 'CEL 2',
			'BTN_UP_CLASS' => 'btn-info',
			'BTN_UP_NAME' => 'btn-up-C2',
			'BTN_DOWN_NAME' => 'btn-down-C2',
			'BTN_UPDT_NAME' => 'btn-updt-C2',
			'MODAL' => 'myModalC2',
			'INPUT_CEL' => 'in-updt-C2',
		));
		$data_tri_cel['tri_cel_build'][]=(array(
			'CEL' => $result->contenant_cel_3,
			'CEL_NAME'=> 'CEL 3',
			'BTN_UP_CLASS' => 'btn-default',
			'BTN_UP_NAME' => 'btn-up-C3',
			'BTN_DOWN_NAME' => 'btn-down-C3',
			'BTN_UPDT_NAME' => 'btn-updt-C3',
			'MODAL' => 'myModalC3',
			'INPUT_CEL' => 'in-updt-C3',
		));
		$this->data['tri_cel'] = $this->parser->parse('tri_cel/tri_cel', $data_tri_cel, true);


		$this->render();
	}

	public function new_contenant()
	{
		$this->session->set_userdata('SESSION_CTN_NUMBER',$this->input->post('ctn_number'));
		$this->index();
	}

	public function update_contenant($data)
	{
		$this->Simplitri_Model->update_contenant_toner(array('num_ctn'=>$data['num_ctn'],'contenant_laser_n'=>$data['contenant_cel'],'value'=>$data['value']));
		$result=$this->Simplitri_Model->select_suivi_jour(array('jour'=>date('Y-m-d'),'type'=>$data['type']));
		if($result>0)
		{
			$this->Simplitri_Model->update_suivi_jour(array('jour'=>date('Y-m-d'),'type'=>$data['type'],'value'=>$data['value']));
		}
		else {
			$this->Simplitri_Model->insert_suivi_jour(array('jour'=>date('Y-m-d'),'type'=>$data['type']));
		}
	}
}
