// ignore these lines for now
// just know that the variable 'color' will end up with a random value from the colors array
var colors = ['red', 'orange', 'yellow', 'green', 'blue', 'indigo', 'violet'];
var color = colors[Math.floor(Math.random()*colors.length)];

var favorite = 'red'; // todo, change this to your favorite color from the list

// todo: Create a block of if/else statements to check for every color except indigo and violet.
// todo: When a color is encountered log a message that tells the color, and an object of that color.
//       Example: Blue is the color of the sky.


if(color == 'red') {
	console.log("red is the color of blood.");
} 
else if(color == 'orange') {
	console.log("orange is the color of fire.");
}
else if(color == 'yellow') {
	console.log("yellow is the color of the sun.");
}
else if(color == 'green') {
	console.log("green is the color of plants.");
}
else if(color == 'blue') {
	console.log("blue is the color of the sky.");
}
else {
	console.log("I do not know anything by that color.");
}

// todo: Have a final else that will catch indigo and violet.
// todo: In the else, log: I do not know anything by that color.
var message = (favorite) == color ? "Red is a cool color." : "This is not a cool color.";
console.log(message);


// todo: Using the ternary operator, conditionally log a statement that
//       says whether the random color matches your favorite color.