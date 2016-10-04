/**
* Author: Jaswinder Singh
* File: common.js
* Description: This file contains the common Javascript functions
**/

/**
 * Call this method to compute Age. 
 * @param Date dateOfBirth - Date of Birth
 * @param Date dateToCalculate - You can pass a enddate. In most cases, this can be current date.
 */
function calculateAge (dateOfBirth, dateToCalculate) {
	if(undefined == dateToCalculate)
		dateToCalculate = new Date();
    var calculateYear = dateToCalculate.getFullYear();
    var calculateMonth = dateToCalculate.getMonth();
    var calculateDay = dateToCalculate.getDate();

    var birthYear = dateOfBirth.getFullYear();
    var birthMonth = dateOfBirth.getMonth();
    var birthDay = dateOfBirth.getDate();

    var age = calculateYear - birthYear;
    var ageMonth = calculateMonth - birthMonth;
    var ageDay = calculateDay - birthDay;

    if (ageMonth < 0 || (ageMonth == 0 && ageDay < 0)) {
        age = parseInt(age) - 1;
    }
    return age;
}