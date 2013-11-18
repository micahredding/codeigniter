<?php

Class Brand extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('Brand_model');
	}	

	function brand() {
		$data = array();
		$data['brands'] = $this->Brand_model->get_brands();
		$this->load->view('brand', $data);		
	}

  function brand_add() {
    $this->form_validation->set_rules('brand_add', 'Brand', 'required');      
    $this->form_validation->set_rules('brand_add', 'Brand', 'callback_brand_unique');      

    if ($this->form_validation->run() == FALSE) { 
      $this->load->view('brand_add');   
    } else {
      $form_data = array(
        'brand_name' => set_value('brand_add'),
      );
    
      if ($this->Brand_model->SaveForm($form_data) == TRUE) {
        echo 'success';
      } else {
        echo 'failure';
      }
    }
  }

  function success() {
    echo 'Success!';
  }

  function brand_unique($str) {
    $brands = $this->Brand_model->get_brands();
    if(in_array($str, $brands)) {
      $this->form_validation->set_message('brand_unique', "That brand isn't unique!");
      return false;
    } else {
      return true;
    }    
  }

}