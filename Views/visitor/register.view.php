<section id="register" class="container">
    <form action="<?= URL ?>validation-inscription" method="post" enctype="multipart/form-data" class="form">

    <div class="title-page">
        <h1>Créer un compte</h1>
    </div>

    <div class="informations">
        <div class="form-group">
            <label for="name">Nom :</label>
            <input type="text" class="name" name="name" placeholder="Dupont">
        </div>
        <div class="form-group">
            <label for="fname">Prénom :</label>
            <input type="text" class="fname" name="fname" placeholder="Maurice">
        </div>
        <div class="form-group">
            <label for="description">Avatar :</label>
            <input type="file" class="photo" name="photo" id="photo" accept="">
        </div>
        <div class="form-group">
            <label for="email">Adresse e-mail :</label>
            <input type="text" class="email" name="email" placeholder="exemple@contact.fr">
        </div>
        <div class="form-group">
            <label for="pass">Mot de passe :</label>
            <input class="form-control" type="password" id="pass" name="pass" rows="3" placeholder="Mot de passe">
        </div>
        <div class="form-group">
            <label for="pass-confirm">Confirmation mot de passe :</label>
            <input class="form-control" type="password" id="pass-confirm" name="pass-confirm" rows="3" placeholder="Confirmez votre mot de passe">
        </div>
        <div class="form-group">
            <label for="phone">N° de téléphone :</label>
            <input type="text" class="phone" name="phone" placeholder="06 99 99 99 99">
        </div>
        <div class="form-group">
            <label for="dob">Date de naissance :</label>
            <input type="date" id="dob" class="dob" name="dob" value="2022-01-01" min="1900-01-01" max="2018-12-31">
        </div>
        <div class="form-group">
            <div class="button-submit">
                <button type="submit" class="btn btn-primary">
                    Créer un compte
                </button>
            </div>
        </div>
    </div>
    </form>
</section>
