<?

require_once('../inc/todoListStore.php');
	
$DoList = new TodoList();
$DoList->items = $DoList->openFile();

// Puts new list items onto the end of the list
foreach($_POST as $key => $value) {
		array_push($DoList->items, $value);
	}

if(count($_FILES) > 0 && $_FILES['file1']['error'] == UPLOAD_ERR_OK) { 
	if($_FILES['file1']['type'] == 'text/plain') {
 		// Set up destination directory for uploads
 		$uploadDir = '/vagrant/sites/planner.dev/public/uploads/';

 		//Grab the filename from the uploaded file by using basename
 		$filename = basename($_FILES['file1']['name']);

 		// Create saved filename using the file's original name and our upload directory
 		$savedFilename = $uploadDir . $filename;

 		// move file from the temp location to our uploads directory
 		move_uploaded_file($_FILES['file1']['tmp_name'], $savedFilename);

 		// Create new object for the uploaded array
 		$DoList2 = new ToDoList("../uploads/" . $filename);

 		// Open and read the uploaded array
 		$DoList2->items = $DoList2->openFile();

 		// Merge the present list with the one I uploaded
 		$DoList->items = array_merge($DoList->items, $DoList2->items);

 		// Save the merged list
 		$DoList->saveFile($DoList->items);
 	}else {
 		echo "You can only upload text files.";
 	}
 }

 if(isset($_GET['id'])) {
 	unset($DoList->items[$_GET['id']]);
 	$DoList->items = array_values($DoList->items);
 	$DoList->saveFile($DoList->items);
 }

if(isset($_POST['add'])) {
	$itemToAdd = $_POST['add'];
	$items[] = $itemToAdd;
	$DoList->saveFile($DoList->items);
}

?>

<html>
	<head>
		<title>TODO List</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
		<link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Josefin+Sans:400,400italic' rel='stylesheet' type='text/css'>
		<link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" type="text/css" href="/css/site.css">
	</head>
	<body>
		<h1>TODO List</h1>
		<div>
			<ul class='text-center'>
				<? foreach($DoList->items as $key => $value):  ?>
				<li><?= htmlspecialchars(strip_tags($value)); ?> | <a href="?id=<?php echo $key; ?>"> done </a></li>

				<? endforeach ?>
			</ul>
		</div>
		<div>
			<h3>Add Item to the List</h3>
				<form method="POST" action="/todoList.php" id="addItem">
					<p>
						<input id="add" name="add" type="text" placeholder="Task to Add">
					</p>
					<p>
						<button type="submit">Add Item</button>
					</p>
				</form>
				<form method="POST" enctype="multipart/form-data" class='form-inline' role="form">
					<p>
						<label for="file1">File to Upload: </label>
						<input type="file" class="form-control" id="file1" name="file1">
					</p>
					<p id="uploadButton">
						<input type="submit" value="Upload">
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
		</div>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
		<script src="js/todoList.js"></script>
	</body>
</html>