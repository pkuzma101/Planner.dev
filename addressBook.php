<?php
// Establish file where info will be saved
// $filename = 'data/addressBook.csv';

function readFromFile($filename = 'data/addressBook.csv') {

	$addresses = [];

	// Open the file and place the pointer at the beginning of the file
	$handle = fopen($filename, 'r');
	// while not at the end of the $handle pointer, get data from the data/addressBook.csv
	while(!feof($handle)) {
		$row = fgetcsv($handle);

		if(!empty($row)) {
			$addresses[] = $row;
		}
	}


	fclose($handle);
	return $addresses;

}
// Establish the array that will become the contacts table
$addresses = readFromFile();

function saveFile($addresses, $filename = 'data/addressBook.csv') {
	$handle = fopen($filename, 'w');
	foreach($addresses as $row) {
	fputcsv($handle, $row);
	}

	fclose($handle);
}

if(isset($_GET['id'])) {
	$id = $_GET['id'];
	unset($addresses[$id]);
	saveFile($addresses, $filename = 'data/addressBook.csv');
}

if($_POST) {

	// Check to see if any of the input forms are empty
	if(empty($_POST['name']) || empty($_POST['address']) || empty($_POST['city']) || empty($_POST['state']) || empty($_POST['zip']) || empty($_POST['phone'])) {
		echo "Please fill all fields.";
	}

	// If they are all filled, add info from form into a new array
	else {

	if(isset($_POST['name'])) {
		$newEntry[] = $_POST['name'];
	}
	if(isset($_POST['address'])) {
		$newEntry[] = $_POST['address'];
	}
	if(isset($_POST['city'])) {
		$newEntry[] = $_POST['city'];
	}
	if(isset($_POST['state'])) {
		$newEntry[] = $_POST['state'];
	}
	if(isset($_POST['zip'])) {
		$newEntry[] = $_POST['zip'];
	}
	if(isset($_POST['phone'])) {
		$newEntry[] = $_POST['phone'];
	}

	// Takes all the form info just entered and pushes it onto the original array 
	$addresses[] = $newEntry;
	saveFile($addresses);
}
}



// Opens csv file that this page is using for the address book
// $handle = fopen('data/addressBook.csv', 'w');

// Takes info from the array and puts it onto the csv file
?>

<html lang='en'>
	<head>
		<title>Address Book</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
		<link href="font-awesome-4.1.0/css/fonts/" rel="stylesheet" type="text/css">
	    <link href="http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
	    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
	    <link href='http://fonts.googleapis.com/css?family=Patrick+Hand|Indie+Flower' rel='stylesheet' type='text/css'>
	    <link href='http://fonts.googleapis.com/css?family=Indie+Flower' rel='stylesheet' type='text/css'>
	    <link href="css/addressBook.css" rel="stylesheet">
	</head>
	<body>
		<h1>Contacts</h1>

		<!-- Creates the table where array info will be stored -->
		<table class="table table-hover">
			<tr>
				<th>Name</th>
				<th>Address</th>
				<th>City</th>
				<th>State</th>
				<th>Zip</th>
				<th>Phone</th>
				<th></th>
			</tr>
			<!-- converts the original, multidimensional array into its seperate, smaller arrays -->
			<? foreach($addresses as $key => $contact): ?>
				<tr>
				<!-- converts the array values into strings that I can manipulate and use -->
					<? foreach($contact as $value): ?>
					<!-- Puts array values into the table -->
						<td><?= htmlspecialchars(strip_tags($value)); ?></td>
					<? endforeach; ?>
						<td>
					    	<a href="?id=<?= $key ?>" class='btn btn-danger'>Remove</button>		
						</td>
				</tr>
			<? endforeach; ?>
			
		</table>
		
		<!-- Form for new contact begins here -->
		<form method="POST" classaction="/addressBook.php" class='form-horizontal' role='form'>
			<h2>Create a New Contact</h2>
			<p class='input-group'>
				<label for="name">Name:</label>
				<input id="contact" name="name" type="text" placeholder="name">

			</p>
			<p class='input-group'>
				<label for="address">Address:</label>
				<input id="contact" name="address" type="text" placeholder="address">
			</p>
			<p class='input-group'>
				<label for="city">City:</label>
				<input id="contact" name="city" type="text" placeholder="city">
			</p>
			<p>
				<label for="address">State:</label>
				<input id="contact" name="state" type="text" placeholder="state">
			</p>
			<p>
				<label for="address">Zip:</label>
				<input id="contact" name="zip" type="text" placeholder="zip">
			</p>
			<p>
				<label for="address">Phone Number:</label>
				<input id="contact" name="phone" type="text" placeholder="phone">
			</p>
			<p>
				<!-- Creates button used to add new contact info -->
				<button type="submit" class="btn btn-primary">Add Contact</button>
			</p>
		</form>
	</body>
</html>