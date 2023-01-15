<?php
$tag= $_GET['s'];
if($tag=="1"){

$checkBoxItem=$_POST["vehicle1"];
$radioItem=$_POST["fav_language"];
echo $checkBoxItem;
echo "<br>".$radioItem;
}

?>

 <!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>

<h1>This is a Heading</h1>
<p>This is a paragraph.</p>

<form action="playground.php?s=1" method="post">
<input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
<label for="vehicle1"> I have a bike</label><br>
 <input type="radio" id="html" name="fav_language" value="HTML">
  <label for="html">HTML</label><br>
  <input type="radio" id="css" name="fav_language" value="CSS">
  <label for="css">CSS</label><br>
  <input type="radio" id="javascript" name="fav_language" value="JavaScript">
  <label for="javascript">JavaScript</label>
 <input type="submit" value="Submit">
</form>
</body>
</html> 
