<table class="table caption-top">
    <h1 class="text-center mb-5">Liste des patients</h1>

    <form action="#" method="get">
        <input type="search" name="recherche" id="recherche" placeholder="Rechercher un patient" class="mb-4">
        <button type="submit" name="rechercher" class="btn btn-success m-2">Rechercher</button>
    </form>

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

