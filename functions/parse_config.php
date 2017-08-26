<?php
//this function read variables from config file

function parse_config() {
$conf_file = "monitor.conf";

    if (file_exists($conf_file) != 1) {
	return 0;
    } else {
    //else read configuration file
	foreach (explode("\n", file_get_contents($conf_file)) as $value) {
		//remove spaces from config string
		$value = str_replace(' ', '', $value);
		
		//ignore an empty strings
		if ($value == "") {
			continue;
		}
		
		//present string as parameter and value
		list($k, $v) = explode('=', $value); 
		//check that parametr and value is not empty
		if ($k == "" or $v == "") {
			print("\n incorrect config string: " . $value . " in " . $conf_file . "\n close application\n");
			break;
		}
		
		switch ($k) {
			case "logfile":
			    $config[$k]=$v;
			    break;
			
			case "coin":
			    $config[$k]=$v;
			    break;
			
			case "pool":
			    $config[$k]=$v;
			    break;
			
			case "wallet":
			    $config[$k]=$v;
			    break;
			
			case "default":
			    print("\n incorrect config string: " . $value . " in " . $conf_file);
			    break;
			
		}
		
		
		
		//insert it to config array
		$config[$k]=$v;
		
	}
	
	return $config;

    }

}



?>