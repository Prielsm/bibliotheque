<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        var_dump($_POST);
        include "./config/db.php";
        
        try {
            $db= new PDO (DBDRIVER.': host='.DBHOST.';port='.DBPORT.';dbname='.DBNAME.
                ';charset='.DBCHARSET, DBUSER, DBPASS);
        } catch (Exception $e) {
            echo "Il y a eu une erreur dans la connexion de la base de données.";
        }
        $id = $_POST['idLivre'];
        $idFake = $_POST['idFake'];

        $sql = "SELECT * FROM livre WHERE id = ".$id;
        $stmt = $db->prepare($sql);
        $stmt->execute();

        $livre = $stmt->fetch(PDO::FETCH_ASSOC);

        // if (isset($_POST[2])) {
        //     echo "je suis le livre2";
        // }

        
            if (isset($id)) {
                echo "<h2>Livre ".($idFake)."</h2>";
                echo '<form action="./afficherTousLivresTraitement.php" method="POST">';

                foreach ($livre as $key => $value) {
                    if ($key == 'id' || $key == 'prix' || $key == 'auteur_id') {
                        echo "<p>".$key.' : <input type="number" name="'.$key.'" value="'.$value.'" id=""></p>';

                    }
                    elseif ($key == 'date_publication') {
                        $objDate = new DateTime($value);
                        $strDate = $objDate->format("Y-m-d\TH:i");
                        // var_dump($strDate);
                        echo '<p>'.$key.' : <input type="datetime-local" id="" name="'.$key.'" 
                            value="'.$strDate.'" min="1900-01-01T00:00" max="2030-12-31T23:59"
                            >
                        </p>';

                    }
                    else {
                        echo "<p>".$key.' : <input type="text" name="'.$key.'" value="'.$value.'" id=""></p>';

                    }

                }
                // echo '<p><input type="submit" value="Update" name="'.$i.'" id=""></p>';
                echo "</form>";
            }


            // <form action="./insererLivreTraitement.php" method="POST">
            // <h2>Insérer un livre:</h2> 
            // <p>Titre : <input type="text" name="titre" id=""></p>
            // <p>Prix : <input type="number" name="prix" id=""></p>
            // <p>Description : <input type="text" name="description" id=""></p>
            // <p>Date de publication : <input type="datetime-local" id="" name="date_publication" 
            //     value="2020-10-08T11:11"
            //     min="2000-01-01T00:00" max="2030-12-31T23:59">
            // </p>
            // <p>ISBN : <input type="text" name="isbn" id=""></p>
            // <p>ID de l'auteur : <input type="number" name="auteur_id" id=""></p>
            // <p><input type="submit" value="Insérer" id=""></p>
        





   
        

        

    ?>

</body>
</html>