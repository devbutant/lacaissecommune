
<?php
    if(!empty($contributions)){
        foreach($contributions as $contribution){
        }
    }
?>
    <section id="contribution" class="container">
    <form action="<?= URL ?>contributionValidation" method="post" enctype="multipart/form-data" class="form">

    <div class="title-page">
        <p>Je contribue à la caisse :</p>
        <h1><?= $contribution->getPotName()?></h1>
    </div>

    <div class="informations">
        <!-- Input hidden for ID  -->
        <input type="hidden" class="id_pot" name="id_pot" id="id_pot" value="<?= $contribution->getIdPot()?>">

        <div class="form-group">
            <label for="name">Pseudo :</label>
            <input type="text" class="name" name="name" placeholder="Dupont">
        </div>
        <div class="form-group">
            <label for="description">Choisissez une photo inférieur à 2 MO.</label>
            <input type="file" class="photo" name="photo" id="photo">
        </div>
        <div class="form-group">
            <label for="sum">Montant en euros :</label>
            <input type="number" step='0.01' min=0 class="sum" name="sum" placeholder="Exemple : 10">
        </div>
        <div class="form-group">
            <label for="comment">Commentaire :</label>
            <textarea type="text" class="comment" name="comment" placeholder="Tapez votre commentaire"></textarea>
        </div>
        <div class="form-group">
            <div class="button-submit">
                <button type="submit" class="btn btn-primary">
                    Je participe
                </button>
            </div>
        </div>
    </div>
    </form>
</section>
