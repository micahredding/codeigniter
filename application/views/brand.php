<?php $keys = array_keys($brands); ?>
<?php $selected = end($keys); ?>
<?php echo form_dropdown('brand', $brands, $selected); ?>  
<a id="brand-add-button" href="#">Add</a>