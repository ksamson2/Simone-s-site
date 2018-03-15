$(document).ready(function (){
	function send_message(message,reciever) {
		$.ajax({
		//  type: 'POST',
			url: 'add_msg.php',
			method:'POST',
			data: {
				msg: message,
				sendto: reciever
			},
			success: function(data) {
				$('#chatMsg').val('');
			 get_messages();
			} 
		}); 
	}

	/*
	 Get's the chat messages.
	 */
	function get_messages() {
		$.ajax({
			url: 'get_messages.php',
			method: 'GET',
			success: function(data) {
				$('.msg-wgt-body').html(data);
			}
		});
	}

	/**
	 * Initializes the chat application
	 */
	function boot_chat() {

		// Load the messages every 5 seconds
	 setInterval(get_messages, 20000);

		$('#submit').on('click', function() 
		{
			var message = $('#chatMsg').val();
			var sendto = $('#sendto').val();
			// Check if the message is not empty
			if (message.length != 0 && sendto.length != 0)
			 {
				alert('Sending message to: ' + sendto);
				send_message(message,sendto);
				event.preventDefault();
			}
			 else 
			{
				alert('Provide a message to send!');
				$('#chatArea').val('');
			}
		});
		// this function  allows you to message the seller directly from the advert. 
		$('.messageseller').on('click',function()
		{
			$.ajax({
				url: 'delete.php',
				type: 'POST',
				data:{
					getemail: $(this).attr('class').split(' ')[4]},
				success: function(getemail)
				{
					$('#send2').val(getemail);
				}
			});

		});
		
		$('#submit2').on('click', function() 
		{
			var message2 = $('#chatMsg2').val();
			var sendto2 = $('#send2').val();
			// Check if the message and recipient fields are not empty
			if (message2 != '' && sendto2 != '')
			 {
				alert('Sending message to: ' + sendto2);
				send_message(message2,sendto2);
				$('#msgModal').modal('hide');
				// event.preventDefault();
			}
			 else 
			 {
				alert('Provide a message and a recipient!');
				$('#chatMsg2').val('');
			}
		});
	}

	// Initialize the chat
	boot_chat();
});