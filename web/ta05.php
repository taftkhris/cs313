<DOCTYPE <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
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
    
    // foreach ($db->query('SELECT book, chapter, verse, content FROM scriptures') as $row)
    // {
    // echo '<p><strong>' . $row['book'] . $row['chapter'] . ':' . $row['verse'] . ' - ' .  '</strong>' . '"' . $row['content'] . '"' . '</p>' ;
    // echo '<br/>';
    // }
    ?>
    <?php 
    echo "<form action='submitScripture.php' method ='post'>";
    echo 'Book: <input type="text" name="Book"><br>';
    echo 'Chapter: <input type="text" name="Chapter"><br>';
    echo 'Verse: <input type="text" name="Verse"><br>';
    echo '<textarea rows="4" cols="50"></textarea><br>';

    foreach ($db->query('SELECT id, name FROM topic') as $topic_row )
    {

        $id = $topic_row['id'];
        echo "<input type='checkbox' name='topics[]' value='$id'>" . $topic_row['name'] . "</br>";
    // echo '<input type="checkbox" name="topics[]" value="' . $topic_row['id'] . '">' . $topic_row['name'] . '</br>';
    }
    echo "<input type ='submit'>";
    echo "</form>";
    ?>    
</body>
</html>

