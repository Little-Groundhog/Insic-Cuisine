<?php
    @session_start(); //Lancement de la session pour les cookies
    if($_COOKIE['IDClientCookies'] == 0 or $_COOKIE['IDClientCookies'] == NULL){
        setcookie('IDClientCookies', 0, time() + 365*24*3600, null, null, false, true);
    }
    setcookie('pseudo', 'Non connecté', time() + 365*24*3600, null, null, false, true);
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
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/fonts/material-icons.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/Animated-Typing-With-Blinking.css">
    <link rel="stylesheet" href="assets/css/Features-Clean.css">
    <link rel="stylesheet" href="assets/css/Footer-Basic.css">
    <link rel="stylesheet" href="assets/css/Highlight-Blue.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="assets/css/Modern-Contact-Form.css">
    <link rel="stylesheet" href="assets/css/Team-Clean.css">
    <link rel="stylesheet" href="assets/css/Team-Grid.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
</head>

<body style="background: linear-gradient(rgba(0,0,0,0.49), rgba(153,146,143,0.4626405090137858) 34%, rgba(255,255,255,0.65) 100%);">
    <?php
        //TODO rajouter le script IDCLient
        //TODO mettre à jour sur le serveur avec les bons assets
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
    ?>
    <div class="modal fade" role="dialog" tabindex="-1" id="modal2">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" style="color: var(--dark);">Créer un compte</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <form action="store.php" method="post" >
                    <div class="modal-body">
                        <p>Bienvenue dans l'équipe 🤩</p>
                        <label>Nom :&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</label><input name="cnom" type="text">
                        <p></p><label>Prénom :&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label><input name="cprenom" type="text">
                        <p></p><label>Pseudo:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</label><input name="cpseudo" type="text">
                        <p></p><label>Mot de passe :&nbsp; &nbsp;</label><input name="cpassword" type="text">
                        <p></p><label>Budget :&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</label><input name="cbudget" type="text">
                        <p style="color: var(--blue);">Paramétrage des dimensions de la cuisine :</p>
                        <p></p><label>Longueur (mètres):&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label><input name="clongueur" type="text">
                        <p></p><label>Largeur (mètres):&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label><input name="clargeur" type="text">
                        <p></p>
                    </div><img src="https://user-images.githubusercontent.com/62706579/115725262-fb783580-a381-11eb-9340-d8195fc14841.jpg">
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-light" type="button" data-dismiss="modal">J'abandonne honteusement</button>
                        <button type="submit" class="btn btn-primary" name="createCompte" type="button">Créer mon compte</button>
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
                        <label>Pseudo :&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</label><input name="pseudo" type="text">
                        <p></p>
                        <label>Mot de passe :&nbsp;</label><input name="password" type="password">
                    </div>
                    <div class="modal-footer"><button class="btn btn-light" type="button" data-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-light" data-toggle="modal" data-target="#modal2" type="button">Créer un compte</button>
                        <button type="submit" name="connexion" class="btn btn-primary" type="button">Se connecter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div>
        <div class="container">
            <div class="row">
                <?php echo "Bienvenue '" . $_COOKIE['pseudo'] . "' votre ID est : '".$_COOKIE['IDClientCookies']."'"; ?>
                <div class="col text-right" style="padding-right: 0px;padding-left: 0px;">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modal1" type="button">Se connecter</button>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modal2" type="button">Créer un compte</button>
                </div>
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
    <section class="page-section about-heading">
        <div class="container">
            <div class="about-heading-content"></div>
        </div>
    </section>
    <div>
        <div class="container-fluid text-left">
            <section class="getintouch" style="background: url(&quot;https://user-images.githubusercontent.com/22176758/106576418-62354200-653d-11eb-8de8-b4182f77ac80.png&quot;);background-size: cover;"></section>
        </div>
    </div>
    <div></div>
    <div class="team-grid">
        <div class="container">
            <div class="intro">
                <h2 class="text-center">Choix de la cuisine</h2>
                <p class="text-center">Choisir le style de sa cuisine implique de grandes responsabilités !<br>Une fois sélectionnée plus de retour en arrière possible.</p>
            </div>
            <div class="row people">
                <div class="col item" style="width: 320;">
                    <div class="box" style="background: url(&quot;assets/img/ligne.jpg&quot;) center / cover;">
                        <div class="cover" style="background: rgba(31,147,255,0.75);">
                            <h3 class="name">Cuisine en Ligne</h3>
                            <p class="title">Pour les petits espaces</p><a class="btn btn-primary" role="button" href="ligne.php">Sélectionner</a>
                        </div>
                    </div>
                </div>
                <div class="col item">
                    <div class="box" style="background: url(&quot;assets/img/angle.jpg&quot;) center / cover;">
                        <div class="cover">
                            <h3 class="name">Cuisine en Angle</h3>
                            <p class="title">Pour les familles</p><a class="btn btn-primary" role="button" href="angle.php">Sélectionner</a>
                        </div>
                    </div>
                </div>
                <div class="col item" style="width: 320;">
                    <div class="box" style="background: url(&quot;assets/img/u.jpg&quot;) center / cover;">
                        <div class="cover">
                            <h3 class="name">Cuisine en U</h3>
                            <p class="title">Pour les grandes surfaces ouvertes</p><a class="btn btn-primary" role="button" href="u.php">Sélectionner</a>
                        </div>
                    </div>
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
    <script src="assets/js/Animated-Typing-With-Blinking.js"></script>
    <script src="assets/js/current-day.js"></script>
</body>

</html>