$(document).ready(function(){

	$("#cont").hide();
	$("#drop").click(function()
	{
		$("#cont").slideToggle("slow");
	});
	$("#contNA").hide();
	$("#newAdDrop").click(function()
	{
		$("#contNA").slideToggle("slow");
	});
	$('#log').click(function() { 
        $(this).parent().fadeOut(500);
 });

	$("#register").onclick=function ()
	{

			var email=document.getElementById("email1").value;
			var dob = document.getElementById("date").value; 
			var pass1=document.getElementById("pass1").value;
			var pass2=document.getElementById("pass2").value;
			var validator  = new Validator(email,dob,pass1,pass2); 

			validator.validateEmail(email);
			validator.validateBirthdate(dob); 
			validator.validatePasswords(pass1,pass2);
			return false;
	}

	$('.delete').on('click',function()
	{
		row=$(this).parent();
		id=row.attr('id');
		if(confirm ( "Are you sure you want to delete this advert?"))
		{
			$.ajax
			({
				type: 'POST',
				url: 'delete.php',
				data:{ 
					delete_row:'delete_row', 
					ad_id: id
				},
				success: function(response)
				{
					if(response=="success")
					{
						row.remove('li');
					}
					$('#delete').animate({ backgroundColor: "#003" }, "slow").animate({ opacity: "hide" }, "slow");
				}
			});
		}
	});
	$('.deleteW').on('click',function()
	{
		row=$(this).parent();
		id=row.attr('id');
		if(confirm ( "Are you sure you want to delete this wish?"))
		{
			$.ajax
			({
				type: 'POST',
				url: 'delete.php',
				data:{ 
					delete_wish:'delete_wish', 
					cart: id
				},
				success: function(response)
				{
					
					if(response=="success")
					{
						row.remove('li');
						alert("x2");
					}
					$('#delete').animate({ backgroundColor: "#003" }, "slow").animate({ opacity: "hide" }, "slow");
				}
			});
		}
	});

	$('.deletePro').on('click',function()
	{
		row=$(this).parent();
		id=row.attr('id');
		alert ("deleting");
		alert (id);
		if(confirm ( "Are you sure you want to delete your profile?"))
		{
			$.ajax
			({
				type: 'POST',
				url: 'delete.php',
				data:{ 
					delete_pro:'delete_pro', 
					user_id: id
				},
				success: function(response)
				{
					if(response=="success")
					{
						header("index.html");
						alert ("Your account has been successfully deleted.");
					}
				}
			});
		}
	});
	$('#editP').on('click', function()
	{
		location.href="editP.php";
	});
	$("#submit").submit(function()
	{
		alert("submit");
    	event.preventDefault();
 	});
 	
});