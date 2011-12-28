<?php //for ($i = 0; $i < 7; $i++) : ?>
    <!--<h3>Fakk <?= $i ?></h3>-->
    <fieldset class="round inline-block">
        <?= form_open() ?>
            <fieldset class = "inner-fieldset">
                <?= $template['partials']['select_stock']; ?>    
            </fieldset>
            <fieldset class = "inner-fieldset">
                <legend>Elhalt</legend>
                <p>
                    <label for="death_female">Jérce</label>
                    <input type="text" name = "dead_female" id = "death_female" value = "" />
                </p>
                <p>
                    <label for="death_male">Kakas</label>
                    <input type="text" name = "dead_male" id = "death_male" value = "" />
                </p>
                
            </fieldset>
            
            <fieldset class = "inner-fieldset">
                <legend>Selejt</legend>
                <p>
                    <label for="reject_female">Jérce</label>
                    <input type="text" name = "reject_female" id = "reject_female" value = "" />
                </p>
                <p>
                    <label for="reject_male">Kakas</label>
                    <input type="text" name = "reject_male" id = "reject_male" value = "" />
                </p>
                
            </fieldset>
            <p><button>Mentés</button></p>
        <?= form_close() ?>
    </fieldset>
<?php //endfor ?>