 //$.noConflict();
$(document).ready(function()
{
$('#txtCountry').change(function()
{
var id=$(this).val();
var dataString = 'id='+ id;
	$.ajax
	({
	type: "POST",
	url: "state_list.php",
	data: dataString,
	cache: false,
	success: function(html)
	{
		//alert(msg);
	$("#txtState").html(html);
	
	}
	});
	
	
		
});

});

$(document).ready(function(){
$("input#txtEmail").change(function() { 
	var eml = $("#txtEmail").val();
	if(eml=="")
	{
		$('#err').show();
		$('#err').html("Please enter your email");
		$("input#txtEmail").focus();
	}
	else if (!validateEmail(eml)) {
		$('#err').show();
		$('#err').html("Please enter a valid email");
		$("input#txtEmail").focus();
	}
	else{
		$.ajax({
		type: "POST",  
    	url: "user_check.php",  
   		data: "username="+ eml,  
    	success: function(msg)
		{  
			$('#err').show();
			$('#err').html(msg);
		}
		});
		
	}
});
});

function validateEmail(sEmail) {
var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
if (filter.test(sEmail)) {
return true;
}
else {
return false;
}
}
 $(document).on("click","#submit", function () {
	var fname = $("input#txtFName").val();
	var lname = $("input#txtLName").val();
	var email = $("input#txtEmail").val();
	var phone = $("input#txtPhone").val();
	var country = $("#txtCountry").val();
	var state = $("#txtState").val();
	var city = $("input#txtCity").val();
	var password = $("input#txtPassword").val();
	var repassword = $("input#txtRePassword").val();
	//var googleResponse = jQuery('#g-recaptcha-response').val();
 if(!fname || fname === 0) {
	 $('#err').show();
	$('#err').html("Please enter your first name");
	$("input#txtFName").focus();
	return false;
 }
else if(!lname || lname === 0) {
	 $('#err').show();
	$('#err').html("Please enter your last name");
	$("input#txtLName").focus();
	return false;
 }
else if (email=="") {
	 $('#err').show();
	$('#err').html("Please enter your email");
	$("input#txtEmail").focus();
}
else if (!validateEmail(email)) {
$('#err').show();
$('#err').html("Please enter a valid email");
$("input#txtEmail").focus();
}
else if ($("#emailTxt").val()==1) {
		$('#err').show();
		$('#err').html("The email is already in use.");
		return false;
	}
else if(!country || country === 0) {
	 $('#err').show();
	$('#err').html("Please select the country");
	$("input#txtCountry").focus();
	return false;
 }
 
else if(!state || state === 0) {
	 $('#err').show();
	$('#err').html("Please select the state ");
	$("input#txtCountry").focus();
	return false;
 }
else if(!password || password === 0) {
	 $('#err').show();
	$('#err').html("Please enter your password");
	$("input#txtPassword").focus();
	return false;
 }
else if(!repassword || repassword === 0) {
	 $('#err').show();
	$('#err').html("Please re-enter your password");
	$("input#txtRePassword").focus();
	return false;
 }
else if(password != repassword) {
	 $('#err').show();
	$('#err').html("Passwords do not match");
	$("input#txtRePassword").focus();
	return false;
 }
/* else if(googleResponse == "") {
	 $('#err').show();
	$('#err').html("Please check captcha");
	return false;
 }*/
 else
 {
 $('#err').hide();
 $('.loadingOverlay').show();
 //$("#output").html("<img src='images/loading.gif'>");
	//var subj = $("input#submit").val();
      $.ajax({
	  		type: 'post',
            url: "reg.php",
            data: 'fname='+fname+'&lname='+lname+'&email='+email+'&phone='+phone+'&country='+country+'&state='+state+'&city='+city+'&password='+password,
            success: function(data) {
				if(jQuery.trim(data)=="success")
				{
			 		window.location='registration-confirm.php';
				}
			 //alert(data);
            }
        });
	
    return true;
	}	
   });
   
$(document).ready(function(){
$("#sign1").click(function() { 
var usr = $("#txtLogUser").val();
var pass = $("#txtLogPass").val();
    $.ajax({  
    type: "POST",  
    url: "login_check.php",  
    data: "logUser="+ usr + "&logPass="+ pass, 
    success: function(msg){ 
	if(jQuery.trim(msg)=="success")
	{
		window.parent.location='userdata.php';
	}
	else if(jQuery.trim(msg)=="success1")
	{
		window.location='userdata_display.php';	
	}
	else
	{
		$("#logStatus").fadeIn();
		$("#logStatus").html(msg);
		setTimeout(function(){$('#logStatus').fadeOut();}, 3000);
	}
		//alert(msg);
		/*$("#logStatus").show();
		$("#logStatus").fadeIn();
		$("#logStatus").html(msg);
		setTimeout(function(){$('#logStatus').fadeOut();}, 3000);*/
	 } 
  }); 
});
});