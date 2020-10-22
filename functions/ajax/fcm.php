<?php 
	include_once dirname(__FILE__) . "/../database.php";
	include_once dirname(__FILE__) . "/../library.php";
	include_once dirname(__FILE__) . "/../action.php";
	$action = new action();

	$token = $_GET['token'];
	$date = date('Y-m-d');

	$rows = $action->getList('fcm', 'token', $token, 'id', 'asc', '', '', '');
	$count = count($rows);

	if ($count == 0) {
		$sql = "INSERT INTO fcm (token, `date`) VALUES ('$token', '$date')";
		$result = mysqli_query($conn_vn, $sql);
	} else {
		$row = $action->getDetail('fcm', 'token', $token);
		$id = $row['id'];
		$sql = "UPDATE fcm SET `date` = '$date' WHERE id = $id";
		$result = mysqli_query($conn_vn, $sql);
	}
?>