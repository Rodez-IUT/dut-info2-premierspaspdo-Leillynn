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
    <form action=all_users.php method="get">
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
    function get($name) {
        return isset($_GET[$name]) ? $_GET[$name] : null;
    }

    if(isset($_GET['tb_lettre']) || isset($_GET['statut']))
    {
        $start_letter = htmlspecialchars(get('tb_lettre').'%');
        $status_id = (int)get("statut");
    } else {
        $start_letter ='%';
        $status_id = 1;
    }

    echo "<table><tr><th>Id</th><th>Username</th><th>Email</th><th>Status</th></tr>";
    $sql = "select users.id as user_id, username, email, s.name as status from users join status s on users.status_id = s.id where username like :start_letter and status_id = :status_id order by username";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['start_letter' => $start_letter, 'status_id' => $status_id]);
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