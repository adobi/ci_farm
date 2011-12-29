
<fieldset class = "round">
    
    <?= form_open() ?>
        
        <p>
            <label for="name" class = "block">Név</label>
            <input type="text" name="name" value="<?php echo $current_item ? $current_item->name : '' ?>" id="name" class = "text required" />
        </p>        
        <p>
            <button>Mentés</button>
        </p>
    <?= form_close(); ?>
</fieldset>