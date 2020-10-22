<?php  
	// function for checking that id is exist or not
	function idExists($id){
		// assign connection to the variable
		$conn = mysqli_connect(
			'localhost',   //type your domain name if you use the server otherwise remain same
			'root',  //your database username
			'',  // your database password
			'shorten_url'  // your database name
		);
		// Check connection
		if ($conn->connect_error) {
			//if connection not made, then it give error and stop execution
			die("Connection failed: " . $conn->connect_error);
		}
		
		// run the query
		$row = mysqli_query(
			$conn, // your connection variable
			"SELECT * FROM urls WHERE id = '$id'"  //your sql query which need to perform
		)
		or 
		die(mysqli_error($conn));  //if some error then it will throw error and stop execution
		
		$count = mysqli_num_rows($row);  // it will count the row of result of the above query

		//check the row count
		if($count > 0){
			return true;
		} else {
			return false;
		}
	}

	// function for checking that url is shortened or not
	function urlHasBeenShortened($url){
		// establish the connection
		$conn = mysqli_connect(
			'localhost',   //type your domain name if you use the server otherwise remain same
			'root',  //your database username
			'',  // your database password
			'shorten_url'  // your database name
		);
		
		// run the query
		$row = $conn->query("SELECT * FROM urls WHERE link_to_page = '$url'");
		
		// it will count the row of result of the above query and check the row count
		if(mysqli_num_rows($row) > 0){
			return true;
		} else {
			return false;
		}
	}
	
	//function for getting the id of url
	function getURLID($url){
		// establish the connection
		$conn = mysqli_connect(
			'localhost',   //type your domain name if you use the server otherwise remain same
			'root',  //your database username
			'',  // your database password
			'shorten_url'  // your database name
		);
		// run the query
		$row = $conn->query("SELECT id FROM urls WHERE link_to_page = '$url'");
		
		//this will fetch data in associative array with key name is "id" and then return (in simple term $row['id'])
		return $row->fetch_assoc()['id'];
	}

	// function for adding url to the database
	function insertID($id, $url){
		// establish the connection
		$conn = mysqli_connect(
			'localhost',   //type your domain name if you use the server otherwise remain same
			'root',  //your database username
			'',  // your database password
			'shorten_url'  // your database name
		);
		// run the query
		$conn->query("INSERT INTO urls (id, link_to_page) VALUES ('$id', '$url')");
		
		//checking for getting error length by connection
		if(strlen($conn->error) == 0){
			return true;
		}
	}

	// function to get the url by given id
	function getUrlLocation($id){
		// establish the connection
		$conn = mysqli_connect(
			'localhost',,   //type your domain name if you use the server otherwise remain same
			'root',  //your database username
			'',  // your database password
			'shorten_url'  // your database name
		);
		// run the query
		$row = $conn->query("SELECT link_to_page FROM urls WHERE id = '$id'");
		//this will fetch data in associative array with key name is "link_to_page" and then return (in simple term $row['link_to_page'])
		return $row->fetch_assoc()['link_to_page'];
	}
?>
