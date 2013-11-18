<?php $keys = array_keys($client_contacts); ?>
<?php $selected = end($keys); ?>
<?php echo form_dropdown('client_contact', $client_contacts, $selected); ?>
