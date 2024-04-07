<!-- createPot -->
<section id="createPot" class="create-pot-section">
    <div class="container page-create-pot">

        <!-- create-pot-title -->
        <div class="title-page">
            <h1>
                <strong id="titlePage">
                    
                </strong>
            </h1>
            
        </div>

        <!-- create-pot-choices -->
        <div class="create-pot-choices">
            <!-- Pot types types -->
            <div class="types">
                <?php
                    foreach($potTyp as $pt){
                ?>
                    
                    <a href="<?= URL ?>caisses/<?= $pt->getSlug() ?>" 
                    class="category"> 
                        
                        <div class="category__icon">
                            <img src="<?= URL ?>Public/assets/img/icons/<?= $pt->getSlug() ?>.svg" alt="<?= $pt->getSlug() ?>">
                        </div>
                        <div class="category__description">
                            <h2 class="category_name">
                                <?= $pt->getName() ?>
                            </h2>
                            <p class="category_intro">
                                <?= $pt->getDescription() ?>
                            </p>
                        </div>
                    </a>
                <?php
                    }
                ?>
            </div>

            <!-- Pot types categories -->
            <div class="container pot-choices">
                <div class="pot-categories">
                    <?php
                     if(!empty($cat)){
                        foreach($cat as $v){
                    ?>
                        <a href="<?= URL.'finalisation/'.$v->getSlug()?>" class="category-card">
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
        </div>

        <!-- Types mobile -->
        <div class="types-sticky-bottom">
            <?php
                foreach($potTyp as $pt){
            ?>
                <a href="<?= URL ?>caisses/<?= $pt->getSlug() ?>" 
                class="category"> 
                    <div class="category__icon">
                        <img src="<?= URL ?>Public/assets/img/icons/<?= $pt->getSlug() ?>.svg" alt="<?= $pt->getSlug() ?>">
                    </div>
                </a>
            <?php
                }
            ?>
        </div>
    </div>
</section>