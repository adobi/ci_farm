<?php if ($this->session->userdata('validation_error')): ?>
    
    <div class = "error">
        <?= $this->session->userdata('validation_error'); ?>
    </div>    
    <?php 
        $this->session->unset_userdata('validation_error'); 
        $this->session->unset_userdata('current_dialog_id');
    ?>
<?php endif ?>

<fieldset class = "round">
    
    <?= form_open() ?>
        <p>
            <label for="code" class = "block">Kód</label>
            <input type="text" class = "required" name = "code" value = "<?= $current_item ? $current_item->code : '' ?>" id = "code"/>
        </p>
        
        <p>
            <label for="name" class = "block">Név</label>
            <input type="text" name="name" value="<?= $current_item ? $current_item->name : '' ?>" id="name" class = "required" />
        </p>
        <p>
            <button>Mentés</button>
        </p>
    <?= form_close(); ?>
</fieldset>