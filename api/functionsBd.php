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


// get asll tasks
function bd_selectTasks()
{
	$conn = @new mysqli($GLOBALS["bd_server"], $GLOBALS["bd_user"], $GLOBALS["bd_password"], $GLOBALS["bd_name"]);
	
    if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 	
    $sql = "SELECT * FROM `task`";
	$cmd = $conn->prepare($sql);		
	$cmd->execute();
	$result = $cmd->get_result();
    $array = $result->fetch_all(MYSQLI_ASSOC);
	
    $conn->close();		
	return $array;
}

// get a task by id
function bd_getTask($id)
{
	$conn = @new mysqli($GLOBALS["bd_server"], $GLOBALS["bd_user"], $GLOBALS["bd_password"], $GLOBALS["bd_name"]);
    if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 	
    $sql = "SELECT * FROM `task` WHERE id='".$id."'";
	$cmd = $conn->prepare($sql);		
	$cmd->execute();
	$result = $cmd->get_result();
    $array = $result->fetch_all(MYSQLI_ASSOC);
	
    $conn->close();		
	return $array;
}


?>