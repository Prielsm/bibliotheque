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
        $id = $_POST['idLivre'];
        // echo $id;
        $titre = $_POST['titre'];
        // echo $titre;       
        $prix = $_POST['prix'];
        // echo $prix;
        $description = $_POST['description'];
        // echo $description;
        $date_publication = $_POST['date_publication'];
        // echo $date_publication;
        $isbn = $_POST['isbn'];
        $auteur_id = $_POST['auteur_id'];

        //chercher la db
        include "./config/db.php";
        
        try {
            $db= new PDO (DBDRIVER.': host='.DBHOST.';port='.DBPORT.';dbname='.DBNAME.
                ';charset='.DBCHARSET, DBUSER, DBPASS);
        } catch (Exception $e) {
            echo "Il y a eu une erreur dans la connexion de la base de données.";
        }

        $sql = "SELECT * FROM livre WHERE id = ".$id;
        $stmt = $db->prepare($sql);
        $stmt->execute();

        $livre = $stmt->fetch(PDO::FETCH_ASSOC);

        // echo "ancienne titre : ".$livre['titre']."<br>";
        // echo "nouvelle titre : ".$titre;
        // echo "ancienne prix : ".$livre['prix']."<br>";
        // echo "nouvelle prix : ".$prix;
        // echo "ancienne description : ".$livre['description']."<br>";
        // echo "nouvelle description : ".$description;
        // echo "ancienne date_publication : ".$livre['date_publication']."<br>";
        // echo "nouvelle date_publication : ".$date_publication;
        // echo "ancienne isbn : ".$livre['isbn']."<br>";
        // echo "nouvelle isbn : ".$isbn;
        // echo "ancienne auteur_id : ".$livre['auteur_id']."<br>";
        // echo "nouvelle auteur_id : ".$auteur_id;
        
        
        $sql = "UPDATE livre SET titre = ".$titre." WHERE titre =  ".$livre['titre'];
        $stmt = $db->prepare($sql);
        $stmt->execute();

        $sql = "UPDATE livre SET prix = ".$prix." WHERE prix =  ".$livre['prix'];
        $stmt = $db->prepare($sql);
        $stmt->execute();
        
        $sql = "UPDATE livre SET description = ".$description." WHERE description =  ".$livre['description'];
        $stmt = $db->prepare($sql);
        $stmt->execute();
        
        $sql = "UPDATE livre SET date_publication = ".$date_publication." WHERE date_publication =  ".$livre['date_publication'];
        $stmt = $db->prepare($sql);
        $stmt->execute();
        
        $sql = "UPDATE livre SET isbn = ".$isbn." WHERE isbn =  ".$livre['isbn'];
        $stmt = $db->prepare($sql);
        $stmt->execute();
        
        $sql = "UPDATE livre SET auteur_id = ".$auteur_id." WHERE auteur_id =  ".$livre['auteur_id'];
        $stmt = $db->prepare($sql);
        $stmt->execute();
        
       

        
        //UPDATE trains SET villeDepart = 'Genk' WHERE villeDepart = 'GENT'








    ?>
</body>
</html>