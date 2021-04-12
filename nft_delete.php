<?php
    include_once "session.php";
    include_once "database.php";
    adminOnly();

    $id = (int) $_GET['id'];
    $query = "DELETE FROM nft WHERE id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id]);

    header("Location: index.php");
    die();
?>