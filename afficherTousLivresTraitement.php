<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        //obtenir les valeurs $_POST 
        $titre = $_POST['titre'];
        echo $titre;
        $date_publication = $_POST['date_publication'];
        echo $date_publication;
        $prix = $_POST['prix'];
        echo $prix;
        $description = $_POST['description'];
        echo $description;
        var_dump($_POST);

        //chercher la db
        include "./config/db.php";
        
        try {
            $db= new PDO (DBDRIVER.': host='.DBHOST.';port='.DBPORT.';dbname='.DBNAME.
                ';charset='.DBCHARSET, DBUSER, DBPASS);
        } catch (Exception $e) {
            echo "Il y a eu une erreur dans la connexion de la base de données.";
        }

        $sql = "SELECT * FROM livre";
        $stmt = $db->prepare($sql);
        $stmt->execute();

        $arrayResultat = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $index;
        for ($i=0; $i < count($arrayResultat); $i++) { 
            if (isset($_POST[$i])) {
                echo "i=".$i;
                var_dump($arrayResultat[$i]);               
                $index=$i;

            }

        }

        echo $index;
        var_dump($arrayResultat[$index]['description']);

        
        // $sql = "UPDATE livre SET titre = ".$titre." WHERE titre =  ".$arrayResultat[$index]['titre'];
        // $stmt = $db->prepare($sql);
        // $stmt->execute();

        echo "ancienne description : ".$arrayResultat[$index]['description']."<br>";
        echo "nouvelle description : ".$description;
        $sql = "UPDATE livre SET description = '".$description."' WHERE titre =  '".$arrayResultat[$index]['description']."'";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        var_dump($stmt->errorInfo());


        //UPDATE trains SET villeDepart = 'Genk' WHERE villeDepart = 'GENT'








    ?>
</body>
</html>