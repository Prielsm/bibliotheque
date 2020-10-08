<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="./insererLivreTraitement.php" method="POST">
        <h2>Insérer un livre:</h2> 
        <p>Titre : <input type="text" name="titre" id=""></p>
        <p>Prix : <input type="number" name="prix" id=""></p>
        <p>Description : <input type="text" name="description" id=""></p>
        <p>Date de publication : <input type="datetime-local" id="" name="date_publication" 
            value="2020-10-08T11:11"
            min="1900-01-01T00:00" max="2030-12-31T23:59">
        </p>
        <p>ISBN : <input type="text" name="isbn" id=""></p>
        <p>ID de l'auteur : <input type="number" name="auteur_id" id=""></p>
        <p><input type="submit" value="Insérer" id=""></p>
        





    </form>
</body>
</html>