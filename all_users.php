<!doctype html>
<html lang ="fr">
<head>
	<meta charset="utf-8"/>
	<title>all_users</title>
    <style>
       table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
}

    </style>
</head>
<body>

    <h1> All users </h1>
<?php 
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
    echo "<table border><tr><th>Id</th><th>Username</th><th>Email</th><th>Status</th></tr>";
    $stmt = $pdo->query('SELECT * FROM users JOIN status s ON users.status_id = s.id ORDER BY username');
    while ($row = $stmt->fetch())
    {
        echo "<tr>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['username']."</td>";
        echo "<td>".$row['email']."</td>";
        echo "<td>".$row['name']."</td>";
        echo "</tr>";

    }
    echo "</table>";

?>
</body>
</html>