
<fieldset class="round">
    <legend>Keresés sorszámra</legend>
    <?= form_open(); ?>
        <p>
            <input type="text" name = "serial_number" value = "<?= @$_POST['serial_number']; ?>" size = "45"/>
            <button class="button-small">Keres</button>
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

        <?= $template['partials']['delivery_item'] ?>

        <?php if (isset($pagination_links)): ?>
            <div class="pagination span-19">
                <?= $pagination_links; ?>
            </div>    
        <?php endif ?>
<?php endif ?>
