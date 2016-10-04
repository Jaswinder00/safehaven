/**
 * Author: Jaswinder Singh
 * File: application.js
 */

$(document).ready(function() {
	
	var FOSTER_CARE_THRESHOLD = 27;
	
	//Hide Elements
	$("#col_numberofchildren").hide();
	$("#col_isclaimeroutofstate").hide();
	
	//Lawfully present
	$("#col_lawfullypresent").hide();
	
	//Foster Care Elements
	$("#col_isinfostercare").hide();
	$("#col_hadmedicaidinfostercare").hide();
	$("#col_ageleftfostercare").hide();
	$("#col_fostercarestate").hide();
	
	//Calculator Fields
	$("#rows_EmployeePlanDetails").hide();
	
	/*
	//Submit Application Form
    $("#frmApplication").submit(function( event ) {
    	
    	// Stop form from submitting normally
    	event.preventDefault();
    	
    	$.post( dc_gov_haven_application_save, $( this ).serialize() )
		.done(function( obj ) {
			var div_statusalert = $("#divSaveStatusAlert");
			div_statusalert.fadeIn(500);
	        if(obj.status == "SUCCESS") {
	        	div_statusalert.removeClass('alert-danger');  
	        	div_statusalert.addClass( 'alert-success' );
	        	div_statusalert.html('Data Saved!');
	        } else {
	        	div_statusalert.removeClass('alert-success');  
	        	div_statusalert.addClass( 'alert-danger');
	        	div_statusalert.html('Invalid Data! Unable to save information.');
	        }
	        
	        div_statusalert.fadeOut(8000);

		});
    });
    */
	
	/**
	 * Click: Is Pregnenant?
	 */
    $("#ispregnant").on("click", function (event) {
    	if( $("#ispregnant").is(':checked') )
    		$("#col_numberofchildren").show();
    	else
    		$("#col_numberofchildren").hide();
    }); 	
    
    /**
     * Click: Is Claimed As Dependent
     */
    $("#isclaimedasdependent").on("click", function (event) {
    	if($("#isclaimedasdependent").is(':checked') )
    		$("#col_isclaimeroutofstate").show();
    	else
    		$("#col_isclaimeroutofstate").hide();
    });
    
    /**
     * Click: Formaly in Foster Care?
     */
    $("#isinfostercare").on("click", function (event) {
    	if($("#isinfostercare").is(':checked') ) {
    		$("#col_hadmedicaidinfostercare").show();
    		$("#col_ageleftfostercare").show();
    		$("#col_fostercarestate").show();
    	}
    	else {
    		$("#col_hadmedicaidinfostercare").hide();
    		$("#col_ageleftfostercare").hide();
    		$("#col_fostercarestate").hide();
    	}
    });
    
    /**
     * Change: Immgigrant States
     */
    $("#immigrationstatus").on("change", function (event) {
    	if(this.value == "2" )
    		$("#col_lawfullypresent").show();
    	else
    		$("#col_lawfullypresent").hide();
    });
    
    /**
     * DOB: Handle Change Event
     */
    $("[id^='dob_']").on("change",function(event){
    	var month= $("#dob_month").val(), 
    		day =  $("#dob_day").val(), 
    		year = $("#dob_year").val();
    	
    	if(month != "" && day != "" && year != "") {
    		var age = calculateAge(new Date(year, month, day));
    		
    		//Display the age
    		$("#spanAge").html(age);
    		
    		//If the age is less than the threshold, display foster care options
    		if (age < FOSTER_CARE_THRESHOLD) {
    			$("#col_isinfostercare").show();
    		}
    	}
    	
    });
    
    /**
     * Call this function to update Income Values on the Application Form
     * @param string field_id - String containing field name
     * @param number field_value - number or integer value
     */
    function updateValues(field_id,field_value) {
    	
    	var total_field = $("#"+field_id +"_total");
    	var cal_entry_field = $("#"+field_id +"_cal_entry");
    	var medicaid_value = $("#"+field_id +"_medicaid");
    	var previous_value = 0;
    	
    	//Check if there is already a value in Calculator bucket
    	if("" != cal_entry_field.val()) {
    		previous_value = parseFloat(cal_entry_field.val());
    	}
    	
    	//Update Total Annual Income Value
    	total_field.val((previous_value + field_value).toFixed(2));
    	
    	//Update Medicaid Amount
    	medicaid_value.val(parseFloat(total_field.val()/12).toFixed(2));
    	
    	//Update Column Total
    	var total_income = 0, total_income_total = 0, total_income_medicaid = 0;
    	
    	var income_field_value = 0;
    	//Iterate through all of the input elements and sum up values
    	$("#tblIncome tr input[value!='0']").each(function() {
    		if(this.value != "" && !$(this).closest("tr").is(":last-child")) {
	    		
    			income_field_value = parseFloat(this.value);
	    		if(this.id.includes("_total")) {
	    			total_income_total += income_field_value;
	    		} else if(this.id.includes("_medicaid")) {
	    			total_income_medicaid += income_field_value;
	    		} else if(this.id.includes("_cal_entry")) {	
	    			//Do not do anything
	    		} else {
	    			total_income += income_field_value;
	    		}
    		}
    	});
    	
    	//Display Totals
    	$("#total_income").val(total_income);
    	$("#total_income_total").val(total_income_total);
    	$("#total_income_medicaid").val(total_income_medicaid);
    }
    
    /**
     * INCOME: Handle Change Event
     */
    $("#tblIncome input[type='number']").on("change",function(event) {
    	var field_value = 0;
    	if(this.value != "") {
    		field_value = parseFloat(this.value);
    	}
    	updateValues(this.id,field_value);
    });
    
    /**
     * ADJUSTMENTS: Handle Change Event
     */
    $("#tblAdjustments input[type='number']").on("change",function(event){
    	
    	var total_adjustments = 0;
    	//Sum up all the values
    	$("#tblAdjustments tr input[value!='0']").each(function() {
    		if(this.value != "" && !$(this).closest("tr").is(":last-child")) {
	    		total_adjustments += parseFloat(this.value); 
    		}
    	})
    	
    	//Display udpate value
    	$("#total_adjustments").val(total_adjustments);
    });
    
    /**
     * CALCULATOR Launch
     */
    $('#incomeModal').on('shown.bs.modal', function() {
    	document.getElementById("frmCalculator").reset();
    	//$("#incometype").val("wages");
    	$("#incometype").trigger("change");
    })
    
    /**
     * CALCULATOR Employee Eligible: Handle Change Event 
     */
    $("#isemployeeeligible").on('change',function(event) {
    	if(this.value == "3" || this.value == "Y") {
    		$("#rows_EmployeePlanDetails").show();
    		
    		//Make Plan fields required
    		$("#employerplancoverage").prop('required',true);
    		$("#employerplanminimum").prop('required',true);
    		$("#employeecost").prop('required',true);
    		$("#planfrequency").prop('required',true);
    		
    	}
    	else {
    		$("#rows_EmployeePlanDetails").hide();
    		
    		//Make Plan fields not required
    		$("#employerplancoverage").prop('required',false);
    		$("#employerplanminimum").prop('required',false);
    		$("#employeecost").prop('required',false);
    		$("#planfrequency").prop('required',false);
    	}
    });
    
    /**
     * CALCULATOR Income Type: Handle Change Event
     */
    $("#incometype").on('change',function(event) {
    	
    	$("#isemployeeeligible").trigger("change");
    	
    	if(this.value == "wages" ) {
    		//Show Employer Entries
    		$("#rows_employerentries").show();
    		$("#col_wagetype").show();
    		$("#rows_EmployeePlanDetails").hide();

    		//Make Fields required
    		$("#isemployeeeligible").prop('required',true);
    		
    	} else {
    		//Hide Employer Entries	
    		$("#rows_employerentries").hide();
    		$("#rows_EmployeePlanDetails").hide();
    		$("#col_wagetype").hide();
    		
    		//Make Fields not required
    		$("#isemployeeeligible").prop('required',false);
    	}
    	//document.getElementById("frmCalculator").reset();
    });
    
    /**
     * CALCULATOR Wage Type: Handle Change Event
     */
    $("#wagetype").on('change',function(event) {
    	if(this.value == "w2wages" && "wages" == $("#incometype").val()) {
    		//Show Employer Entries
    		$("#rows_employerentries").show();
    		$("#isemployeeeligible").prop('required',true);
    		
    	} else {
    		//Hide Employer Entries	
    		$("#rows_employerentries").hide();
    		$("#isemployeeeligible").prop('required',false);
    	}
    	//document.getElementById("frmCalculator").reset();
    });
    
    /**
     * CALCULATOR: Calculate Annual Income
     */
    function calculateAnnualIncome() {
    	var paymentfrequency = parseInt($("#paymentfrequency").val()),
		 	annualincome = paymentfrequency * parseInt($("#paymentamount").val()),
		 	paystartDate = $("#paystartdate").val(),
		 	payendDate = $("#payenddate").val(),
		 	startDate = new Date(),
		 	endDate = new Date(),
		 	diffDays = 0,
		 	medicaid_amount = 0;
    	
    	if("" != paystartDate || "" != payendDate) {
			//Handle values for Start Date
			if("" != paystartDate) {
				var date_array = paystartDate.split("-"); //yyyy-mm-dd
				startDate.setFullYear(parseInt(date_array[0]));
				startDate.setMonth(parseInt(date_array[1])-1);
				startDate.setDate(parseInt(date_array[2]));
			} else {
				startDate.setMonth(0);
				startDate.setDate(1);
				startDate.setHours(0);
				startDate.setMinutes(0);
			}
			
			//Handle values for End Date
			if("" != payendDate) {
				var date_array = payendDate.split("-"); //yyyy-mm-dd
				endDate.setFullYear(parseInt(date_array[0]));
				endDate.setMonth(parseInt(date_array[1])-1);
				endDate.setDate(parseInt(date_array[2]));
			} else {
				//initialize the date until the date of year
				endDate.setMonth(11);
				endDate.setDate(31);
				endDate.setHours(11);
				endDate.setMinutes(59);
			}
			
			//var timeDiff = Date.parse(endDate.getYear()+"-"+endDate.getMonth()+"-"+endDate.getDay()) - startDate.getTime();
			var timeDiff = Math.abs(endDate.getTime() - startDate.getTime());
			
			var yearDiff = Date.parse(endDate.getFullYear()+"-12-31") - Date.parse(endDate.getFullYear()+"-1-1");
			var yearDays = (Math.ceil(yearDiff / (1000 * 3600 * 24)) + 1);
			diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24)) + 1;
			
			
			$("#cal_days").val(diffDays);
			
			if(diffDays > 0) {

				annualincome = Math.round( (( (annualincome/yearDays) * diffDays) * 100) / 100);
				var currDate = new Date();
				//if the current Month is between start and end date, calculate the medicaid amount
				if(startDate.getMonth() <= currDate.getMonth() <= endDate.getMonth() ) {
					medicaid_amount = parseFloat((paymentfrequency * parseInt($("#paymentamount").val()))/12).toFixed(2);
				} else {
					medicaid_amount = 0;
				}
			}
		}

		$("#annualincome").val(annualincome);
		$("#medicaidcurrentmonthly").val(medicaid_amount);
		
    }
    
    /**
     * CALCULATOR Payment Amount: Handle Change Event
     */
    $("#paymentamount").on('change',function(event){
    	if(this.value != "") {
    		calculateAnnualIncome();
    	}
    });
    
    /**
     * CALCULATOR Payment Amount: Handle Change Event
     */
    $("#paymentfrequency").on('change',function(event){
    	calculateAnnualIncome();
    });
    
    /**
     * CALCULATOR Start Date: Handle Change Event
     */
    $("#paystartdate").on('change',function(event){
    	calculateAnnualIncome();
    });
    
    /**
     * CALCULATOR End Date: Handle Change Event
     */
    $("#payenddate").on('change',function(event){
    	calculateAnnualIncome();
    });
    
    /**
     * CALCULATOR: FORM
     */
    $("#frmCalculator").submit(function( event ) {
    	
    	// Stop form from submitting normally
    	event.preventDefault();
    	
    	//Update values inside the Income table
    	var annualincome = $("#annualincome").val();
    	
    	if("" != annualincome) {
    		
    		//Get the input field name that needs to be updated
    		var income_field = $("#incometype").val();
    		
    		var cal_entry_field = $("#"+income_field +"_cal_entry");
    		
    		//Update entry for calculator field
    		if("" != cal_entry_field.val()) {
    			cal_entry_field.val(parseFloat(annualincome)+parseFloat(cal_entry_field.val()));	
    		}
    		
    		var field_value = 0;
    		if($("#"+income_field).val() != "") {
    			field_value = parseFloat($("#"+income_field).val());
    		}
    		
    		//Call to update income values on the main application form
    		updateValues(income_field,field_value);
    		
    	}
    	
    	addCustomCalculatorValuesToTable();
    	
    	//Reset Form Values
    	document.getElementById("frmCalculator").reset();
    	
    	//Close the Modal Window	
		$("#btnCalculatorClose").click();
    	
    });
    
    /**
     * Handle Click event for Delete button on Custom Income entries
     */
    $("#btnDeleteCustomIncome").on("click",function(event) {
    	var tblCustomIncome = $('#tblCustomIncome tbody');
    	var table_rows = tblCustomIncome.children('tr').length;
    	
    	if(0 == table_rows) {
    		//do nothing
    		return;
    	}
    	
    	//Iterate over all of the table rows and look for checked items
    	$('#tblCustomIncome > tbody > tr').each(function(e) {
    		var input_checkbox = $(this).find('input:checkbox:checked');
    		if(input_checkbox.is(':checked')) {
    			$(this).closest('tr').remove();
    		}
    			
        }).get();
    	
    });
    
    /**
     * Handle Click event on dynamic input checkboxes inside the custom income table for removal
     */
    $(document).on("click", "#tblCustomIncome input[type='checkbox']",function(event){ 
    	//if(this.checked)
    	var tblCustomIncome = $('#tblCustomIncome tbody');
    	var table_rows = tblCustomIncome.children('tr').length;
    	
    	if(table_rows > 0) {
    		//Enable Delete Button
    		$("#btnDeleteCustomIncome").prop('disabled', false);
    	} else if(0 == table_rows) {
    		$("#btnDeleteCustomIncome").prop('disabled', true);
    	}
    });
    
    /**
     * Call this function to add table rows with manual entries from calculator
     */
    function addCustomCalculatorValuesToTable() {
    	var row ='';
    	var tblCustomIncome = $('#tblCustomIncome tbody');
    	var table_rows = tblCustomIncome.children('tr').length;
    	
    	row = '<tr><td><input type="checkbox"></td>'+
    		'<td><input name="cal_incometype['+table_rows+']" type="text" value="'+$("#incometype").val()+'" readonly></td>'+
    		'<td><input name="cal_paymentfrequency['+table_rows+']" type="text" value="'+$("#paymentfrequency").val()+'" readonly></td>'+
    		'<td><input name="cal_paymentamount['+table_rows+']" type="text" value="'+$("#paymentamount").val()+'" readonly></td>'+
    		'<td><input name="cal_paystartdate['+table_rows+']" type="text" value="'+$("#paystartdate").val()+'" readonly></td>'+
    		'<td><input name="cal_payenddate['+table_rows+']" type="text" value="'+$("#payenddate").val()+'" readonly></td>'+
    		'<td><input name="cal_annualincome['+table_rows+']" type="text" value="'+$("#annualincome").val()+'" readonly></td>'+
    		'<td><input name="cal_medicaidcurrentmonthly['+table_rows+']" type="text" value="'+$("#medicaidcurrentmonthly").val()+'" readonly></td>';
    	
    	//Save employer data
    	row +=	'<td style="display:none;"><input name="cal_wagetype['+table_rows+']" type="hidden" value="'+$("#wagetype").val()+'">';
    	
    	if("wages" == $("#incometype").val() && "w2wages" == $("#wagetype").val()) {
    		var isemployeeEligible = $("#isemployeeeligible").val();
    		
    		row += 	'<input name="cal_employerid['+table_rows+']" type="hidden" value="'+$("#employerid").val()+'">'+
    		 		'<input name="cal_employername['+table_rows+']" type="hidden" value="'+$("#employername").val()+'">'+
    		 		'<input name="cal_employeraddress['+table_rows+']" type="hidden" value="'+$("#employeraddress").val()+'">'+
    		 		'<input name="cal_employercity['+table_rows+']" type="hidden" value="'+$("#employercity").val()+'">'+
    		 		'<input name="cal_employerstate['+table_rows+']" type="hidden" value="'+$("#employerstate").val()+'">'+
    		 		'<input name="cal_employerzip['+table_rows+']" type="hidden" value="'+$("#employerzip").val()+'">'+
    		 		'<input name="cal_isemployeeeligible['+table_rows+']" type="hidden" value="'+isemployeeEligible+'">';
    		
    		//Employee Plan Information
    		if("Yes" == isemployeeEligible || "3" == isemployeeEligible) {
    			row += 	'<input name="cal_employerplancoverage['+table_rows+']" type="hidden" value="'+$("#employerplancoverage").val()+'">'+
    					'<input name="cal_employerplanminimum['+table_rows+']" type="hidden" value="'+$("#employerplanminimum").val()+'">'+
    					'<input name="cal_planfrequency['+table_rows+']" type="hidden" value="'+$("#planfrequency").val()+'">'+
    					'<input name="cal_employeecost['+table_rows+']" type="hidden" value="'+$("#employeecost").val()+'">';
    		}
    			
    	}
    		
    	row += '</td></tr>';
    	
    	tblCustomIncome.append(row);
    }
    
    /**
     * Evaluate the Application
     */
    $("#btnEvaluateApplication").on("click",function(event){
    	var applicationid = $("#applicationid").va();
    	
    	//Make MITC call
    });
    
} );