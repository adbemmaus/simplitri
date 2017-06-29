<?php


defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Base controller for webapp.
 *
 */
class MY_Controller extends CI_Controller {

	protected $data = array(); // parameters for view components
	protected $id;   // identifier for our content

	/**
	 * Constructor.
	 * Establish view parameters & set a couple up
	 */

	function __construct()
	{
		parent::__construct();
		$this->data = array();
		$this->data['title'] = 'SimpliTri';
		$this->errors = array();


		// Prevent some security threats, per Kevin
		// Turn on IE8-IE9 XSS prevention tools
		//$this->output->set_header('X-XSS-Protection: 1; mode=block');
		// Don't allow any pages to be framed - Defends against CSRF
		//$this->output->set_header('X-Frame-Options: DENY');
		// prevent mime based attacks
		//$this->output->set_header('X-Content-Type-Options: nosniff');
	}

	/**
	 * Render this page
	 */
	function render()
	{
		if (!isset($this->data['pagetitle']))
			$this->data['pagetitle'] = $this->data['title'];

		// Menu Sidebar
		$choices = $this->config->item('menu_choices');
		foreach ($choices['menudata'] as &$menuitem)
		{
			$menuitem['active'] = (ltrim($menuitem['link'], '/ ') == uri_string()) ? 'active' : '';
			$test = explode('_',uri_string());
			$menuitem['active2'] = (ltrim($menuitem['link'], '/ ') == $test[0]) ? 'active' : '';
			$menuitem['link'] = base_url('/index.php'.$menuitem['link']);
			$choices1['menudata'][] = array(
				'active'=>$menuitem['active'],
				'link'=>$menuitem['link'],
				'name'=>$menuitem['name'],
				'class'=>$menuitem['class'],
			);

			if($menuitem['level']==0)
			{
				$menuitem['parse'] = $this->parser->parse('theme/sidebar0', $choices1, true);
			}

			if($menuitem['level']==1)
			{
				$choices1['menudata'][0] = array(
					'active'=>$menuitem['active2'],
					'name'=>$menuitem['name'],
					'class'=>$menuitem['class'],
				);
				$menuitem['parse'] = $this->parser->parse('theme/sidebar1', $choices1, true);
			}

			if($menuitem['level']==2)
			{

				$menuitem['parse'] = $this->parser->parse('theme/sidebar2', $choices1, true);
			}
			if($menuitem['level']==3)
			{

				$menuitem['parse'] = $this->parser->parse('theme/sidebar3', $choices1, true);
			}
			unset($choices1);
		}
		$this->data['sidebar'] = $this->parser->parse('theme/sidebar', $choices, true);

		// Head css
		$choices = $this->config->item('css_list');
		foreach ($choices['menudata'] as &$menuitem)
		{
			$menuitem['url'] = base_url('asset/'.$menuitem['link']);
		}
		$this->data['css'] = $this->parser->parse('theme/css', $choices, true);

		// foot js
		$choices = $this->config->item('js_list');
		foreach ($choices['menudata'] as &$menuitem)
		{
			$menuitem['url'] = base_url('asset/'.$menuitem['link']);
		}
		$this->data['js'] = $this->parser->parse('theme/js', $choices, true);

		$this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);


		// finally, build the browser page!
		$this->data['data'] = &$this->data;
		$this->parser->parse('theme/template', $this->data);
	}

}
