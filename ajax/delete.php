<?php
$file = $_REQUEST["q"];
if(strpos($file, ".") != 0 ){
	$extension = substr($file, strpos($file, ".") + 1);
	$string = "cd ../ && rm ".$file;
	echo shell_exec($string);
}
elseif (strpos($file, ".") == 0) {
	$string = "cd ../ && rm -r ".$file."/";
	echo shell_exec($string);
}
echo $extension;
?>