<?php
require_once 'core/dbconfig.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $yearsOfExperience = $_POST['yearsOfExperience'];
    $primaryLanguage = $_POST['primaryLanguage'];
    $favoriteEngine = $_POST['favoriteEngine'];
    $notableProject = $_POST['notableProject'];

    $stmt = $pdo->prepare("INSERT INTO game_developers (firstName, lastName, yearsOfExperience, primaryLanguage, favoriteEngine, notableProject, dateAdded) VALUES (?, ?, ?, ?, ?, ?, NOW())");
    $stmt->execute([$firstName, $lastName, $yearsOfExperience, $primaryLanguage, $favoriteEngine, $notableProject]);

    header('Location: ../core/index.php');
    exit;
}