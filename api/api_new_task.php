<?php
	require_once("configs.php");
	require_once("functionsBd.php");

	header('Content-Type: text/html; charset=utf-8');
		
	//--- Allows only POST method  -------------------------------
	if($_SERVER['REQUEST_METHOD'] != "POST")
	{
		http_response_code(403);
		echo('{"erro": "' . $_SERVER['REQUEST_METHOD'] . ' method not allowed !"}' . PHP_EOL);
		exit();		
	}		
	//------------------------------------------------------------------
	
	
	//--- html:POST - verify the values sent  ------------------------
	$DATA = json_decode(file_get_contents('php://input'), true);	
	if (!isset($DATA['auth']) || !isset($DATA['key']) || !isset($DATA['value']) || !isset($DATA['date']))
	{			
		http_response_code(400);				
		echo('{"error": "number of parameters!"}' . PHP_EOL);	
		exit();		
	}
	//------------------------------------------------------------------
	
	
	//--- html:POST - take the values sent  ----------------------------
	$user_pwd = $DATA['auth'];
	$user_key = $DATA['key'];
	$user_value = $DATA['value'];
	$user_date = $DATA['date'];
	//------------------------------------------------------------------

	
	//--- verify password of service ------------
	if ($user_pwd != $config_auth_password)
	{	
		http_response_code(401);		
		echo('{"error": "autenticathion error!"}' . PHP_EOL);		
		exit();
	}
	//------------------------------------------------------------------

	
	//--- verify the key vale: "task" ---------------------------
	if ($user_key != "task")
	{
		http_response_code(400);					
		echo('{"error": "Service only works with key: \'task\'."}' . PHP_EOL);
		exit();					
	}	
	//------------------------------------------------------------------

	
	//--- Insert in database ----------------------------------
	$status_insert = bd_insertTask($user_value, $user_date);

	// verify if database updated
	if (!$status_insert)
	{
		http_response_code(404);					
		echo('{"error": "not possible to update database."}' . PHP_EOL);				
		exit();					
	}		
	//------------------------------------------------------------------

	
	
	
	
		
		
	//-------  Response for client  ------------------------------------
	$json = array("status" => "OK ", "key" => $user_key, "value" => $user_value, "date" => $user_date);
    echo(json_encode($json) . PHP_EOL);	
	//------------------------------------------------------------------	
?>