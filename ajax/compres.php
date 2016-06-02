<?php
$file = $_REQUEST["q"];
if(strpos($file, ".") != 0 ){
	$extension = substr($file, strpos($file, ".") + 1);
}
elseif (strpos($file, ".") == 0) {
	$string = "cd ../ && zip -r ".$file.".zip ".$file."/";
	@shell_exec($string);	
	$file = $file.".zip";
}
echo $file;
?>