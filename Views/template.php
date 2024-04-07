<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <meta name="keywords" content="<?= $keywords ?>" />
        <meta name="description" content="<?= $description ?>" />

        <!-- Mon style CSS  -->
        <link rel="stylesheet" href="<?= URL ?>Public/assets/css/style.css">
        
        <link rel="shortcut icon" href="<?= URL ?>Public/assets/img/favicon/favicon.png" type="image/x-icon">

        <!-- Mon fichier JS  -->
        <script src="<?= URL ?>Public/assets/js/script.js" defer></script>
        <title><?= $titre ?> | La Caisse Commune</title>
    </head>
    <body class="content">

            <div id='navbar' class='navbar-sticked-top stik'>

        <!-- If location = home  -->
        <?php if(empty($_GET['page'])){ ?>
                <nav class="nav-transparent big-container" id="navHome">
                    <div class="navbar">
            <?php } else { ?>
                <nav class="nav-bg ">
                    <div class="navbar big-container">
            <?php } ?>
                        <ul>
                            <li>
                                <a href="<?= URL ?>">
                                    <img src="<?= URL ?>Public/assets/img/lcc-logo.svg" alt="lcc-logo logo lacaissecommune LCC blanc orange">
                                </a>
                            </li>
                            <li>
                                <a href="<?= URL ?>caisses/cadeau">Créer une caisse</a>
                            </li>
                            <li>
                                <a href="<?= URL ?>caisses/caisses-solidaires">Caisses solidaires</a>
                            </li>

                        <!-- If user is log, he can see all the navbar -->
                        <?php
                            if(SecurityController::isLog()) :
                        ?>
                            <li>
                                <a href="<?= URL ?>caisses/mes-caisses">Mes caisses</a>
                            </li>
                            <li>
                                <a href="<?= URL ?>utilisateurs">Utilisateurs</a>
                            </li>
                        </ul>
                            <a href="<?= URL ?>deconnexion" class="login-link">
                                Se déconnecter
                            </a>

                        <?php else : ?>

                            </ul>

                        <?= 
                            (!empty($_GET['page']) && $_GET['page'] === "connexion") ?
                            
                            '<a href="'.URL.'inscription" class="login-link">
                                S\'inscrire
                            </a>' 
                                :
                            '<a href="'.URL.'connexion" class="login-link">
                                Se connecter
                            </a>'
                        ?>
                        <?php endif; ?>
                </nav>
            </div>


            <!-- MENU OVERLAY -->
            <div id="mobile-menu">
                    <!-- MENU ITEMS -->



                    <!-- En repliant la ligne 81, je fais un gain de plus de 40 lignes de codes -->
                    <nav>
                        <ul>
                            <li>
                                <a href="<?= URL ?>">Accueil</a>
                            </li>
                            <li>
                                <a href="<?= URL ?>caisses/cadeau">Créer une caisse</a>
                            </li>
                            <li>
                                <a href="<?= URL ?>caisses/caisses-solidaires">Caisses solidaires</a>
                            </li>

                            <?php
                                if(SecurityController::isLog()) :
                            ?>
                                <li>
                                    <a href="<?= URL ?>caisses/mes-caisses">Mes caisses</a>
                                </li>
                                <li>
                                    <a href="<?= URL ?>utilisateurs">Utilisateurs</a>
                                </li>
                                <li>
                                    <a href="<?= URL ?>deconnexion">Se déconnecter</a>
                                </li>
                            </ul>
                                
                            <?php else : ?>
                                <li>
                                    <a href="<?= URL ?>connexion">Se connecter</a>
                                </li>
                                </ul>

                            <?= 
                                (!empty($_GET['page']) && $_GET['page'] === "connexion") ?
                                
                                '<a href="'.URL.'inscription" class="login-link">
                                    S\'inscrire
                                </a>' 
                                    :
                                '<a href="'.URL.'connexion" class="login-link">
                                    Se connecter
                                </a>'
                            ?>
                            <?php endif; ?>
                        </ul>   
                    </nav>
                </div>
                <!-- HAMBURGER MENU -->
                <div class="hamburger-btn" id="hamburger-btn">
                    <div class="menu-bar1 bar"></div>
                    <div class="menu-bar2 bar"></div>
                    <div class="menu-bar3 bar"></div>
                </div>
            </div>
            <div class="menu-mobile-bg"></div>

            <div class="body-content">

                <!-- background -->
                <img src="<?= URL ?>Public/assets/img/photos/bg-logo-lcc.svg" id="bg-img" alt="logo lacaissecommune">

                <!-- Content -->
                <?= $content ?>
                <!-- / Content -->
            </div>
            

            <!-- Footer -->
            <footer id="footer">
                <div class="footer-content big-container">
                    <div class="first-part">
                        <ul>
                            <li>
                                <a href="<?= URL ?>">
                                    <img src="<?= URL ?>Public/assets/img/lcc-logo.svg" alt="lcc-logo">
                                </a>
                            </li>
                            <li>
                                <span>Copyright 
                                    <span id="copyrightDate"></span>
                                </span>
                            </li>
                            <li>
                                <select name="lang" id="lang" class="select">
                                    <option value="fr" selected>Français</option>
                                    <option value="en">English</option>
                                </select>
                            </li>
                            <li>
                                <p>
                                    LaCaisseCommune vous donne la visibilité sur l’ensemble de vos caisses et leur avancement. LaCaisseCommune ne vous demandera jamais vos identifiants ou mots de passe et ne vous divulguera jamais de conseils financiers.
                                </p>
                            </li>
                            <li>
                                🙏 Nous soutenir : <a href="<?= URL ?>caisse/soutenir-lcc/14" class="text-orange">caisse.soutenir-lcc</a>
                            </li>
                        </ul> 
                    </div>
                    <div class="links-container">
                
                        <ul class="pots-list">
                            <h3><strong>Nos caisses</strong></h3>

                            <li><a href="#">Pot de départ</a></li>
                            <li><a href="#">Cadeau commun</a></li>
                            <li><a href="#">Pot de départ / Retraite</a></li>
                            <li><a href="#">Naissance / Baptême</a></li>
                            <li><a href="#">Voyage</a></li>
                        </ul>

                        <ul class="pots-list">
                            <h3><strong>Notre service</strong></h3>

                            <li><a href="#">Comment ça marche ?</a></li>
                            <li><a href="#">Centre d'aide LaCaisseCommune</a></li>
                            <li><a href="#">Nous contacter</a></li>
                            <li><a href="#">Nos partenaires</a></li>
                        </ul>

                        <ul class="pots-list">
                            <h3><strong>Conditions</strong></h3>

                            <li><a href="#">Mentions légales</a></li>
                            <li><a href="#">Politique de confidentialité</a></li>
                            <li><a href="#">Tarifs</a></li>
                            <li><a href="#">CGU</a></li>
                            <li><a href="#">Plan du site</a></li>
                        </ul>
                    </div>
                </div>
                
            </footer>
            <!-- / Footer -->
            
    </body> 
</html>