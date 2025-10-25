<?php

include "db.php";
include("accountsdailyexpensesfunction.php");

if(isset($_POST["id"]))
{
	
	$statement = $connection->prepare(
		"DELETE FROM  productprice WHERE id = :id"
	);
	$result = $statement->execute(
		array(
			':id'	=>	$_POST["id"]
		)
	);
	
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}



?>