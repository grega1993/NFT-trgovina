<?php
// prikaze kaj poslje: print_r($_POST);
include_once "session.php";
include_once "database.php";

$id = (int) $_POST['id'];
$content = $_POST['content'];
$user_id = $_SESSION['user_id'];
if (!empty($id) && !empty($content)){
    $query = "INSERT INTO comments(content,user_id,nft_id) VALUES(?,?,?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$content,$user_id,$id]);
}

header("Location: nft.php?id=$id#komentarji");
die();

?>