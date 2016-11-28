$(document).ready(function() {
    var max_fields0      = 5; //maximum input boxes allowed
    var wrapper         = $("#input_fields_wrap"); //Fields wrapper
    var add_button      = $("#add_field_button"); //Add button ID
   
    var p = 0; //initlal text box count
	var idd = "";
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(p < max_fields0){ //max input box allowed
            p++; //text box increment
			var idd = document.getElementById('txtOffcPhone').value;
			if(idd!="")
			{
				var idd = idd.substr(0,4);
				//alert(idd);
			}
			else
			{
				
				idd = "&nbsp;";
			}
            $(wrapper).append('<div><input type="text" name="txtOffcPhone[]" id="txtOffcPhone[]" value='+idd+' class="input" style="width:87%" /><a href="javascript:void(0)" class="remove_field"><i class="fa fa-minus-square fa-2x" aria-hidden="true"></i></a></div>'); //add input box
        }
    });
   
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); p--;
    })
	
	
	var max_fields7      = 5; //maximum input boxes allowed
    var wrapperBranch         = $("#input_fields_wrapBranch"); //Fields wrapper
    var add_buttonBranch      = $("#add_field_buttonBranch"); //Add button ID
   
    var a = 1; //initlal text box count
	var idd = "";
    $(add_buttonBranch).click(function(e){ //on add input button click
        e.preventDefault();
        if(a < max_fields7){ //max input box allowed
            a++; //text box increment
			var idd = document.getElementById('txtBranchOffcPhone').value;
			if(idd!="")
			{
				var idd = idd.substr(0,4);
				//alert(idd);
			}
			else
			{
				
				idd = "&nbsp;";
			}
            $(wrapperBranch).append('<div><input type="text" name="txtBranchOffcPhone[]" id="txtBranchOffcPhone[]" value='+idd+' class="input" style="width:87%" /><a href="javascript:void(0)" class="remove_fieldBranch"><i class="fa fa-minus-square fa-2x" aria-hidden="true"></i></a></div>'); //add input box
        }
    });
   
    $(wrapperBranch).on("click",".remove_fieldBranch", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); a--;
    })
	
	
	$("#add_field_button_fax").click(function(e){ //on add input button click
        e.preventDefault();
		 var max_fields2      = 5; //maximum input boxes allowed
		 var y = 1;
        if(y < max_fields2){ //max input box allowed
            y++; //text box increment
			var idd = document.getElementById('txtFax').value;
			if(idd!="")
			{
				var idd = idd.substr(0,4);
				//alert(idd);
			}
			else
			{
				
				idd = "&nbsp;";
			}
           $("#input_fields_wrap_fax").append('<div><input type="text" name="txtFax[]" id="txtFax[]" value='+idd+' class="input"  style="width:87%"/><a href="javascript:void(0)" class="remove_field_fax"><i class="fa fa-minus-square fa-2x" aria-hidden="true"></i></a></div>'); //add input box
        }
    });
   
   $("#input_fields_wrap_fax").on("click",".remove_field_fax", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); y--;
    })
	
	
	$("#add_field_button_faxBranch").click(function(e){ //on add input button click
        e.preventDefault();
		 var max_fields8      = 5; //maximum input boxes allowed
		 var b = 1;
        if(b < max_fields8){ //max input box allowed
            b++; //text box increment
			var idd = document.getElementById('txtBranchFax').value;
			if(idd!="")
			{
				var idd = idd.substr(0,4);
				//alert(idd);
			}
			else
			{
				
				idd = "&nbsp;";
			}
           $("#input_fields_wrap_faxBranch").append('<div><input type="text" name="txtBranchFax[]" value='+idd+' id="txtBranchFax[]" class="input"  style="width:87%"/><a href="javascript:void(0)" class="remove_field_faxBranch"><i class="fa fa-minus-square fa-2x" aria-hidden="true"></i></a></div>'); //add input box
        }
    });
   
   $("#input_fields_wrap_faxBranch").on("click",".remove_field_faxBranch", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); b--;
    })
	
	
	$("#add_field_button_mobile").click(function(e){ //on add input button click
        e.preventDefault();
		 var max_fields12     = 5; //maximum input boxes allowed
		 var n = 1;
        if(n < max_fields12){ //max input box allowed
            n++; //text box increment
			var idd = document.getElementById('txtMobilePhone').value;
			if(idd!="")
			{
				var idd = idd.substr(0,4);
				//alert(idd);
			}
			else
			{
				idd = "&nbsp;";
			}
           $("#input_fields_wrap_mobile").append('<div><input type="text" name="txtMobilePhone[]" id="txtMobilePhone" class="input"  style="width:87%" value='+idd+'><a href="javascript:void(0)" class="remove_field_mobile"><i class="fa fa-minus-square fa-2x" aria-hidden="true"></i></a></div>'); //add input box
        }
    });
   
   $("#input_fields_wrap_mobile").on("click",".remove_field_mobile", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); n--;
    })
	
	
	$("#add_field_button_mobileBranch").click(function(e){ //on add input button click
        e.preventDefault();
		 var max_fields9      = 5; //maximum input boxes allowed
		 var c = 1;
        if(c < max_fields9){ //max input box allowed
            c++; //text box increment
			var idd = document.getElementById('txtBranchMobilePhone').value;
			if(idd!="")
			{
				var idd = idd.substr(0,4);
				//alert(idd);
			}
			else
			{
				
				idd = "&nbsp;";
			}
           $("#input_fields_wrap_mobileBranch").append('<div><input type="text" name="txtBranchMobilePhone[]" id="txtBranchMobilePhone" class="input" value='+idd+'  style="width:87%"/><a href="javascript:void(0)" class="remove_field_mobileBranch"><i class="fa fa-minus-square fa-2x" aria-hidden="true"></i></a></div>'); //add input box
        }
    });
   
   $("#input_fields_wrap_mobileBranch").on("click",".remove_field_mobileBranch", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); c--;
    })
	
	
		$("#add_field_button_sel").click(function(e){ //on add input button click
        e.preventDefault();
		 var max_fields4      = 5; //maximum input boxes allowed
		 var j = 1;
        if(j < max_fields4){ //max input box allowed
            j++; //text box increment
            social_field = '';
            social_field += '<div class="form-group">';
		    social_field += '<label class="control-label col-md-3">&nbsp;</label>';
		    social_field += '<div class="col-md-2">';
		    social_field += '<select class="form-control" name="selEcommerce[]" id="selEcommerce">';
			social_field += '<option value=" ">Select</option>';
			social_field += '<option value="Twitter">Twitter </option>';
			social_field += '<option value="Facebook">Facebook </option>';
			social_field += '<option value="Line">Line </option>';
			social_field += '<option value="LinkedIn">LinkedIn </option>';
			social_field += '<option value="Amazon">Amazon </option>';
			social_field += '<option value="Alibaba">Alibaba </option>';
			social_field += '<option value="eBay">eBay</option>';
			social_field += '<option value="Other">Other</option>';  
            social_field += '</select>';
		    social_field += '</div>';
		    social_field += '<div class="col-md-3">';
		    social_field += '<input type="text" class="form-control" name="txtEcomUrl[]" id="txtEcomUrl" required placeholder="">';
		    social_field += '</div>&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void(0)" class="remove_field_sel"><i class="fa fa-minus-square fa-2x" aria-hidden="true"></i></a>';
            $("#social_plugings").append(social_field); //add input box
        }
    });
   
   $("#social_plugings").on("click",".remove_field_sel", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); j--;
    })
	
	
	$("#add_field_button_selBranch").click(function(e){ //on add input button click
        e.preventDefault();
		 var max_fields10      = 5; //maximum input boxes allowed
		 var d = 1;
        if(d < max_fields10){ //max input box allowed
            d++; //text box increment
           social_field1 = '';
            social_field1 += '<div class="form-group">';
		    social_field1 += '<label class="control-label col-md-3">&nbsp;</label>';
		    social_field1 += '<div class="col-md-2">';
		    social_field1 += '<select class="form-control" name="selBranchEcommerce[]" id="selBranchEcommerce">';
			social_field1 += '<option value=" ">Select</option>';
			social_field1 += '<option value="Twitter">Twitter </option>';
			social_field1 += '<option value="Facebook">Facebook </option>';
			social_field1 += '<option value="Line">Line </option>';
			social_field1 += '<option value="LinkedIn">LinkedIn </option>';
			social_field1 += '<option value="Amazon">Amazon </option>';
			social_field1 += '<option value="Alibaba">Alibaba </option>';
			social_field1 += '<option value="eBay">eBay</option>';
			social_field1 += '<option value="Other">Other</option>';  
            social_field1 += '</select>';
		    social_field1 += '</div>';
		    social_field1 += '<div class="col-md-3">';
		    social_field1 += '<input type="text" class="form-control" name="txtBranchEcomUrl[]" id="txtBranchEcomUrl" required placeholder="">';
		    social_field1 += '</div><a href="javascript:void(0)" class="remove_field_selBranch"><i class="fa fa-minus-square fa-2x" aria-hidden="true"></i></a>';
            $("#social_plugings1").append(social_field1); //add input box
        }
    });
   
   $("#social_plugings1").on("click",".remove_field_selBranch", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); d--;
    })
	

	
});

 function readURL(input) {
   if (input.files && input.files[0]) {
   var fup = document.getElementById('logo');
	var fileName = fup.value;
	var fsize = fup.files[0].size;
	if(fsize>1000000)
	{
		document.getElementById('logo').parentNode.innerHTML = document.getElementById('logo').parentNode.innerHTML;
		//alert(fileName);
		alert("Maximum size exceeded!");
		return false;
	}
	
	var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
		if(ext == "gif" || ext == "GIF" || ext == "JPEG" || ext == "jpeg" || ext == "jpg" || ext == "JPG" || ext == "png" || ext == "PNG")
		{
			var reader = new FileReader();
			reader.onload = function (e) {
			//$('#test').attr('src', e.target.result);
			document.getElementById('sad').value=e.target.result;
		 }
			reader.readAsDataURL(input.files[0]);
			return true;
		} 
		else
		{
			document.getElementById('logo').parentNode.innerHTML = document.getElementById('logo').parentNode.innerHTML;
			alert("Sorry you can upload \n jpeg, png and gif images only!");
			fup.focus();
			return false;
		}
	}
}	

