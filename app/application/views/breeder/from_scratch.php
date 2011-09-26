<?= form_open(base_url().'breedersite/save_from_scratch', array('id'=>'add-breeder-and-site')) ?>
    <p class="select-breeder">
        <label for="" class = "block">Válasszon tenyésztőt</label>
        <?= form_dropdown('breeder_id', $breeders) ?>
        <!-- <input type="text" id = "breeder_name" class = "text" name = "breeder_id"/> -->
    </p>
    <p>
        <a href="<?= base_url() ?>breeder/edit" rel = "dialog" title = "Új tenyésztő" class = "button small-button" id = "new-breeder-for-delivery">Új tenyésztő</a>
    </p>
    <p>
        <label for="code" class = "block">Tenyészet kódja</label>
        <input type="text" name = "code" id = "code" class = "text" />
    </p>
    <p>
        <label for="address" class = "block">Tenyészet címe</label>
        <input type="text" name = "address" id = "address" class = "required text" />
    </p>    
    <p>
        <button>Mentés</button>
    </p>
<?= form_close() ?>