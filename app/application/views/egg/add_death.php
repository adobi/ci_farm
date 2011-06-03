<?php for ($i = 0; $i < 7; $i++) : ?>
    <h3>Fakk <?= $i ?></h3>
    <fieldset class="round inline-block">
        <?= form_open() ?>
            <fieldset>
                <legend>Elhalt</legend>
                <p>
                    <label for="death_female">Elhalt jérce</label>
                    <input type="text" name = "death_female" id = "death_female" value = "" />
                </p>
                <p>
                    <label for="death_male">Elhalt kakas</label>
                    <input type="text" name = "death_male" id = "death_male" value = "" />
                </p>
                
            </fieldset>
            
            <fieldset>
                <legend>Selejt</legend>
                <p>
                    <label for="reject_female">Selejt jérce</label>
                    <input type="text" name = "reject_female" id = "reject_female" value = "" />
                </p>
                <p>
                    <label for="reject_male">Selejt kakas</label>
                    <input type="text" name = "reject_male" id = "reject_male" value = "" />
                </p>
                
            </fieldset>
            <p><button>Mentés</button></p>
        <?= form_close() ?>
    </fieldset>
<?php endfor ?>