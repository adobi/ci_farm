<?php //for ($i = 0; $i < 7; $i++) : ?>    
    <!--<h3>Fakk <?= $i ?></h3>-->
    <fieldset class="round inline-block">
        <?= form_open() ?>        
        
            <?= $template['partials']['select_stock']; ?>
        
            <?php foreach ($egg_types as $item): ?>
                <p>
                    <label for=""><?= $item->code; ?> - <?= $item->description; ?></label>
                    <input type="text" name = "eggtypes_pieces[]" value = "" id = "" />
                    <input type="hidden" name = "eggtypes_ids[]" value = "<?= $item->id; ?>">
                </p>
            <?php endforeach; ?>
            <p><button>Mentés</button></p>
        <?= form_close(); ?>
    </fieldset>
<?php //endfor ?>