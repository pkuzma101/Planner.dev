<?php
if($_GET) {
	var_dump($_GET);
}
if($_POST) {
	var_dump($_POST);
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
				<li>Let out Dalek</li>
				<li>Read News</li>
				<li>Make Dinner</li>
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
		</div>
	</body>
</html>