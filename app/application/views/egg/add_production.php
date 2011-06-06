<?php //for ($i = 0; $i < 7; $i++) : ?>    
    <!--<h3>Fakk <?= $i ?></h3>-->
    <fieldset class="round inline-block">
        <?= form_open() ?>        
            <p>
                <label for="fakk_id">Válassz fakkot</label>
                <select id="fakk_id" name = "fakk_id">
                    <option>-</option>
                    <option>Fakk 1</option>
                    <option>Fakk 2</option>
                    <option>Fakk 3</option>
                    <option>Fakk 4</option>
                    <option>Fakk 5</option>
                </select>
            </p>            
        
            <?php for ($j = 0; $j < 3; $j++) : ?>
                <p>
                    <label for="">Tojás típus <?= $j ?></label>
                    <input type="text" name = "" value = "" id = "" />
                </p>
            <?php endfor; ?>
            <p><button>Mentés</button></p>
        <?= form_close(); ?>
    </fieldset>
<?php //endfor ?>