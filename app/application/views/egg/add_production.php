<?php for ($i = 0; $i < 7; $i++) : ?>    
    <h3>Fakk <?= $i ?></h3>
    <fieldset class="round inline-block">
        <?= form_open() ?>        
            <?php for ($j = 0; $j < 3; $j++) : ?>
                <p>
                    <label for="">Tojás típus <?= $j ?></label>
                    <input type="text" name = "" value = "" id = "" />
                </p>
            <?php endfor; ?>
            <p><button>Mentés</button></p>
        <?= form_close(); ?>
    </fieldset>
<?php endfor ?>