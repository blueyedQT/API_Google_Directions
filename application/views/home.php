<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>CodingDojo Weather Report</title>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).on("submit", "form", function() {
			$('.directions').html('');
			$.post(
				$(this).attr("action"),
				$(this).serialize(), 
				function(output) {
					console.log(output);
					path = output.routes[0].legs[0];
					$(".directions").append("<h2>Directions from "+path.start_address+" to "+path.end_address+"</h2>");
					for(i=0; i<output.routes[0].legs[0].steps.length; i++) {
					$(".directions").append("<p>"+(i+1)+". "+path.steps[i].html_instructions+"</p>");
					}		
				}, "json"
			);
			return false;
		});
	</script>
</head>
<body>
	<h1>Google Directions API</h1>
	<form id="myform" action="direction" method="post">
		<h2>From: <input type="text" name="origin"></h2>
		<h2>To: <input type="text" name="destination"></h2>
		<input type="submit" name="submit" value="Get Directions!">
	</form>
	<div class="directions"></div>
</body>
</html>