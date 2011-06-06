<?php //for ($i = 0; $i < 7; $i++) : ?>
    <!--<h3>Fakk <?= $i ?></h3>-->
    <fieldset class="round inline-block">
        <?= form_open() ?>
            <fieldset class = "inner-fieldset">
                
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
            
            </fieldset>
            <fieldset class = "inner-fieldset">
                <legend>Elhalt</legend>
                <p>
                    <label for="death_female">Jérce</label>
                    <input type="text" name = "death_female" id = "death_female" value = "" />
                </p>
                <p>
                    <label for="death_male">Kakas</label>
                    <input type="text" name = "death_male" id = "death_male" value = "" />
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