<html>
<head>
<link href="css/uploadfile.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="js/jquery.uploadfile.min.js"></script>
</head>
<body>
<div id="fileuploader">Upload</div>
<script>
$(document).ready(function() {
	$("#fileuploader").uploadFile({
		url:"upload.php",
		fileName:"myfile"
	});
});
</script>
</body>
</html>

