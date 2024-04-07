<!-- createPot -->
<section id="createPot">
    <div class="container">

        <!-- create-pot-choices -->
        <div class="create-pot-choices">
            <div class="types">
                <div class="category focus-4 type-sticky-left"> 
                    <div class="category__icon">
                    <img src="<?= URL ?>Public/assets/img/icons/mes-caisses.svg" alt="mes-caisses">
                    </div>

                    <div class="category__description">
                        <h2 class="category_name">
                            Mes caisses
                        </h2>
                        <p class="category_intro">
                            Ici, je retrouve les caisses que j'ai pu concevoir
                        </p>
                    </div>
                </div>
            </div>

            <!-- Pot types categories -->
            <div class="container pot-choices">
                <!-- <h2>Cadeau commun :</h2>

                <p>Les pots en cadeau commun</p> -->
                <div class="pot-categories">
                    <?php
                        if(!empty($cat)){
                            foreach($cat as $v){
                    ?>
                    
                        <a href="<?= URL.'caisse/'.$v->getSlug().'/'.$v->getId() ?>" class="category-card">
                            <div class="cat-card--image">
                                <img src="<?= URL ?>Public/assets/img/photos/<?= $v->getPhoto() ?>" alt="<?= $v->getPhoto() ?> image caisse  la caisse commune">
                            </div>
                            <div class="cat-card--title">
                                <h4><?= $v->getName() ?></h4>
                            </div>
                        </a>
                    <?php
                            }
                        }
                    ?>
                </div>
                <!-- <h2>Dépense collective :</h2>
                <p>Les pots en depenses co</p> -->


            </div>
            <!-- End pot types categories -->
        </div>
        <!-- / create-pot-choices -->
    </div>
</section>
<!-- / createPot -->