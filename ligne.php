<?php
    @session_start(); //Lancement de la session pour les cookies
    if($_COOKIE['IDClientCookies'] == 0 or $_COOKIE['IDClientCookies'] == NULL){
        setcookie('IDClientCookies', 0, time() + 365*24*3600, null, null, false, true);
    }
    if($_COOKIE['Reference'] == 00000000 or $_COOKIE['Reference'] == NULL){
        setcookie('Reference', 00000000, time() + 365*24*3600, null, null, false, true);
    }
    if($_COOKIE['ReferenceImage'] == 00000000 or $_COOKIE['ReferenceImage'] == NULL){
        setcookie('ReferenceImage', 00000000, time() + 365*24*3600, null, null, false, true);
    }
    if($_COOKIE['pseudo'] == 'Non connecté' or $_COOKIE['pseudo'] == NULL){
        setcookie('pseudo', 'Non connecté', time() + 365*24*3600, null, null, false, true);
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Store - cuisine Insic</title>
    <meta name="description" content="Projet CAO, Charlotte Maxime Adrien">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Animated-Typing-With-Blinking.css">
    <link rel="stylesheet" href="assets/css/Features-Clean.css">
    <link rel="stylesheet" href="assets/css/Footer-Basic.css">
    <link rel="stylesheet" href="assets/css/Highlight-Blue.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/Modern-Contact-Form.css">
    <link rel="stylesheet" href="assets/css/Team-Clean.css">
    <link rel="stylesheet" href="assets/css/Team-Grid.css">
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
            $password = $_POST["cpassword"];
            $budget = $_POST["cbudget"];
            $longueur = $_POST["clongueur"];
            $largeur = $_POST["clargeur"];


            //Envoi dans la base de données
            $sql = $bdd->prepare ("INSERT INTO client (nom, prenom, pseudo, motDePasse, budget, longueur, largeur)
                        VALUES (:nom, :prenom, :pseudo, :password, :budget, :longueur, :largeur)");

            $sql->bindParam(':nom',$nom);
            $sql->bindParam(':prenom',$prenom);
            $sql->bindParam(':pseudo',$pseudo);
            $sql->bindParam(':password',$password);
            $sql->bindParam(':budget',$budget);
            $sql->bindParam(':longueur',$longueur);
            $sql->bindParam(':largeur',$largeur);
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
                $IDClient = $donnees['IDClient'];//Valeur à récuperer stockée en décimal
            }

            setcookie('IDClientCookies', $IDClient, time() + 365 * 24 * 3600, null, null, false, true);//Mise à jour du cookies

            $sql->closeCursor();
        }

        if(isset($_POST["refresh"]))
        {
            /*Récupération des valeurs dans les selects*/
            $couleurs = ceil($_POST['couleurs']);
            $planTravail = ceil($_POST['planTravail']);
            $poignees = ceil($_POST['poignees']);
            $ilot = ceil($_POST['ilot']);
            $evier = ceil($_POST['evier']);
            $hotte = ceil($_POST['hotte']);

            /*Création du code image*/
            $listeParametre = array($couleurs, $planTravail, $poignees, $ilot, $evier, $hotte);

            $codeImage = implode("",$listeParametre);

            /*Mise à jour du cookies avec le nom de la nouvelle image*/
            setcookie('ReferenceImage', $codeImage, time() + 365 * 24 * 3600, null, null, false, true);//Mise à jour du cookies
        }


    ?>
    <div class="modal fade" role="dialog" tabindex="-1" id="modal2">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" style="color: var(--dark);">Créer un compte</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <p>Bienvenue dans l'équipe 🤩</p><label>Nom :&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</label><input type="text">
                    <p></p><label>Prénom :&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label><input type="text">
                    <p></p>
                    <p><label>Mot de passe :&nbsp; &nbsp;</label><input type="text"></p><label>Budget :&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</label><input type="text">
                    <p style="color: var(--blue);">Paramétrage de la pièce :</p>
                    <p></p><label>Longueur :&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label><input type="text">
                    <p></p><label>Largeur :&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label><input type="text">
                    <p></p>
                </div>
                <div class="modal-footer"><button class="btn btn-light" type="button" data-dismiss="modal">J'abandonne honteusement</button><button class="btn btn-primary" type="button">Créer mon compte</button></div>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="modal1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Se connecter</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <p>Vous devez déjà avoir créer un compte 😎</p><label>Pseudo :&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</label><input type="text">
                    <p></p><label>Mot de passe :&nbsp;</label><input type="password">
                </div>
                <div class="modal-footer"><button class="btn btn-light" type="button" data-dismiss="modal">Annuler</button><button class="btn btn-light" data-toggle="modal" data-target="#modal2" type="button">Créer un compte</button><button class="btn btn-primary" type="button">Se connecter</button></div>
            </div>
        </div>
    </div>
    <div>
        <div class="container">
            <div class="row">
                <div class="col text-right" style="padding-right: 0px;padding-left: 0px;"><input type="text" style="background: rgba(255,255,255,0);border-style: none;width: 250px;font-family: Raleway, sans-serif;text-align: right;padding: 15px;padding-top: 0;padding-bottom: 0;" placeholder="Actuellement non connecté"><button class="btn btn-primary" data-toggle="modal" data-target="#modal1" type="button">Se connecter</button><button class="btn btn-primary" data-toggle="modal" data-target="#modal2" type="button">Créer un compte</button></div>
            </div>
        </div>
    </div>
    <h1 class="text-center text-white d-none d-lg-block site-heading"><span class="site-heading-lower">INSIC CUISINE</span></h1>
    <nav class="navbar navbar-light navbar-expand-lg bg-dark py-lg-4" id="mainNav">
        <div class="container"><a class="navbar-brand text-uppercase d-lg-none text-expanded" href="#">INSIC CUISINE</a><button data-toggle="collapse" data-target="#navbarResponsive" class="navbar-toggler" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href="index.html">Accueil</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.html">A propos</a></li>
                    <li class="nav-item"><a class="nav-link" href="products.html">Nos meubles</a></li>
                    <li class="nav-item"><a class="nav-link" href="store.php">Réaliser une commande</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="team-grid" style="height: auto;">
        <div class="container" style="max-height: auto;max-width: auto;width: 1920;">
            <div class="intro">
                <h2 class="text-center" data-bss-hover-animate="pulse">Cuisine en ligne</h2>
                <p class="text-center">Très bon choix ! <br>Une cuisine simple et efficace.</p>
            </div>
            <div class="row row-cols-1 people">
                <div class="col-lg-12 text-center"><img src="assets/img/untitled.png" style="align-items: center;width: 930px;"></div>
                <div class="col text-center" style="margin-top: 30px;">
                    <form action="store.php" method="post" >
                        <h4>Options générale</h4>
                        <label>Couleurs des meubles :&nbsp;
                            <select name="couleurs">
                                <optgroup label="Couleurs">
                                    <option value="0">Noir</option>
                                    <option value="1">Crème</option>
                                    <option value="2">Rouge</option>
                                </optgroup>
                            </select>
                        </label>
                        <p></p>
                        <label>Matière du plan de travail :&nbsp;
                            <select name="planTravail">
                                <optgroup label="Matière plan de travail">
                                    <option value="0">Bois</option>
                                    <option value="1">Marbre</option>
                                </optgroup>
                            </select>
                        </label>
                        <p></p>
                        <label>Style des poignées :&nbsp;
                            <select name="poignees">
                                <optgroup label="Poignees">
                                    <option value="0">Moderne</option>
                                    <option value="1">Arrondie</option>
                                </optgroup>
                            </select>
                        </label>
                        <p></p>
                        <h4>Options modules</h4>
                        <label>Îlot central :&nbsp;
                            <select name="ilot">
                                <optgroup label="ilot">
                                    <option value="0">Oui</option>
                                    <option value="1">Non</option>
                                </optgroup>
                            </select>
                        </label>
                        <p></p>
                        <label>Type d'évier :&nbsp;
                            <select name="evier">
                                <optgroup label="Evier">
                                    <option value="0">Simple bac</option>
                                    <option value="1">Double bac</option>
                                </optgroup>
                            </select>
                        </label>
                        <p></p>
                        <label>Type d'hotte :&nbsp;
                            <select name="hotte">
                                <optgroup label="hotte">
                                    <option value="0">LKGTU564</option>
                                    <option value="1">MPODR509</option>
                                    <option value="2">TRDOPA87</option>
                                </optgroup>
                            </select>
                        </label>
                        <p></p>
                        <button class="btn btn-primary" type="submit" name="refresh">Refresh</button>
                        <label>&nbsp;</label>
                        <button class="btn btn-primary" type="submit" name="terminer">Terminer ma cuisine</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-basic">
        <footer>
            <div class="social"><a href="https://github.com/Little-Groundhog/Insic-Cuisine"><i class="icon ion-social-github"></i></a><a href="https://mines-nancy.univ-lorraine.fr/formation/ingenieur-de-specialite-ingenierie-de-conception-ic/"><i class="icon ion-briefcase"></i></a></div>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="index.html">Accueil</a></li>
                <li class="list-inline-item"><a href="about.html">A propos</a></li>
                <li class="list-inline-item"><a href="products.html">Nos meubles</a></li>
                <li class="list-inline-item"><a href="store.php">Réaliser une commande</a></li>
            </ul>
            <p class="copyright">Insic Cusine @2020</p>
        </footer>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/Animated-Typing-With-Blinking.js"></script>
    <script src="assets/js/current-day.js"></script>
</body>

</html>