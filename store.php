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
    <link rel="stylesheet" href="assets/fonts/material-icons.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/Features-Clean.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://s.pageclip.co/v1/pageclip.css">
    <link rel="stylesheet" href="assets/css/Team-Clean.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
</head>

<body style="background: linear-gradient(rgba(135,135,135,0.65), rgba(255,255,255,0.65) 51%, rgba(105,105,105,0.65) 100%);">
    <?php
        $bdd = new PDO('mysql:host=cuisine.czdtdui8tllu.us-east-1.rds.amazonaws.com;dbname=cuisine;charset=utf8', 'admin', 'marmotte');
    ?>
    <h1 class="text-center text-white d-none d-lg-block site-heading"><span class="text-primary site-heading-upper mb-3">CRÉONS votre cuisine ensemble&nbsp;</span><span class="site-heading-lower">INSIC CUISINE</span></h1>
    <nav class="navbar navbar-light navbar-expand-lg bg-dark py-lg-4" id="mainNav">
        <div class="container"><a class="navbar-brand text-uppercase d-lg-none text-expanded" href="#">INSIC CUISINE</a><button data-toggle="collapse" data-target="#navbarResponsive" class="navbar-toggler" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div
                class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="nav navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href="index.html">Accueil</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.html">A propos</a></li>
                    <li class="nav-item"><a class="nav-link" href="products.html">Nos meubles</a></li>
                    <li class="nav-item"><a class="nav-link" href="store.html">Configurateur</a></li>
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
        <div class="container">
            <div class="row">
                <div class="col-md-6"><img class="img-fluid" src="assets/img/bg.jpg"></div>
                <div class="col-md-6"><form action="https://send.pageclip.co/QDUsPPaRQQDEqDT89SEa4pzJnajF1Yh7" class="pageclip-form" method="post">

  <!-- text field -->
  <br><input type="text" name="name" value="John Doe"/><br>
  <input type="email" name="email" value="john.doe@exemple.com"/><br><br>

  <select name="heardFrom">
    <option value="ph" selected>Cuisine bleue</option>
    <option value="hn">Cuisine rouge</option>
  </select><br>

  <!-- radio buttons -->
  <input type="radio" name="Evier" value="simple" id="evier" checked/>
  <label htmlFor="tarantula">Evier</label>

  <input type="radio" name="Evier2" value="double" id="evier2"/>
  <label htmlFor="turtle">Evier double</label><br>

  <!-- checkboxes -->
  <input type="checkbox" name="pizza" id="pizza" checked/>
  <label htmlFor="pizza">Poignées 🍕</label>

  <input type="checkbox" name="frites" id="frites"/>
  <label htmlFor="yams">Pieds 🍠</label><br>

  <!-- hidden inputs -->
  <button type="submit" class="pageclip-form__submit">
    <span>Send</span>
  </button>
</form>
                    <div class="btn-toolbar">
                        <div class="btn-group" role="group"><button class="btn btn-primary" type="button">Button 1</button><button class="btn btn-primary" type="button">Button 2</button></div>
                        <div class="btn-group" role="group"><button class="btn btn-primary" type="button">Button 1</button><a class="btn btn-primary" role="button">Button 2</a></div>
                    </div>
                    <div class="btn-group"><button class="btn btn-primary" type="button">Button </button><button class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-expanded="false" type="button"></button>
                        <div class="dropdown-menu"><a class="dropdown-item" href="#">First Item</a><a class="dropdown-item" href="#">Second Item</a><a class="dropdown-item" href="#">Third Item</a></div>
                    </div>
                    <div class="dropdown"><button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button">Dropdown </button>
                        <div class="dropdown-menu"><a class="dropdown-item" href="#">First Item</a><a class="dropdown-item" href="#">Second Item</a><a class="dropdown-item" href="#">Third Item</a></div>
                    </div>
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
    <script src="https://s.pageclip.co/v1/pageclip.js"></script>
</body>

</html>
