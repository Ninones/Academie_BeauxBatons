<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Académie BeauxBatons/formation</title>
    <link rel="stylesheet" href="css/formation.css">
</head>
<body>
    <header>
        <nav class="nav">
            <ul>
                <li><a href="../index.html">Accueil</a></li>
                <li><a href="../histoire.html">Histoire</a></li>
                <li><a href="">Formation</a></li>
                <li><a href="../inscription/inscription.php">Inscription</a></li>
            </ul>
        </nav>
        <h1>Académie de</h1>
        <h2>BeauxBatons</h2>
        <a class="fleche" href="#fleche"><img src="images/icone_bot.png" alt="icone_bot"></a>
    </header>
        <div class="Cours" id="fleche">
            <?php
                $tab = array(
                    "Potions" => array(
                        "Abreviation" => "PTS 101",
                            "Image" => "images/potions.jpg",
                            "Professeur" => "Celestia Attorney",
                            "Information" => "Ce cours fournit une introduction aux potions. Les premières années apprendront l’utilisation de la sécurité et des potions fondamentales, les termes, le brassage et la théorie de base. Nous aborderons les principaux ingrédients ainsi que l’histoire des potions.<br><br>Ces cours se déroulent dans les laboratoires au sous-sol de Beauxbâtons, souvent en double cours. Il consiste en la mémorisation des propriétés des différents ingrédients de potions et en la composition de certaines potions. Les élèves sont aussi amenés à en préparer certaines potions et à réaliser des essais sur les propriétés des ingrédients de potions.",
                            "Graduation" => array( 
                                "1" => "Potion de Jaunisse (pratique)",
                                "2" => "Potion d'Allégresse (pratique)",
                                "3" => "Philtre de Mort Vivant(théorie)",
                                "4" => "Potion d’Amnésie(pratique)",
                                "5" => "Somnifère(pratique)",
                                "6" => "Philtre de Double Vue (pratique, examen final)"
                            )
                        )
                    );
                /*$encode = json_encode($tab, JSON_PRETTY_PRINT);
                $myfile = fopen("./formation.json", "w");
                fwrite($myfile, $encode);
                fclose($myfile);*/
                $tab2 = json_decode(file_get_contents('protege/securise/formation.json', true)); 

                
                function AffichageTableau($tab){
                    echo '<div class="cours">';
                    foreach($tab as $matiere => $clé){
                        echo "<div class='$matiere'>";
                        echo "<details>";
                        echo "<summary><div><h3>$matiere</h3>";
                        foreach($clé as $titre => $value){
                            if ($titre == "abreviation"){
                                echo "<p>$value</p></div></summary>";
                                echo "<div class='intro'><h3>$matiere</h3><p>$value</p></div>";
                            }
                            else if ($titre == "image")
                                echo "<img class='img' src='$value' alt='$matiere'>";
                            else if ($titre == "professeur")
                                echo "<div class='contenue'><h3>Le $titre de $matiere : $value</h3>";
                            else if ($titre == "information")
                                echo "<p>$value</p>";
                            else{
                                echo '<nav class="grade"><ul>';
                                foreach($value as $clé2 => $info){
                                    echo "<li>$info</li>";
                                }
                                echo "</ul></nav></div>";
                            }
                        }
                        echo "</details>";
                        echo '</div>';
                    }
                    echo '</div>';
                }

                if ($tab2 != null)
                    AffichageTableau($tab2);
            ?>
        </div>
        <a href="protege/securise/backoffice.php"><img class="plus" src="images/plus.png" alt="icone_bot"></a>
        <footer>
            <p>&copy; 2023 AcadémieBeauxBâtons. Tous droits réservés.</p>
        </footer>
</body>
</html>