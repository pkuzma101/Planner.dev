// todo: Ask the user for their name.
//       Keep asking if an empty input is provided.

	do {
		var answer = prompt("What is your name?");
	} while (answer == "");
// todo: Show an alert message that welcomes the user based on their input.
alert("Hello, " + answer);
// todo: Ask the user if they like pizza.
//       Based on their answer tell show a creative alert message.

var pizza = confirm("Do you like pizza?");
	if(pizza == true) {
		alert("Pizza is a great thing.");
	}
	else {
		alert("You are a bad person.");
	} 
	