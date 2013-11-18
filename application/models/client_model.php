<?php

Class Client_model extends CI_Model {

  function get_client_names() {
    $query = $this->db->get('client');
    $result = $query->result();
    $clients = array();
    foreach($result as $client) {
      $clients[$client->id] = $client->client_name;
    }
    return $clients;
  }

  function get_client_contacts() {
    $query = $this->db->get('client');
    $result = $query->result();
    $clients = array();
    foreach($result as $client) {
      $clients[$client->id] = $client->client_contact;
    }
    return $clients;
  }

  function SaveForm($form_data) {
    $this->db->insert('client', $form_data);    
    return ($this->db->affected_rows() == '1');
  }  
  
}