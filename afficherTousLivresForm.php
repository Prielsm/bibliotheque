<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
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
        // var_dump($arrayResultat);

        echo '<h1>Bibliothèque</h1>'; 
        echo '<form action="./afficherTousLivresForm2.php" method="POST">';

        
        for ($i=0; $i < count($arrayResultat)-1; $i++) {
            echo '<table border=1><thead><tr><th colspan="2">Livre '.($i+1).':</th></tr></thead>';
            echo "<tbody>";

            foreach ($arrayResultat[$i] as $key => $value) {
                echo "<tr><td>".$key."</td><td>".$value."</td></tr>";

            }
            echo "</tbody></table>";
            // echo '<input type="hidden" value ="'.$arrayResultat[$i]['id'].'" name="idLivre" id="">';
            // echo '<p><input type="submit" value="Update" id=""></p>';
            echo '<p><button type="submit" value="'.$arrayResultat[$i]['id'].'" name="idLivre" id="">UPDATE</button></p>';



        }
        echo "</form>\n";




     

    ?>






</body>
</html>