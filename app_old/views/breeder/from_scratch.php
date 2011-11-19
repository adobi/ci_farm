<?= form_open(base_url().'breedersite/save_from_scratch', array('id'=>'add-breeder-and-site')) ?>
    <p class="select-breeder">
        <label for="" class = "inline-block" style="width:235px">Válasszon tenyésztőt</label>
        <?= form_dropdown('breeder_id', $breeders, '', 'class = "required"') ?>
        <!-- <input type="text" id = "breeder_name" class = "text" name = "breeder_id"/> -->
        <a href="<?= base_url() ?>breeder/edit" rel = "dialog" title = "Új tenyésztő" class = "button small-button" id = "new-breeder-for-delivery">Új tenyésztő</a>
    </p>
    <!-- <p>
        
    </p> -->
    <p>
        <label for="code" class = "inline-block" style="width:235px">Tenyészet kódja</label>
        <input type="text" name = "code" id = "code" class = "text" />
    </p>
    <p>
        <label for="address" class = "inline-block" style="width:235px">Tenyészet címe</label>
        <input type="text" name = "address" id = "address" class = "required text" />
    </p>    
    <p>
        <button class="button-small" id = "save-breedersite-from-scratch">Mentés</button>
        <button class="button-small close-from-scratch">Mégsem</button>
    </p>
<?= form_close() ?>