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
        $prix = $_POST['prix'];
        $description = $_POST['description'];
        $date_publication = $_POST['date_publication'];
        $isbn = $_POST['isbn'];
        $auteur_id = $_POST['auteur_id'];
   
        //obtenir le tableau des livres en se connectant à la db
        include "./config/db.php";
        
        try {
            $db= new PDO (DBDRIVER.': host='.DBHOST.';port='.DBPORT.';dbname='.DBNAME.
                ';charset='.DBCHARSET, DBUSER, DBPASS);
        } catch (Exception $e) {
            echo "Il y a eu une erreur dans la connexion de la base de données.";
        }
        

        $sql = "INSERT INTO livre (id, titre, prix, description, date_publication, isbn, auteur_id) VALUES (null, :titre, :prix, :description, :date_publication, :isbn, :auteur_id)";


        $stmt = $db->prepare($sql);

        //donner les paramètres
        $stmt->bindParam(":titre", $titre);
        $stmt->bindParam(":prix", $prix);
        $stmt->bindParam(":description", $description);
        $stmt->bindParam(":date_publication", $date_publication);
        $stmt->bindParam(":isbn", $isbn);
        $stmt->bindParam(":auteur_id", $auteur_id);



        $stmt->execute();
        // var_dump($stmt->errorInfo());
        // var_dump($db->errorInfo());

        

        echo "<h1>Formulaire bien envoyé! Votre livre a bien été enregistré.";
        
        $sql = "SELECT * FROM livre";
        $stmt = $db->prepare($sql);
        $stmt->execute();

        $arrayResultat = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($arrayResultat);
        echo '<form action="./afficherTousLivresForm2.php" method="POST">';
        echo '<h1>Bibliothèque</h1>';
        for ($i=0; $i < count($arrayResultat); $i++) { 
            echo "<h2>Livre ".($i+1)."</h2>";
            echo '<table border=1><thead><tr><th colspan="2">Livre '.($i+1).':</th></tr></thead>';
            echo "<tbody>";

            foreach ($arrayResultat[$i] as $key => $value) {
                echo "<tr><td>".$key."</td><td>".$value."</td></tr>";

            }
            echo "</tbody></table>";
            echo '<p><input type="submit" value="Update" name="'.$i.'" id=""></p>';


        }








    ?>
</body>
</html>