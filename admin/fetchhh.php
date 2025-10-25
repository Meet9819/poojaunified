<?php
//fetch.php
$connect = mysqli_connect("localhost","pmaroot","yIGMS1+7fmOHmMasvamEkQ==","pooja");
$columns = array('name', 'price', 'mrp');

$query = "SELECT pp.id as id ,pp.type as type, pp.price as price, pp.mrp as mrp, p.name as name FROM `productprice` pp , `products` p where p.id = pp.productid";

if(isset($_POST["search"]["value"]))
{
 $query .= '
 AND name LIKE "%'.$_POST["search"]["value"].'%" 
 ';
}

$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

$result = mysqli_query($connect, $query . $query1);

$data = array();

while($row = mysqli_fetch_array($result))
{
 $sub_array = array();
 $sub_array[] = '<div  class="update" data-id="'.$row["id"].'" data-column="name">' . $row["name"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="type">' . $row["type"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="price">' . $row["price"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="mrp">' . $row["mrp"] . '</div>';
 $data[] = $sub_array;
}

function get_all_data($connect)
{
 $query = "SELECT pp.id as id ,pp.type as type, pp.price as price, pp.mrp as mrp, p.name as name FROM `productprice` pp , `products` p where p.id = pp.productid";
 $result = mysqli_query($connect, $query);
 return mysqli_num_rows($result);
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data($connect),
 "recordsFiltered" => $number_filter_row,
 "data"    => $data
);

echo json_encode($output);

?>
