
do {
	var random = Math.floor((Math.random()*50)+1);
} while(random % 2 == 0);

for(var i = 1; i < 50; i++) {
	if(random == i) {
		console.log("Yipes!  We are skipping " + i);
		continue;
	}
	else if(i % 2 != 0) {
		console.log("Here is an odd number: " + i);
	}


	
}

