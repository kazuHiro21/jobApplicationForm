<?php
require_once '../core/dbconfig.php';

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $stmt = $pdo->prepare("DELETE FROM game_developers WHERE id = ?");
    $stmt->execute([$id]);
}

header('Location: ../core/index.php');
exit;