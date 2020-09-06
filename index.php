<?php  
	if(isset($_GET['id'])){
		include $_SERVER['DOCUMENT_ROOT'] . '/php/BackEnd/includes/functions.php';
		$id  = $_GET['id'];
		$url = getUrlLocation($id);
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
		$(document).ready(function(){
			$('input[type="submit"]').click(function(e){
				e.preventDefault();

				$('.errors').html('');
				var url = $('input[name="url"]').val();

				if(url.length == 0){
					$('.errors').html('Whoops! Please enter a URL!');
					return false;
				}

				$.post('/php/BackEnd/includes/process.php', {
					url: url
				}, function(data, textStatus, xhr) {
					var od = data;
					data = 'http://localhost/php/BackEnd/index.php?id='+data;
					$('.errors').html('<a href="' + data + '" target="_blank">sho.rt/' + od + '</a>')
				});
			});
		});
	</script>

</body>
</html>