<p>
    <a class="button" href="<?= base_url() ?>eggtype/edit" dialog_id = "0" rel = "dialog" title = "Tojás típus felvitele">új típus felvitele</a>
</p>

<fieldset>
    <legend>Étkezési tojástípusok</legend>
    <?php if ($eggtypes_food): ?>
        
        <?php foreach ($eggtypes_food as $et): ?>
        
            <div class = "zebra span-18 <?= $et->is_for_stock ? 'highlighted' : ''; ?>">
                <strong><?= $et->is_for_stock ? '[RAKTÁR KÉSZLET] ' : ''; ?><?= $et->name ?></strong> <?= $et->price ? $et->price . ' Ft' : ''; ?>
                    <a class="button button-small delete" href="<?= base_url() ?>eggtype/delete/<?= $et->id ?>">töröl</a>
                <!-- 
                <a class="button button-small" href="<?= base_url() ?>eggtype/edit/<?= $et->id ?>" dialog_id = "<?= $et->id ?>" rel = "dialog" title = "Tojástípus szerkesztése">szerkeszt</a>
                 -->
            </div>
        <?php endforeach ?>
    <?php else: ?>
        <p class="info">Nincs adat</p>
    <?php endif ?>
</fieldset>

<fieldset>
    <legend>Termelési tojástípusok</legend>
        
    <?php if ($eggtypes_production): ?>
        <?php foreach ($eggtypes_production as $et): ?>
        
            <div class = "zebra span-18">
                <strong><?= $et->name ?></strong> <?= $et->price ? $et->price . ' Ft' : ''; ?>
                <em>(nem törölhető)</em>
                
                <a class="button button-small" href="<?= base_url() ?>eggtype/edit/<?= $et->id ?>" dialog_id = "<?= $et->id ?>" rel = "dialog" title = "Tojástípus szerkesztése">szerkeszt</a>
                
            </div>
        <?php endforeach ?>
    <?php else: ?>
        <p class="info">Nincs adat</p>
    <?php endif ?>
</fieldset>

<?php if ($this->session->userdata('validation_error')): ?>
    <script type="text/javascript">
        $(function() {
            //$('a[rel=dialog]').trigger('click');
            App.TriggerDialogOpen('<?= $this->session->userdata("current_dialog_item") ?>')
        });
        
    </script>
<?php endif ?>
