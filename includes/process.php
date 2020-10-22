<?php  
	//include $_SERVER['DOCUMENT_ROOT'] . '/includes/init.php';
	$conn = mysqli_connect('localhost', 'root', '');
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	// include the functions.php file
	include $_SERVER['DOCUMENT_ROOT'] . '/php/backEnd/includes/functions.php';

	// variable for storing the unique id
	$id = rand(111,999);
	// variable to store data which getting by post request
	$url = $_POST['url']; 
	
	// check if id is exist or not
	if(idExists($id) == true){
		$id = rand(111,999);
	}

	// cneck that url has shortened or not
	if(urlHasBeenShortened($url)){
		// if url has shortened then get id of given url
		echo getURLID($url);
		return true;
	}
	
	// insert url to database
	insertID($id, $url);
	echo $id;
?>
