<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Developer Job Application Form</title>
</head>
<body>
    <h1>Game Developer Application Form</h1>
    
    <form action="../actions/insert.php" method="POST">
        <table border="0" cellpadding="5" cellspacing="0">
            <tr>
                <td><strong>First Name:</strong></td>
                <td><input type="text" name="firstName" required></td>
            </tr>
            <tr>
                <td><strong>Last Name:</strong></td>
                <td><input type="text" name="lastName" required></td>
            </tr>
            <tr>
                <td><strong>Years of Experience:</strong></td>
                <td><input type="number" name="yearsOfExperience" min="0" max="50" required></td>
            </tr>
            <tr>
                <td><strong>Primary Language:</strong></td>
                <td><input type="text" name="primaryLanguage" required></td>
            </tr>
            <tr>
                <td><strong>Favorite Engine:</strong></td>
                <td><input type="text" name="favoriteEngine" required></td>
            </tr>
            <tr>
                <td><strong>Notable Project:</strong></td>
                <td><input type="text" name="notableProject" required></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submit" value="Submit Application"></td>
            </tr>
        </table>
    </form>

    <h2>Submitted Applications</h2>
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Years Exp</th>
                <th>Language</th>
                <th>Engine</th>
                <th>Project</th>
                <th>Date Added</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once 'dbconfig.php';
            $stmt = $pdo->query("SELECT * FROM game_developers ORDER BY dateAdded DESC");
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . htmlspecialchars($row['firstName']) . "</td>";
                echo "<td>" . htmlspecialchars($row['lastName']) . "</td>";
                echo "<td>" . $row['yearsOfExperience'] . "</td>";
                echo "<td>" . htmlspecialchars($row['primaryLanguage']) . "</td>";
                echo "<td>" . htmlspecialchars($row['favoriteEngine']) . "</td>";
                echo "<td>" . htmlspecialchars($row['notableProject']) . "</td>";
                echo "<td>" . $row['dateAdded'] . "</td>";
                echo "<td>";
                echo "<a href='../actions/delete.php?id=" . $row['id'] . "' onclick='return confirm(\"Are you sure you want to delete this record?\');'>Delete</a> | ";
                echo "<a href='../actions/update.php?id=" . $row['id'] . "'>Update</a>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>