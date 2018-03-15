function Validator(email, date, pass1, pass2)
{
	this.validateEmail = function(email)
	{
		var check = /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i;
		if(!check.test(email))
		{
			alert("Invalid email."); 
			return false; 
		}
		return true;
	}

	// this.validateBirthdate = function (date) 
	// {
	// 	var ageCheck="";
	// 	for(var k=0; k<4; k++)
	// 	{
	// 		 ageCheck+=date[k];
	// 	}

	// 	var age= parseInt(ageCheck); 
	// 	var a= new Date();
	// 	if((a.getFullYear()-age)<18)
	// 	{
	// 		alert("You are not old enough.");
	// 		return false; 
	// 	}
	// 	//return true; 
	// }

	this.validatePasswords = function (pass1,pass2)
	{
		if(pass1.length<4)
		{
			alert("Your password is too short."); 
			return false; 
		}

		if(pass1!=pass2)
		{
			alert("These passwords do not match");
			return false; 
		}
		
		var intflag=false;
		var apFlag=false; 
		
		if( /\d/.test(pass1))
		{
			intflag=true; 	
		}

		for(var j=0; j<pass1.length;j++)
		{
			if(pass1[j]==pass1[j].toUpperCase())
				alFlag=true;  
		}
		if(intflag && alFlag)
		{
		
			return true;
		}
		else
		{
			alert("Your password is missing characters.\n Check you have at least one numeric value and one uppercase.");
			return false;		
		}	
				
	}
}