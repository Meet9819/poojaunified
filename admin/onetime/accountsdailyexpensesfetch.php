<?php
include "db.php";
include('accountsdailyexpensesfunction.php');
$query = '';
$output = array();

$q = $_GET['q'];

$query .=  "SELECT * from productprice where productid = $q";

$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();$tmpCount = 1;
foreach($result as $row)
{
	
	$sub_array = array();
	$sub_array[] = $tmpCount++;

	$sub_array[] = $row["productid"];
	$sub_array[] = $row["type"];
	$sub_array[] = $row["units"];
	$sub_array[] = $row["mrp"];   
	$sub_array[] = $row["price"];
 
	$sub_array[] = '<button type="button" name="update" id="'.$row["id"].'" class="btn btn-default  btn-icon-anim  btn-square update"><i class="fa fa-pencil"></i></button>';
	$sub_array[] = '<button type="button" name="delete" id="'.$row["id"].'" class="btn btn-danger  btn-icon-anim  btn-square delete"><i class="fa fa-trash"></i></button>';
	$data[] = $sub_array;
}
$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	get_total_all_records(),
	"data"				=>	$data
);
echo json_encode($output);
?>