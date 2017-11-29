<nav class="navbar navbar-expand-lg navbar-fixed-top">
    <?php echo anchor('index.php/Utilisateur_Controller/show/', 'Se connecter', 'class="nav-link connexion"') ?>
    <div class="navbar-brand col-lg-12">La Part du Lion</div>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>


    <div class="collapse navbar-collapse" id="navbarSupportedContent" >

        <ul class="navbar-nav col-lg-3">
            <li class="nav-item">
                <?php echo anchor('Utilisateur_Controller/show/', 'Accueil', 'class="nav-link"') ?>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../Forum/index.php">Forum</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Présentation</a>
            </li>
        </ul>

        <a class="brand"><img class="img-responsive logo" src="../divers/images/logos/png/logo.png" alt=""></a>

        <ul class="navbar-nav col-lg-3">
            <li class="nav-item dropdown" >
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Jeu
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Map</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Boutique</a>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">Mon Compte</a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Mon Clan
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Progression</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Arbre de compétences</a>
                </div>
            </li>
        </ul>

<!--        <form class="form-inline ">-->
<!--            <button class="btn btn-outline-success" type="button">Se Connecter</button>-->
<!--        </form>-->
    </div>
</nav>