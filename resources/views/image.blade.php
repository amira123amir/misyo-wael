<!DOCTYPE html>
<html>
<head>


</head>
<body>
<form method='POST' action='/image' enctype="multipart/form-data">
@csrf
<input type="file" name='image'>
<input type='submit' value='send'>


</form>



</body>
</html>