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
    
    <?= form_open(base_url() . 'chickentype/edit/' . $this->uri->segment(3)) ?>
        <p>
            <label for="code" class = "block">Kód</label>
            <input type="text" class = "text" name = "code" value = "<?= $chickentype ? $chickentype->code : '' ?>" id = "code"/>
        </p>
        <p>
            <label for="name" class = "block">Leírás</label>
            <input type="text" name="name" value="<?= $chickentype ? $chickentype->name : '' ?>" id="name" class = "text" />
        </p>
        <p>
            <button>Mentés</button>
        </p>
    <?= form_close(); ?>
</fieldset>