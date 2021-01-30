<?php
@session_start(); //Lancement de la session pour les cookies
if($_COOKIE['IDClientCookies'] == 0 or $_COOKIE['IDClientCookies'] == NULL){
    setcookie('IDClientCookies', 0, time() + 365*24*3600, null, null, false, true);
}
setcookie('pseudo', 'Non connecté', time() + 365*24*3600, null, null, false, true);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Store - cuisine Insic</title>
    <meta name="description" content="Projet CAO, Charlotte Maxime Adrien">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/fonts/material-icons.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/Animated-Typing-With-Blinking.css">
    <link rel="stylesheet" href="assets/css/Features-Clean.css">
    <link rel="stylesheet" href="assets/css/Footer-Basic.css">
    <link rel="stylesheet" href="assets/css/Good-login-dropdown-menu-1.css">
    <link rel="stylesheet" href="assets/css/Good-login-dropdown-menu.css">
    <link rel="stylesheet" href="assets/css/Highlight-Blue.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.2.0/aos.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Team-Clean.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
</head>

<body style="background: linear-gradient(rgba(0,0,0,0.49), rgba(153,146,143,0.4626405090137858) 34%, rgba(255,255,255,0.65) 100%);">
    <?php
        /*Variables utilisées dans tout le code php de la page*/
        $IDClient = 0;

        /*Connexion à la base de données*/
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=iblkmqyy_cuisine;charset=utf8', 'iblkmqyy_cuisine', 'Marmotte8');
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }

        /*Création d'un compte utilisateur via le formulaire en haut de la page*/
        if(isset($_POST["createCompte"]))//Quand le bouton envoyer est pressé pour la création de compte
        {
            $nom = $_POST["cnom"];
            $prenom = $_POST["cprenom"];
            $pseudo = $_POST["cpseudo"];
            $adresse = $_POST["cadresse"];
            $codePostal = $_POST["ccodePostal"];
            $password = $_POST["cpassword"];


            //Envoi dans la base de données
            $sql = $bdd->prepare ("INSERT INTO client (nom, prenom, pseudo, adresse, code_postal, motDePasse)
                                            VALUES (:nom, :prenom, :pseudo, :adresse, :codePostal, :password)");

            $sql->bindParam(':nom',$nom);
            $sql->bindParam(':prenom',$prenom);
            $sql->bindParam(':pseudo',$pseudo);
            $sql->bindParam(':adresse',$adresse);
            $sql->bindParam(':codePostal',$codePostal);
            $sql->bindParam(':password',$password);
            $sql->execute();
            $sql->closeCursor();
        }

        /*Connexion au compte*/
        if(isset($_POST["connexion"]))//Quand le bouton envoyer est pressé pour la connexion
        {
            $pseudo = $_POST["pseudo"];
            $mdp = $_POST["password"];

            setcookie('pseudo', $pseudo, time() + 365 * 24 * 3600, null, null, false, true);//Mise à jour du cookies

            $sql = $bdd->prepare("SELECT IDClient FROM client WHERE pseudo = :pseudo AND motDePasse = :mdp");
            $sql->bindParam(':pseudo',$pseudo);
            $sql->bindParam(':mdp',$mdp);
            $sql->execute();

            $donnees =0;//init

            while($donnees = $sql->fetch())//Récupération des données ligne par ligne
            {
                $IDClient = $donnees['IDClient'];//Valur à récuperer stockée en décimal
            }

            echo '<script> IDClient(); </script>';//Lancement du script pour l'affichage de l'ID en haut de page
            setcookie('IDClientCookies', $IDClient, time() + 365 * 24 * 3600, null, null, false, true);//Mise à jour du cookies

            $sql->closeCursor();
        }

        /*Envoie des paramètres placard_haut*/
        if(isset($_POST["go_param_placard_haut"]))//Quand le bouton envoyer est pressé pour le paramétre placard
        {
            $largeur = $_POST["largeur_haut"];
            $hauteur = $_POST["hauteur_haut"];
            $profondeur = $_POST["profondeur_haut"];
            $nombre_etagere = $_POST["nombre_etagere_haut"];


            //Envoi dans la base de données
            $sql = $bdd->prepare ("INSERT INTO placard_haut (IDClient, modele, largeur, hauteur, profondeur, etagere)
                                            VALUES (:IDClient, 1, :largeur/100, :hauteur/100, :profondeur/100, :nombre_etagere)");

            $sql->bindParam(':IDClient',$_COOKIE['IDClientCookies']);
            $sql->bindParam(':largeur',$largeur);
            $sql->bindParam(':hauteur',$hauteur);
            $sql->bindParam(':profondeur',$profondeur);
            $sql->bindParam(':nombre_etagere',$nombre_etagere);
            $sql->execute();
            $sql->closeCursor();
        }

        /*Envoie des paramètres bar*/
        if(isset($_POST["go_param_bar"]))//Quand le bouton envoyer est pressé pour le paramétre placard
        {
            $largeur = $_POST["largeur"];
            $hauteur = $_POST["hauteur"];
            $profondeur = $_POST["profondeur"];

            //Envoi dans la base de données
            $sql = $bdd->prepare ("INSERT INTO bar (IDClient, largeur, hauteur, profondeur)
                                            VALUES (:IDClient, :largeur/100, :hauteur/100, :profondeur/100)");

            $sql->bindParam(':IDClient',$_COOKIE['IDClientCookies']);
            $sql->bindParam(':largeur',$largeur);
            $sql->bindParam(':hauteur',$hauteur);
            $sql->bindParam(':profondeur',$profondeur);
            $sql->execute();
            $sql->closeCursor();
        }

        /*Envoie des paramètres placard_bas*/
        if(isset($_POST["go_param_placard"]))//Quand le bouton envoyer est pressé pour le paramétre placard
        {
            $largeur = $_POST["largeur"];
            $hauteur = $_POST["hauteur"];
            $profondeur = $_POST["profondeur"];
            $nombre_etagere = $_POST["nombre_etagere"];
            $modele = $_POST["numero_modele"];


            //Envoi dans la base de données
            $sql = $bdd->prepare ("INSERT INTO placard_bas (IDClient, modele, largeur, hauteur, profondeur, etagere)
                                            VALUES (:IDClient, :modele, :largeur/100, :hauteur/100, :profondeur/100, :nombre_etagere)");

            $sql->bindParam(':IDClient',$_COOKIE['IDClientCookies']);
            $sql->bindParam(':modele',$modele);
            $sql->bindParam(':largeur',$largeur);
            $sql->bindParam(':hauteur',$hauteur);
            $sql->bindParam(':profondeur',$profondeur);
            $sql->bindParam(':nombre_etagere',$nombre_etagere);
            $sql->execute();
            $sql->closeCursor();
        }

        /*Création de la référence assemblage*/
        if(isset($_POST["assemblage"]))//Quand le bouton envoyer est pressé pour l'assemblage'
        {
            /*
             *
             * Les valeurs de chaque modules sont copiés en dut pour faire des tests à termes l'objectif est de les placé en mode infini
             *
             * */
            /*Valeurs des modules choisis
            1 = placard bas modèle 1
            2 = placard bas modèle 2
            3 = bar
            4 = placard haut modèle 1*/
            $module1 = ceil($_POST['module1']);
            $module2 = ceil($_POST['module2']);
            $module3 = ceil($_POST['module3']);
            $module4 = ceil($_POST['module4']);
            $module5 = ceil($_POST['module5']);

            /*Position des différents modules
            L = en ligne
            A = en angle*/
            $pos1 = $_POST['pos1'];
            $pos2 = $_POST['pos2'];
            $pos3 = $_POST['pos3'];
            $pos4 = $_POST['pos4'];
            $pos5 = $_POST['pos5'];

            /*Options pour chaque module*/
            //module 1
            $op11 = 0;
            $op12 = 0;
            $op13 = 0;
            //module 2
            $op21 = 0;
            $op22 = 0;
            $op23 = 0;
            //module 3
            $op31 = 0;
            $op32 = 0;
            $op33 = 0;
            //module 4
            $op41 = 0;
            $op42 = 0;
            $op43 = 0;
            //module 5
            $op51 = 0;
            $op52 = 0;
            $op53 = 0;

            /*Création de la référence*/
            $listeModule = array($module1, $pos1, $op11, $op12, $op13,
                                 $module2, $pos2, $op21, $op22, $op23,
                                 $module3, $pos3, $op31, $op32, $op33,
                                 $module4, $pos4, $op41, $op42, $op43,
                                 $module5, $pos5, $op51, $op52, $op53);

            $reference = implode("",$listeModule);

            //Envoi dans la base de données
            $sql = $bdd->prepare ("INSERT INTO assemblage (IDClient, reference)
                                            VALUES (:IDClient, :reference)");

            $sql->bindParam(':IDClient',$_COOKIE['IDClientCookies']);
            $sql->bindParam(':reference',$reference);
            $sql->execute();
            $sql->closeCursor();
        }
    ?>
    <div class="modal fade" role="dialog" tabindex="-1" id="modal2">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Créer un compte</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <form action="store.php" method="post" >
                    <div class="modal-body">
                        <p>Bienvenue dans l'équipe 🤩</p>
                        <!--Utilisation du prefixe c pour les noms des champs de texte pour bien les différencier des autres-->
                        <label>Nom :&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</label><input name="cnom" type="text">
                        <p></p>
                        <label>Prénom :&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label><input name="cprenom" type="text">
                        <p></p>
                        <label>Pseudo :&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label><input name="cpseudo" type="text">
                        <p></p>
                        <label>Adresse :&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</label><input name="cadresse" type="text">
                        <p></p>
                        <label>Code postal :&nbsp; &nbsp;</label><input name="ccodePostal" type="text">
                        <p></p>
                        <label>Mot de passe :&nbsp;</label><input name="cpassword" type="text">
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-light" type="button" data-dismiss="modal">J'abandonne honteusement</button>
                        <button class="btn btn-primary" name="createCompte" type="submit">Créer mon compte</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="modal1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Se connecter</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <form action="store.php" method="post" >
                    <div class="modal-body">
                        <p>Vous devez déjà avoir créer un compte 😎</p>
                        <label>Pseudo :&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</label>
                        <input name="pseudo" type="text">
                        <p></p>
                        <label>Mot de passe :&nbsp;</label>
                        <input name="password" type="password">
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-light" type="button" data-dismiss="modal">Annuler</button>
                        <button class="btn btn-light" data-toggle="modal" data-target="#modal2" type="button">Créer un compte</button>
                        <button class="btn btn-primary" name="connexion" type="submit">Se connecter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div>
        <div class="container">
            <div class="row">
                <div class="col text-right" style="padding-right: 0;padding-left: 0;" id="ID">
                    <?php echo "Bienvenue '" . $_COOKIE['pseudo'] . "' votre ID est : '".$_COOKIE['IDClientCookies']."'"; ?>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modal1" type="button">Se connecter</button>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modal2" type="button">Créer un compte</button>
                </div>
            </div>
        </div>
    </div>
    <h1 class="text-center text-white d-none d-lg-block site-heading"><span class="site-heading-lower">INSIC CUISINE</span></h1>
    <nav class="navbar navbar-light navbar-expand-lg bg-dark py-lg-4" id="mainNav">
        <div class="container"><a class="navbar-brand text-uppercase d-lg-none text-expanded" href="#">INSIC CUISINE</a>
            <button data-toggle="collapse" data-target="#navbarResponsive" class="navbar-toggler" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="nav navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href="index.html">Accueil</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.html">A propos</a></li>
                    <li class="nav-item"><a class="nav-link" href="products.html">Nos meubles</a></li>
                    <li class="nav-item"><a class="nav-link" href="store.php">Réaliser une commande</a></li>
                    <li class="nav-item"><a class="nav-link" href="3D.html">Configurateur 3D</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="highlight-blue">
        <div class="container">
            <div class="intro">
                <h2 class="text-center">Zone en tests <br> <?php echo "IDClient récupéré : '" . $_COOKIE['IDClientCookies'] . "' avec le pseudo :'".$_COOKIE['pseudo']."'"; ?></h2>
                <p class="text-center">Emplacement pour les formulaires en relation avec la base de données et CATIA, ici tout peut arriver 😉</p>
            </div>
            <div class="buttons">
                <a class="btn btn-primary" role="button" href="index.html">Retourner en sécurité</a>
                <button class="btn btn-primary" type="submit">Charger la configuration depuis la base de données</button>
            </div>
        </div>
    </div>
    <section class="page-section about-heading">
        <div class="container">
            <div class="about-heading-content"></div>
        </div>
    </section>
    <div>
        <div class="container-fluid text-left">
            <div class="row">
                <div class="col-md-4">
                    <form action="store.php" method="post" ><br>
                        <h1>Tests avec CATIA</h1><br>
                        <h2>Paramétrage du placard haut</h2><br>

                        <label class="formulaire_placard_haut" for="largeur">
                            Largeur (compris entre 60 et 100 cm) :<br>
                            <input type="number" min="60" max="100" name="largeur_haut" value="" placeholder="" required/>
                        </label><br>

                        <label class="formulaire_placard_haut" for="hauteur">
                            Hauteur (Compris entre 80 et 100 cm) :<br>
                            <input type="number" min="80" max="100" name="hauteur_haut" value="" placeholder="" required/>
                        </label><br>

                        <label class="formulaire_placard_haut" for="profondeur">
                            Profondeur (Compris entre 40 et 80 cm) :<br>
                            <input type="number" min="40" max="80" name="profondeur_haut" value="" placeholder="" required/>
                        </label><br>

                        <label class="formulaire_placard_haut" for="nombre_etagere">
                            Nombre d'étagères (Compris entre 0 et 3) :<br>
                            <input type="number" min="0" max="3" name="nombre_etagere_haut" value="" placeholder="" required/>
                        </label><br><br>

                        <input type="submit" value="Envoyer" name="go_param_placard_haut"/>
                    </form>
                </div>
                <div class="col-md-4">
                    <form action="store.php" method="post" ><br>
                        <h1>Tests avec CATIA</h1><br>
                        <h2>Paramétrage du placard bas</h2><br>

                        <label class="formulaire_placard_bas" for="largeur">
                            Largeur (Compris entre 60 et 100 cm) :<br>
                            <input type="number" min="60" max="100" name="largeur" value="" placeholder="" required/>
                        </label><br>

                        <label class="formulaire_placard_bas" for="hauteur">
                            Hauteur (Compris entre 80 et 100 cm) :<br>
                            <input type="number" min="80" max="100" name="hauteur" value="" placeholder="" required/>
                        </label><br>

                        <label class="formulaire_placard_bas" for="profondeur">
                            Profondeur (Compris entre 40 et 80 cm) :<br>
                            <input type="number" min="40" max="80" name="profondeur" value="" placeholder="" required/>
                        </label><br>

                        <label class="formulaire_placard_bas" for="nombre_etagere">
                            Nombre d'étagères (Compris entre 0 et 3) :<br>
                            <input type="number" min="0" max="3" name="nombre_etagere" value="" placeholder="" required/>
                        </label><br>

                        <label class="formulaire_placard_bas" for="numero_modele">
                            Modèle souhaité (Compris entre 1 et 2) :<br>
                            <input type="number" min="1" max="2" name="numero_modele" value="" placeholder="" required/>
                        </label><br><br>

                        <input type="submit" value="Envoyer 😋" name="go_param_placard"/>
                    </form>
                </div>
                <div class="col-md-4">
                    <form action="store.php" method="post" ><br>
                        <h1>Tests avec CATIA</h1><br>
                        <h2>Paramétrage du bar</h2><br>

                        <label class="formulaire_bar" for="largeur">
                            Largeur (Compris entre 100 et 400 cm) :<br>
                            <input type="number" min="100" max="400" name="largeur" value="" placeholder="" required/>
                        </label><br>

                        <label class="formulaire_bar" for="hauteur">
                            Hauteur (Compris entre 15 et 40 cm) :<br>
                            <input type="number" min="15" max="40" name="hauteur" value="" placeholder="" required/>
                        </label><br>

                        <label class="formulaire_bar" for="profondeur">
                            Profondeur (Compris entre 40 et 80 cm) :<br>
                            <input type="number" min="40" max="80" name="profondeur" value="" placeholder="" required/>
                        </label><br><br>

                        <input type="submit" value="Envoyer" name="go_param_bar"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="container">
            <form action="store.php" method="post" ><br>
                <h1>Test d'assemblage</h1>
                <h3>paramétrage de l'assemblage</h3>
                <label class="d-table">Premier module :</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="formCheck-3" value="L" name="pos1">
                    <label class="form-check-label" for="formCheck-2">Section 1 (en ligne)</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="formCheck-4" value="A" name="pos1">
                    <label class="form-check-label" for="formCheck-2">Section 2 (en angle)</label>
                </div>
                <select name="module1" class="d-table">
                    <option value="1" selected="">Placard bas modéle 1</option>
                    <option value="2">Placard bas modèle 2</option>
                    <option value="3">Libre</option>
                    <option value="4">Placard haut modèle 1</option>
                </select>
                <p></p>
                <label class="d-table">Second module :&nbsp;</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="formCheck-5" value="L" name="pos2">
                    <label class="form-check-label" for="formCheck-2">Section 1 (en ligne)</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="formCheck-6" value="A" name="pos2">
                    <label class="form-check-label" for="formCheck-2">Section 2 (en angle)</label>
                </div>
                <select name="module2" class="d-table">
                    <option value="1" selected="">Placard bas modéle 1</option>
                    <option value="2">Placard bas modèle 2</option>
                    <option value="3">Libre</option>
                    <option value="4">Placard haut modèle 1</option>
                </select>
                <p></p>
                <label class="d-table">Troisième module :&nbsp;</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="formCheck-7" value="L" name="pos3">
                    <label class="form-check-label" for="formCheck-2">Section 1 (en ligne)</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="formCheck-8" value="A" name="pos3">
                    <label class="form-check-label" for="formCheck-2">Section 2 (en angle)</label>
                </div>
                <select name="module3" class="d-table">
                    <option value="1" selected="">Placard bas modéle 1</option>
                    <option value="2">Placard bas modèle 2</option>
                    <option value="3">Libre</option>
                    <option value="4">Placard haut modèle 1</option>
                </select>
                <p></p>
                <label class="d-table">Quatrième module :&nbsp;</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="formCheck-9" value="L" name="pos4">
                    <label class="form-check-label" for="formCheck-2">Section 1 (en ligne)</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="formCheck-10" value="A" name="pos4">
                    <label class="form-check-label" for="formCheck-2">Section 2 (en angle)</label>
                </div>
                <select name="module4" class="d-table">
                    <option value="1" selected="">Placard bas modéle 1</option>
                    <option value="2">Placard bas modèle 2</option>
                    <option value="3">Libre</option>
                    <option value="4">Placard haut modèle 1</option>
                </select>
                <p></p>
                <label class="d-table">Cinquième module :&nbsp;</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="formCheck-2" value="L" name="pos5">
                    <label class="form-check-label" for="formCheck-2">Section 1 (en ligne)</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="formCheck-1" value="A" name="pos5">
                    <label class="form-check-label" for="formCheck-2">Section 2 (en angle)</label>
                </div>
                <select name="module5" class="d-table">
                    <option value="1" selected="">Placard bas modéle 1</option>
                    <option value="2">Placard bas modèle 2</option>
                    <option value="3">Libre</option>
                    <option value="4">Placard haut modèle 1</option>
                </select>
                <p></p><button class="btn btn-primary" name="assemblage" type="submit">Envoyer</button>
            </form>
        </div>
        <div class="container">
            <form method="post" action="store.php" >
                <div id="champs" >
                    <input type="text" name="titre[]" />
                    <input type="text" name="contenu[]" />
                    <input type="text" name="description[]" />
                </div>
                <script type="text/javascript" >
                    var div = document.getElementById('champs');
                    function addInput(nam){
                        var input = document.createElement("input");
                        input.name = name;
                        div.appendChild(input);
                    }
                    function addField() {
                        addInput("titre[]");
                        addInput("contenu[]");
                        addInput("description[]");
                        div.appendChild(document.createElement("br"));
                    }
                </script>
                <button type="button" onclick="addField()" >+</button>
                <input type="submit" />
            </form>
        </div>
    </div>
    <div class="footer-basic">
        <footer>
            <div class="social"><a href="https://github.com/Little-Groundhog/Insic-Cuisine"><i class="icon ion-social-github"></i></a><a href="https://mines-nancy.univ-lorraine.fr/formation/ingenieur-de-specialite-ingenierie-de-conception-ic/"><i class="icon ion-briefcase"></i></a></div>
            <ul
                class="list-inline">
                <li class="list-inline-item"><a href="index.html">Accueil</a></li>
                <li class="list-inline-item"><a href="about.html">A propos</a></li>
                <li class="list-inline-item"><a href="products.html">Nos meubles</a></li>
                <li class="list-inline-item"><a href="store.php">Réaliser une commande</a></li>
                <li class="list-inline-item"><a href="3D.html">Configurateur 3D</a></li>
                </ul>
                <p class="copyright">Insic Cusine @2020</p>
        </footer>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.2.0/aos.js"></script>
    <script src="assets/js/Animated-Typing-With-Blinking.js"></script>
    <script src="assets/js/current-day.js"></script>
</body>

</html>