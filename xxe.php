<?php
libxml_disable_entity_loader(false);
libxml_use_internal_errors(true);
$xml=$_POST['abcd'];
$doc = simplexml_load_string($xml);
if($doc ==false){
	echo "\nFailed loading XML: ";
	foreach(libxml_get_errors() as $error){
		echo "<br>", $error->message;
	}
}
else{
	echo"<br>";
	print_r($doc);
}
?>
