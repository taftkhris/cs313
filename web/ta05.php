<DOCTYPE <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <style>         
    </style>
</head>
<body>
    <h1>Scripture Resources</h1>
    <?php
    $dbUrl = getenv('DATABASE_URL');

    $dbopts = parse_url($dbUrl);
    
    $dbHost = $dbopts["host"];
    $dbPort = $dbopts["port"];
    $dbUser = $dbopts["user"];
    $dbPassword = $dbopts["pass"];
    $dbName = ltrim($dbopts["path"],'/');
    
    $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
    
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    foreach ($db->query('SELECT book, chapter, verse, content FROM scriptures') as $row)
    {
    echo '<p><strong>' . $row['book'] . $row['chapter'] . ':' . $row['verse'] . ' - ' .  '</strong>' . '"' . $row['content'] . '"' . '</p>' ;
    echo '<br/>';
    }
    ?>    
</body>
</html>

