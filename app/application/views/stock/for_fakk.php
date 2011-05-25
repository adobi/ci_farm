<h2><?= $current_fakk->name; ?> állományai</h2>

<p>
    <a href="<?= base_url() ?>stock/edit/fakk/<?= $current_fakk->id; ?>" dialog_id = "0" rel = "dialog" title = "Allomány felvitele">új állomány felvitele</a>
</p>

<?php if ($stock): ?>
    <?php foreach ($stock as $item): ?>
        <div class = "zebra span-9 round">
            <?php dump($item); ?>
            <p>
                <a href="#" class = "delete">töröl</a>
                <a href="#">elad</a>
            </p>
        </div>
    <?php endforeach ?>
<?php endif ?>