$(document).ready(function() {
        // Tooltip only Text
        $('.thm-btn').hover(function(){
                // Hover over code
                var title = $(this).attr('title');
                $(this).data('tipText', title).removeAttr('title');
                $('<p class="tooltip1"></p>')
                .text(title)
                .appendTo('body')
                .fadeIn('slow');
        }, function() {
                // Hover out code
                $(this).attr('title', $(this).data('tipText'));
                $('.tooltip1').remove();
        }).mousemove(function(e) {
                var mousex = e.pageX + 20; //Get X coordinates
                var mousey = e.pageY + 10; //Get Y coordinates
                $('.tooltip1')
                .css({ top: mousey, left: mousex })
        });
});

$(document).ready(function()
{
$('#txtBranchCompanyAddrCountry').change(function()
{
var id=$(this).val();
if(id=="36")
		{
			$("input[name='txtBranchOffcPhone[]']").val("+855");
			$("input[name='txtBranchFax[]']").val("+855");
			$("input[name='txtBranchMobilePhone[]']").val("+855");
		}
else if(id=="119")
		{
			$("input[name='txtBranchOffcPhone[]']").val("+856");
			$("input[name='txtBranchFax[]']").val("+856");
			$("input[name='txtBranchMobilePhone[]']").val("+856");
		}
else if(id=="150")
		{
			$("input[name='txtBranchOffcPhone[]']").val("+95 ");
			$("input[name='txtBranchFax[]']").val("+95 ");
			$("input[name='txtBranchMobilePhone[]']").val("+95 ");
		}
else if(id=="217")
		{
			$("input[name='txtBranchOffcPhone[]']").val("+66 ");
			$("input[name='txtBranchFax[]']").val("+66 ");
			$("input[name='txtBranchMobilePhone[]']").val("+66 ");
		}
else if(id=="238")
		{
			$("input[name='txtBranchOffcPhone[]']").val("+84 ");
			$("input[name='txtBranchFax[]']").val("+84 ");
			$("input[name='txtBranchMobilePhone[]']").val("+84 ");
		}
else
		{
			$("input[name='txtBranchOffcPhone[]']").val(" ");
			$("input[name='txtBranchFax[]']").val(" ");
			$("input[name='txtBranchMobilePhone[]']").val(" ");
		}

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
	$("#txtBranchCompanyAddrProvince").html(html);
	
	}
	});
	
	
		
});

});

