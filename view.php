/*<!DOCTYPE html>
<html>
<head>
<title>Table with database</title>
</head>
<body>
<?php
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'vehicle_register');
?>

<?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php
			echo $_SESSION['message'];
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>
<?php

	// initialize variables
	$owner_name = "";
	$plate_no = "";
	$id = 0;
	$update = false;
	$color = "";
	$size = "";

if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$owner_name = $_POST['owner_name'];
	$plate_no = $_POST['plate_no'];

	mysqli_query($db, "UPDATE registered_vehicle SET owner_name='$owner_name', plate_no='$plate_no', color='$color', size='$size' WHERE id=$id");
	$_SESSION['message'] = "Updated!";
	header('location: reg_vehicle.html');
}

if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM registered_vehicle WHERE id=$id");
	$_SESSION['message'] = "Deleted!";
	header('location: reg_vehicle.html');
}

?>

<table>
	<th>
		<tr>
			<th>Owner Name</th>
			<th>Plate No.</th>
			<th>Colour of vehicle</th>
			<th>Size of vehicle</th>
		</tr>
	</th>

	<?php

	if(isset($_GET['view'])){
	$id = $_GET['view'];
?>
    <?php $results = mysqli_query($db, "SELECT * FROM registered_vehicle");
    ?>

<?php
	while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['owner_name']; ?></td>
			<td><?php echo $row['plate_no']; ?></td>
			<td><?php echo $row['color']; ?></td>
			<td><?php echo $row['size']; ?></td>
		</tr>
	<?php } }?>
</table>


</body>
</html>*/

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>CRUD </title>
</head>
<body>
<table>
<tr></tr>
</table>

</body>
</html>
