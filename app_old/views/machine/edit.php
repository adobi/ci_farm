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
    
    <?= form_open(base_url() . 'machine/edit/' . $this->uri->segment(3)) ?>
    
        <p>
            <label for="breeder_site_id"  class="block">Válasszon telephelyet</label>
            <?= form_dropdown('breeder_site_id', $breeder_sites, $current_item ? $current_item->breeder_site_id : ''); ?>
        </p>
        <p>
            <label for="name" class = "block">Név</label>
            <input type="text" name="name" value="<?= $current_item ? $current_item->name : '' ?>" id="name" class = "text" />
        </p>
        <p>
            <label for="code" class="block">Kód</label>
            <input type="text" name="code" value="<?= $current_item ? $current_item->code : '' ?>" id="code" class = "text" />
        </p>
        <p>
            <button>Mentés</button>
        </p>
    <?= form_close(); ?>
</fieldset>