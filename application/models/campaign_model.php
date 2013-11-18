<?php

Class Campaign_model extends CI_Model {

  function get_campaigns() {
    $query = $this->db->get('campaign');
    return $query->result();
  }

  function get_campaign_types() {
  	return array(
	    'email' => 'Email',
	    'teledemand' => 'Teledemand',
	    'ssd' => 'SSD',	  		
  	);
  }

	function SaveForm($form_data) {
		$this->db->insert('campaign', $form_data);		
		return ($this->db->affected_rows() == '1');
	}

}