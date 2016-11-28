$(document).ready(function() {
    var s = 1; //initlal text box count
	max_fields_service = 10;
	$("#add_field_button_otherservice").click(function(e){ //on add input button click
	//alert("aa");
        e.preventDefault();
        if(s < max_fields_service){ //max input box allowed
            s++; //text box increment
$("#input_fields_wrap_otherservice").append('<div><select name="selOtherService[]"  id="selOtherService" style="width:90%; height:30px; font-size:11px;"><option value="">Select</option><option value="General Freight Forwarding">General Freight Forwarding</option><option value="Air-freight forwarding">Air-freight forwarding</option><option value="a/f FOB Handling">a/f FOB Handling</option><option value="Courier services">Courier services</option><option value="Express service">Express service</option><option value="Hand-carry service">Hand-carry service</option><option value="Air-freight consolidation">Air-freight consolidation</option><option value="Air-freight deconsolidation (breakbulk)">Air-freight deconsolidation (breakbulk)</option><option value="Aircraft chartering (broking)">Aircraft chartering (broking)</option><option value="Airport customs brokerage">Airport customs brokerage</option><option value="Door-to-door cargo delivery">Door-to-door cargo delivery</option><option value="Perishable cargo">Perishable cargo</option><option value="Marine Parts logistics">Marine Parts logistics</option><option value="Pets and animal forwarding">Pets and animal forwarding</option><option value="Valuable cargo">Valuable cargo</option><option value="Airline agency (CSA)">Airline agency (CSA)</option><option value="Travel and ticketing services">Travel and ticketing services</option><option value="Airport cargo handling services">Airport cargo handling services</option><option value="Airport warehousing">Airport warehousing</option><option value="Mechanical handling equipment">Mechanical handling equipment</option><option value="Ocean freight forwarding">Ocean freight forwarding</option><option value="o/f FOB Handling">o/f FOB Handling</option><option value="Full container load">Full container load</option><option value="Less than container load">Less than container load</option><option value="Breakbulk and special cargo">Breakbulk and special cargo</option><option value="Seaport customs brokerage">Seaport customs brokerage</option><option value="Ocean-freight consolidations">Ocean-freight consolidations</option><option value="Ocean-freight deconsolidation (breakbulk)">Ocean-freight deconsolidation (breakbulk)</option><option value="Ship-chartering (broking)">Ship-chartering (broking)</option><option value="Door-to-door deliveries">Door-to-door deliveries</option><option value="Liner agency">Liner agency</option><option value="Port Agency">Port Agency</option><option value="Stevedores / port cargo handling services">Stevedores / port cargo handling services</option><option value="Port warehouse management">Port warehouse management</option><option value="Container depot management">Container depot management</option><option value="Container trucking">Container trucking</option><option value="Project forwarding">Project forwarding</option><option value="Project management">Project management</option><option value="Heavy-lift forwarding">Heavy-lift forwarding</option><option value="Offshore support">Offshore support</option><option value="Intermodal and Multi Modal Transport">Intermodal and Multi Modal Transport</option><option value="Rail-freight forwarding">Rail-freight forwarding</option><option value="Road Freight">Road Freight</option><option value="International / cross border trucking">International / cross border trucking</option><option value="International parcels / consolidation">International parcels / consolidation</option><option value="Cross-border customs brokerage">Cross-border customs brokerage</option><option value="Domestic trucking">Domestic trucking</option><option value="Domestic distribution">Domestic distribution</option><option value="Domestic parcels / consolidation">Domestic parcels / consolidation</option><option value="Trucking of liquid tankers / bulk powder / silo trucks">Trucking of liquid tankers / bulk powder / silo trucks</option><option value="Trucking of hazardous chemicals and fuel">Trucking of hazardous chemicals and fuel</option><option value="Trucking of containers">Trucking of containers</option><option value="Trucking of minerals, building materials or bulk agricultural products">Trucking of minerals, building materials or bulk agricultural products</option><option value="Other specialised trucking e.g. car carriers,  etc">Other specialised trucking e.g. car carriers,  etc</option><option value="Heavy-lift trucking">Heavy-lift trucking</option><option value="Heavy-lift positioning and Installation">Heavy-lift positioning and Installation</option><option value="Cranage and mechanical handling equipment ">Cranage and mechanical handling equipment </option><option value="Warehousing">Warehousing</option><option value="Bulk storage">Bulk storage</option><option value="Racked warehouse">Racked warehouse</option><option value="Cross-docking warehouse">Cross-docking warehouse</option><option value="Distribution warehouse">Distribution warehouse</option><option value="Inbound warehouse">Inbound warehouse</option><option value="Bonded warehouse">Bonded warehouse</option><option value="Temperature-controlled warehouse">Temperature-controlled warehouse</option><option value="Hazardous cargo warehouse">Hazardous cargo warehouse</option><option value="Tank, silo  or other specialized storage facilities">Tank, silo  or other specialized storage facilities</option><option value="Distribution logistics">Distribution logistics</option><option value="Sourcing logistics">Sourcing logistics</option><option value="Reverse Logistics">Reverse Logistics</option><option value="Inventory management">Inventory management</option><option value="Warehouse management systems">Warehouse management systems</option><option value="Kitting and assembly">Kitting and assembly</option><option value="Cargo handling, loading and unloading">Cargo handling, loading and unloading</option><option value="Labelling">Labelling</option><option value="Re-packaging">Re-packaging</option><option value="Pre-inspection">Pre-inspection</option><option value="Document preparation">Document preparation</option><option value="3PL / Lead Logistics Provider">3PL / Lead Logistics Provider</option><option value="4PL / Consultancy services">4PL / Consultancy services</option><option value="Chemicals and hazardous cargo logistics">Chemicals and hazardous cargo logistics</option><option value="Fine Arts and Museum Logistics">Fine Arts and Museum Logistics</option><option value="Fairs and Events Logistics">Fairs and Events Logistics</option><option value="Household movers">Household movers</option><option value="Temperature-controlled logistics">Temperature-controlled logistics</option><option value="Hazardous cargo specialists">Hazardous cargo specialists</option><option value="Valuable cargo/bullion/cash/secured transport">Valuable cargo/bullion/cash/secured transport</option><option value="Green Logistics">Green Logistics</option><option value="Animal transport services">Animal transport services</option><option value="Survey agent">Survey agent</option><option value="International Trade Documentation Management">International Trade Documentation Management</option><option value="Import and Export Management">Import and Export Management</option><option value="Import license management">Import license management</option><option value="Certificate of Origin (C/O) Applications">Certificate of Origin (C/O) Applications</option><option value="Logistics manpower staff provision">Logistics manpower staff provision</option><option value="Other">Other</option></select> <a href="javascript:void(0)" class="remove_field_otherservice"><i class="fa fa-minus-square fa-2x" aria-hidden="true"></i></a></div>'); //add input box
        }
    });
   
   $("#input_fields_wrap_otherservice").on("click",".remove_field_otherservice", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); s--;
    })
	
	
});


