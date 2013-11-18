<?php

Class Brand_model extends CI_Model {
  function get_brands() {
    $query = $this->db->get('brand');
    $result = $query->result();
    $brands = array();
    foreach($result as $brand) {
      $brands[$brand->id] = $brand->brand_name;
    }
    return $brands;
  }

  function SaveForm($form_data) {
    $this->db->insert('brand', $form_data);    
    return ($this->db->affected_rows() == '1');
  }  

}