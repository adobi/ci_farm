<fieldset  class="round">
    <?= form_open() ?>
        <?= $template['partials']['select_stock']; ?>    
        <p>
            <label for="vitamin" class = "block">Vitamin</label>
            <textarea name="vitamin" cols="60" rows="3" id = "vitamin"></textarea>
        </p>
        <p><button>Mentés</button></p>
    <?= form_close() ?>
</fieldset>