$(document).ready(function()
{
$('#txtCompanyAddrCountry').change(function()
{
var id=$(this).val();
if(id=="36")
		{
			$("input[name='txtOffcPhone[]']").val("+855");
			$("input[name='txtFax[]']").val("+855");
			$("input[name='txtMobilePhone[]']").val("+855");
		}
		
else if(id=="119")
		{
			$("input[name='txtOffcPhone[]']").val("+856");
			$("input[name='txtFax[]']").val("+856");
			$("input[name='txtMobilePhone[]']").val("+856");
		}
else if(id=="150")
		{
			$("input[name='txtOffcPhone[]']").val("+95 ");
			$("input[name='txtFax[]']").val("+95 ");
			$("input[name='txtMobilePhone[]']").val("+95 ");
		}
else if(id=="217")
		{
			$("input[name='txtOffcPhone[]']").val("+66 ");
			$("input[name='txtFax[]']").val("+66 ");
			$("input[name='txtMobilePhone[]']").val("+66 ");
		}
else if(id=="238")
		{
			$("input[name='txtOffcPhone[]']").val("+84 ");
			$("input[name='txtFax[]']").val("+84 ");
			$("input[name='txtMobilePhone[]']").val("+84 ");
		}
else
		{
			$("input[name='txtOffcPhone[]']").val(" ");
			$("input[name='txtFax[]']").val(" ");
			$("input[name='txtMobilePhone[]']").val(" ");
		}

var dataString = 'id='+ id;
	$.ajax
	({
	type: "POST",
	url: "state_list.php",
	data: dataString,
	cache: false,
	success: function(html)
	{
	$("#txtCompanyAddrProvince").html(html);
	
	}
	});
	
	
		
});



});

