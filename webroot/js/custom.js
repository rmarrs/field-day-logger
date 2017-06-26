$(function(){
  $(document).foundation();




  $('input[type=text]').blur(function(){
  	$('input[type=text]').val (function () {
      	return this.value.toUpperCase();   
  	});	 
  });




  $('#flash').fadeOut(3500);

});


function dupeCheck() { 
			
	var callsign = $("#callsign").val();
	var bands_id = $("#bands-id").val();
	var modes_id = $("#modes-id").val();
	
	if(callsign.length > 0 && bands_id.length > 0 && modes_id.length > 0) { 
		$.getJSON('/contacts/dupeCheck/' + callsign + '/' + bands_id + '/' + modes_id + '/', function(data) { 
			if(data.duplicate) { 
				$('#add_contact').addClass('alert');
				$('#add_contact').find('button').attr('disabled', 'disabled'); 
				$('#add_messages').html('<strong>Duplicate</strong>');
			} else { 
				$('#add_contact').removeClass('alert');
				$('#add_contact').find('button').attr('disabled', false); 
				$('#add_messages').html('');
			}
		});
	}
}