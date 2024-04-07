<div class="container">
    <div class="title-page">
        <h1>
            <strong id="titlePage">
                Liste des <span class="text-secondary">utilisateurs</span>
            </strong>
        </h1>
        
    </div>

    <div class="users-cards">

    <?php
        foreach($tableau as $v) :
    ?>

        <div class="users-card">
            <div class="card-head">
                <div class="card-head--photo">
                    <img src="<?=URL?>Public/assets/img/photos/<?=$v->getPhoto()?>" alt="user-picture">
                </div>
            </div>
            <div class="card-body">
                <div class="card-body-identity">
                    <p class="fullname"><?= $v->getFname() ?> <?= $v->getName() ?></p>
                    <!-- <p class="age"><= $v->getDob()?></p> -->
                </div>
            </div>
            <!-- <div class="card-footer">
                <p class="card-footer-email"><= $v->getEmail()?></p>
                <p class="card-footer-phone"><= $v->getPhone()?></p>
            </div> -->
        </div>

    <?php
        endforeach;
    ?>
    </div>

</div>