$(function () {
/*            $("#dialog").dialog({
                autoOpen: false,
                modal: true,
                title: "Preview",
				 width: 1240,
                 height: 850,
                buttons: {
                    Edit: function () {
                        $(this).dialog('close');
                    }
                }
            });*/
            $("#previewButton").click(function () {
			
			//var inst = FCKeditorAPI.GetInstance("FCKeditor");
            //var sValue = inst.GetHTML();
    		sValue = encodeURIComponent($('#FCKeditor').val());		
			var imgPrev = encodeURIComponent($('#sad').val());
			var offcType = $("input[name='rd1']:checked").val();
			var gmap = $("input[name='rd2']:checked").val();
			var branchgmap = $("input[name='rd2Branch']:checked").val();
			var addContacts = $("input[name='addContacts']:checked").val();
			var offcPhone = "";
					$('input[name="txtOffcPhone[]"]').each(function(){
						if($('input[name="txtOffcPhone[]"]')!="")
						{
				 			offcPhone = offcPhone+$(this).val()+'#';
						}
					});
					
			var fax = "";
					$('input[name="txtFax[]"]').each(function(){
						if($('input[name="txtFax[]"]')!="")
						{
				 			fax = fax+$(this).val()+'#';
						}
					});	
					
				
			var mobile = "";
					$('input[name="txtMobilePhone[]"]').each(function(){
						if($('input[name="txtMobilePhone[]"]')!="")
						{
				 			mobile = mobile+$(this).val()+'#';
						}
					});	
					
			var selEcommerce = "";
					$('select[name="selEcommerce[]"]').each(function(){
						if($('select[name="selEcommerce[]"]')!="")
						{
				 			selEcommerce = selEcommerce+$(this).val()+'#';
						}
					});
					
			var txtEcomUrl = "";
					$('input[name="txtEcomUrl[]"]').each(function(){
						if($('input[name="txtEcomUrl[]"]')!="")
						{
				 			txtEcomUrl = txtEcomUrl+$(this).val()+'#';
						}
					});		
					
			//alert(txtEcomUrl);
			var branchoffcPhone = "";
					$('input[name="txtBranchOffcPhone[]"]').each(function(){
						if($('input[name="txtBranchOffcPhone[]"]')!="")
						{
				 			branchoffcPhone = branchoffcPhone+$(this).val()+'#';
						}
					});
			var branchfax = "";
					$('input[name="txtBranchFax[]"]').each(function(){
						if($('input[name="txtBranchFax[]"]')!="")
						{
				 			branchfax = branchfax+$(this).val()+'#';
						}
					});	
					
				
			var branchmobile = "";
					$('input[name="txtBranchMobilePhone[]"]').each(function(){
						if($('input[name="txtBranchMobilePhone[]"]')!="")
						{
				 			branchmobile = branchmobile+$(this).val()+'#';
						}
					});	
					
			var selbranchEcommerce = "";
					$('select[name="selBranchEcommerce[]"]').each(function(){
						if($('select[name="selBranchEcommerce[]"]')!="")
						{
				 			selbranchEcommerce = selbranchEcommerce+$(this).val()+'#';
						}
					});
				
			var txtbranchEcomUrl = "";
					$('input[name="txtBranchEcomUrl[]"]').each(function(){
						if($('input[name="txtBranchEcomUrl[]"]')!="")
						{
				 			txtbranchEcomUrl = txtbranchEcomUrl+$(this).val()+'#';
						}
					});	
			
                $.ajax({
                    type: "POST",
                    url: "preview1.php",
                    data: "name="+$("#txtName").val()+"&slogan="+$("#txtSlogan").val()+"&introd="+sValue+"&offcType="+offcType+"&focusTitle="+$("#txtFocalPersonTitle").val()+"&focusSurname="+$("#txtFocalPersonSurname").val()+"&focusName="+$("#txtFocalPersonName").val()+"&position="+$("#txtPostion").val()+"&department="+$("#txtDepartment").val()+"&country="+$("#txtCompanyAddrCountry").val()+"&province="+$("#txtCompanyAddrProvince").val()+"&city="+$("#txtCompanyAddrCity").val()+"&postcode="+$("#txtPostCode").val()+"&street="+$("#txtCompanyAddrStreet").val()+"&offcPhone="+offcPhone+"&fax="+fax+"&mobile="+mobile+"&email="+$("#txtEmail").val()+"&companyweb="+$("#txtCompanyWebsite").val()+"&selEcommerce="+selEcommerce+"&txtEcomUrl="+txtEcomUrl+"&gmap="+gmap+"&latitude="+$("#txtLatitude").val()+"&longitude="+$("#txtLongitude").val()+"&gurl="+$("#txtUrl").val()+"&addContacts="+addContacts+"&branchfocusTitle="+$("#txtBranchFocalPersonTitle").val()+"&branchfocusName="+$("#txtBranchFocalPersonName").val()+"&branchfocusSurname="+$("#txtBranchFocalPersonSurname").val()+"&branchposition="+$("#txtBranchPostion").val()+"&branchdepartment="+$("#txtBranchDepartment").val()+"&branchstreet="+$("#txtBranchCompanyAddrStreet").val()+"&branchcountry="+$("#txtBranchCompanyAddrCountry").val()+"&branchprovince="+$("#txtBranchCompanyAddrProvince").val()+"&branchcity="+$("#txtBranchCompanyAddrCity").val()+"&branchpostcode="+$("#txtBranchPostCode").val()+"&branchoffcPhone="+branchoffcPhone+"&branchfax="+branchfax+"&branchmobile="+branchmobile+"&branchemail="+$("#txtBranchEmail").val()+"&branchcompanyweb="+$("#txtBranchCompanyWebsite").val()+"&selbranchEcommerce="+selbranchEcommerce+"&txtbranchEcomUrl="+txtbranchEcomUrl+"&branchgmap="+branchgmap+"&branchlatitude="+$("#txtBranchLatitude").val()+"&branchlongitude="+$("#txtBranchLongitude").val()+"&branchgurl="+$("#txtBranchUrl").val()+"&imgPrev="+imgPrev,
                    success: function (r) { 
                        $("#myModal").modal();
						$("#preview").html(r);
                    }
                });
            });
        });
        
function xx(){
		var x = confirm("Are you sure you want to submit the data?");
		if(x)
			return true;
		else
			return false;	
	}
$(document).ready(function()
{
$("#notificationLink").click(function()
{
$("#notificationContainer").fadeToggle(300);
$("#notification_count").fadeOut("slow");
return false;
});

//Document Click
$(document).click(function()
{
$("#notificationContainer").hide();
});
//Popup Click
$("#notificationContainer").click(function()
{
return false
});

});
