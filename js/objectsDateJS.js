// todo:
// Create an array of months for printing dates without Moment.js.
var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

// todo:
// Create the date corresponding to your birthday using the JavaScript Date object.
var jsBirthday = new Date(1982, 10, 26);
var numMonth = jsBirthday.getMonth();
var nameMonth = months[numMonth];
var numDay = jsBirthday.getDate();
var numYear = jsBirthday.getFullYear();



// todo:
// Log your birthday in the format: January 1, 2014 using the JavaScript Date object.
// See link below for methods needed:
// https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Date#Getter
console.log('Here is my birthday using vanilla js: ' +  nameMonth +  " " + numDay + "," + " " + numYear + ".");

// create the date corresponding to your birthday using Moment.js.
//var momentBirthday
var momentBirthday = moment("11-26-1982", "MM-DD-YYYY");
// todo:
// Log your birthday in the format: January 1, 2014 using Moment.js.
console.log('Here is my birthday using Moment.js: ' + momentBirthday.format("MM-DD-YYYY"));