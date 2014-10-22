// todo:
// Create an array of 4 names using literal array notation, in a variable called 'names'.

var names = ["Terra", "Locke", "Edgar", "Celes"];

// todo:
// Create a log statement that will log the number of elements in the names array.
console.log("There are " + names.length + " names in the array.");

// todo:
// Create log statements that will print each of the names array elements individually.

// console.log("The first character is " + names[0] + ".");

// console.log("The second character is " + names[1] + ".");

// console.log("The third character is " + names[2] + ".");

// console.log("The fourth character is " + names[3] + ".");

for(var i = 0; i < names.length; i++) {
	console.log("The name at index " + i + " is: " + names[i]);
}

names.forEach(function(element, index, array) {
	console.log("The name at index " + index + " is: " + element);
});