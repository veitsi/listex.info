<?php
//This script uses MySQLi driver, so you need to install it, if it is apsent now

$conn = get_connection();
migrate_table($conn);

$CSVfp = fopen("price.csv", "r");
fgetcsv($CSVfp, 1000, ","); //skips first line with headers

$id = 0;
while (($data = fgetcsv($CSVfp, 1000, ",")) !== FALSE) {
    $sql = "INSERT INTO `Lst_Goods` (`GoodId`,`Name`)  VALUES ($id, '$data[1]');";
    $id++;
    $conn->query($sql);
}
fclose($CSVfp);
$conn->close();

function get_connection()
{
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '12345678';
    $dbname = 'a0';
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    if ($conn->connect_error) {
        die('Connect Error (' . $conn->connect_errno . ') ' . $conn->connect_error);
    }
    return $conn;
}

function migrate_table($conn)
{
    $conn->query('DROP TABLE IF EXISTS Lst_Goods');
    $sql = <<<SQL
  CREATE TABLE `Lst_Goods` (
  `GoodId` int(11) NOT NULL,
  `Name` varchar(250) DEFAULT NULL
  ) ENGINE=InnoDB AUTO_INCREMENT=492863 DEFAULT CHARSET=utf8;
SQL;
    $conn->query($sql);

}