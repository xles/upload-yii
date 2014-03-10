<?php
if (isset($_GET['upload'])) {
	header('Content-type: text/plain');
	echo $_SERVER['REQUEST_METHOD'];
	echo "\n";
	echo $_SERVER['QUERY_STRING'];
	echo "\n";
	var_dump($_REQUEST);
}
?>
<form method="post" action="test.php?upload">
<input type="hidden" name="foo" value="bar">
<button value="Submit" name="submit" type="submit">Submit</button>
</form>