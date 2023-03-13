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

<h1 class="text-center m-5">Modifier les infos du patient</h1>

<form action="#" method="post">

    <label for="lastname">Nom</label>
    <input type="text" name="lastname" id="firstname" class="form-control" value="<?= $patients->lastname ?>">

    <label for="firstname">Prénom</label>
    <input type="text" name="firstname" id="firstname" class="form-control" value="<?= $patients->firstname ?>">

    <label for="birthdate">Date anniversaire</label>
    <input type="date" name="birthdate" id="birthdate" class="form-control" value="<?= $patients->birthdate ?>">

    <label for="phone">Téléphone</label>
    <input type="tel" name="phone" id="nom" class="form-control" value="<?= $patients->phone ?>">

    <label for="mail">Email</label>
    <input type="email" name="mail" id="mail" class="form-control" value="<?= $patients->mail ?>">

    <input type="submit" name="submit" value="Modifier" class="btn btn-success mt-5">

</form>