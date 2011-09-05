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
    
    <?= form_open(base_url() . 'eggtype/edit/' . $this->uri->segment(3)) ?>
        <p>
            <label for="code" class = "block">Kód</label>
            <input type="text" class = "text" name = "code" value = "<?= $eggtype ? $eggtype->code : '' ?>" id = "code"/>
        </p>
        
        <p>
            <label for="name" class = "block">Név</label>
            <input type="text" name="name" value="<?= $eggtype ? $eggtype->name : '' ?>" id="name" class = "text" />
        </p>
        <p>
            <label for="price" class = "block">Ár</label>
            <input type="text" name="price" value="<?= $eggtype ? $eggtype->price : '' ?>" id="price" class = "text" />
        </p>
        <p>
            <label for="is_for_stock">Csak raktár készletnél használt?</label>
            <input type="checkbox" name="is_for_stock" id = "is_for_stock" value = "1" />
        </p>
        <p>
            <label for="type_food">
                <input type="radio" name = "type" value = "1" id = "type_food" checked = "checked"/> Étkezési
            </label>
            
            <label for="type_production">
                <input type="radio" name = "type" value = "2" id = "type_production" /> Termelési
            </label>
        </p>
        <p>
            <button>Mentés</button>
        </p>
    <?= form_close(); ?>
</fieldset>