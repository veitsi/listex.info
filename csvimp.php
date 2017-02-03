<?php
//This script uses MySQLi driver, so you need to install it, if it is apsent now
echo 'Hello, listex. the php version is '.phpversion();
$CSVfp = fopen("price.csv", "rt");
fgetcsv($CSVfp, 1000, ",");

if($CSVfp !== FALSE) {
	$data = fgetcsv($CSVfp, 1000, ",");
	$sql = "INSERT INTO `Lst_Goods` (`Name`)  VALUES ('".$data[1]."')" ;

 while(! feof($CSVfp)) {
  $data = fgetcsv($CSVfp, 1000, ",");
  $sql=$sql.",('".$data[1]."')" ;
  //print_r($data);
 }
 $sql=$sql.";";
 echo $sql;
}
fclose($CSVfp);

// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "s2";

// // Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);
// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// } 

// if (mysqli_query($conn, $sql)) {
//     echo "New record created successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
// }

// mysqli_close($conn);
?>
