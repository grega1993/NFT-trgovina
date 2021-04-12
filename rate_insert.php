<?php
// prikaze kaj poslje: print_r($_POST);
include_once "session.php";
include_once "database.php";

$id = (int) $_POST['id'];
$rate = (int) $_POST['star'];
$user_id = $_SESSION['user_id'];
if (!empty($id) && !empty($rate)){
    $query = "INSERT INTO rates(rate,user_id,nft_id) VALUES(?,?,?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$rate,$user_id,$id]);
    // posodobim povprečno vrednost za rating kriptovalute
    $query = "UPDATE nft SET rating = (SELECT AVG(rate)FROM rates WHERE nft_id = ?) WHERE id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id,$id]);
}

header("Location: nft.php?id=$id");
die();

?>