<p>
    <a class="button" href="<?= base_url() ?>eggtype/edit" dialog_id = "0" rel = "dialog" title = "Tojás típus felvitele">új típus felvitele</a>
</p>

<?php if ($eggtypes): ?>
<fieldset>
    <legend>Étkezési tojástípusok</legend>
    <?php foreach ($eggtypes as $et): ?>
    
        <div class = "zebra span-18">
            <strong><?= $et->description ?></strong>
            <?php if ($et->id != 1): ?>
                <a class="button button-small" href="<?= base_url() ?>eggtype/delete/<?= $et->id ?>" class = "delete">töröl</a>
            <?php else: ?>
                <em>(nem törölhető, csak szerkeszthető)</em>
            <?php endif ?>
            <!-- 
            <a class="button button-small" href="<?= base_url() ?>eggtype/edit/<?= $et->id ?>" dialog_id = "<?= $et->id ?>" rel = "dialog" title = "Tojástípus szerkesztése">szerkeszt</a>
             -->
        </div>
    <?php endforeach ?>
</fieldset>
<?php endif ?>

<?php if ($this->session->userdata('validation_error')): ?>
    <script type="text/javascript">
        $(function() {
            //$('a[rel=dialog]').trigger('click');
            App.TriggerDialogOpen('<?= $this->session->userdata("current_dialog_item") ?>')
        });
        
    </script>
<?php endif ?>
