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

<h1>Ajouter un rendez-vous</h1>

<form action="#" method="post">
    <label for="dateHour">Date et Heure du rendez-vous</label>
    <input type="datetime-local" name="dateHour" id="dateHour" class="form-control">

    <label for="patient">Selectionner un patient</label>
            <select name="patient" id="patient" class="form-select">
                <option value="" disabled hidden selected >--Faite un choix--</option>
                <?php
                foreach ($patients as $patient) { ?>
                    <option value="<?= $patient->id?>"><?= $patient->lastname?><?= $patient->firstname?></option>

                <?php } ?>
            </select>

            <input type="submit" name="submit" value="Ajouter" class="btn btn-success">
</form>