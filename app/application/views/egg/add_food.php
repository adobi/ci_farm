<?php //for ($i = 0; $i < 4; $i++) : ?>    
    <!--<h3>Fakkcsoport <?= $i ?></h3>-->
    <fieldset class="round inline-block">
        <?= form_open() ?>
            <p>
                <label for="fakk_id">Válassz fakkot</label>
                <select id="fakk_id" name = "fakk_id">
                    <option>-</option>
                    <option>Fakkcsoport 1</option>
                    <option>Fakkcsoport 2</option>
                    <option>Fakkcsoport 3</option>
                    <option>Fakkcsoport 4</option>
                    <option>Fakkcsoport 5</option>
                </select>
            </p>
            <p>
                <label for="feed_female">Jérce tápanyag</label>
                <input type="text" name = "feed_female" value = "" id = "feed_female"/>
            </p>
            <p>
                <label for="feed_male">Kakas tápanyag</label>
                <input type="text" name ="feed_male" id = "feed_male" value = "" />
            </p>
            <p>
                <label for="feed_grain">Szemes tápanyag</label>
                <input type="text" name = "feed_grain" id = "feed_grain" value = "" />
            </p>
            <p><button>Mentés</button></p>
        <?= form_close() ?>
    </fieldset>
<?php //endfor ?>