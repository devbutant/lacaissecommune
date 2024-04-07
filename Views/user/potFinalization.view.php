<?php
foreach($categories as $category){

}
?>

<section id="register" class="container">
    <form action="<?= URL ?>potValidation" method="post" enctype="multipart/form-data" class="form">

    <div class="title-page">
        <h1>Créer une caisse</h1>
    </div>

    <div class="informations">
        <input type="hidden" class="total" name="total" value="0">

        <div class="form-group">
            <!-- <label for="pot-type">Type de caisse :</label> -->
            <input type="hidden" class="pot-type" name="pot-type" value="<?= $category->getIdType() ?>" disabled>
        </div>
        <div class="form-group">
            <!-- <label for="pot-category">Catégorie :</label> -->
            <input type="hidden" class="pot-category" name="pot-category" value="<?= $category->getCatName() ?>" disabled>
        </div>
        <div class="form-group">
            <label for="name">Nom de ma caisse :</label>
            <input type="text" class="name" name="name" id="formInputPotName" placeholder="Projet novateur 100% écolo">
        </div>
        <div class="form-group">
            <label for="description">Description :</label>
            <textarea type="text" class="description" name="description" placeholder="Le projet de Roland est la création d'un verger biologique ..."></textarea>
        </div>
        <div class="form-group">
            <label for="description">Choisissez une photo inférieur à 2 MO.</label>
            <input type="file" class="photo" name="photo" id="photo" accept="">
        </div>
        <div class="form-group">
            <label for="sum_limit">Somme à atteindre :</label>
            <input type="float" class="sum_limit" name="sum_limit" placeholder="Entrez des chiffres uniquement">
        </div>
        <div class="form-group">
            <label for="organizer">Organisateur :</label>
            <input class="form-control" type="organizer" id="organizer" name="organizer" rows="3" placeholder="Mireille">
        </div>
        <div class="form-group">
            <label for="recipient">Bénéficiaire :</label>
            <input class="form-control" type="recipient" id="recipient" name="recipient" rows="3" placeholder="Roland">
        </div>
        <div class="form-group">
            <label for="date_start">Date d'ouverture :</label>
            <input type="date" class="date_start" name="date_start" value="">
        </div>
        <div class="form-group">
            <label for="date_end">Date limite :</label>
            <input type="date" class="date_end" name="date_end" value="">
        </div>
        <div class="form-group">
            <label for="slug"> URL personnalisée caisse/ :</label>
            <input type="text" class="slug" name="slug" placeholder="6 à 30 caractères max" id="slug" pattern="[a-zA-Z0-9-_]{6,30}" title="6 à 30 caractères (lettres, chiffres et tiret acceptés)">
        </div>
        <div class="form-group form-checkbox">
            <input type="checkbox" class="public" name="public">
            <label for="public">Caisse solidaire (accessible à tous)</label>
        </div>
        <div class="form-group">
            <div class="button-submit">
                <button type="submit" class="btn btn-primary">
                    Je crée ma caisse
                </button>
            </div>
        </div>
    </div>
    </form>
</section>
