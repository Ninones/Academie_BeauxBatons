<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Académie BeauxBatons</title>
    <link rel="stylesheet" href="style3.css">
    <link rel="shortout icon" href="../images/icone.ico">
</head>
<body>
    <header>
        <nav class="nav">
            <ul>
                <li><a href="../index.html">Accueil</a></li>
                <li><a href="../histoire.html">Histoire</a></li>
                <li><a href="../formation/formation.php">Formation</a></li>
                <li><a href="">Inscription</a></li>
            </ul>
        </nav>
    </header>

    <article>
    <section id="inscription">
        <h1>inscription</h1>
        <h2>2023 - 2024</h2>
        <p>L’inscription administrative est soumise à l’admission 
            définitive dans une des formations de l’Academie de 
            Beauxbâtons ainsi qu’à l’obtention du diplôme d’entrée requis.</p>
            <details>
                <summary>Inscription en ligne</summary>
                <form method="post">
                    <label for="nom">Quel est votre nom ?</label>
                    <input type="text" name="nom" id="nom" required>
                    <label for="prenom">Quel est votre prénom ?</label>
                    <input type="text" name="prenom" id="prenom" required>
                    <label for="date">Quel est date d'anniversaire ?</label>
                    <input type="date" name="date" id="date" required>
                    <div>
                    <label for="formation">A quel formation voulez-vous vous inscrire?</label>
                    <select name="formation" id="formation">
                        <option value="option1">option 1</option>
                        <option value="option2">option 2</option>
                        <option value="option3">option 3</option>
                    </select>
                    </div>
                    <div>
                    <label for="maison">A quelle maison voulez vous appartenir ?</label>
                    <select name="maison" id="maison">
                        <option value="lonicera">Lonicera</option>
                        <option value="urtica">Urtica</option>
                        <option value="aloysia">Aloysia</option>
                    </select>
                    </div>
                    <label for="message">Si vous avez un commentaire à faire</label>
                    <textarea id="message" name="message" rows="4"></textarea>
                    <input type="hidden" name="afficher" value="ok" > 
                    <input type="submit" name="formsend" value="Envoyer" >
                </form>
              </details>  
    
            <?php 
        
        if(isset($_POST['formsend'])){
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $date = $_POST['date'];
            $formation = $_POST['formation'];
            $maison =  $_POST['maison'];
            $message =  $_POST['message'];
            if(($nom == " ") || ($prenom == " ") || ($date == " ") || ($formation == " ") || ($maison == " ")) {
                if ($nom == " ") print("Veuillez saisir votre nom !<br>");
                if ($prenom == " ") print("Veuillez saisir votre prenom !<br>");
                if ($date == " ") print("Veuillez saisir votre date de naisssance !<br>");
                if ($formation == " ") print("Veuillez saisir la formation souhaitée !<br>");
                if ($maison == " ") print("Veuillez saisir la maison souhaitée !<br>");
            }
            else {
                $json = file_get_contents("donneesform.json");
                $tab = json_decode($json, true);
                $donnees = array(
                            'nom' => $nom,
                            'prenom' => $prenom,
                            'date' => $date,
                            'formation' => $formation,
                            'maison' => $maison,
                            'message' => $message
                    );
                $tab[] = $donnees;
                $encode = json_encode($tab, JSON_PRETTY_PRINT);
                file_put_contents("donneesform.json", $encode);

                echo "
                <div>
                    <h3>Bonjour $nom $prenom, <br> 
                    votre inscription à l'Académie de BeauxBatons pour l'année 24/25 a bien été prise en compte</h3><br>
                    <h3>Ci-joint vos informations collectées : <br></h3>
                    <ul> 
                        <li> Votre date de naissance : $date <br></li>
                        <li>Votre formation souhaitée : $formation <br></li>
                        <li>Votre maison de coeur : $maison <br></li>
                        <li>Le message que vous avez envoyé : $message<br></li>
                    </ul>
                </div>";
        }
        }
        
    ?>

    </section>

    <section>
        <h2>certificat de scolarité</h2>
        <p>Votre inscription sera prise en compte dans les meilleurs délais. 
            Si votre inscription est validée, nous vous délivrerons votre compte 
            intranet de Beauxbâtons qui vous permettra d'accéder à un ensemble d'outils
             et de services tels que votre dossier étudiant, votre messagerie étudiante,
              ainsi que le service "Certificats de scolarité".</p>
    </section>

    <section>
        <h2>Rembousement de frais d'inscription</h2>
        <p>Modalités d’exonération et de remboursement des droits d’inscription 2021-2022 : 

        Modalités d’exonération et de remboursement des droits d’inscription 2024-2025 :
        Vous pouvez <a id="fichier" href="http://localhost/beauxbatons/remboursement.pdf" download> télécharger </a> la demande de remboursement des frais d’inscription pour les motifs suivants : 
    Changement de statut (étudiant devenu Boursier sur critères sociaux ou changement de situation sociale)
    Annulation de l'inscription administrativeSi vous êtes devenu boursier et que vous avez payé la CVEC, 
    vous pouvez demander le remboursement en ligne.</p>
    </section>
    </article>

    <footer>
        <p>&copy; 2023 AcadémieBeauxBâtons. Tous droits réservés.</p>
    </footer>

</body>
</html>