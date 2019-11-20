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
    $db = 'my-activities';
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
    ?>
    <form action=all_users.php method="post">
        <div>Saisissez la première lettre de l'username </div> 
        <INPUT type="text" name="tb_lettre"/>
        <div>choisissez le statut</div>
        <SELECT name="statut">
            <OPTION VALUE="1">Waiting for account validation</OPTION>
            <OPTION VALUE="2">Active account</OPTION>
        </select>
        <INPUT type="submit" value="Rechercher">
    </form>

    <?php
    if(isset($_POST['tb_lettre']))
    {
        $format = $_POST['tb_lettre']."%";
        $idStatut = "=".$_POST['statut'];
    } else {
        $format = "%";
        $idStatut = '<4';
    }

    echo "<table><tr><th>Id</th><th>Username</th><th>Email</th><th>Status</th></tr>";
    $stmt = $pdo->query("SELECT u.id as user_id, username, email, s.name as status FROM users u JOIN status s ON u.status_id = s.id  WHERE username LIKE '".$format."' AND s.id ".$idStatut." ORDER BY username ");
    while ($row = $stmt->fetch())
    {
        echo "<tr>";
        echo "<td>".$row['user_id']."</td>";
        echo "<td>".$row['username']."</td>";
        echo "<td>".$row['email']."</td>";
        echo "<td>".$row['status']."</td>";
        echo "</tr>";

    }


?>
</body>
</html>