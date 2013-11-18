function client_name_reload() {
  $.ajax('/index.php/Client/client_name').done(function(text){
    $('#client-name-inner').html(text);

    $.ajax('/index.php/Client/client_contact').done(function(text){
      $('#client-contact-inner').html(text);
    });

    client_name_trigger();
    client_name_add_button();
  });
}

function client_name_trigger() {
  $('#client-contact-inner select').val($('#client-name-inner select').val());
  $('#client-name-inner select').change(function(){
    $('#client-contact-inner select').val($('#client-name-inner select').val());
  });
}
function client_name_add_button() {
  $('#client-name-add-button').click(function(){
    client_name_add();
  });
}

function client_name_add() {
  $.ajax('/index.php/Client/client_name_add').done(function(text){
    $('#overlay').html(text);
    client_name_add_form();
    overlay_open();
  });
}

function client_name_add_form() {
  frm = $('#overlay form');
  frm.submit(function () {
    $.ajax({
      type: 'post',
      url: '/index.php/Client/client_name_add',
      data: frm.serializeArray(),
      success: function(data) {
        if(data == 'success') {
          client_name_reload();      
          overlay_close();            
        } else {
          $('#overlay').html(data);
          client_name_add_form();
        }
      }
    });

    return false;
  });  
}

function brand_reload() {
  $.ajax('/index.php/Brand/brand').done(function(text){
    $('#brand-inner').html(text);
    brand_add_button();
  });
}

function brand_add_button() {
  $('#brand-add-button').click(function(){
    brand_add();
  });  
}

function brand_add() {
  $.ajax('/index.php/Brand/brand_add').done(function(text){
    $('#overlay').html(text);
    brand_add_form();
    overlay_open();
  });
}

function brand_add_form() {
  frm = $('#overlay form');
  frm.submit(function () {
    $.ajax({
      type: 'post',
      url: '/index.php/Brand/brand_add',
      data: frm.serializeArray(),
      success: function(data) {
        if(data == 'success') {
          brand_reload();      
          overlay_close();            
        } else {
          $('#overlay').html(data);
          brand_add_form();
        }
      }
    });

    return false;
  });
}

function overlay_open() {
  $('#overlay').addClass('visible');
}
function overlay_close() {
  $('#overlay').removeClass('visible');
  $('#overlay').html('');
}

$(document).ready(function() {
  client_name_add_button();
  client_name_trigger();
  brand_add_button();
  $('#date input').datepicker();
});