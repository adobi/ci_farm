<!-- 
<fieldset class="round">
    <legend>Keresés sorszámra</legend>
    <?= form_open(); ?>
        <p>
            <input type="text" name = "serial_number" value = "<?= @$_POST['serial_number']; ?>" size = "45"/>
            <button class="button-small">Keres</button>
        </p>
    <?= form_close(); ?>
</fieldset>
 -->
<fieldset class="round">
    <legend>Szállítólevelek szűrése</legend>
    <?= form_open(); ?>
        <p>
            <label class = "inline-block" for="cast_id">Állatfaj</label>
            <?= form_dropdown('cast_id', $casts, $_POST ? $_POST['cast_id'] : '', 'style = "margin-right:20px;"'); ?>

            <label class = "inline-block" for="type">Élőállat vagy tojás</label>
            <?= form_dropdown('type', $types, $_POST ? $_POST['type'] : '', 'style = "margin-right:20px;"'); ?>

            <label class = "inline-block" for="intended_use">Felhasználási cél</label>
            <?= form_dropdown('intended_use', $intended, $_POST ? $_POST['intended_use'] : ''); ?>
        </p>
        <p>
            <button class="button-small">Szűrés</button>
        </p>
    <?= form_close(); ?>
</fieldset>

<fieldset class="round">
    <legend>Szállítólvelek</legend>
    <p>
        <a class="button" href="<?= base_url(); ?>delivery/edit" rel_ = "dialog" title = "Új szállítólevél felvitele">Új szállítólevél felvitele</a>
    </p>
</fieldset>

<?php if ($items): ?>    

    <?php if (isset($pagination_links)): ?>
        <div class="pagination span-19">
            <?= $pagination_links; ?>
        </div>
    <?php endif ?>

    <?= $template['partials']['delivery_item'] ?>

    <?php if (isset($pagination_links)): ?>
        <div class="pagination span-19">
            <?= $pagination_links; ?>
        </div>    
    <?php endif ?>
<?php endif ?>
