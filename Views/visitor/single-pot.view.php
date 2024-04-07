<div class="container">
    <?php 
        if(!empty($pots)){
            foreach($pots as $pot){
    ?>

        <div class="single-pot-content grid-container">
            <!-- Pot details  -->
            <div class="pot-details wrapper-1">
                <div class="pot-image one">

                <div class="img-container">
                    <img src="<?= URL ?>Public/assets/img/photos/<?= $pot->getPhoto()?>" alt="photo caisse <?= $pot->getName(); ?>">
                </div>

                    <!-- <php var_dump($pot->getPhoto()); die;?> -->

                    <!-- introduction -->
                    <div class="pot-introduction">
                        <div class="pot-title">
                            <h2>
                                <strong><?=$pot->getName();?></strong>
                            </h2>
                        </div>
                        <div class="pot-description">
                            <p>
                                <?=$pot->getDescription();?>
                            </p>
                        </div>
                        <div class="pot-dates">
                            <div class="dos">
                                <p>Date d'ouverture :
                                    <span class="pot-date pote-date-end">
                                        <?=$pot->getDateStart();?>
                                    </span>
                                </p>
                            </div>
                            <div class="doe">
                                <p>Date limite :
                                    <span class="pot-date pote-date-end">
                                        <?=$pot->getDateEnd();?>
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Comments -->
                <?php if (!empty($comments)) :?>
                    <div class="pot-comments two">

                        <!-- If comment is not EMPTY -->
                        <?php 
                            foreach($comments as $comment){
                                if ($comment->getComment() != null) :
                            ?>

                            <div class="comment-content">
                                <div class="comment-img">
                                    <img src="<?= URL ?>Public/assets/img/photos/<?= $comment->getPhoto()?>" alt="comment author">
                                </div>
                                <div class="comment-all">
                                    <p class="name">
                                        <?= $comment->getName()?>
                                    </p>
                                    <p class="comment">
                                        <?= $comment->getComment()?>
                                    </p>
                                    </p>
                                </div>
                            </div>

                        <?php 
                            endif;
                            }
                        ?>
                        <!-- / BOUCLE COMMENTAIRE -->
                    </div>

                    <!-- Notifications contributions -->
                    <div class="notif-contributions three">
                        <?php 
                            $nbContributors = 0;
                            foreach($comments as $comment){
                                if ($comment->getSum() != 0) :
                            $nbContributors++;
                        ?>
                            <div class="contribution">
                                <p class="contribution-sum">
                                    + <?= $comment->getSum()?> €
                                </p>
                                <p class="notif">
                                    <span class="name">
                                        <?= $comment->getName()?>
                                    </span> 
                                    à participé le 
                                    <span class="date">
                                        <?= $comment->getDate()?>
                                    </span>
                                     pour la 
                                    <span class="nb-contribution">[n]</span>ème fois
                                </p>
                            </div>
                        <?php 
                            endif;
                        }
                    ?>
                    </div>
                <?php endif; ?>

            </div>

            <!-- Pot infos -->
            <div class="pot-infos">
                <div class="infos-content focus-<?=$pot->getIdType()?>">

                    <h3 class="pot-type "><?= $pot->getNameType(); ?></h3>
                    <p>Objectif : <?=$pot->getSumLimit()?> €</p>

                    <div class="pot-stats">
                        <div class="total">
                            <p class="sum-total">
                                <?=$pot->getTotal()?> €
                            </p>
                            <span>
                                <?=($pot->getTotal() <= 1) ? 'Collecté' : 'Collectés' ?>    
                            </span>
                        </div>
                        
                        <div class="contributions-infos">
                            <div class="infos">
                                <p class="value">
                                    <span class="sum-left">
                                    
                                        <?= (!empty($comments)) ? $sumDelta = $pot->getSumLimit() - $pot->getTotal() : $pot->getSumLimit(); ?>

                                    </span> €<br>
                                </p>
                                <p class="sum-left-value">
                                    <?=($pot->getSumLimit() >= 1) ? 'Restants' : 'Restant' ?>
                                </p>
                            </div>
                            <br>

                                
                            <div class="infos">
                                <p class="value">
                                    <span class="nb-contributions">
                                        <?= (!empty($nbContributors)) ? $nbContributors : '0';?>
                                    </span>
                                </p>
                                <p class="nb-contributors-value">
                                    <?=(isset($nbContributors) && $nbContributors > 1) ? 'Contributeurs' : 'Contributeur' ?>   
                                </p>
                            </div>
                        </div>
                    </div>
                        
                    
                    <div class="btn-contributions">
                        <a href="<?=URL.'contribution/'.$pot->getSlug().'/'.$pot->getId();?>" class="btn">Contribuer</a>
                    </div>

                </div>

                <div class="organization">
                    <div class="organization-content">
                        <p>Organisateur
                            <p class="organizer org-name">
                                <?=$pot->getOrganizer();?>
                            </p>
                        </p>
                        <hr class="hr">
                        <p>Bénéficiaire
                            <p class="recipient org-name">
                                <?=$pot->getRecipient();?>
                            </p>
                        </p>
                    </div>
                </div>
            </div>
        </div>
       
    <?php
        }
    }
    ?>



</div>
