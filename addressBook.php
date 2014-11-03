<?php

require_once('../inc/addressDataStore.php');

// Establish file where info will be saved

// Create a new object $addressBook
$addressBook = new addressDataStore();

$addressBook->addresses = $addressBook->readAddressBook();

$error = "Please fill out all fields.";

if(count($_FILES) > 0 && $_FILES['file1']['error'] == UPLOAD_ERR_OK) {
	// Create new object
	// Set that new object's filename 
	// Read from that filename
	// Merge that object's addresses with the original object's addresses
	
	// Set the destination directory for uploads
	$uploadDir = '/vagrant/sites/planner.dev/public/data/';

	// Grab the filename from the uploaded file by using basename
	$filename = basename($_FILES['file1']['name']);

	// Create the saved filename using the file's original name and our upload directory
	$savedFilename = $uploadDir . $filename;

	// Move the file from the temp location to our uploads directory
	move_uploaded_file($_FILES['file1']['tmp_name'], $savedFilename);
	// Create new instance of object, give it the name $newAddressBook
	$newAddressBook = new addressDataStore($filename);
	// Call the read function 
	$newAddressBook->addresses = $newAddressBook->readAddressBook();
	// Merge the $addresses variable from both objects
	$addressBook->addresses = array_merge($addressBook->addresses, $newAddressBook->addresses);
	$addressBook->writeAddressBook();

}

// Establish the array that will become the contacts table

// Provides method for removing contacts
if(isset($_GET['id'])) {
	$id = $_GET['id'];
	unset($addressBook->addresses[$id]);
	$addressBook->writeAddressBook();
}

if($_POST) {

	// Check to see if any of the input forms are empty
	if(empty($_POST['name']) || empty($_POST['address']) || empty($_POST['city']) || empty($_POST['state']) || empty($_POST['zip']) || empty($_POST['phone'])) {
		 echo $error;
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
	
		$addressBook->addresses[] = $newEntry;
		$addressBook->writeAddressBook();

	}
}

?>

<html lang='en'>
	<head>
		<title>Address Book</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
		<!-- <link href="font-awesome-4.1.0/css/fonts/" rel="stylesheet" type="text/css"> -->
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
			<? foreach($addressBook->addresses as $key => $contact): ?>
				<tr>
				 <? foreach($contact as $value): ?>
					<td><?= htmlspecialchars(strip_tags($value)); ?></td>
					<? endforeach; ?>
					<td>
					    <a href="?id=<?= $key ?>" class='btn btn-danger'>Remove</a>		
					</td>
					<? endforeach; ?>
				</tr>
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
		<form method="POST" enctype="multipart/form-data" class="form-inline" role="form">
			<p>
				<label for="file1">Upload a List: </label>
				<input type="file" class="form-control" id="file1" name="file1">
			</p>
			<p id="uploadButton">
				<input type="submit" value="Upload" class="btn btn-danger">
			</p>
			<p>
				<?
					// Check if we saved a file
				 	if(isset($savedFilename)) {
				 		// If it saved, show a link to the uploaded file
				 		echo "<p>You can download your file <a href='/uploads/{$filename}'>here</a>.</p>";
				 	}
				?>
			</p>
		</form>
	</body>
</html>