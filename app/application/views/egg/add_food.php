<?php for ($i = 0; $i < 4; $i++) : ?>    
    <h3>Fakkcsoport <?= $i ?></h3>
    <fieldset class="round inline-block">
        <?= form_open() ?>
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
<?php endfor ?>