<?php
include "db.php";
include('accountsdailyexpensesfunction.php');
if(isset($_POST["id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM productprice 
		WHERE id = '".$_POST["id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
	
	$output["productid"] = $row["productid"];	
	$output["type"] = $row["type"];
	$output["units"] = $row["units"];
	$output["price"] = $row["price"];	
	$output["mrp"] = $row["mrp"];

	}
	echo json_encode($output);
}
?>