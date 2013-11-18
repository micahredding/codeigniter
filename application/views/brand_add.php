<?php echo form_open('Brand/brand_add'); ?>
<?php echo form_error('brand_add'); ?>
<label for="brand_add">Add a New Brand <span class="required">*</span></label>
<input id="brand_add" type="text" name="brand_add"  value="<?php echo set_value('brand_add'); ?>"  />
<input type="submit" value="Add" />
<?php echo form_close(); ?>
