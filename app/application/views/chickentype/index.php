<p>
    <a class="button" href="<?= base_url() ?>chickentype/edit" dialog_id = "0" rel = "dialog" title = "Tyúk típus felvitele">új típus felvitele</a>
</p>

<?php if ($chickentypes): ?>
    <?php foreach ($chickentypes as $et): ?>
        <div class = "zebra span-19">
            <strong><?= $et->code ?></strong> - <?= $et->name ?>
            <a class="button button-small" href="<?= base_url() ?>chickentype/delete/<?= $et->id ?>" class = "delete">töröl</a>
            <a class="button button-small" href="<?= base_url() ?>chickentype/edit/<?= $et->id ?>" dialog_id = "<?= $et->id ?>" rel = "dialog" title = "Típus szerkesztése">szerkeszt</a>
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

