<?php $options = array_merge(array('- Select -'), $client_names); ?>
<?php $keys = array_keys($client_names); ?>
<?php $selected = end($keys); ?>
<?php echo form_dropdown('client_name', $client_names, $selected); ?>  
<a id="client-name-add-button" href="#">Add</a>