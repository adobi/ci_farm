<h2><?= $current_fakk->name; ?> állományai</h2>

<p>
    <a href="<?= base_url() ?>stock/edit/fakk/<?= $current_fakk->id; ?>" dialog_id = "0" rel = "dialog" title = "Allomány felvitele">új állomány felvitele</a>
</p>

<?php if ($stock): ?>
    <?php foreach ($stock as $item): ?>
        <div class = "zebra span-9 round">
            <ul>
                <li>
                    <strong>Született</strong>: <?= to_date($item->birth_date); ?>
                </li>
                <li>
                    <strong>Kód</strong>: <?= $item->code; ?>
                </li>
                <li>
                    <strong>Osztály</strong>: <?= $item->klass; ?>
                </li>
            </ul>
            
            <p>
                <a href="#" class = "delete">töröl</a>
                <a href="<?= base_url(); ?>stock/sell/<?= $item->id; ?>" rel = "dialog" dialog_id = "<?= $item->id; ?>" title = "Állomány eladása">elad</a>
                <a href="<?= base_url(); ?>stock/edit/<?= $item->id; ?>/fakk/<?= $current_fakk->id; ?>" dialog_id = "<?= $item->id; ?>" rel = "dialog" title = "Állomány adatai - szerkesztés">további részletek</a>
            </p>
        </div>
    <?php endforeach ?>
<?php endif ?>