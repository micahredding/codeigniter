<html>
<?php $this->load->view('_head'); ?>

<body>
  <div id="header"><h1>A New Campaign</h1></div>

  <? echo form_open('Campaign/add'); ?>

  <div id="client-name">
    <label for="client_name">Client Name <span class="required">*</span></label>
    <?php echo form_error('client_name'); ?>
    <div id="client-name-inner">
      <?php echo form_dropdown('client_name', $client_names, set_value('client_name'))?>
      <a id="client-name-add-button" href="#">Add</a>
    </div>
  </div>                                             

  <div id="client-contact">
    <label for="client_contact">Client Contact <span class="required">*</span></label>
    <?php echo form_error('client_contact'); ?>
    <div id="client-contact-inner">
      <?php echo form_dropdown('client_contact', $client_contacts, set_value('client_contact')); ?>
    </div>
  </div>                                          

  <p>
    <label for="campaign_name">Campaign Name <span class="required">*</span></label>
    <?php echo form_error('campaign_name'); ?>
    <input id="campaign_name" type="text" name="campaign_name"  value="<?php echo set_value('campaign_name'); ?>"  />
  </p>

  <p>
    <label for="campaign_type">Campaign Type <span class="required">*</span></label>
    <?php echo form_error('campaign_type'); ?>
    <?php $options = $campaign_types; ?>
    <?php echo form_multiselect('campaign_type[]', $options, $this->input->post('campaign_type'))?>
  </p>                                             

  <div id="brand">
    <label for="brand">Brand <span class="required">*</span></label>
    <?php echo form_error('brand'); ?>
    <div id="brand-inner">
      <?php echo form_dropdown('brand', $brands, set_value('brand'))?>
      <a id="brand-add-button" href="#">Add</a>
    </div>
  </div>                                             

  <p id="date">
    <label for="campaign_date">Start Date <span class="required">*</span></label>
    <?php echo form_error('campaign_date'); ?>
    <input id="campaign_date" type="text" name="campaign_date"  value="<?php echo set_value('campaign_date'); ?>"  />
  </p>                                             
                          
  <p>
    <label for="notes">Notes</label>
    <?php echo form_error('notes'); ?>
    <?php echo form_textarea( array( 'name' => 'notes', 'rows' => '5', 'cols' => '80', 'value' => set_value('notes') ) )?>
  </p>

  <p>
    <?php echo form_submit( 'submit', 'Submit'); ?>
  </p>

  <?php echo form_close(); ?>

  <div id="footer"></div>

  <div id="overlay"></div>

</body>
</html>