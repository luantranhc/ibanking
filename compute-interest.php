<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Compute Interest :: iBanking</title>
</head>

<body style="font-size:125%;">
	<?php date_default_timezone_set('Asia/Ho_Chi_Minh'); ?>
	<h1>Calculate Interest on Savings</h1>
	<div id="InputForm">
		<form id="submitForm" method="POST">
			Deposit:<br>
			<input type="text" class="form-control" id="deposit" name="deposit" /><br><br>

			Month:<br>
			<select name="month" id="month">
				<option value="1">1 month</option>
				<option value="3">3 months</option>
				<option value="6">6 months</option>
				<option value="12">1 year</option>
			</select><br><br>

			<button id="submitBtn" type="submit">Submit</button>
		</form>
	</div>

	<p>
		<em>Last update:</em> <?php echo date('m/d/Y h:i:s a', time());
		?>
	</p>

	<?php
	echo "thanh luan" ;
		if (isset($_POST['month']) && isset($_POST['deposit']))
		{
			$url = "http://207.148.79.221:8080/iBanking/rest/services/compute-interest/" . $_POST['month'] . "/" . $_POST['deposit'];

			//Initialize cURL.
			$ch = curl_init();

			//Set the URL that you want to GET by using the CURLOPT_URL option.
			curl_setopt($ch, CURLOPT_URL, $url);

			//Set CURLOPT_RETURNTRANSFER so that the content is returned as a variable.
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

			//Set CURLOPT_FOLLOWLOCATION to true to follow redirects.
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

			//Execute the request.
			$data = curl_exec($ch);

			//Close the cURL handle.
			curl_close($ch);

			//Print the data out onto the page.
			echo "<p>Your deposit after " . $_POST['month'] . " month(s) will be <strong>" . sprintf('%f', $data) . "</strong></p>";
		}
	?>
</body>
