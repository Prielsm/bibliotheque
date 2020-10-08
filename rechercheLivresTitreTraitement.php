<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        //obtenir le input dans une variable
        $titre = $_POST['titre'];

        //obtenir le tableau des livres en se connectant à la db
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



        //comparer tous les titres de livre avec notre titre et ressortir le livre
        for ($i=0; $i < count($arrayResultat); $i++) { 
            if ($arrayResultat[$i]['titre'] == $titre) {
                echo '<table border=1><thead><tr><th colspan="2">Livre '.($i+1).':</th></tr></thead>';
                echo "<tbody>";

                foreach ($arrayResultat[$i] as $key => $value) {
                    echo "<tr><td>".$key."</td><td>".$value."</td></tr>";

                }
                echo "</tbody></table>";
            }
            
        }
        







    ?>
</body>
</html>