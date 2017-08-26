<?php

function logwrite($text) {

global $CONFIG;

			$text = date("d-m-Y G:i:s ") . $text . "\n";

//	print_r($text);
	file_put_contents($CONFIG["logfile"], $text, FILE_APPEND);




}

