<h1 class="text-center mb-5">Infos du rendez-vous</h1>
<div class="card text-bg-light mb-3" style="max-width: 18rem;">
    <div class="card-header text-center"><?=$appointment->patient->lastname?> <?=$appointment->patient->firstname?></div>
    <div class="card-body">
        <h5 class="card-title text-center">Info du patient :</h5>
        <p class="card-text">Né le : <?= $appointment->patient->displayDate()?></p>
        <p class="card-text">TEL : <?= $appointment->patient->phone?></p>
        <p class="card-text">Email : <?= $appointment->patient->mail?></p>
        <p class="card-text">Rendez-vous le  : <?= $appointment->dateHour?></p>
    </div>
</div>


