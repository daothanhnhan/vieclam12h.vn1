<?php 
	include_once dirname(__FILE__) . "/../database.php";
	include_once dirname(__FILE__) . "/../library.php";
	include_once dirname(__FILE__) . "/../action.php";
	$action = new action();

	$id = $_GET['id'];
	// echo $id;

	$sql = "SELECT * FROM book_tuyen_time WHERE id = $id";
	$result = mysqli_query($conn_vn, $sql);
	$row = mysqli_fetch_assoc($result);
	$state = $row['state'];

	if ($state == 1) {
		echo 'Đã kích hoạt gói mua.';
	} else {
		$ntd = $action->getDetail('nha_tuyen_dung', 'id', $row['ntd_id']);
		$ntd_id = $ntd['id'];
		$ntd_tuyen_time = $ntd['tuyen_time'];
		$now = date('Y-m-d');

		$goi_tuyen = $action->getDetail('bang_gia_4', 'id', $row['tuyen_time_id']);
		$week = $goi_tuyen['week'];
		
		// $ntd_home_time = '2020-10-10';
		// $ngay_so = strtotime($ntd_home_time. "+$week weeks");
		// $ngay = date('Y-m-d', $ngay_so);die($ngay);
		if ($now > $ntd_tuyen_time) {
			$ngay_so = strtotime($now. "+$week weeks");
			$ngay = date('Y-m-d', $ngay_so);
		} else {
			$ngay_so = strtotime($ntd_tuyen_time. "+$week weeks");
			$ngay = date('Y-m-d', $ngay_so);
		}
		

		$sql = "UPDATE nha_tuyen_dung SET tuyen_time = '$ngay' WHERE id = $ntd_id";
		$result = mysqli_query($conn_vn, $sql);

		$sql = "UPDATE book_tuyen_time SET state = 1 WHERE id = $id";
		$result = mysqli_query($conn_vn, $sql);

		if ($result) {
			echo 'Bạn đã kích hoạt thành công.';
		} else {
			echo 'Có lỗi rảy ra.';
		}
	}
?>