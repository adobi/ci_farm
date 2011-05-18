<h2><?= $breeder->name; ?> telephelyei</h2>
<p>
    <a href="<?= base_url() ?>breedersite/edit/breeder/<?= $breeder->id ?>" dialog_id = "0" rel = "dialog" title = "Új telephely felvitele">új telephely</a>
</p>

<?php if ($breeder_sites): ?>
    <?php foreach ($breeder_sites as $item): ?>
        <div class = "zebra span-9 round">
            <ul>
                <li><strong>Kód</strong>: <?= $item->code; ?></li>
                <li><strong>MGSZH</strong>: <?= $item->mgszh; ?></li>
                <li><strong>Irányítószám</strong>: <?= $item->code; ?> - <?= $item->city; ?></li>
                <li><strong>Cím</strong>: <?= $item->address; ?></li>
                <li><strong>Megjegyzés</strong>: <?= $item->description; ?></li>
            </ul>
            <a href="<?= base_url(); ?>breedersite/delete/<?= $item->id; ?>" class = "delete">töröl</a>
            <a href="<?= base_url(); ?>breedersite/edit/<?= $item->id; ?>" dialog_id = "<?= $item->id; ?>" rel = "dialog" title = "Telephely szerkesztése">szerkeszt</a>
            <a href="<?= base_url(); ?>fakkgroup/show/breedersite/<?= $item->id; ?>">fakk csoportok</a>
        </div>            
    <?php endforeach ?>
<?php endif ?>

<?php if ($this->session->userdata('validation_error')): ?>
    <script type="text/javascript">
        $(function() {
            //$('a[rel=dialog]').trigger('click');
            App.TriggerDialogOpen('<?= $this->session->userdata("current_dialog_item") ?>')
        });
        
    </script>
<?php endif ?>
