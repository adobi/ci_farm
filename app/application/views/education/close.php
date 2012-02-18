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
            <label for="closed" class = "block">Betelepítés vége</label>
            <input type="text" class = "datepicker" name = "closed" value = "<?php echo date('Y-m-d') ?>" id = "closed"/>
        </p>
        <p>
            <label for="created" class = "block">Nevelés kezdete</label>
            <input type="text" class = "datepicker" name = "created" value = "<?php echo date('Y-m-d') ?>" id = "created"/>
        </p>
        <p>
            <button>Mentés</button>
        </p>
    <?= form_close(); ?>
</fieldset>