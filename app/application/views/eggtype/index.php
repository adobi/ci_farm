<p>
    <a href="<?= base_url() ?>eggtype/edit" rel = "dialog">új típus felvitele</a>
</p>

<?php if ($eggtypes): ?>
    <?php foreach ($eggtypes as $et): ?>
        <p class = "zebra">
            <strong><?= $et->code ?></strong> - <?= $et->description ?>
            <a href="<?= base_url() ?>eggtype/delete/<?= $et->id ?>" class = "delete">töröl</a>
        </p>
    <?php endforeach ?>
<?php endif ?>

