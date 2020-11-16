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
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/material-icons.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/Features-Clean.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/Team-Clean.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
    <link rel="shortcut icon" href="TemplateData/favicon.ico">
    <link rel="stylesheet" href="TemplateData/style.css">
    <script src="TemplateData/UnityProgress.js"></script>
    <script src="Build/UnityLoader.js"></script>
    <script>
        var unityInstance = UnityLoader.instantiate("unityContainer", "Build/Desktop.json", {onProgress: UnityProgress});
    </script>
</head>

<body style="background: linear-gradient(rgba(135,135,135,0.65), rgba(255,255,255,0.65) 51%, rgba(105,105,105,0.65) 100%);">
    <h1 class="text-center text-white d-none d-lg-block site-heading"><span class="text-primary site-heading-upper mb-3">CRÉONS votre cuisine ensemble&nbsp;</span><span class="site-heading-lower">INSIC CUISINE</span></h1>
    <nav class="navbar navbar-light navbar-expand-lg bg-dark py-lg-4" id="mainNav">
        <div class="container"><a class="navbar-brand text-uppercase d-lg-none text-expanded" href="#">INSIC CUISINE</a><button data-toggle="collapse" data-target="#navbarResponsive" class="navbar-toggler" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div
                class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="nav navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Accueil</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.php">A propos</a></li>
                    <li class="nav-item"><a class="nav-link" href="products.php">Nos meubles</a></li>
                    <li class="nav-item"><a class="nav-link" href="store.php">Configurateur</a></li>
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
            <div class="row">
                <div class="col-md-6">
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
<!-- text field -->
  <form action="store.php" method="post" ><br>
    <h1>Tests avec CATIA</h1><br>
      <h2>Paramérage du placard</h2><br>

    <label class="formulaire_client" for="nom">
        Largeur :<br>
        <input type="text" name="largeur" value="" placeholder="largeur"/>
    </label><br>

    <label class="formulaire_client" for="prenom">
        Hauteur :<br>
        <input type="text" name="hauteur" value="" placeholder="hauteur"/>
    </label><br>

    <label class="formulaire_client" for="telephone">
        Profondeur :<br>
        <input type="text" name="profondeur" value="" placeholder="profondeur"/>
    </label><br>

  <!-- hidden inputs -->
      <input type="submit" value="Envoyer 😋" name="go_param_placard"/>
</form>
<?php
if(isset($_POST["go_param_placard"]))//Quand le bouton envoyer est pressé pour le paramétre placard
{
    $largeur = $_POST["largeur"];
    $hauteur = $_POST["hauteur"];
    $profondeur = $_POST["profondeur"];

    //Envoi dans la base de donnée
    $sql = $bdd->prepare ("INSERT INTO placard_bas VALUES
                                    (:largeur, :hauteur, :profondeur, 0, 0, 0, 0, 0, 0)");

    $sql->bindParam(':largeur',$largeur);
    $sql->bindParam(':hauteur',$hauteur);
    $sql->bindParam(':profondeur',$profondeur);
    $sql->execute();
}
?>
<div class="row">
    <div class="webgl-content">
      <div id="unityContainer" style="width: 960px; height: 600px"></div>
      <div class="footer">
        <div class="webgl-logo"></div>
        <div class="fullscreen" onclick="unityInstance.SetFullscreen(1)"></div>
        <div class="title">New Unity Project</div>
      </div>
    </div>
</div>
</div>
                <div class="col-md-6"><!-- text field -->
  <form action="store.php" method="post" ><br>
    <h1>Formulaire de contact</h1><br>

    <label class="formulaire_client" for="nom">
        Nom 😀 :<br>
        <input type="text" name="nom" value="" placeholder="Nom"/>
    </label>

    <label class="formulaire_client" for="prenom">
        Prénom 😎 :<br>
        <input type="text" name="prenom" value="" placeholder="Prénom"/>
    </label><br>

    <label class="formulaire_client" for="telephone">
        Téléphone 📱 :<br>
        <input type="text" name="telephone" value="" placeholder="Téléphone"/>
    </label><br>

    <label class="formulaire_client" for="adresse">
        Adresse 🏠 :<br>
        <input type="text" name="adresse" value="" placeholder="Adresse"/>
    </label>

    <label class="formulaire_client" for="code_postal">
        Code postal ✉ :<br>
        <input type="text" name="codePostal" value="" placeholder="Code Postal"/>
    </label><br>

    <label class="formulaire_client" for="mail">
        Adresse email 💻 :<br>
        <input type="email" name="mail" value="" placeholder="Adresse mail"/>
    </label><br>

  <!-- hidden inputs -->
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
}
?>
                    <div class="btn-toolbar"></div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer text-faded text-center py-5">
        <div class="container">
            <p class="m-0 small">Copyright&nbsp;©&nbsp;cuisine Insic 2020</p>
        </div>
    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/current-day.js"></script>
</body>

</html>