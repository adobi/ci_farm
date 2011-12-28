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
            <label for="name" class = "block">Név</label>
            <input type="text" name="name" value="<?= $item ? $item->name : ''; ?>" id="name" class = "required"/>
        </p>
        <p>
            <button>Mentés</button>
        </p>
    <?= form_close(); ?>
</fieldset>
