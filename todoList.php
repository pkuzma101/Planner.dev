<?php


$items = [];

 foreach($_POST as $key => $value) {
	array_push($items, $value);
}

// function listItems($items) {
//     $string = "";
//     foreach($items as $key => $item) {
//         $key++;
//         $string .="<li>[{$key}] {$item} </li>";
//     }

 //    return $string;
 // }

// function getInput($upper = false) {
//     $input = trim(fgets(STDIN));
//         if($upper == true) {
//             $input = strtoupper($input);
//         }
//     return $input;
//  }

function saveFile($items, $filename = './data/items.txt') {
    $handle = fopen($filename, "w");
    $string = implode("\n", $items);
        fwrite($handle, $string);
        fclose($handle);
        // return "Succesfully saved list to $filename\n";         
    }

 function openFile($filename = './data/items.txt') {
        $handle = fopen($filename, "r");
        $contents = fread($handle, filesize($filename));
        $contentArray = explode(PHP_EOL, $contents);
        fclose($handle);
        return $contentArray;
 }

 	// if(count($_FILES) > 0 && $_FILES['file1']['error'] == UPLOAD_ERR_OK) {
 	// 	// Set up destination directory for uploads
 	// 	$uploadDir = '/vagrant/sites/planner.dev/public/uploads/';

 	// 	//Grab the filename from the uploaded file by using basename
 	// 	$filename = basename($_FILES['file1']['name']);

 	// 	// Create saved filename using the file's original name and our upload directory
 	// 	$savedFilename = $uploadDir . $filename;

 	// 	// move file from the temp location to our uploads directory
 	// 	move_uploaded_file($_FILES['file1']['tmp_name'], $savedFilename);

 	// 	var_dump($_FILES);
 	// }		

$items = openFile();

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

 		// Merge uploaded list with current list
 		$newList = openFile($savedFilename);
 		$items = array_merge($items, $newList);
 		// save new list to file
 		saveFile($items);
 	}
 	else {
 		echo "You can only upload text files.";
 	}
 }

if(isset($_GET['id'])) {
	$id = $_GET['id'];
	unset($items[$id]);
	saveFile($items);
}

if(isset($_POST['add'])) {
	$itemToAdd = $_POST['add'];
	$items[] = $itemToAdd;
	saveFile($items);
}
?>

<html>
	<head>
		<title>TODO List</title>
		<link rel="stylesheet" type="text/css" href="/css/site.css">
	</head>
	<body>
		<h1>TODO List</h1>
		<div>
			<ul>
				<?php foreach($items as $key => $value) {  ?>
				<li><?php echo $value; ?> | <a href="?id=<?php echo $key; ?>"> done </a></li>
				<?php } ?>
			</ul>
		</div>
		<div>
			<h3>Add Item to the List</h3>
				<form method="POST" action="/todoList.php">
					<p>
						<input id="add" name="add" type="text" placeholder="Task to Add">
					</p>
					<p>
						<button type="submit">Add Item</button>
					</p>
				</form>
				<form method="POST" enctype="multipart/form-data">
					<p>
						<label for="file1">File to Upload: </label>
						<input type="file" id="file1" name="file1">
					</p>
					<p>
						<input type="submit" value="Upload">
					</p>
					<p>
						<?php
							// Check if we saved a file
						 	if(isset($savedFilename)) {
						 		// If it saved, show a link to the uploaded file
						 		echo "<p>You can download your file <a href='/uploads/{$filename}'>here</a>.</p>";
						 	}
						?>
					</p>
				</form>
		</div>
	</body>
</html>