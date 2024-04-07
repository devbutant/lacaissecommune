<section id="login" class="container">
    <form action="<?= URL ?>validation-connexion" method="post" enctype="multipart/form-data" class="form">

    <div class="title-page">
        <h1>Connexion</h1>
    </div>
    <p id="namePot">Connectez-vous pour créer la caisse :
        <span class="namePotValue"></span>
    </p>

    <div class="informations">
    <div class="form-group">
            <label for="mail">Adresse e-mail :</label>
            <input type="text" class="form-control" name="mail" placeholder="exemple@contact.fr">
        </div>
        <div class="form-group">
            <label for="pass">Mot de passe :</label>
            <input class="form-control" type="password" id="pass" name="pass" rows="3" placeholder="Mot de passe">
        </div>
        <div class="form-group">
            <div class="inscription">
                <p>Pas encore membre ? <a href="<?= URL ?>inscription"><strong>Inscrivez-vous en cliquant ici</strong> </a></p>
            </div>
        </div>
        <div class="form-group">
            <div class="button-submit">
                <button type="submit" class="btn btn-primary">
                    Se connecter
                </button>
            </div>
        </div>
    </div>
    </form>
</section>
