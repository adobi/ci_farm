<fieldset class="round">
    <?= form_open(); ?>
        <p>
            <label for="code" class = "block">Kód</label>
            <input type="text" name="code" value="" id="code" class = "text"/>
        </p>
        <p>
            <label for="mgszh" class = "block">MGSZH</label>
            <input type="text" name="mgszh" value="" id="mgszh" class = "text"/>
        </p>
        <p>
            <label for="code" class = "block">Kód</label>
            <select name = "postal_code_id">
                <option value = "1">Hajdú Bihar</option>
            </select>
        </p>
        <p>
            <label for="address" class = "block">Cím</label>
            <input type="text" name="address" value="" id="address" class = "text" />
        </p>
        <p>
            <label for="description" class = "block">Megjegyzés</label>
            <textarea name="description" cols="40" rows="2"></textarea>
        </p>
        <p>
            <button>Mentés</button>
        </p>
    <?= form_close(); ?>
</fieldset>