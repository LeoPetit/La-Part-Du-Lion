<nav class="navbar navbar-expand-lg" >
    <?php
        if(!isset($_SESSION["utilisateur"]->pseudo)) {
            echo anchor('Utilisateur_Controller', 'Se connecter', 'class="nav-link connexion"');
        } else {
            echo "<p class='welcome'>Bienvenue, " . $_SESSION["utilisateur"]->pseudo . "</p>";
            echo anchor('Utilisateur_Controller/deconnection/', 'Se déconnecter', 'class="nav-link deconnexion"');
        }
    ?>
    <div  id="test"  class="navtitle col-lg-12">La Part du Lion</div>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>


    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav col-lg-3">
            <li class="nav-item">
                <?php echo anchor('Welcome', 'Accueil', 'class="nav-link"') ?>
            </li>
            <li class="nav-item">
                <?php echo anchor('index.php/Welcome/show/', 'Forum', 'class="nav-link"') ?>
            </li>
            <li class="nav-item">
                <?php echo anchor('Welcome/telecharger', 'Télécharger', 'class="nav-link" id="presentationButton"') ?>
            </li>
        </ul>

        <a class="brand"><img class="logo" src="<?php echo base_url()?>application/assets/images/logos/png/logo.png" alt=""></a>

        <ul class="navbar-nav col-lg-3">
            <li class="nav-item dropdown" >
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Jeu
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php echo anchor('Coordonnees_Controller', 'Map', 'class="dropdown-item"') ?>
                    <div class="dropdown-divider"></div>

                    <?php
                    if(isset($_SESSION["utilisateur"]->pseudo))
                        echo anchor('Item_Controller', 'Boutique', 'class="dropdown-item"');
                    else
                        echo anchor('Utilisateur_Controller', 'Boutique', 'class="dropdown-item"');
                    ?>
                </div>
            </li>

            <li class="nav-item">
                <?php
                if(isset($_SESSION["utilisateur"]->pseudo))
                 echo anchor('Utilisateur_Controller/modification/', 'Mon compte', 'class="nav-link"');
                else
                echo anchor('Utilisateur_Controller', 'Mon compte', 'class="nav-link"');
                ?>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Mon Clan
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php
                        if(isset($_SESSION["utilisateur"]->pseudo))
                            echo anchor('Equipe_Controller', 'Progression', 'class="dropdown-item"');
                        else
                            echo anchor('Utilisateur_Controller', 'Progression', 'class="dropdown-item"');
                    ?>
                    <div class="dropdown-divider"></div>
                    <?php echo anchor('index.php/Welcome/show/', 'Arbre de compétences', 'class="dropdown-item"') ?>
                </div>
            </li>
            <li class="nav-item">
                <?php
                if(!isset($_SESSION["utilisateur"]->pseudo)) {
                    echo anchor('Utilisateur_Controller', 'Se connecter', 'class="nav-link phoneConnexion"');
                } else {
                    echo anchor('Utilisateur_Controller/deconnection/', 'Se déconnecter', 'class="nav-link phoneDeconnexion"');
                }
                ?>
            </li>
        </ul>

<!--        <form class="form-inline ">-->
<!--            <button class="btn btn-outline-success" type="button">Se Connecter</button>-->
<!--        </form>-->
    </div>
</nav>