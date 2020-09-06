<?php  
	function idExists($id){
		$conn = mysqli_connect('localhost', 'root', '','shorten_url');
// Check connection
		if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
		}

		$row = mysqli_query($conn, "SELECT * FROM urls WHERE id = '$id'") or die(mysqli_error($conn));;
		$count = mysqli_num_rows($row);

		if($count > 0){
			return true;
		} else {
			return false;
		}
	}

	function urlHasBeenShortened($url){
		$conn = mysqli_connect('localhost', 'root', '','shorten_url');
		$row = $conn->query("SELECT * FROM urls WHERE link_to_page = '$url'");

		if(mysqli_num_rows($row) > 0){
			return true;
		} else {
			return false;
		}
	}

	function getURLID($url){
		$conn = mysqli_connect('localhost', 'root', '','shorten_url');
		$row = $conn->query("SELECT id FROM urls WHERE link_to_page = '$url'");

		return $row->fetch_assoc()['id'];
	}

	function insertID($id, $url){
		$conn = mysqli_connect('localhost', 'root', '','shorten_url');
		$conn->query("INSERT INTO urls (id, link_to_page) VALUES ('$id', '$url')");

		if(strlen($conn->error) == 0){
			return true;
		}
	}

	function getUrlLocation($id){
		$conn = mysqli_connect('localhost', 'root', '','shorten_url');
		$row = $conn->query("SELECT link_to_page FROM urls WHERE id = '$id'");

		return $row->fetch_assoc()['link_to_page'];
	}
?>