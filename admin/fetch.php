
<?php

//fetch.php

include('database_connection.php');

if(isset($_POST["datee"]))
{
 $query = " SELECT * FROM payment  WHERE datee = '".$_POST["datee"]."' AND paymentid != '' AND status != 4  ORDER BY id ASC ";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output[] = array(
   'modeofpayment'   => $row["modeofpayment"],
   'product_price'  => floatval($row["product_price"])
  );
 }
 echo json_encode($output);
}

?>
