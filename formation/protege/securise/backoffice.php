<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <details>
        <summary>Ajouter un cours</summary>
        <form method="post">
            <label for="matiere">Nom du cour</label>
            <input type="text" name="matiere" id="matiere">
            <label for="abreviation">Abréviation</label>
            <input type="text" name="abreviation" id="abreviation">
            <label for="professeur">Prénom et nom du professeur</label>
            <input type="texte" name="professeur" id="professeur">
            <label for="image">URL e l'image</label>
            <input type="texte" name="image" id="image">
            <label for="information">Information sur le cour</label>
            <textarea id="information" name="information" rows="4"></textarea>
            <h1>Graduation (4minimum)</h1>
            <label for="1">type de graduation</label>
            <input type="text" name="1" id="1">
            <label for="2">type de graduation</label>
            <input type="text" name="2" id="2">
            <label for="3">type de graduation</label>
            <input type="text" name="3" id="3">
            <label for="4">type de graduation</label>
            <input type="text" name="4" id="4">
            <label for="5">type de graduation</label>
            <input type="text" name="5" id="5">
            <label for="6">type de graduation</label>
            <input type="text" name="6" id="6">
            <input type="hidden" name="afficher" value="ok" > 
            <input type="submit" name="formsend" value="Envoyer" >
        </form>
    </details>  
</body>
</html>

<?php

if(isset($_POST['formsend'])){
    $newcours = array();
    $matiere = $_POST['matiere'];
    $abreviation = $_POST["abreviation"];
    $professeur = $_POST['professeur'];
    $image = $_POST['image'];
    $information = $_POST['information'];
    $gradution = array();
    $graduation[0] = $_POST['1'];
    $graduation[1] = $_POST['2'];
    $graduation[2] = $_POST['3'];
    $graduation[3] = $_POST['4'];
    $graduation[4] = $_POST['5'];
    $graduation[5] = $_POST['6'];    

    $json = file_get_contents("formation.json");
    $tab = json_decode($json, true);
    $tab[$matiere] = array(
                'abreviation' => $abreviation,
                'image' => $image,
                'professeur' => $professeur,
                'information' => $information,
                'graduation' => $graduation,
        );
    $encode = json_encode($tab, JSON_PRETTY_PRINT);
    file_put_contents("formation.json", $encode);
}


?>

<a href="../../formation.php">Retour page formation</a>