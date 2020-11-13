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
                <div class="col-md-6"><img class="img-fluid" src="assets/img/bg.jpg" alt="cuisine_exemple"></div>

  <!-- text field -->
  <form action="store.php" method="post" >
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
if(isset($_POST["go"]))//Quand le bouton envoyer est pressé
{
    try
    {
      $bdd = new PDO('mysql:host=localhost;dbname=iblkmqyy_cuisine;charset=utf8', 'iblkmqyy_cuisine', 'Marmotte8');
      $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (Exception $e)
    {
            die('Erreur : ' . $e->getMessage());
    }

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
