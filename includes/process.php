<?php  
	//include $_SERVER['DOCUMENT_ROOT'] . '/includes/init.php';
	$conn = mysqli_connect('localhost', 'root', '');
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	include $_SERVER['DOCUMENT_ROOT'] . '/php/backEnd/includes/functions.php';

	$id = rand(111,999);
	$url = $_POST['url']; 
	

	if(idExists($id) == true){
		$id = rand(111,999);
	}

	if(urlHasBeenShortened($url)){
		echo getURLID($url);
		return true;
	}

	insertID($id, $url);
	echo $id;
?>