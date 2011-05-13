<?php if ($this->session->userdata('validation_error')): ?>
    
    <div class = "error">
        <?= $this->session->userdata('validation_error'); ?>
    </div>    
    <?php $this->session->unset_userdata('validation_error') ?>
<?php endif ?>

<fieldset class = "round">
    
    <?= form_open(base_url() . 'eggtype/edit/') ?>
        <p>
            <label for="code" class = "block">Kód</label>
            <input type="text" class = "text" name = "code" value = "" id = "code"/>
        </p>
        <p>
            <label for="description" class = "block">Leírás</label>
            <input type="text" name="description" value="" id="description" class = "text" />
        </p>
        <p>
            <button>Mentés</button>
        </p>
    <?= form_close(); ?>
</fieldset>