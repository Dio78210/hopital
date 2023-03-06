<table class="table caption-top">
    <caption class="text-center mb-5">Liste des patients</caption>
    <thead>
        <tr>
            <th scope="col">Lastname</th>
            <th scope="col">Firstname</th>
            <th scope="col">Birthdate</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($patients as $patient) { ?>
            <tr>
                <td><?= $patient->lastname ?></td>
                <td><?= $patient->firstname ?></td>
                <td><?= $patient->displayDate() ?></td>
                <td><a href='/profilPatient.php?id=<?=$patient->id?>'>Voir plus d'infos.</a></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>

<a href="/ajoutPatient.php" class="btn btn-success mt-5">Ajouter un patient</a>

