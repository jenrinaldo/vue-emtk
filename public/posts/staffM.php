<?php
include "connect.php";

$condition = "1";
if(isset($_GET['filterText'])){
   $condition = " nim=".$_GET['filterText'];
}
$userData = mysqli_query($con,"select * from users WHERE ".$condition);

$response = array();

while($row = mysqli_fetch_assoc($userData)){

   $response[] = $row;
}

echo json_encode($response);
exit;