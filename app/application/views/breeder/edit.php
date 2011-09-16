<?php if ($this->session->userdata('validation_error')): ?>
    
    <div class = "error">
        <?= $this->session->userdata('validation_error'); ?>
    </div>    
    <?php 
        $this->session->unset_userdata('validation_error'); 
        $this->session->unset_userdata('current_dialog_id');
        
    ?>    
<?php endif ?>

<?php

    $filled = $this->session->userdata('filled_data');
?>

<fieldset class = "round">
    
    <p class="message-info">a <strong class="x-large">*</strong>-al jelölt mezők kitöltése kötelező</p>
    
    <?= form_open(base_url() . 'breeder/edit/' . $this->uri->segment(3)) ?>
        <p>
            <label for="name" class = "block">Név <strong class="x-large">*</strong></label>
            <input type="text" class = "text required" name = "name" value = "<?= $filled ? $filled['name']: ($breeder ? $breeder->name : '') ?>" id = "name"/> 
        </p>

        <p>
            <label for="address" class = "block">Cím</label>
            <input type="text" name="zip" value="<?= $filled ? $filled['zip'] : ($breeder ? $breeder->zip : '') ?>" id="zip" class = "" size = "5" data-default = "ir.szám"/>
            <input type="text" name="city" value="<?= $filled ? $filled['city'] : ($breeder ? $breeder->city : '') ?>" id="city" class = "" size = "30" data-default="város"/>
            <br />
            <input type="text" name="address" value="<?= $filled ? $filled['address'] : ($breeder ? $breeder->address : '') ?>" id="address" data-default="utca, házszám"/>
            
        </p>        
        <p>
            <label for="phone" class = "block">Telefonszám</label>
            <input type="text" name="phone" value="<?= $filled ? $filled['phone'] : ($breeder ? $breeder->phone : '') ?>" id="phone" />
        </p>
        <p>
            <label for="cell" class = "block">Mobil</label>
            <input type="text" name="cell" value="<?= $filled ? $filled['cell'] : ($breeder ? $breeder->cell : '') ?>" id="cell" />
        </p>
        <p>
            <label for="email" class = "block">Email</label>
            <input type="text" name="email" value="<?= $filled ? $filled['email'] : ($breeder ? $breeder->email : '') ?>" id="email" />
        </p>
        <p>
            <label for="priority" class = "block">Prioritás</label>
            <input type="text" name="priority" value="<?= $filled ? $filled['priority'] : ($breeder ? $breeder->priority : '') ?>" id="priority" size = "5" />
        </p>        
        <p>
            <button>Mentés</button>
        </p>
    <?= form_close(); ?>
</fieldset>

<?php $this->session->unset_userdata('filled_data'); ?>