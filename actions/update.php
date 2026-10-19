<?php
require_once '../core/dbconfig.php';

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM game_developers WHERE id = ?");
    $stmt->execute([$id]);
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    header('Location: ../core/index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $yearsOfExperience = $_POST['yearsOfExperience'];
    $primaryLanguage = $_POST['primaryLanguage'];
    $favoriteEngine = $_POST['favoriteEngine'];
    $notableProject = $_POST['notableProject'];

    $stmt = $pdo->prepare("UPDATE game_developers SET firstName=?, lastName=?, yearsOfExperience=?, primaryLanguage=?, favoriteEngine=?, notableProject=? WHERE id=?");
    $stmt->execute([$firstName, $lastName, $yearsOfExperience, $primaryLanguage, $favoriteEngine, $notableProject, $id]);

    header('Location: ../core/index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Application</title>
</head>
<body>
    <h1>Update Application</h1>
    
    <form action="" method="POST">
        <input type="hidden" name="id" value="<?php echo $record['id']; ?>">
        <table border="0" cellpadding="5" cellspacing="0">
            <tr>
                <td><strong>First Name:</strong></td>
                <td><input type="text" name="firstName" value="<?php echo htmlspecialchars($record['firstName']); ?>" required></td>
            </tr>
            <tr>
                <td><strong>Last Name:</strong></td>
                <td><input type="text" name="lastName" value="<?php echo htmlspecialchars($record['lastName']); ?>" required></td>
            </tr>
            <tr>
                <td><strong>Years of Experience:</strong></td>
                <td><input type="number" name="yearsOfExperience" min="0" max="50" value="<?php echo htmlspecialchars($record['yearsOfExperience']); ?>" required></td>
            </tr>
            <tr>
                <td><strong>Primary Language:</strong></td>
                <td><input type="text" name="primaryLanguage" value="<?php echo htmlspecialchars($record['primaryLanguage']); ?>" required></td>
            </tr>
            <tr>
                <td><strong>Favorite Engine:</strong></td>
                <td><input type="text" name="favoriteEngine" value="<?php echo htmlspecialchars($record['favoriteEngine']); ?>" required></td>
            </tr>
            <tr>
                <td><strong>Notable Project:</strong></td>
                <td><input type="text" name="notableProject" value="<?php echo htmlspecialchars($record['notableProject']); ?>" required></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="update" value="Update Application"></td>
            </tr>
        </table>
    </form>
</body>
</html>