<fieldset>
    <legend>Tojás típus</legend>
    <?= form_open(base_url() . 'eggtype/edit/'.$this->uri->segment(3)) ?>
        <p>
            <label for="code">Kód</label><br>
            <input type="text" class = "text" name = "code" value = "" id = "code"/>
        </p>
        <p>
            <label for="description">Leírás</label><br>
            <input type="text" name="description" value="" id="description" class = "text" />
        </p>
        <p>
            <input type="submit" value = "Mentés" />
        </p>
    <?= form_close(); ?>
</fieldset>