<?php
    include_once "session.php";
    include_once "database.php";

    $id = (int) $_GET['id'];
    $user_id = $_SESSION['user_id'];

    $query = "SELECT * FROM comments WHERE id=?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id]);
    $nft = $stmt->fetch();
    $nft_id = $nft['nft_id'];

    // briše le če sem jaz ta lastnik
    $query = "DELETE FROM comments WHERE id = ? AND user_id = ? ";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id,$user_id]);

    header("Location: nft.php?id=$nft_id#komentarji");
    die();
?>