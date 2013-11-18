<?php

Class Client extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('Client_model');
	}	

  function client_name() {
    $data = array();
    $data['client_names'] = $this->Client_model->get_client_names();
    $this->load->view('client_name', $data);    
  }

  function client_contact() {
    $data = array();
    $data['client_contacts'] = $this->Client_model->get_client_contacts();
    $this->load->view('client_contact', $data);
  }

  function client_name_add() {
    $this->form_validation->set_rules('client_name_add', 'Client Name', 'required');      
    $this->form_validation->set_rules('client_name_add', 'Client Name', 'callback_client_name_unique');
    $this->form_validation->set_rules('client_contact_add', 'Client Contact', 'required');      
    $this->form_validation->set_rules('client_contact_add', 'Client Contact', 'callback_client_contact_unique');      

    if ($this->form_validation->run() == FALSE) { 
      $this->load->view('client_name_add');   
    } else {
      $form_data = array(
        'client_name' => set_value('client_name_add'),
        'client_contact' => set_value('client_contact_add'),
      );
    
      if ($this->Client_model->SaveForm($form_data) == TRUE) {
        echo 'success';
      } else {
        echo 'failure';
      }
    }
  }

  function success() {
    echo 'Success!';
  }

  function client_name_unique($str) {
    $client_names = $this->Client_model->get_client_names();
    if(in_array($str, $client_names)) {
      $this->form_validation->set_message('client_name_unique', "That client name isn't unique!");
      return false;
    } else {
      return true;
    }
  }
  function client_contact_unique($str) {
    $client_contacts = $this->Client_model->get_client_contacts();
    if(in_array($str, $client_contacts)) {
      $this->form_validation->set_message('client_contact_unique', "That client contact isn't unique!");
      return false;
    } else {
      return true;
    }
  }
}