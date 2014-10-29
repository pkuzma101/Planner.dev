<?php

$addresses = [
    ['The White House', '1600 Pennsylvania Avenue NW', 'Washington', 'DC', '20500'],
    ['Marvel Comics', 'P.O. Box 1527', 'Long Island City', 'NY', '11101'],
    ['LucasArts', 'P.O. Box 29901', 'San Francisco', 'CA', '94129-0901']
];
// var_dump($addresses);

if($_POST) {
	if(empty($_POST['name']) || empty($_POST['address']) || empty($_POST['city']) || empty($_POST['state']) || empty($_POST['zip']) || empty($_POST['phone'])) {
		echo "PLease fill all fields.";
	}
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
	$addresses[] = $newEntry;
}
}

$handle = fopen('addressBook.csv', 'w');

// foreach($addresses as $row) {
// 	fputcsv($handle, $row);
// }

fclose($handle);

?>

<html>
	<head>
		<title>Address Book</title>
	</head>
	<body>
		<h1>Contacts</h1>
		<table>
			<tr>
				<th>Name</th>
				<th>Address</th>
				<th>City</th>
				<th>State</th>
				<th>Zip</th>
				<th>Phone</th>
			</tr>
			<? foreach($addresses as $key => $contact): ?>
				<tr>
					<? foreach($contact as $value): ?>
						<td><?= $value; ?></td>
					<? endforeach; ?>
				</tr>
			<? endforeach; ?>
			
		</table>
		<h2>Create a New Contact</h2>
		<form method="POST" action="/addressBook.php">
			<p>
				<label for="name">Name:</label>
				<input id="contact" name="name" type="text" placeholder="name">

			</p>
			<p>
				<label for="address">Address:</label>
				<input id="contact" name="address" type="text" placeholder="address">
			</p>
			<p>
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
				<button type="submit">Add Contact</button>
			</p>
		</form>
	</body>
</html>