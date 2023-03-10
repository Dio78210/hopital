<table class="table caption-top">
    <caption class="text-center mb-5">Liste des Rendez-vous</caption>
    <thead>
        <tr>
            <th scope="col">Lastname</th>
            <th scope="col">Firstname</th>
            <th scope="col">Date et Heure</th>
    </thead>
    <tbody>
        <?php
        foreach ($appointments as $appointment) { ?>
            <tr>
                <td><?= $appointment->patient->lastname ?></td>
                <td><?= $appointment->patient->firstname ?></td>
                <td><?= $appointment->dateHour?></td>
                <td><?= $appointment->pastDate()?></td>
                <td><a href="/rendezvous.php?id=<?= $appointment->id?>">Voir les infos</a></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>


<a href="/ajoutRendezvous.php" class="btn btn-success mt-5">Créer un rendez-vous</a>