<?php

include('DB.php');
$db = new DB();
$db->connect();

$db->select('stand_details',"stand_details.*", null, "status = 0 AND com_date");
$result = $db->getResult();

foreach ($result as $row) {
	$invoiceAmount = $row['balance'] + $row['monthly_installment'];

}