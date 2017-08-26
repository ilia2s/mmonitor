<?php
//copyright by Coloco Group
//Coloco MDC mining solutions
//website: www.coloco.biz
//For educational purpose only


include("functions/parse_config.php");
include("functions/logwrite.php");
include("pools/weminemue_api.php");
include("functions/sgminer_api.php");



$CONFIG = parse_config();

    if ($CONFIG == "0") {
            print("can not find config file minitor.conf\nclose application \n");
    }

//starting application
print("[OK] starting...\n");
logwrite("config read ok");
logwrite("staring application");


//print_r($CONFIG);

//rin script forever
while(true) {
    switch ($CONFIG["coin"]){
	    case "MUE":
//		    logwrite("requesting mue pool for check worker activity");
		    $request_result = request_mue();
		    switch ($request_result) {
				case "error":
					print("an error occured during pool api request or incorrect wallet address\n");
					logwrite("an error occured during pool api request or incorrect wallet address");
					break;
				case "mining_ok":
					break;
				case "mining_down":
					print("no mining at api reply: restart sgminer\n");
					logwrite("no mining at api reply: restart sgminer");
					
						request("restart");
					
					print("\nsgminer restarted by api command\n");
					logwrite("sgminer restarted by api command");
					
					break;
				default:
					print("an unknown error occured when checking api reply\nclose applicatin\n");
					logwrite("an unknown error occured when checking api reply\nclose application");
					break 3;
				
		    }
		    
		    break;
	    default:
		    logwrite("unknown or not defined coin in config (coin=XXX)");
		    print("unknown or not selected coin in config\n close application");
		    break 2;
	
	
    }
    
    sleep(300);

}



?>