<?php  
	// check that id is set or not by get method (means in the url)
	if(isset($_GET['id'])){
		// include the functions.php
		include $_SERVER['DOCUMENT_ROOT'] . '/php/BackEnd/includes/functions.php';
		// store the id which getting by url
		$id  = $_GET['id'];
		// get the url by id
		$url = getUrlLocation($id);
		// move to url
		header('Location: ' . $url);
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>short_url</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="style.css">
</head>
<body style="background: url('index.jpg'); background-repeat: no-repeat; background-size: cover;">
	<div class="container-fluid" style="width: 100%; background-color:#74b9ff; color: #fff; padding: 10px;">
        <h1 style="font-size: 3.5rem; font-weight: 500;">URL CUTTER</h1>
	</div>

	<div class="container" style="max-width: 80%; width: 100%; margin: 20px auto; text-align: center; border: none; ">
		<input type="text" name="url" placeholder="Enter a valid URL" style="padding: 5px; height: 36px; font-size: 16px; border: none;
		outline: none;" autocomplete="off">
		<input type="submit" value="Short URL" style="padding: 5px; font-weight: 600; background-color: #00b894; height: 36px; border:
		none; outline: none;"><br><br>
		<p class="errors" style="font-size: 32px; font-weight: 300;"></p>
	</div>

	<script type="text/javascript">
		// run the code when document was loaded
		$(document).ready(function(){
			// when click on the submit button, run this
			$('input[type="submit"]').click(function(e){
				// disable the default behaviour of form
				e.preventDefault();
				// add nothing to class "errors"
				$('.errors').html('');
				//get the value from input
				var url = $('input[name="url"]').val();

				//check the length of url (means input is empty or not)
				if(url.length == 0){
					// add error message to "errors" class div
					$('.errors').html('Whoops! Please enter a URL!');
					return false;
				}
				
				// made post request to given url
				$.post(
					'/php/BackEnd/includes/process.php',  //url
					{
						url: url      // data send with url
					},
					// function run when request is success
					function(data, textStatus, xhr) {
						var od = data;
						data = 'http://localhost/php/BackEnd/index.php?id='+data;
						$('.errors').html('<a href="' + data + '" target="_blank">sho.rt/' + od + '</a>')
					}
				);
			});
		});
	</script>

</body>
</html>
