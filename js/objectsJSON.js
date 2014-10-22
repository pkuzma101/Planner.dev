// todo:
// Create an array of objects that represent books.
// Each book should have a title and an author.
// The book author should be an object with a firstName and lastName.
// Be creative and add at least 5 books to the array
// var books = [todo];
// var books = [{}, 'I Want My Hat Back', "Ender's Game", 'Radical Son', 'Gone Girl'];

var books = [{
				"Title": "A Clash of Kings",
				"Author": {'first': 'George R.R.', 'last': 'Martin'}
			}, 
			 {
				"Title": "I Want My Hat Back",
				"Author": {'first': 'Jon', 'last': 'Klassen'}
			 }, 
			 {
				"Title": "Ender's Game",
				"Author": {'first': 'Orson', 'last': 'Scott Card'}
			 }, 
			 {
				"Title": "Radical Son",
				"Author": {'first': 'David', 'last': 'Horowitz'}
			 }, 
			 {
				"Title": "Gone Girl",
				"Author": {'first': 'Gillian', 'last': 'Flynn'}
			 }
			 ];


// log out the books array
console.log(books);


// todo:
// Loop through the array of books using .forEach and print out the specified information about each one.
// start loop here
books.forEach(function(element, index, array) {
    console.log("Book #: " + index);
    console.log("Title: " + element['Title']);
    console.log("Author: " + element.Author['first'] + " " + element.Author['last']);
    console.log("---");

    });
// end loop here