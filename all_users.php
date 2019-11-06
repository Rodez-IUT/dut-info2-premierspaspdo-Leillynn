<!doctype html>
<html lang ="fr">
<head>
	<meta charset="utf-8"/>
	<title>all_users</title>
</head>
<body>

<?php
// erreur a corriger 
    $host = 'localhost';
    $db = 'my_activities';
    $user = 'root';
    $pass = 'root';
    $charset = 'utf8mb4';
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    try {
         $pdo = new PDO($dsn, $user, $pass, $options);
    } catch (PDOException $e) {
         throw new PDOException($e->getMessage(), (int)$e->getCode());
    }

    $stmt = $pdo->query('SELECT * FROM users ORDER BY username');
    while ($row = $stmt->fetch())
    {
        echo $row['*'] . "\n";
    }

?>
</body>
</html>