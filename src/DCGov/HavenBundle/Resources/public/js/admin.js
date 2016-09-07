/**
 * File: Admin.js
 * Author: Jaswinder Singh
 * This file contains Administrative Controls
 */ 

$(document).ready(function() {
	
	
    //Create Editor for Center Cotenant form entry
    var tblReports_editor = new $.fn.dataTable.Editor( {
        ajax: dc_gov_haven_admin_reports_save,
        table: "#tblReports",
        fields: [ {
                label: "Report Name:",
                name: "name"
            }, {
                label: "Display Name:",
                name: "displayname"
            }, {
                label: "SQL:",
                name: "sql",
                type: "textarea"
            }, {
                label: "isActive:",
                name: "isactive",
                type: "select",
                options: [
                      { "label": "Yes", "value": 1 },
                      { "label": "No",  "value": 0 }
                ]
            }
        ]
    } );
    
	// DataTable for Reports
    var tblReports = $('#tblReports').DataTable({
    	serverSide: false,
    	ajax: dc_gov_haven_admin_reports,
        dom: "BfStrip",
        paging: true,
        columns : [
 					{
 					    data: null,
 					    defaultContent: '',
 					    className: 'select-checkbox',
 					    orderable: false
 					},
                    { data: "reportlink", className: 'editable' },
                    { data: "displayname", className: 'editable' },
                    { data: "sql", className: 'editable', width: '45%'},
                    { data: "isactive", className: 'center', width: '5%',
                    	
                        render: function (val, type, row) {
                            return val == 1 ? "Yes" : "No";
                        }
                    }
                ],
        keys: {
     	   columns: ':not(:first-child)',
     	   keys: [ 4 ]
        },
        select: {
            style:    'os',
            selector: 'td:first-child'
         },
        
         buttons : [
             { extend: "create", editor: tblReports_editor, className: 'btn btn-primary' },
             { extend: "edit",   editor: tblReports_editor, className: 'btn btn-primary' },
             { extend: "remove", editor: tblReports_editor, className: 'btn btn-primary' }
         ]
    });
    
    /**
     * Make Ajax Call to Save Report Settings
     */
    $( "#frmReportSettings" ).submit(function( event ) {
     
    	// Stop form from submitting normally
    	event.preventDefault();
    	
    	$.post( gap_ajax_admin_report_settings_save, $( this ).serialize() )
		.done(function( data ) {
			var div_statusalert = $("#divReportSettingsStatusAlert");
			div_statusalert.fadeIn(500);
			var obj = JSON.parse(data);
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
    
    
    //Handle click for Manage Reports
    $("#btnManageReports").click(function(event){
    	//Redirect a user to Manage Reports Page
    	window.location = dc_gov_haven_admin_managereports;
    });
    
    //Handle click for View Report
    $("#btnViewReport").click(function(event){
    	//Redirect a user to Output Management Page
    	//window.location = dc_gov_haven_outputmanagement_home+"?reportid="+$("#reportid").val();
    });
    
    //Set Report Settings in the UI
    //The datatable_settings variable is automatically loaded when report settings page is launched
    if (typeof report_settings !== 'undefined' && report_settings !== "") {
    	report_settings = JSON.parse(report_settings);
    	//Check Column Options
    	if(report_settings.datatable_settings.column_options) {
    		var column_options = report_settings.datatable_settings.column_options;
    		for (i = 0; i < column_options.length; i++) {
    			//Set the Appropriate Column by Name and Value
    			$( "input[name='column["+column_options[i].columnindex+"]'][value='"+column_options[i].columnfilteroption+"']" ).attr("checked","checked");
    			//This is how it will be translated:
    			//$( "input[name='column[0]'][value='dropdown']" )
    		}
    		    
    	} 
    	//Check Export Option Flag
    	if(report_settings.datatable_settings.showexporttoexcel) {
    		$( "input[name='showexporttoexcel']" ).attr("checked","checked");
    	}
    }
    
    
    //Manage Users JQuery Code
    if("dc_gov_haven_admin_manageusers" == _route) {
    	//Create Editor for Center Cotenant form entry
        var tblUsers_editor = new $.fn.dataTable.Editor( {
            ajax: dc_gov_haven_admin_manageusers_save,
            table: "#tblUsers",
            fields: [ {
                    label: "Username:",
                    name: "username"
            	}, {
	                label: "Email:",
	                name: "email"
                }, {
                    label: "First Name:",
                    name: "firstname"
                }, {
                    label: "Last Name:",
                    name: "lastname"
                }, {
                    label: "Password:",
                    name: "password"                    	
                }, {
                    label: "Role:",
                    name: "role",
                    type: "select",
                    options: [
                          { "label": "Super Administrator", "value": "ROLE_SUPER_ADMIN" },
                          { "label": "Administrator",  "value": "ROLE_ADMIN" },
                          { "label": "User",  "value": "ROLE_USER" }
                    ]
                }, {
                    label: "isActive:",
                    name: "isactive",
                    type: "select",
                    options: [
                          { "label": "Yes", "value": 1 },
                          { "label": "No",  "value": 0 }
                    ]
                }
                
            ]
        } );
        
    	// DataTable for Reports
        var tblUsers = $('#tblUsers').DataTable({
        	serverSide: false,
        	ajax: dc_gov_haven_admin_manageusers_users,
            dom: "BfStrip",
            paging: true,
            columns : [
     					{
     					    data: null,
     					    defaultContent: '',
     					    className: 'select-checkbox',
     					    orderable: false
     					},
     					{ data: "username", className: 'username' },
                        { data: "email", className: 'editable' },
                        { data: "firstname", className: 'editable' },
                        { data: "lastname", className: 'editable' },
                        { data: "password", className: 'editable' },
                        { data: "role", className: 'center',
                        	
                            render: function (val, type, row) {
                            	if("ROLE_SUPER_ADMIN" == val)
                            		return "Super Administrator";
                            	else if("ROLE_ADMIN" == val)
                        			return "Administrator";
                            	
                            	return "User";
                            }
                        },
                        { data: "isactive", className: 'center', width: '5%',
                        	
                            render: function (val, type, row) {
                                return val == 1 ? "Yes" : "No";
                            }
                        }
                    ],
            keys: {
         	   columns: ':not(:first-child)',
         	   keys: [ 7 ]
            },
            select: {
                style:    'os',
                selector: 'td:first-child'
             },
            
             buttons : [
                 { extend: "create", editor: tblUsers_editor, className: 'btn btn-primary' },
                 { extend: "edit",   editor: tblUsers_editor, className: 'btn btn-primary' },
                 { extend: "remove", editor: tblUsers_editor, className: 'btn btn-primary' }
             ]
        });
        
    } //END if("dc_gov_have_admin_manageusers" == _route) {
    
    
});