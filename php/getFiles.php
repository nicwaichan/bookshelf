<?php
	$fileList = glob('../uploads/*');
	foreach($fileList as $filename){
		if(is_file($filename)){
			echo '<img src="' . $filename . '" alt="' . $filename . '">';
		}
	}
?>
