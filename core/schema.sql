CREATE TABLE IF NOT EXISTS game_developers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstName VARCHAR(50) NOT NULL,
    lastName VARCHAR(50) NOT NULL,
    yearsOfExperience INT,
    primaryLanguage VARCHAR(20),
    favoriteEngine VARCHAR(30),
    notableProject VARCHAR(100),
    dateAdded DATETIME DEFAULT CURRENT_TIMESTAMP
);