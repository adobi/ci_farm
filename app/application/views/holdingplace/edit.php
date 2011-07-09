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
            <label for="code" class = "block">Tartási hely azonosítója</label>
            <input type="text" name = "code" id = "code" class = "text" value = "<?= $current_item ? $current_item->code : '' ?>" />
        </p>
        <p>
            <label for="name" class = "block">Tartási hely megnevezése</label>
            <input type="text" name = "name" id = "name" class = "text" value = "<?= $current_item ? $current_item->name : '' ?>" />
        </p>
        <p>
            <label for="zip" class = "block">Tartási hely irányítószáma</label>
            <input type="text" name = "zip" id = "zip" class = "text" value = "<?= $current_item ? $current_item->zip : '' ?>" />
        </p>
        <p>
            <label for="address" class = "block">Tartási hely címe</label>
            <input type="text" name = "address" id = "address" class = "text" value = "<?= $current_item ? $current_item->address : '' ?>" />
        </p>
        
        <p>
            <button>Mentés</button>
        </p>
    <?= form_close(); ?>
</fieldset>    