<div class="card text-bg-light mb-3" style="max-width: 18rem;">
    <div class="card-header text-center"><?=$patients->lastname?> <?=$patients->firstname?></div>
    <div class="card-body">
        <h5 class="card-title text-center">Info du patient :</h5>
        <p class="card-text">Né le : <?= $patients->displayDate()?></p>
        <p class="card-text">TEL : <?= $patients->phone?></p>
        <p class="card-text">Email : <?= $patients->mail?></p>
    </div>
</div>

