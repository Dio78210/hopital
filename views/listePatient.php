<table class="table caption-top">
    <h1 class="text-center mb-5">Liste des patients</h1>

    <nav>
        <ul class="pagination">
            <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
            <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                <a href="/listePatients.php/?page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
            </li>
            <?php for ($page = 1; $page <= $pages; $page++){ ?>
                <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
                <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                    <a href="/listePatients.php/?page=<?= $page ?>" class="page-link"><?= $page ?></a>
                </li>
            <?php } ?>
            <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
            <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                <a href="/listePatients.php/?page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
            </li>
        </ul>
    </nav>

    <form action="#" method="get">
        <input type="search" name="recherche" id="recherche" placeholder="Rechercher un patient" class="mb-4">
        <button type="submit" name="rechercher" class="btn btn-success m-2">Rechercher</button>
    </form>

    <thead>
        <tr>
            <th scope="col">Lastname</th>
            <th scope="col">Firstname</th>
            <th scope="col">Birthdate</th>
            <th scope="col">Lien</th>
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

<a href="/ajoutPatient.php" class="btn btn-success mt-5 mb-5">Ajouter un patient</a>

