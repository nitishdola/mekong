var s;
$(document).ready(function() {
  	$('#FCKeditor').summernote({
	  	height: 200,                 // set editor height
	  	minHeight: null,             // set minimum height of editor
	  	maxHeight: null,             // set maximum height of editor
	  	focus: true
  	});                  // set focus to editable area after initializing summernote

  	//initialize save data function
  	saveFormData(60);
});

function saveFormData(vr = 0) {
    if (vr > 0)
    {
        if (vr > 1) {
              $('#timer').html('Data will be updated in next '+ vr+' seconds');
        } else {
              $('#timer').html('Data will be updated in next 1 second');
        }
        vr--;
        s = setTimeout('saveFormData(' + vr + ')', 1000);
    } else {
        clearInterval(s);
        // post data after 10 seconds....
        //prepare the data
         txtName =  txtSlogan =  FCKeditor =  rd1 = txtFocalPersonTitle = '';
         txtFocalPersonSurname =  txtFocalPersonName = '';
         txtPostion =  txtCompanyAddrStreet =  txtCompanyAddrCity = '';
         txtPostCode =  txtCompanyAddrCountry = '';
         txtCompanyAddrProvince =  txtOffcPhone =  txtFax = '';
         txtMobilePhone =  txtEmail = '';
         txtCompanyWebsite =  selEcommerce =  txtEcomUrl = '';
         rd1 =  geo_cord = geo_url =  txtLatitude =  txtLongitude = '';
         txtUrl = txtLati = txtLongi = proLati = proLongi = '';
         txtDepartment = '';       
        if($('#txtName').val().trim() != '') {
        	txtName = $('#txtName').val().trim();
        }
        if($('#txtSlogan').val().trim() != '') {
        	txtSlogan = $('#txtSlogan').val().trim();
        }
        if($('#FCKeditor').val().trim() != '') {
        	FCKeditor = $('#FCKeditor').val().trim();
        }
        if($("input[name='rd1']:checked").val().trim() != '') {
          rd1 = $("input[name='rd1']:checked").val().trim();
        }
       
        if($('#txtFocalPersonTitle').val().trim() != '') {
          txtFocalPersonTitle = $('#txtFocalPersonTitle').val().trim()
        }
        if($('#txtFocalPersonSurname').val().trim() != '') {
          txtFocalPersonSurname = $('#txtFocalPersonSurname').val().trim()
        }
         if($('#txtFocalPersonName').val().trim() != '') {
          txtFocalPersonName = $('#txtFocalPersonName').val().trim()
        }
        if($('#txtPostion').val().trim() != '') {
          txtPostion = $('#txtPostion').val().trim()
        }
        if($('#txtDepartment').val().trim() != '') {
          txtDepartment = $('#txtDepartment').val().trim()
        }

        if($('#txtCompanyAddrStreet').val().trim() != '') {
          txtCompanyAddrStreet = $('#txtCompanyAddrStreet').val().trim()
        }
        if($('#txtCompanyAddrCity').val().trim() != '') {
          txtCompanyAddrCity = $('#txtCompanyAddrCity').val().trim()
        }
        if($('#txtPostCode').val().trim() != '') {
          txtPostCode = $('#txtPostCode').val().trim()
        }
        if($('#txtCompanyAddrCountry').val().trim() != '') {
          txtCompanyAddrCountry = $('#txtCompanyAddrCountry').val().trim()
        }
        if($('#txtCompanyAddrProvince').val().trim() != '') {
          txtCompanyAddrProvince = $('#txtCompanyAddrProvince').val().trim()
        }
        $('input[name="txtOffcPhone[]"]').each(function(){
            if($('input[name="txtOffcPhone[]"]')!="")
            {
              txtOffcPhone = txtOffcPhone+$(this).val()+',';
            }
          });
        $('input[name="txtFax[]"]').each(function(){
            if($('input[name="txtFax[]"]')!="")
            {
              txtFax = txtFax+$(this).val()+',';
            }
          });
        $('input[name="txtMobilePhone[]"]').each(function(){
            if($('input[name="txtMobilePhone[]"]')!="")
            {
              txtMobilePhone = txtMobilePhone+$(this).val()+',';
            }
          });

        if($('#txtEmail').val().trim() != '') {
          txtEmail = $('#txtEmail').val().trim()
        }
        if($('#txtCompanyWebsite').val().trim() != '') {
          txtCompanyWebsite = $('#txtCompanyWebsite').val().trim()
        }

        $('select[name="selEcommerce[]"]').each(function(){
            if($('select[name="selEcommerce[]"]')!="")
            {
              selEcommerce = selEcommerce+$(this).val()+'#';
            }
          });
          
          $('input[name="txtEcomUrl[]"]').each(function(){
            if($('input[name="txtEcomUrl[]"]')!="")
            {
              txtEcomUrl = txtEcomUrl+$(this).val()+'#';
            }
          });

        if($('#txtLatitude').val().trim() != '') {
          txtLatitude = $('#txtLatitude').val().trim()
        }
        if($('#txtLongitude').val().trim() != '') {
          txtLongitude = $('#txtLongitude').val().trim()
        }
         if($('#txtUrl').val().trim() != '') {
          txtUrl = $('#txtUrl').val().trim()
        }
        if($('#lati').val().trim() != '') {
          txtLati = $('#lati').val().trim()
        }
        if($('#longi').val().trim() != '') {
          txtLongi = $('#longi').val().trim()
        }
        if($('#prolati').val().trim() != '') {
          proLati = $('#prolati').val().trim()
        }
        if($('#prolongi').val().trim() != '') {
          proLongi = $('#prolongi').val().trim()
        }
 $.blockUI({ css: { 
            border: 'none', 
            padding: '15px', 
            backgroundColor: '#000', 
            '-webkit-border-radius': '10px', 
            '-moz-border-radius': '10px', 
            opacity: .5, 
            color: '#fff' 
        } }); 
        $.post('save_user_data_ajax.php',{
        	//prepare data
          txtName 	: txtName,
          txtSlogan	: txtSlogan,
          FCKeditor 	: FCKeditor,
          rd1 : rd1,
          txtFocalPersonTitle   : txtFocalPersonTitle,
          txtFocalPersonSurname   : txtFocalPersonSurname,
          txtFocalPersonName   : txtFocalPersonName,
          txtPostion   : txtPostion,
          txtDepartment : txtDepartment,
          txtCompanyAddrStreet : txtCompanyAddrStreet,
          txtCompanyAddrCity : txtCompanyAddrCity,
          txtPostCode : txtPostCode,
          txtCompanyAddrCountry : txtCompanyAddrCountry,
          txtCompanyAddrProvince : txtCompanyAddrProvince,
          txtOffcPhone : txtOffcPhone, 
          txtFax : txtFax,
          txtMobilePhone : txtMobilePhone,
          txtEmail : txtEmail,
          txtCompanyWebsite : txtCompanyWebsite,
          selEcommerce : selEcommerce,
          txtEcomUrl : txtEcomUrl,
          txtLatitude : txtLatitude,
          txtLongitude : txtLongitude,
          txtUrl : txtUrl,
          txtLati : txtLati,
          txtLongi : txtLongi,
          proLati : proLati,
          proLongi : proLongi,
          

        },function(r) { 
        	console.log('Updated');  
          setTimeout($.unblockUI, 1000);                       
        	$('#upd_div').html("Last Updated: "+r);
        	$('#timer').html('Saved.. Data will be updated in next 60 seconds');
        	s = setTimeout('saveFormData(' + 60 + ')', 5000);
        	return false;
        });
    }
}