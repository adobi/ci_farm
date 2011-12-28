<?php if ($breeder): ?>
    <ul style="list-style-type:none">
        <li><strong>Név:</strong> <?= $breeder->name ?></li>
        <li><strong>Cím:</strong> <?= $breeder->zip ?> <?= $breeder->city ?> <?= $breeder->address ?></li>
        <li><strong>Telefon:</strong> <?= $breeder->phone ? implode('-', $breeder->phone) : '' ?></li>
        <li><strong>Mobil:</strong> <?= $breeder->cell ? implode('-', $breeder->cell) : '' ?></li>
        <li><strong>Email:</strong> <?= $breeder->email ?></li>
    </ul>
    <p class="text-right">
        <a class="button button-small hide-breeder-info" href="javascript:void(0);">Mégsem</a>
    </p>
<?php endif ?>