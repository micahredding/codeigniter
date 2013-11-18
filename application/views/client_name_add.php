<?php echo form_open('Client/client_name_add'); ?>
<?php echo form_error('client_name_add'); ?>
<label for="client_name_add">Add a New Client Name <span class="required">*</span></label>
<input id="client_name_add" type="text" name="client_name_add"  value="<?php echo set_value('client_name_add'); ?>"  />
<?php echo form_error('client_contact_add'); ?>
<label for="client_contact_add">Add a New Client Contact <span class="required">*</span></label>
<input id="client_contact_add" type="text" name="client_contact_add"  value="<?php echo set_value('client_contact_add'); ?>"  />
<input type="submit" value="Add" />
<?php echo form_close(); ?>
