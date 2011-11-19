<fieldset class = "round">
    <?= form_open() ?>
        <?= $template['partials']['select_stock']; ?>    
   
        <p>
            <label for="comment" class = "block">Megjegyzés</label>
            <textarea name="comment" cols="60" rows="3" id = "comment"></textarea>
        </p>
        <p><button>Mentés</button></p>
    <?= form_close() ?>
</fieldset>