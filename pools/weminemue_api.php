<?php

function request_mue() {
    global $CONFIG;
    
    
    $url = "http://pool.weminemue.com/api/walletEx?address=" . $CONFIG["wallet"];
    $reply = file_get_contents($url);

    $json_answer = json_decode($reply, true);

    //print_r($json_answer);


    if ($json_answer == NULL) {
	return "error";
    } else { 
		if($json_answer["miners"] == NULL) {
			return "mining_down";
		} else {
			return "mining_ok";
		}
    }
    
    

}

?>