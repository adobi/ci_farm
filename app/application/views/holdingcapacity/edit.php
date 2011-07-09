<?php if ($this->session->userdata('validation_error')): ?>
    
    <div class = "error">
        <?= $this->session->userdata('validation_error'); ?>
    </div>    
    <?php 
        $this->session->unset_userdata('validation_error'); 
        $this->session->unset_userdata('current_dialog_id');
    ?>
    
<?php endif ?>


<fieldset class="round">
    <?= form_open(); ?>
        <p>
            <label for="type" class = "block">Típusa</label>
            <input type="text" name = "type" id = "type" value = "<?= $current_item ? $current_item->type : '' ?>" class = "text"/>
        </p>
        <p>
            <label for="size" class = "block">Mértéke</label>
            <input type="text" name = "size" id = "type" value = "<?= $current_item ? $current_item->size : '' ?>" class = "text"/>
        </p>    
        <p>
            <label for="created" class = "block">Létrehozva</label>
            <input type="text" name = "created" id = "created" value = "<?= $current_item ? to_date($current_item->created) : '' ?>" class = "text datepicker"/>
        </p>
        <p>
            <button>Mentés</button>
        </p>
    <?= form_close(); ?>
</fieldset>      