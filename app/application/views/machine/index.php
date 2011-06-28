<p>
    <a href="<?= base_url() ?>machine/edit" dialog_id = "0" rel = "dialog" title = "Keltető gép felvitele">új keltető gép felvitele</a>
</p>

<?php if ($machines): ?>
    <?php foreach ($machines as $et): ?>
        <p class = "zebra">
            
            <strong><?= $et->breeder_site_name; ?> - <?= $et->name; ?></strong> (<?= $et->code; ?>)
            
            <a href="<?= base_url() ?>machine/delete/<?= $et->id ?>" class = "delete">töröl</a>

            <a href="<?= base_url() ?>machine/edit/<?= $et->id ?>" dialog_id = "<?= $et->id ?>" rel = "dialog" title = "Tojástípus szerkesztése">szerkeszt</a>
        </p>
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
