<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Tchat AJAX</title>
</head>
<body>
<header>
 <h1>Tchat AJAX</h1>
</header>
<main>
    <?php
    include 'config.php';
    //On établit la connexion
    $conn = new mysqli(DBHOST, DBUSER, DBPWD);

    try{
        $db = new PDO("mysql:host=".DBHOST.";dbname=".DBNAME."", DBUSER, DBPWD);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT msg_user_text FROM msg";
        $db->exec($sql);

//        $resultat = $db->fetchAll(PDO::FETCH_ASSOC);
//        echo $resultat;
    }

    catch(PDOException $e){
        $db->rollBack();
        echo "Erreur : " . $e->getMessage();
    }

    ?>
    <section id="tchat-frame">
        <div id="tchat-text-view" ></div>
        <div id="tchat-text-write" >
            <form>
                <input type="text" id="text">
                <input type="submit" id="send" value="send">
            </form>
        </div>
    </section>
</main>
</body>
</html>