<?php

require_once("configs.php");

// Insert new Task
function bd_insertTask($value, $date)
{
    
	$conn =@new mysqli($GLOBALS["bd_server"], $GLOBALS["bd_user"], $GLOBALS["bd_password"], $GLOBALS["bd_name"]);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	$sql = "INSERT INTO `task`(`value`, `date`) VALUES ('".$value."', '".$date."')";	
	$cmd = $conn->prepare($sql);	
	$status = $cmd->execute();
    $conn->close();		
	return $status;
}


// obter últimas 100 linhas da tabela historico (ordem descendente)
/*function bd_ObterHistorico()
{
	$conn = @new mysqli($GLOBALS["bd_server"], $GLOBALS["bd_user"], $GLOBALS["bd_password"], $GLOBALS["bd_name"]);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 	
	$sql = "SELECT * FROM `historico` ORDER BY `data` DESC LIMIT 100";
	$cmd = $conn->prepare($sql);		
	$cmd->execute();
	$result = $cmd->get_result();
	$array = $result->fetch_all(MYSQLI_ASSOC);
	$conn->close();		
	return $array;
}


// obter última linha da tabela historico (valor atual)
function bd_ObterValorAtual()
{
	$conn = @new mysqli($GLOBALS["bd_server"], $GLOBALS["bd_user"], $GLOBALS["bd_password"], $GLOBALS["bd_name"]);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	$sql = "SELECT `valor`, `data` FROM `historico` WHERE `data` = ( select max(`data`) from historico) LIMIT 1";
	$cmd = $conn->prepare($sql);
	$cmd->execute();
	$result =$cmd->get_result();
	$first_row = $result->fetch_assoc();
	$conn->close();		
	return $first_row;	
}*/


?>