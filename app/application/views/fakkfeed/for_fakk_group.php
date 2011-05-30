<?php if ($id): ?>
    <fieldset class = "round inline-block" id = "feed_for_fakks">
        <?= form_open(); ?>
            <p>
                <label for="to_date">Dátum</label>
                <input type="text" name = "to_date" value = "<?= $last_empty_date; ?>" id = "to_date" size = "20" class = "datepicker"/>
            </p>
            <p>
                <label for="fakk_id">Fakk</label>
                <?= form_dropdown('fakk_id', $fakks, null); ?>
                <br />
                <label>&nbsp;</label><input type="checkbox" name = "is_for_group" value = "<?= $id; ?>" /> teljes csoport
            </p>
            <p>
                <label for="feed_male">Kakas tápanyag</label>
                <input type="text" name = "feed_male" id = "feed_male" size = "20"/>
            </p>
            <p>
                <label for="feed_female">Jérce tápanyag</label>
                <input type="text" name = "feed_female" id = "feed_female" size = "20" />
            </p>
            <p>
                <label for="feed_grain">Szemes tápanyag</label>
                <input type="text" name = "feed_grain" id = "feed_grain" size = "20" />
            </p>
            <p>
                <button>Mentés</button>
            </p>             
        <?= form_close(); ?>
    </fieldset>
<?php endif ?>