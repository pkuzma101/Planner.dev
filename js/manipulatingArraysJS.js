// todo:
// Create an array holding the names of the planets of our solar system (in order, starting closest to the sun).
var planets = ['Mercury', 'Venus', 'Earth', 'Mars', 'Jupiter', 'Saturn', 'Uranus', 'Neptune'];

// function for logging the planets array
function logPlanets(planets) {
    console.log('Here is the list of planets:');
    console.log(planets);
}

console.log('Adding "The Sun" to the beginning of the planets array.');
// todo: Do what the log statement above says you will do.
planets.unshift('The Sun');
logPlanets(planets);
	console.log(planets);

console.log('Adding "Pluto" to the end of the planets array.');
// todo: Do what the log statement above says you will do.
planets.push('Pluto');
logPlanets(planets);
	console.log(planets);

console.log('Removing "The Sun" from the beginning of the planets array.');
// todo: Do what the log statement above says you will do.
var removeSun = planets.shift("The Sun");
logPlanets(planets);
	console.log(planets);

console.log('Removing "Pluto" from the end of the planets array.');
// todo: Do what the log statement above says you will do.
var removePluto = planets.pop("Pluto");
logPlanets(planets);
	console.log(planets);

console.log('Finding and logging the index of "Earth" in the planets array.');
// todo: Do what the log statement above says you will do.
var index = planets.indexOf('Earth');
logPlanets(planets);
	console.log(index);

console.log('Using splice to remove the planet after Earth.');
// todo: Do what the log statement above says you will do.
var removeMars = planets.splice(planets.indexOf('Mars'), 1);
logPlanets(planets);
	console.log(removeMars);

console.log('Using splice to add back the planet after Earth.');
// todo: Do what the log statement above says you will do.
planets.splice(planets.indexOf('Earth') + 1, 0, 'Mars');
logPlanets(planets);
	console.log(planets);

console.log('Reversing the order of the planets array.');
// todo: Do what the log statement above says you will do.
var backwards = planets.reverse();
logPlanets(planets);
	console.log(backwards);

console.log('Sorting the planets array.');
// todo: Do what the log statement above says you will do.
var organize = planets.sort();
logPlanets(planets);
	console.log(organize);