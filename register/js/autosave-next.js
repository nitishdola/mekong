var s;
$(document).ready(function() {
  	/*$('#FCKeditor').summernote({
	  	height: 200,                 // set editor height
	  	minHeight: null,             // set minimum height of editor
	  	maxHeight: null,             // set maximum height of editor
	  	focus: true
  	});*/                  // set focus to editable area after initializing summernote

  	//initialize save data function
  	saveFormData(60);
});

function saveFormData( vr = 0) {
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
         chkBusiness =  selOtherService =  chkIndustry =  txtIndustry =  selArea = '';
         selOtherService =  txtRegionDetail =  chkProStatus = '';
       if($('.c1:checked').val()!="")
       {
          $('.c1:checked').each(function(){
              var busi = $(this).val();
              txtBusinessOther = "";
              if(busi=="Others")
              {
                txtBusinessOther = $('#txtBusinessOther').val();
              }
              chkBusiness = chkBusiness+busi+',';
              
          });
       }  
       else{
        chkBusiness = "";
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
        $.post('save_user_data_next_ajax.php',{
        	//prepare data
          chkBusiness 	: chkBusiness,
          txtBusinessOther : txtBusinessOther 

        },function(r) { 
        	console.log('Updated'); 
          //alert(r);
          setTimeout($.unblockUI, 1000);                       
        	$('#upd_div').html("Last Updated: "+r);
        	$('#timer').html('Saved.. Data will be updated in next 60 seconds');
        	s = setTimeout('saveFormData(' + 60 + ')', 5000);
        	return false;
        });
    }
}