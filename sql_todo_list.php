<?php

define ('DB_HOST', '127.0.0.1');
define ('DB_NAME', 'todo_list_db');
define ('DB_USER', 'tdl_user');
define ('DB_PASS', 'duster2');

require '../inc/db_connect.php';



if(isset($_GET['list-item'])) {
	$itemToRemove = intval($_GET['list-item']);
}

if($_POST) {
	if($_POST['add'] > 5) {
		echo "<div class='alert alert-info' role='alert'> Item too long, break into multiple items </div>";
	} elseif(empty($_POST['add'])) {
		echo "<div class='alert alert-info' role='alert'> Can't add a blank item </div>";
	} else {
		$query = $dbc->prepare("INSERT INTO items(content) VALUES(:content)");
		$query->bindValue(':content', $_POST['add'], PDO::PARAM_STR);
		$query->execute();
	}
}

if(isset($itemToRemove)) {
	$deletion = $dbc->prepare("DELETE FROM items WHERE id = :itemToRemove");
	$deletion->bindValue(':itemToRemove', $itemToRemove, PDO::PARAM_INT);
	$deletion->execute();
}

$stmt = $dbc->prepare("SELECT content, id FROM items");
$stmt->execute();

$items = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
				<? foreach($items as $value):  ?>
					<li><?= htmlspecialchars(strip_tags($value['content'])); ?> | <a href="?list-item=<?php echo $value['id']; ?>"> done </a></li>
				<? endforeach ?>
			</ul>
		</div>
		<div>
			<h3>Add Item to the List</h3>
				<form method="POST" action="/sql_todo_list.php" id="addItem">
					<p>
						<input id="add" name="add" type="text" placeholder="Task to Add">
					</p>
					<p>
						<button type="submit">Add Item</button>
					</p>
				</form>
		</div>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
		<script src="js/todoList.js"></script>
	</body>
</html>