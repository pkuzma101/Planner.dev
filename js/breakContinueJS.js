var random = Math.floor((Math.random()*50)+1);

for(var i = 1; i < 50; i++) {
	if(i % 2 == 0) {
		continue;
	}

	console.log("Here is an odd number: " + i);
}
