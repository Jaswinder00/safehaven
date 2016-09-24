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
     * Call this function to update Income Values
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
     * CALCULATOR Employee Eligible: Handle Change Event 
     */
    $("#isemployeeEligible").on('change',function(event) {
    	if(this.value == "3" || this.value == "Y")
    		$("#rows_EmployeePlanDetails").show();
    	else
    		$("#rows_EmployeePlanDetails").hide();
    });
    
   
    
    /**
     * CALCULATOR Income Type: Handle Change Event
     */
    $("#incometype").on('change',function(event) {
    	if(this.value == "wages") {
    		//Show Employer Entries
    		$("#rows_employerentries").show();
    	} else {
    		//Hide Employer Entries	
    		$("#rows_employerentries").hide();
    		$("#rows_EmployeePlanDetails").hide();
    	}
    	document.getElementById("frmCalculator").reset();
    });
    
    /**
     * CALCULATOR Wage Type: Handle Change Event
     */
    $("#wagetype").on('change',function(event) {
    	if(this.value == "w2wages") {
    		//Show Employer Entries
    		$("#rows_employerentries").show();
    	} else {
    		//Hide Employer Entries	
    		$("#rows_employerentries").hide();
    	}
    	document.getElementById("frmCalculator").reset();
    });
    
    /**
     * CALCULATOR: Calculat Annual Income
     */
    function calculateAnnualIncome() {
    	var paymentfrequency = parseInt($("#paymentfrequency").val());
		var annualincome = paymentfrequency * parseInt($("#paymentamount").val());
		
		$("#annualincome").val(annualincome);
		$("#medicaid_current_monthly").val(parseFloat(annualincome/12).toFixed(2));
    }
    
    /**
     * CALCULATOR Payment Amoutn: Handle Change Event
     */
    $("#paymentamount").on('change',function(event){
    	if(this.value != "") {
    		calculateAnnualIncome();
    	}
    });
    
    /**
     * CALCULATOR Payment Amoutn: Handle Change Event
     */
    $("#paymentfrequency").on('change',function(event){
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
    		updateValues(income_field,field_value);
    		
    	}
    	
    	//Reset Form Values
    	document.getElementById("frmCalculator").reset();
    	
    	//Close the Modal Window	
		$("#btnCalculatorClose").click();
    	
    });
    
    
} );