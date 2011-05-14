<p>
    <a href="<?= base_url() ?>chickentype/edit" dialog_id = "0" rel = "dialog" title = "Tyúk típus felvitele">új típus felvitele</a>
</p>

<?php if ($chickentypes): ?>
    <?php foreach ($chickentypes as $et): ?>
        <p class = "zebra">
            <strong><?= $et->code ?></strong> - <?= $et->name ?>
            <a href="<?= base_url() ?>chickentype/delete/<?= $et->id ?>" class = "delete">töröl</a>
            <a href="<?= base_url() ?>chickentype/edit/<?= $et->id ?>" dialog_id = "<?= $et->id ?>" rel = "dialog" title = "Típus szerkesztése">szerkeszt</a>
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

