<h1>Formulaire d'inscription d'un employé</h1>

    <?php

    if (count($messages) > 0) {
        foreach ($messages as $message) {
            if ($message["success"]) { ?>
                <p class="alert alert-success"><?= $message["text"] ?></p>
            <?php } else { ?>
                <p class="alert alert-danger"><?= $message["text"] ?></p>
    <?php }
        }
    }
    ?>
<form action="#" method="POST">

    <label for="username">Nom d'utilisateur </label>
    <input type="text" name="username" id="username" class="form-control">

    <label for="password">Mot de Passe </label>
    <input type="password" name="password" id="password" class="form-control">

    <label for="passwordVerify">Vérifier le mot de Passe </label>
    <input type="password" name="passwordVerify" id="passwordVerify" class="form-control">

    <input type="submit" value="Envoyer" name="submit" class="btn btn-success">

</form>