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
//include_once 'user.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();

//Get ID
$id = isset($_GET['id']) ? $_GET['id'] : die();
//PDO prepared statement
$sql = "SELECT * FROM users WHERE id = ?";
$stmt = $db->prepare($sql);
$stmt->execute([$id]);
$row_count = $stmt->rowCount();
//count # or rows
if ($row_count > 0) 
{
    $posts = $stmt->fetch();
    echo json_encode($posts);
}
else 
{
    echo json_encode(["Invalid Request"]);
}
?>
