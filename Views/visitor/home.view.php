<!-- Homepage -->
<section id="homepage">
    <!-- Hero banner -->
    <div class="hero-banner">
        <div class="container">
            <div class="hero-banner-content">
                <div class="title">
                    <h2>
                        Je crée ma caisse pour : 
                    </h2>

                    <!-- Slideshow  -->
                    <div class="slideshow">
                        <div class="slideshow-container">
                            <h3 class="mySlides">
                                Un cadeau commun
                            </h3>

                            <h3 class="mySlides">
                                Un projet personnel ou solidaire
                            </h3>

                            <h3 class="mySlides">
                                Une dépense à plusieurs
                            </h3>
                        </div>

                        <div class="dot-container">
                            <span class="dot" onclick="currentSlide(1)"></span>
                            <span class="dot" onclick="currentSlide(2)"></span>
                            <span class="dot" onclick="currentSlide(3)"></span>
                        </div>  
                    </div>
                    <!-- End Slideshow  -->
                </div>

                <form class="search" >
                    <input type="text" placeholder="Choisissez un nom pour votre caisse" name="pot_name" id="potName">
                    
                    <a href="<?= URL ?>caisses/cadeau" class="btn">
                        Je crée
                    </a>
                </form>
            </div>
        </div>
    </div>
    <!-- End Hero banner -->

    <!-- Pot choices -->
    <div class="container margin-y-3">
        <div class="title-page">
            <h1>
                <strong class="text-secondary">LaCaisseCommune,</strong> comment ça marche ?
            </h1>
        </div>
        
        <!-- Pot types -->
        <div class="how-it-works-1 types-container">
            <div class="types hiw-img">
                <?php
                    foreach($typCat as $v){
                ?>
                    <a href="<?= URL ?>caisses/<?= $v->getSlug() ?>" 
                    class="category focus-<?= $v->getId()?>"> 
                        <div class="category__icon">
                            <img src="<?= URL ?>Public/assets/img/icons/<?= $v->getSlug() ?>.svg" alt="<?= $v->getSlug() ?>">
                        </div>
                        <div class="category__description">
                            <h2 class="category_name">
                                <?= $v->getName() ?>
                            </h2>
                            <p class="category_intro">
                                <?= $v->getDescription() ?>
                            </p>
                        </div>
                    </a>
                <?php
                    }
                ?>
            </div>
            
            <div class="types-description hiw-description">
                <p class="letter-spacing text-secondary">Créer une caisse</p>
                <h2>Une création simple et efficace</h2>
                <p>
                    Créez et personnalisez votre caisse en quelques clics. Puis partagez-la pour récolter des dons et le tour est joué !
                </p>
            </div>
        </div>

        <div class="how-it-works-2 types-container">
            <div class="types-description hiw-description">
                <p class="letter-spacing text-secondary">Participer à un projet</p>
                <h2>Une contribution sans prise de tête</h2>
                <p>
                    En tant que contributeur, vous pouvez participer à un projet. Mentionnez votre pseudo et laissez un commentaire afin d'y apporter votre soutien.
                </p>
            </div>
            <div class="part part-img hiw-img">
                <img src="<?=URL?>Public/assets/img/homepage/laptop.svg" alt="laptop svg">
            </div>
        </div>
        <div class="how-it-works-1 types-container">
            <div class="part part-img hiw-img">
            <img src="<?=URL?>Public/assets/img/homepage/shop.svg" alt="laptop svg">
            </div>
            <div class="types-description hiw-description">
                <p class="letter-spacing text-secondary">Consulter l'évolution des caisses</p>
                <h2>Un suivi en temps réel de vos projets</h2>
                <p>
                    Gardez un oeil sur les caisses que vous avez créées et celles auquelles vous avez participé. Vous recevrez une notification lorsque l'objectif de celle-ci sera atteint.
                </p>
            </div>
        </div>
    </div>
    <!-- / Pot choices -->
</section>
<!-- / Homepage -->