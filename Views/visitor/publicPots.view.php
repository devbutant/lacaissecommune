<!-- createPot -->
<section id="createPot">
    <div class="container">

        <!-- create-pot-choices -->
        <div class="create-pot-choices">
            <div class="types">
                <div class="category focus-5 type-sticky-left"> 
                    <div class="category__icon">
                    <img src="<?= URL ?>Public/assets/img/icons/caisses.svg" alt="caisses solidaires">
                    </div>

                    <div class="category__description">
                        <h2 class="category_name">
                            Caisses solidaires
                        </h2>
                        <p class="category_intro">
                            Vous retrouverez ici les caisses solidaires
                        </p>
                    </div>
                </div>
            </div>

            <!-- Pot types categories -->
            <div class="container pot-choices">
                <div class="pot-categories">
                    <?php
                        if(!empty($pot)){
                            foreach($pot as $v){
                    ?>
                        <!-- Ajouter l'id pour ajouter une sureté au niveau de l'url ? -->
                        <!-- <a href="<= URL.'caisse/'.$v->getSlug().$v->getId() ?>" class="category-card"> -->
                        <a href="<?= URL.'caisse/'.$v->getSlug().'/'.$v->getId() ?>" class="category-card">
                        <div class="cat-card--image">
                                <img src="<?= URL ?>Public/assets/img/photos/<?= $v->getPhoto() ?>" alt="<?= $v->getPhoto() ?> image caisse la caisse commune">
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
            </div>
            <!-- End pot types categories -->
        </div>
        <!-- / create-pot-choices -->
        </div>
    </div>
</section>
<!-- / createPot -->