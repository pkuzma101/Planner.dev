

var play = confirm("Let's Play Number Guessing Game!");
	if(play) {
		var random = Math.floor((Math.random()*100)+1);
		var input = prompt("Pick a number between 1 and 100.");
		
		while(input != random) {	
			if(input > random) {
				input = prompt("Lower");
			}
			else if(input < random) {
				input = prompt("Higher");
			}
		}
			alert("You got it!");
	}
	else {
		alert("BOR-ING!");
	}

	// do {
		
	// 	var random = random;
		
	// 	if(random > input) {
	// 		prompt("Lower");
	// 	}
	// 	else if(random < input) {
	// 		prompt("Higher");
	// 	}

	// 	else if(random == input) {
	// 		console.log("You got it!  And in " + guesses + " guesses!");
	// 	}
	// 	guesses++;

	// } while(input != random);
	



 