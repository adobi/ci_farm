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

<fieldset class = "round span-9">
    
    <?= form_open(base_url() . 'breeder/edit/' . $this->uri->segment(3)) ?>
        <p>
            <label for="name" class = "block">Név</label>
            <input type="text" class = "required" name = "name" value = "<?= $filled ? $filled['name']: ($breeder ? $breeder->name : '') ?>" id = "breeder_name"/> 
        </p>

        <p>
            <label for="address" class = "block">Cím</label>
            <input type="text" name="zip" value="<?= $filled ? $filled['zip'] : ($breeder ? $breeder->zip : '') ?>" id="zip" class = "" size = "7" placeholder = "ir.szám"/>
            <input type="text" name="city" value="<?= $filled ? $filled['city'] : ($breeder ? $breeder->city : '') ?>" id="city" class = "" size = "30" placeholder="város"/>
            <br />
            <input type="text" name="address" value="<?= $filled ? $filled['address'] : ($breeder ? $breeder->address : '') ?>" id="address" placeholder="utca, házszám"/>
            
        </p>        
        <p>
            <label for="phone" class = "block">Telefonszám</label>
            <input type="text" size = "5" maxlength = "3" name="phone[]" value="<?= $filled ? $filled['phone'][0] : ($breeder && $breeder->phone ? $breeder->phone[0] : '+36') ?>" id="phone-1" />
            <input type="text" size = "5" maxlength = "2" name="phone[]"  value="<?= $filled ? @$filled['phone'][1] : ($breeder && $breeder->phone ? $breeder->phone[1] : '') ?>" id="phone-2" />
            <input type="text" size = "20" maxlength = "7" name="phone[]" value="<?= $filled ? @$filled['phone'][2] : ($breeder && $breeder->phone ? $breeder->phone[2] : '') ?>" id="phone-3" />
        </p>
        <p>
            <label for="cell" class = "block">Mobil</label>
            <input type="text" size = "5" maxlength = "3" name="cell[]" value="<?= $filled ? $filled['cell'][0] : ($breeder && $breeder->cell ? $breeder->cell[0] : '+36') ?>" id="cell-1" />
            <input type="text" size = "5" maxlength = "2" name="cell[]"  value="<?= $filled ? @$filled['cell'][1] : ($breeder && $breeder->cell ? $breeder->cell[1] : '') ?>" id="cell-2" />
            <input type="text" size = "20" maxlength = "7" name="cell[]" value="<?= $filled ? @$filled['cell'][2] : ($breeder && $breeder->cell ? $breeder->cell[2] : '') ?>" id="cell-3" />
        </p>
        <p>
            <label for="email" class = "block">Email</label>
            <input type="text" name="email" value="<?= $filled ? $filled['email'] : ($breeder ? $breeder->email : '') ?>" id="email" />
        </p>
        <p>
            <label for="priority" class = "block">Sorrend</label>
            <input type="text" name="priority" value="<?= $filled ? $filled['priority'] : ($breeder ? $breeder->priority : '') ?>" id="priority" size = "5" />
        </p>        
        <p>
            <button class = "save-form">Mentés</button>
        </p>
    <?= form_close(); ?>
</fieldset>

<fieldset class = "round span-8 hidden" id = "breeder-search-result-by-name">
    
</fieldset>

<?php $this->session->unset_userdata('filled_data'); ?>