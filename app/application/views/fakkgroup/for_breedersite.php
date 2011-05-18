<h2><?= $current_breeder_site->code; ?>/<?= $current_breeder_site->mgszh; ?> fakkcsoportjai</h2>
<p>
    <a href="<?= base_url() ?>fakkgroup/edit/breedersite/<?= $current_breeder_site->id; ?>" dialog_id = "0" rel = "dialog" title = "Fakkcsoport felvitele">új csoport felvitele</a>
</p>

<?php if ($groups): ?>
    <?php foreach ($groups as $item): ?>
        <div class = "zebra span-9 round">
            <strong><?= $item->name; ?></strong>
            
            <a href="<?= base_url(); ?>fakkgroup/delete/<?= $item->id; ?>" class = "delete">töröl</a>
            <a href="<?= base_url(); ?>fakkgroup/edit/<?= $item->id; ?>" dialog_id = "<?= $item->id; ?>" rel = "dialog" title = "Fakkcsoport szerkesztése">szerkeszt</a>
            <a href="<?= base_url(); ?>">fakkok</a>
        </div>
    <?php endforeach ?>
<?php endif ?>