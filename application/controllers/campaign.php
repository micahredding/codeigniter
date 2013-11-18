<?php

Class Campaign extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('Campaign_model');
		$this->load->model('Client_model');
		$this->load->model('Brand_model');
		date_default_timezone_set('UTC');		
	}	

	function add() {
		$this->form_validation->set_rules('client_name', 'Client Name', 'required');			
		$this->form_validation->set_rules('client_contact', 'Client Contact', 'required');			
		$this->form_validation->set_rules('campaign_name', 'Campaign Name', 'required');			
		$this->form_validation->set_rules('campaign_name', 'Campaign Name', 'callback_campaign_name_check');			
		$this->form_validation->set_rules('campaign_type', 'Campaign Type', 'required');			
		$this->form_validation->set_rules('brand', 'Brand', 'required');			
		$this->form_validation->set_rules('campaign_date', 'Date', 'required');			
		$this->form_validation->set_rules('campaign_date', 'Date', 'callback_campaign_date_check');			
		$this->form_validation->set_rules('notes', 'Notes', '');
			
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');

		$data = array();
		$data['client_names'] = $this->Client_model->get_client_names();
		$data['client_contacts'] = $this->Client_model->get_client_contacts();
		$data['campaign_types'] = $this->Campaign_model->get_campaign_types();
		$data['brands'] = $this->Brand_model->get_brands();
	
		if ($this->form_validation->run() == FALSE) { 
			$this->load->view('campaign_add', $data);
		} else {
			$stamp = strtotime(set_value('campaign_date'));			
			$form_data = array(
		       	'client_name' => set_value('client_name'),
		       	'client_contact' => set_value('client_contact'),       	
		       	'campaign_name' => set_value('campaign_name'),
		       	'campaign_type' => implode(',', $this->input->post('campaign_type')),
		       	'brand' => set_value('brand'),
		       	'campaign_date' => $stamp,
		       	'notes' => set_value('notes')
			);
		
			if ($this->Campaign_model->SaveForm($form_data) == TRUE) {
				redirect('Campaign');
			} else {
				echo 'An error occurred saving your information. Please try again later';
			}
		}
	}


	function index() {
		$data['campaigns'] = $this->Campaign_model->get_campaigns();		
		$data['client_names'] = $this->Client_model->get_client_names();
		$data['client_contacts'] = $this->Client_model->get_client_contacts();
		$data['campaign_types'] = $this->Campaign_model->get_campaign_types();
		$data['brands'] = $this->Brand_model->get_brands();
		$this->load->view('campaign_all', $data);
	}

	function success() {
		echo 'Form successfully submitted with all validation passed!';
	}

	function campaign_name_check($str) {
		$clean = '/[^A-Za-z0-9\_\:\!\#]/';
		$new_string = preg_replace($clean, "", $str);
		if($new_string == $str) {
			return true;
		} else {
			$this->form_validation->set_message('campaign_name_check', 'The Campaign Name can only contain letters, numbers, and _:!#');
			return false;
		}
	}

	function campaign_date_check($str) {
		$stamp = strtotime(set_value('campaign_date'));			
		if($stamp > time()) {
			return true;
		} else {
			$this->form_validation->set_message('campaign_date_check', 'The Campaign Start Date must be in the future.');
			return false;
		}
	}
}