$(document).ready(function() {
    var max_fields      = 15; //maximum input boxes allowed
    var wrapper         = $("#input_fields_wrap"); //Fields wrapper
    var add_button      = $("#add_field_button"); //Add button ID
   
    var x = 1; //initlal text box count
	$("#add_field_button_area").click(function(e){ //on add input button click
        e.preventDefault();
		 var max_fields4      = 5; //maximum input boxes allowed
		 var a = 1;
        if(a < max_fields4){ //max input box allowed
            a++; //text box increment
           $("#input_fields_wrap_area").append('<div><select style="height:30px; width:100%; font-size:11px;" name="selArea[]" id="selArea[]" required><option value="">Select Region</option><optgroup label="Africa"></optgroup><option value="Eastern Africa">Eastern Africa</option><option value="Middle Africa">Middle Africa</option><option value="Northern Africa">Northern Africa</option><option value="Southern Africa">Southern Africa</option><option value="Western Africa">Western Africa</option><optgroup label="Americas"></optgroup><option value="Latin America">Latin America</option><option value="Northern America">Northern America</option><optgroup label="Asia"></optgroup><option value="Central Asia">Central Asia</option><option value="Eastern Asia">Eastern Asia</option><option value="Southern Asia">Southern Asia</option><option value="South-Eastern Asia">South-Eastern Asia</option><option value="Western Asia">Western Asia</option><optgroup label="Europe"></optgroup><option value="Eastern Europe">Eastern Europe</option><option value="Northern Europe">Northern Europe</option><option value="Southern Europe">Southern Europe</option><option value="Western Europe">Western Europe</option><optgroup label="Oceania"></optgroup><option value="Australia/New Zealand">Australia/New Zealand</option><option value="Melanesia">Melanesia</option><option value="Micronesia">Micronesia</option><option value="Polynesia">Polynesia</option></select> <input type="text"  name="txtRegionDetail[]" id="txtRegionDetail[]" placeholder="Please specify" required   value="" class="input" style="width:91%"  /><a href="javascript:void(0)" class="remove_field_area"><i class="fa fa-minus-square fa-2x" aria-hidden="true"></i></a></div>'); //add input box
        }
    });
   
   $("#input_fields_wrap_area").on("click",".remove_field_area", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); a--;
    })
	
	
	var max_fieldsL      = 5; //maximum input boxes allowed
    var wrapperL         = $("#locationMember"); //Fields wrapper
    var add_buttonL      = $("#locationMemberButton"); //Add button ID
   
    var L = 0; //initlal text box count
    $(add_buttonL).click(function(e){ //on add input button click
        e.preventDefault();
        if(L < max_fieldsL){ //max input box allowed
            L++; //text box increment
            $(wrapperL).append('<div><select style="height:30px; width:91%;font-size:11px;" name="selLocation[]" id="selLocation"><option value="">Select</option><option value="Afghanistan">Afghanistan</option><option value="Albania">Albania</option><option value="Algeria">Algeria</option><option value="American Samoa">American Samoa</option><option value="Andorra">Andorra</option><option value="Angola">Angola</option><option value="Anguilla">Anguilla</option><option value="Antartica">Antarctica</option><option value="Antigua and Barbuda">Antigua and Barbuda</option><option value="Argentina">Argentina</option><option value="Armenia">Armenia</option><option value="Aruba">Aruba</option><option value="Australia">Australia</option><option value="Austria">Austria</option><option value="Azerbaijan">Azerbaijan</option><option value="Bahamas">Bahamas</option><option value="Bahrain">Bahrain</option><option value="Bangladesh">Bangladesh</option><option value="Barbados">Barbados</option><option value="Belarus">Belarus</option><option value="Belgium">Belgium</option><option value="Belize">Belize</option><option value="Benin">Benin</option><option value="Bermuda">Bermuda</option><option value="Bhutan">Bhutan</option><option value="Bolivia">Bolivia</option><option value="Bosnia and Herzegowina">Bosnia and Herzegowina</option><option value="Botswana">Botswana</option><option value="Bouvet Island">Bouvet Island</option><option value="Brazil">Brazil</option><option value="British Indian Ocean Territory">British Indian Ocean Territory</option><option value="Brunei Darussalam">Brunei Darussalam</option><option value="Bulgaria">Bulgaria</option><option value="Burkina Faso">Burkina Faso</option><option value="Burundi">Burundi</option><option value="Cambodia">Cambodia</option><option value="Cameroon">Cameroon</option><option value="Canada">Canada</option><option value="Cape Verde">Cape Verde</option><option value="Cayman Islands">Cayman Islands</option><option value="Central African Republic">Central African Republic</option><option value="Chad">Chad</option><option value="Chile">Chile</option><option value="China">China</option><option value="Christmas Island">Christmas Island</option><option value="Cocos Islands">Cocos (Keeling) Islands</option><option value="Colombia">Colombia</option><option value="Comoros">Comoros</option><option value="Congo">Congo</option><option value="Congo">Congo, the Democratic Republic of the</option><option value="Cook Islands">Cook Islands</option><option value="Costa Rica">Costa Rica</option><option value="Cota DIvoire">Cote dIvoire</option><option value="Croatia">Croatia (Hrvatska)</option><option value="Cuba">Cuba</option><option value="Cyprus">Cyprus</option><option value="Czech Republic">Czech Republic</option><option value="Denmark">Denmark</option><option value="Djibouti">Djibouti</option><option value="Dominica">Dominica</option><option value="Dominican Republic">Dominican Republic</option><option value="East Timor">East Timor</option><option value="Ecuador">Ecuador</option><option value="Egypt">Egypt</option><option value="El Salvador">El Salvador</option><option value="Equatorial Guinea">Equatorial Guinea</option><option value="Eritrea">Eritrea</option><option value="Estonia">Estonia</option><option value="Ethiopia">Ethiopia</option><option value="Falkland Islands">Falkland Islands (Malvinas)</option><option value="Faroe Islands">Faroe Islands</option><option value="Fiji">Fiji</option><option value="Finland">Finland</option><option value="France">France</option><option value="France Metropolitan">France, Metropolitan</option><option value="French Guiana">French Guiana</option><option value="French Polynesia">French Polynesia</option><option value="French Southern Territories">French Southern Territories</option><option value="Gabon">Gabon</option><option value="Gambia">Gambia</option><option value="Georgia">Georgia</option><option value="Germany">Germany</option><option value="Ghana">Ghana</option><option value="Gibraltar">Gibraltar</option><option value="Greece">Greece</option><option value="Greenland">Greenland</option><option value="Grenada">Grenada</option><option value="Guadeloupe">Guadeloupe</option><option value="Guam">Guam</option><option value="Guatemala">Guatemala</option><option value="Guinea">Guinea</option><option value="Guinea-Bissau">Guinea-Bissau</option><option value="Guyana">Guyana</option><option value="Haiti">Haiti</option><option value="Heard and McDonald Islands">Heard and Mc Donald Islands</option><option value="Holy See">Holy See (Vatican City State)</option><option value="Honduras">Honduras</option><option value="Hong Kong">Hong Kong</option><option value="Hungary">Hungary</option><option value="Iceland">Iceland</option><option value="India">India</option><option value="Indonesia">Indonesia</option><option value="Iran">Iran (Islamic Republic of)</option><option value="Iraq">Iraq</option><option value="Ireland">Ireland</option><option value="Israel">Israel</option><option value="Italy">Italy</option><option value="Jamaica">Jamaica</option><option value="Japan">Japan</option><option value="Jordan">Jordan</option><option value="Kazakhstan">Kazakhstan</option><option value="Kenya">Kenya</option><option value="Kiribati">Kiribati</option><option value="Democratic Peoples Republic of Korea">Korea, Democratic Peoples Republic of</option><option value="Korea">Korea, Republic of</option><option value="Kuwait">Kuwait</option><option value="Kyrgyzstan">Kyrgyzstan</option><option value="Lao">Lao Peoples Democratic Republic</option><option value="Latvia">Latvia</option><option value="Lebanon">Lebanon</option><option value="Lesotho">Lesotho</option><option value="Liberia">Liberia</option><option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option><option value="Liechtenstein">Liechtenstein</option><option value="Lithuania">Lithuania</option><option value="Luxembourg">Luxembourg</option><option value="Macau">Macau</option><option value="Macedonia">Macedonia, The Former Yugoslav Republic of</option><option value="Madagascar">Madagascar</option><option value="Malawi">Malawi</option><option value="Malaysia">Malaysia</option><option value="Maldives">Maldives</option><option value="Mali">Mali</option><option value="Malta">Malta</option><option value="Marshall Islands">Marshall Islands</option><option value="Martinique">Martinique</option><option value="Mauritania">Mauritania</option><option value="Mauritius">Mauritius</option><option value="Mayotte">Mayotte</option><option value="Mexico">Mexico</option><option value="Micronesia">Micronesia, Federated States of</option><option value="Moldova">Moldova, Republic of</option><option value="Monaco">Monaco</option><option value="Mongolia">Mongolia</option><option value="Montserrat">Montserrat</option><option value="Morocco">Morocco</option><option value="Mozambique">Mozambique</option><option value="Myanmar">Myanmar</option><option value="Namibia">Namibia</option><option value="Nauru">Nauru</option><option value="Nepal">Nepal</option><option value="Netherlands">Netherlands</option><option value="Netherlands Antilles">Netherlands Antilles</option><option value="New Caledonia">New Caledonia</option><option value="New Zealand">New Zealand</option><option value="Nicaragua">Nicaragua</option><option value="Niger">Niger</option><option value="Nigeria">Nigeria</option><option value="Niue">Niue</option><option value="Norfolk Island">Norfolk Island</option><option value="Northern Mariana Islands">Northern Mariana Islands</option><option value="Norway">Norway</option><option value="Oman">Oman</option><option value="Pakistan">Pakistan</option><option value="Palau">Palau</option><option value="Panama">Panama</option><option value="Papua New Guinea">Papua New Guinea</option><option value="Paraguay">Paraguay</option><option value="Peru">Peru</option><option value="Philippines">Philippines</option><option value="Pitcairn">Pitcairn</option><option value="Poland">Poland</option><option value="Portugal">Portugal</option><option value="Puerto Rico">Puerto Rico</option><option value="Qatar">Qatar</option><option value="Reunion">Reunion</option><option value="Romania">Romania</option><option value="Russia">Russian Federation</option><option value="Rwanda">Rwanda</option><option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option> <option value="Saint LUCIA">Saint LUCIA</option><option value="Saint Vincent">Saint Vincent and the Grenadines</option><option value="Samoa">Samoa</option><option value="San Marino">San Marino</option><option value="Sao Tome and Principe">Sao Tome and Principe</option> <option value="Saudi Arabia">Saudi Arabia</option><option value="Senegal">Senegal</option><option value="Seychelles">Seychelles</option><option value="Sierra">Sierra Leone</option><option value="Singapore">Singapore</option><option value="Slovakia">Slovakia (Slovak Republic)</option><option value="Slovenia">Slovenia</option><option value="Solomon Islands">Solomon Islands</option><option value="Somalia">Somalia</option><option value="South Africa">South Africa</option><option value="South Georgia">South Georgia and the South Sandwich Islands</option><option value="Span">Spain</option><option value="SriLanka">Sri Lanka</option><option value="St. Helena">St. Helena</option><option value="St. Pierre and Miguelon">St. Pierre and Miquelon</option><option value="Sudan">Sudan</option><option value="Suriname">Suriname</option><option value="Svalbard">Svalbard and Jan Mayen Islands</option><option value="Swaziland">Swaziland</option><option value="Sweden">Sweden</option><option value="Switzerland">Switzerland</option><option value="Syria">Syrian Arab Republic</option><option value="Taiwan">Taiwan, Province of China</option><option value="Tajikistan">Tajikistan</option><option value="Tanzania">Tanzania, United Republic of</option><option value="Thailand">Thailand</option><option value="Togo">Togo</option><option value="Tokelau">Tokelau</option><option value="Tonga">Tonga</option><option value="Trinidad and Tobago">Trinidad and Tobago</option><option value="Tunisia">Tunisia</option><option value="Turkey">Turkey</option><option value="Turkmenistan">Turkmenistan</option><option value="Turks and Caicos">Turks and Caicos Islands</option><option value="Tuvalu">Tuvalu</option><option value="Uganda">Uganda</option><option value="Ukraine">Ukraine</option><option value="United Arab Emirates">United Arab Emirates</option><option value="United Kingdom">United Kingdom</option><option value="United States">United States</option><option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option><option value="Uruguay">Uruguay</option><option value="Uzbekistan">Uzbekistan</option><option value="Vanuatu">Vanuatu</option><option value="Venezuela">Venezuela</option><option value="Vietnam">Viet Nam</option><option value="Virgin Islands (British)">Virgin Islands (British)</option><option value="Virgin Islands (U.S)">Virgin Islands (U.S.)</option><option value="Wallis and Futana Islands">Wallis and Futuna Islands</option><option value="Western Sahara">Western Sahara</option><option value="Yemen">Yemen</option><option value="Yugoslavia">Yugoslavia</option><option value="Zambia">Zambia</option><option value="Zimbabwe">Zimbabwe</option></select> <a href="javascript:void(0)" class="remove_field_member"><i class="fa fa-minus-square fa-2x" aria-hidden="true"></i></a> </div>'); //add input box
        }
    });
   
    $(wrapperL).on("click",".remove_field_member", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); L--;
    })
	
	
	
});

 $(function () {
            /*$("#dialog").dialog({
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
            $("#btnSubmit1").click(function () {	
			//$(".loadingOverlay").show();
			var chkBusiness = "";
					$('.c1:checked').each(function(){
							var busi = $(this).val();
							if(busi=="Others")
							{
								busi = $('#txtBusinessOther').val();
							}
							else
							{
								busi = $(this).val();
							}
				 			chkBusiness = chkBusiness+busi+',';
							
					});
					
			var selOtherService = encodeURIComponent($('#selOtherService').val());
			
			var indusTxt = "";
            var chkIndustry = "";
					$('.c2:checked').each(function(){
							var indus = $(this).val();
				 			chkIndustry = chkIndustry+indus+',';
                            if(indus=="Others")
                            {
                                indusTxt = $('#txtIndustryOther').val();
                            }
                            else
                            {
                                indusTxt = "";
                            }
					});
	
			var txtIndustry = "";
			$('input[name="txtIndustry[]"]').each(function(){
				if(this.value != "")
				{
					txtIndustry = txtIndustry+$(this).val()+'#';
				}
			});	
			//alert(txtIndustry);
					
			var selArea = "";
					$('select[name="selArea[]"]').each(function(){
						if($('select[name="selArea[]"]')!="")
						{
				 			selArea = selArea+$(this).val()+'#';
						}
					});	
					
			var selOtherService = "";
					$('select[name="selOtherService[]"]').each(function(){
						if($('select[name="selOtherService[]"]')!="")
						{
				 			selOtherService = encodeURIComponent(selOtherService+$(this).val()+',');
						}
					});			
					
					
			var txtRegionDetail = "";
					$('input[name="txtRegionDetail[]"]').each(function(){
						if(this.value != "")
						{
				 			txtRegionDetail = txtRegionDetail+$(this).val()+'#';
						}
					});	
					
			var selLocation = "";
					$('select[name="selLocation[]"]').each(function(){
						if(this.value != "")
						{
				 			selLocation = selLocation+$(this).val()+'#';
						}
					});			
		
			var chkProStatus = $("input[name='chkProStatus']:checked").val();
			if(chkProStatus=="Other")
			{
				proStatus = $('#txtProOthers').val();
			}
			else
			{
				proStatus =  $("input[name='chkProStatus']:checked").val();
			}
			var chkMember = $("input[name='chkMember']:checked").val();
			var inst = FCKeditorAPI.GetInstance("FCKeditor");
			var sstory = encodeURIComponent(inst.EditorDocument.body.innerHTML);
            var txtMarketYoutube = $("#txtMarketYoutube").val();
            if($("#selTypeOrgName").val()=="Others"){
			var selTypeOrgName = encodeURIComponent($("#selTypeOrgNameOther").val());
            }
            else
             {
               var selTypeOrgName = encodeURIComponent($("#selTypeOrgName").val());
             }   
                $.ajax({
                    type: "POST",
                    url: "preview2.php",
                    data: "chkBusiness="+chkBusiness+"&selOtherService="+selOtherService+"&chkIndustry="+chkIndustry+"&chkOther="+indusTxt+"&txtInformation="+$("#txtInformation").val()+"&selArea="+selArea+"&txtRegionDetail="+txtRegionDetail+"&txtEmployeeNo="+$("#txtEmployeeNo").val()+"&txtDrivers="+$("#txtDrivers").val()+"&txtTrucks="+$("#txtTrucks").val()+"&txtWarehouse="+$("#txtWarehouse").val()+"&txtOtherAsset="+$("#txtOtherAsset").val()+"&txtRegYear="+$("#txtRegYear").val()+"&txtRegAuthority="+$("#txtRegAuthority").val()+"&txtRegNo="+$("#txtRegNo").val()+"&chkProStatus="+proStatus+"&chkMember="+chkMember+"&selCountryBasedIn="+$("#selCountryBasedIn").val()+"&selCountryNon="+$("#selCountryNon").val()+"&selTypeOrgName="+$("#selTypeOrgName").val()+"&txtOrgName="+$("#txtOrgName").val()+"&selTypeOrgType="+$("#selTypeOrgType").val()+"&txtOrgTypeOther="+$("#txtOrgTypeOther").val()+"&sstory="+sstory+"&txtIndustry="+txtIndustry+"&data_id="+$("#data_id").val()+"&selTypeOrgName="+selTypeOrgName+"&selLocation="+selLocation+"&txtMarketYoutube="+txtMarketYoutube,
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