<?php require_once 'dbcon.php'; ?>
<?php
	if (isset($_GET['vkey'])) {
		$vkey = $_GET['vkey'];

		$resSet = mysqli_query($link , "SELECT * FROM `user_info` WHERE `status` = 0 AND `verified_key` = '$vkey' LIMIT 1");

		if (mysqli_num_rows($resSet) == 1) {
			$update = " UPDATE `user_info` SET `status`= 1 WHERE `verified_key` = '$vkey' LIMIT 1";
			$up_res = mysqli_query($link ,$update);
			if ($up_res) {
				echo "your account is verified successfully | now you may log in";
			}else{
				echo mysqli_error($link);
			}

		}else{
			echo "this account is invalid or already verified";
		}

	}else{
		die("Something goes wrong");
	}

 ?>