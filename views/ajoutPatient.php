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

<h1>Ajouter un nouveau patient</h1>

<form action="#" method="post">

    <label for="lastname">Nom</label>
    <input type="text" name="lastname" id="firstname" class="form-control">

    <label for="firstname">Prénom</label>
    <input type="text" name="firstname" id="firstname" class="form-control">

    <label for="birthdate">Date anniversaire</label>
    <input type="date" name="birthdate" id="birthdate" class="form-control">

    <label for="phone">Téléphone</label>
    <input type="tel" name="phone" id="nom" class="form-control">

    <label for="mail">Email</label>
    <input type="email" name="mail" id="mail" class="form-control">

    <input type="submit" name="submit" value="Enregistrer" class="btn btn-success">

</form>