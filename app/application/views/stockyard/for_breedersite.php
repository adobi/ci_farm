<h3 style="padding:10px"><?= $current_breedersite->name ?> ólai</h3>

<p style="padding:10px">
    <a href="<?= base_url() ?>stockyard/edit/breeder_site/<?= $current_breedersite->id ?>" class = "button" rel = "dialog" dialog_id = "0" title = "Új istálló">Új istálló felvitele</a>
</p>

<?php if ($yards): ?>
    <?php foreach ($yards as $item): ?>
        <div class = "zebra span-19 round" style = "border:1px solid #ccc;">
            <?= $item->name ?>
            <p style="text-align:right">
                <a href="<?= base_url() ?>stockyard/delete/<?= $item->id ?>">töröl</a>
                <a href="<?= base_url() ?>stockyard/edit/<?= $item->id ?>/breeder_site/<?= $item->breeder_site_id ?>" rel = "dialog" dialog_id = "<?= $item->id ?>" title = "Istálló szerkesztése">szerkeszt</a>
                <a href="<?= base_url() ?>fakkgroup/for_stockyard/<?= $item->id ?>">fakk csoportok</a>
            </p>
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