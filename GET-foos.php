<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// database connection will be here
// files needed to connect to database
include_once 'database.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();

$sql = "SELECT * FROM users";
$stmt = $db->prepare($sql);
$stmt->execute();
$posts = $stmt->fetchAll();
echo json_encode($posts);
?>
