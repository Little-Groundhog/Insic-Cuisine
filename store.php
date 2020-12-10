<?php
@session_start(); //Lancement de la session pour les cookies
setcookie('IDClientCookies', 2, time() + 365*24*3600, null, null, false, true);
setcookie('email', 'null@mail.com', time() + 365*24*3600, null, null, false, true);
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
    <script>
        function IDClient(){
            document.getElementById("ID").innerHTML = <?php echo $_COOKIE['IDClientCookies']; ?>;
        }
    </script>
</head>

<body style="background: linear-gradient(rgba(0,0,0,0.49), rgba(153,146,143,0.4626405090137858) 34%, rgba(255,255,255,0.65) 100%);">
    <?php
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=iblkmqyy_cuisine;charset=utf8', 'iblkmqyy_cuisine', 'Marmotte8');
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
    ?>
    <div class="container-fluid text-right" style="margin: 0;padding: 0;" id="ID">Actuellement non connecté   <button class="btn btn-primary" data-toggle="modal" data-target="#modal1" type="button">Se connecter</button>
        <div class="modal fade"
             role="dialog" tabindex="-1" id="modal1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Connexion</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                    <form method="post" action="store.php"><br>
                        <label class="connexion" for="email">
                            Email :<br>
                            <input type="email" name="email" placeholder="Email" required/>
                        </label><br>

                        <label class="connexion" for="password">
                            Mot de passe :<br>
                            <input type="password" name="motDePasse" required/>
                        </label><br>

                        <input type="submit" value="Connexion" name="connexion"/>
                    </form>
                </div>
            </div>
            <?php
                $IDClient = 0;
                if(isset($_POST["connexion"]))//Quand le bouton envoyer est pressé pour le formulaire client
                {
                    $sql = $bdd->prepare("SELECT IDClient FROM client WHERE mail = 'maximebelcour@gmail.com' AND motDePasse = 'admin'");
                    $sql->execute(array('mail' => $_POST["email"], 'mdp' => $_POST["Password"]));

                    $donnees =0;//init

                    while($donnees = $sql->fetch())
                    {
                        $IDClient = $donnees['IDClient'];
                        setcookie('IDClientCookies', $IDClient, time() + 365 * 24 * 3600, null, null, false, true);//Mise à jour du cookies
                        echo '<script> IDClient(); </script>';//Lancement du script pour l'affichage de l'ID en haut de page
                    }

                    $sql->closeCursor();//Fin de la requete
                }
            ?>
        </div><strong>&nbsp; &nbsp;&nbsp;</strong><button class="btn btn-primary text-right" type="button">Créer un compte</button></div>
    <h1 class="text-center text-white d-none d-lg-block site-heading"><span class="site-heading-lower">INSIC CUISINE</span></h1>
    <nav class="navbar navbar-light navbar-expand-lg bg-dark py-lg-4" id="mainNav">
        <div class="container"><a class="navbar-brand text-uppercase d-lg-none text-expanded" href="#">INSIC CUISINE</a><button data-toggle="collapse" data-target="#navbarResponsive" class="navbar-toggler" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div
                class="collapse navbar-collapse" id="navbarResponsive">
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
                <h2 class="text-center">Zone en tests <br> <?php echo "Cookie named IDClientCookies '" . $IDClient . "'"; ?></h2>
                <p class="text-center">Emplacement pour les formulaires en relation avec la base de données et CATIA, ici tout peut arriver 😉</p>
            </div>
            <div class="buttons"><a class="btn btn-primary" role="button" href="index.html">Retourner en sécurité</a></div>
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
                <div class="col-md-6"><form action="store.php" method="post" ><br>
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
                    <?php
                    if(isset($_POST["go_param_placard_haut"]))//Quand le bouton envoyer est pressé pour le paramétre placard
                    {
                        $largeur = $_POST["largeur_haut"];
                        $hauteur = $_POST["hauteur_haut"];
                        $profondeur = $_POST["profondeur_haut"];
                        $nombre_etagere = $_POST["nombre_etagere_haut"];


                        //Envoi dans la base de données
                        $sql = $bdd->prepare ("INSERT INTO placard_haut (largeur, hauteur, profondeur, etagere)
                                        VALUES (:largeur/100, :hauteur/100, :profondeur/100, :nombre_etagere)");

                        $sql->bindParam(':largeur',$largeur);
                        $sql->bindParam(':hauteur',$hauteur);
                        $sql->bindParam(':profondeur',$profondeur);
                        $sql->bindParam(':nombre_etagere',$nombre_etagere);
                        $sql->execute();
                        $sql->closeCursor();
                    }
                    ?>
                </div>
                <div class="col-md-6">
                      <form action="store.php" method="post" ><br>
                        <h1>Formulaire de contact</h1><br>

                        <label class="formulaire_client" for="nom">
                            Nom 😀 :<br>
                            <input type="text" name="nom" value="" placeholder="Nom" required/>
                        </label>

                        <label class="formulaire_client" for="prenom">
                            Prénom 😎 :<br>
                            <input type="text" name="prenom" value="" placeholder="Prénom" required/>
                        </label><br>

                        <label class="formulaire_client" for="telephone">
                            Téléphone 📱 :<br>
                            <input type="text" name="telephone" value="" placeholder="Téléphone" required/>
                        </label><br>

                        <label class="formulaire_client" for="adresse">
                            Adresse 🏠 :<br>
                            <input type="text" name="adresse" value="" placeholder="Adresse" required/>
                        </label>

                        <label class="formulaire_client" for="code_postal">
                            Code postal ✉ :<br>
                            <input type="text" name="codePostal" value="" placeholder="Code Postal" required/>
                        </label><br>

                        <label class="formulaire_client" for="mail">
                            Adresse email 💻 :<br>
                            <input type="email" name="mail" value="" placeholder="Adresse mail" required/>
                        </label><br>

                          <input type="submit" value="Envoyer 😘" name="go"/>
                      </form>
                    <?php
                        if(isset($_POST["go"]))//Quand le bouton envoyer est pressé pour le formulaire client
                        {
                            $nom = $_POST["nom"];
                            $prenom = $_POST["prenom"];
                            $adresse = $_POST["adresse"];
                            $codePostal = $_POST["codePostal"];
                            $telephone = $_POST["telephone"];
                            $mail = $_POST["mail"];

                            //Envoi dans la base de donnée
                            $sql = $bdd->prepare ("INSERT INTO client VALUES
                              (:nom, :prenom, :adresse, :codePostal, :telephone, :mail)");

                            $sql->bindParam(':nom',$nom);
                            $sql->bindParam(':prenom',$prenom);
                            $sql->bindParam(':adresse',$adresse);
                            $sql->bindParam(':codePostal',$codePostal);
                            $sql->bindParam(':telephone',$telephone);
                            $sql->bindParam(':mail',$mail);
                            $sql->execute();
                            $sql->closeCursor();
                        }
                    ?>
                    <div class="btn-toolbar"></div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
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
                    <?php
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
                    ?>

                </div>
                <div class="col-md-6">
                  <form action="store.php" method="post" ><br>
                    <h1>Tests avec CATIA</h1><br>
                      <h2>Paramétrage du placard</h2><br>

                    <label class="formulaire_placard_bas" for="nom">
                        Largeur (Compris entre 60 et 100 cm) :<br>
                        <input type="number" min="60" max="100" name="largeur" value="" placeholder="" required/>
                    </label><br>

                    <label class="formulaire_placard_bas" for="prenom">
                        Hauteur (Compris entre 80 et 100 cm) :<br>
                        <input type="number" min="80" max="100" name="hauteur" value="" placeholder="" required/>
                    </label><br>

                    <label class="formulaire_placard_bas" for="telephone">
                        Profondeur (Compris entre 40 et 80 cm) :<br>
                        <input type="number" min="40" max="80" name="profondeur" value="" placeholder="" required/>
                    </label><br>

                      <label class="formulaire_placard_bas" for="nombre_etagere">
                          Nombre d'étagères (Compris entre 0 et 3) :<br>
                          <input type="number" min="0" max="3" name="nombre_etagere" value="" placeholder="" required/>
                      </label><br><br>

                      <input type="submit" value="Envoyer 😋" name="go_param_placard"/>
                  </form>
                    <?php
                        if(isset($_POST["go_param_placard"]))//Quand le bouton envoyer est pressé pour le paramétre placard
                        {
                            $largeur = $_POST["largeur"];
                            $hauteur = $_POST["hauteur"];
                            $profondeur = $_POST["profondeur"];
                            $nombre_etagere = $_POST["nombre_etagere"];

                            $eta1 = "false";
                            $eta2 = "false";
                            $eta3 = "false";

                            if($nombre_etagere >= 1){
                                $eta1 = "true";
                            }
                            if($nombre_etagere >= 2){
                                $eta2 = "true";
                            }
                            if($nombre_etagere >= 3){
                                $eta3 = "true";
                            }

                            //Envoi dans la base de données
                            $sql = $bdd->prepare ("INSERT INTO placard_bas (IDClient, largeur, hauteur, profondeur, etagere)
                                        VALUES (:IDClient, :largeur/100, :hauteur/100, :profondeur/100, :nombre_etagere)");

                            $sql->bindParam(':IDClient',$_COOKIE['IDClientCookies']);
                            $sql->bindParam(':largeur',$largeur);
                            $sql->bindParam(':hauteur',$hauteur);
                            $sql->bindParam(':profondeur',$profondeur);
                            $sql->bindParam(':nombre_etagere',$nombre_etagere);
                            $sql->execute();
                            $sql->closeCursor();
                        }
                    ?>
                </div>
            </div>
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
