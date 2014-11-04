<?php

class dinosaurDataStore {
	public $filename = '';

	// Declare that $filename will always refer to the csv file I set up
	public function __construct($filename = 'dinosaurData.csv') {
		$this->filename = 'data/' . $filename;
	}

	// Establish that $dinosaurs is an empty array that I can move things into
	public $dinosaurs = [];

	public function readDinosaurData() {
		$dinosaurs = [];

		if(file_exists($this->filename) && filesize($this->filename) > 0) {
			// Open the file and place the pointer at the beginning of the file
			$handle = fopen($this->filename, 'r');
			// while not at the end of the $handle pointer, get data from the data/dinosaurData.csv
			while(!feof($handle)) {
				$row = fgetcsv($handle);
				if(!empty($row)) {
					$dinosaurs[] = $row;
				}
			}
			fclose($handle);
			$this->dinosaurs = $dinosaurs;
		} 
		else {
			$dinosaurs = [];
		}
		return $dinosaurs;
	}

	public function writeDinosaurData() {
		// Open file and place pointer at beginning of file, write over it
		$handle = fopen($this->filename, 'w');
		// Take each array row and assign them to $row
		foreach($this->dinosaurs as $row) {
			// Save each $row to the csv file
			fputcsv($handle, $row);
		}
		fclose($handle);
	}		
}

// Create a new object called $dinosaurBook that has the dinosaurDataStore methods and properties
$dinosaurBook = new dinosaurDataStore();

$dinosaurBook->dinosaurs = $dinosaurBook->readDinosaurData();

if(count($_FILES) > 0 && $_FILES['file1']['error'] == UPLOAD_ERR_OK) {
// Set the destination directory for uploads
	$uploadDir = '/vagrant/sites/planner.dev/public/data/';

	// Grab the filename from the uploaded file by using basename
	$filename = basename($_FILES['file1']['name']);

	// Create the saved filename using the file's original name and our upload directory
	$savedFilename = $uploadDir . $filename;

	// Move the file from the temp location to our uploads directory
	move_uploaded_file($_FILES['file1']['tmp_name'], $savedFilename);
	// Create new instance of object, give it the name $newAddressBook
	$newDinosaurBook = new dinosaurDataStore($filename);
	// Call the read function 
	$newDinosaurBook->dinosaurs = $newDinosaurBook->readDinosaurData();
	// Merge the $dinosaurs variable from both objects
	$dinosaurBook->dinosaurs = array_merge($dinosaurBook->dinosaurs, $newDinosaurBook->dinosaurs);
	$dinosaurBook->writeDinosaurData();

}
	
if(isset($_GET['id'])) {
	$id = $_GET['id'];
	unset($dinosaurBook->dinosaurs[$id]);
	$dinosaurBook->writeDinosaurData();
}

if($_POST) {
	// Check to see if any of the input forms are empty
	if(empty($_POST['nickname']) || empty($_POST['genus']) || empty($_POST['species']) || empty($_POST['year']) || empty($_POST['aggressive'])) {
		 echo $error;
	}

	// If they are all filled, add info from form into a new array
	else {

	if(isset($_POST['nickname'])) {
		$newEntry[] = $_POST['nickname'];
	}
	if(isset($_POST['genus'])) {
		$newEntry[] = $_POST['genus'];
	}
	if(isset($_POST['species'])) {
		$newEntry[] = $_POST['species'];
	}
	if(isset($_POST['year'])) {
		$newEntry[] = $_POST['year'];
	}
	if(isset($_POST['aggressive'])) {
		$newEntry[] = $_POST['aggressive'];
	}

	// Takes all the form info just entered and pushes it onto the original array 
	
		$dinosaurBook->dinosaurs[] = $newEntry;
		$dinosaurBook->writeDinosaurData();
	}
}

?>

<html>
	<head>
		<title>Dinosaur Display</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
		<link href='http://fonts.googleapis.com/css?family=Carter+One' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Devonshire' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href='css/dinosaurHomework.css'>
	</head>
	<body>
		<h1>Dinosaurs</h1>

		<!-- Table where dinosaur info will be stored -->
		<table class="table table-hover">
			<tr>
				<th>Nickname</th>
				<th>Genus</th>
				<th>Species</th>
				<th>Year Discovered</th>
				<th>Aggressive?</th>
				<th></th>
			</tr>
			<? foreach($dinosaurBook->dinosaurs as $key => $info): ?>
			<tr>
				<? foreach($info as $value): ?>
				<td><?= htmlspecialchars(strip_tags($value)); ?></td>
				<? endforeach ?>
				<td><a href="?id=<?= $key ?>" class='btn btn-danger'>Remove</a></td>
			<? endforeach ?>
			</tr>
		</table>
		<form method="POST" classaction="/dinosaurHomework.php" class='form-horizontal' role='form'>
			<h2>Create a New Dinosaur</h2>
			<p class='input-group'>
				<label for="nickname">Nickname:</label>
				<input id="contact" name="nickname" type="text" placeholder="nickname">

			</p>
			<p class='input-group'>
				<label for="genus">Genus:</label>
				<input id="contact" name="genus" type="text" placeholder="genus">
			</p>
			<p class='input-group'>
				<label for="species">Species:</label>
				<input id="contact" name="species" type="text" placeholder="species">
			</p>
			<p>
				<label for="year">Year Discovered:</label>
				<input id="contact" name="year" type="text" placeholder="year">
			</p>
			<p>
				<label for="aggressive">Aggressive?:</label>
				<input id="contact" name="aggressive" type="text" placeholder="yes or no">
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
			<p id='uploadButton'>
				<input type="submit" value="Upload" class="btn btn-danger">
			</p>
			<p>
				<?
					// Check if we saved a file
				 	if(isset($savedFilename)) {
				 		// If it saved, show a link to the uploaded file
				 		echo "<p>You can download your file <a href='/data/{$filename}'>here</a>.</p>";
				 	}
				?>
			</p>
		</form>
	</body>
</html>