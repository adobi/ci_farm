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
    
    <?= form_open(base_url() . 'breeder/edit/' . $this->uri->segment(3)) ?>
        <p>
            <label for="name" class = "block">Név</label>
            <input type="text" class = "text" name = "name" value = "<?= $breeder ? $breeder->name : '' ?>" id = "name"/>
        </p>
        <p>
            <label for="code" class = "block">Irányítószam</label>
            <input type="text" value="<?= $breeder ? $breeder->postal_code . ', ' . $breeder->city : ''; ?>" id="postal_code_id" class = "text" />
            <?php if ($breeder): ?>
                
                <input type="hidden" name = "postal_code_id" value = "<?= $breeder ? $breeder->postal_code_id : ''; ?>" />
            <?php endif ?>
        </p>
        <p>
            <label for="address" class = "block">Cím</label>
            <input type="text" name="address" value="<?= $breeder ? $breeder->address : '' ?>" id="address" class = "text" />
        </p>        
        <p>
            <label for="phone" class = "block">Telefonszám</label>
            <input type="text" name="phone" value="<?= $breeder ? $breeder->phone : '' ?>" id="phone" class = "text" />
        </p>
        <p>
            <label for="cell" class = "block">Mobil</label>
            <input type="text" name="cell" value="<?= $breeder ? $breeder->cell : '' ?>" id="cell" class = "text" />
        </p>
        <p>
            <label for="email" class = "block">Email</label>
            <input type="text" name="email" value="<?= $breeder ? $breeder->email : '' ?>" id="email" class = "text" />
        </p>
        <p>
            <button>Mentés</button>
        </p>
    <?= form_close(); ?>
</fieldset>