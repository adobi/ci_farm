<style type="text/css">
    .inline-block {
        width:250px;
    }
</style>


<fieldset class="span-19" style="border:0px; padding:0;">
        
    <?= form_open(); ?>
    
        <fieldset class="round">
        
            <p>
                <label class = "inline-block" for="serial_number">Sorszám</label>
                <input class="required" type="text" name = "serial_number" id = "serial_number" value="<?= $current_item ? $current_item->serial_number : '' ?>" />
            </p>
        </fieldset>
        <fieldset class="round">
            <legend>Szállítmány</legend>
            <p>
                <label class = "inline-block" for="cast_id">Állatfaj</label>
                <!-- <input type="text" name = "cast_id" id = "cast_id" value="<?= $current_item ? $current_item->cast_id : '' ?>" /> -->
                <?= form_dropdown('cast_id', $casts, $current_item ? $current_item->cast_id : ''); ?>
            </p>
    
            <p>
                <label class = "inline-block" for="type">Élőállat vagy tojás</label>
                <!-- <input type="text" name = "type" id = "type" value="<?= $current_item ? $current_item->type : '' ?>" /> -->
                <?= form_dropdown('type', $types, $current_item ? $current_item->type : ''); ?>
            </p>
    
            <p>
                <label class = "inline-block" for="intended_use">Felhasználási cél</label>
                <!-- <input type="text" name = "intended_use" id = "intended_use" value="<?= $current_item ? $current_item->intended_use : '' ?>" /> -->
                <?= form_dropdown('intended_use', $intended, $current_item ? $current_item->intended_use : ''); ?>
            </p>
    
            <p>
                <label class = "inline-block" for="veterinary_code">Állategészségügyi bizonyítvány száma</label>
                <input type="text" name = "veterinary_code" id = "veterinary_code" value="<?= $current_item ? $current_item->veterinary_code : '' ?>" size = "10"/>
            </p>
        </fieldset>
        <fieldset class="round">
            <legend>Szállítmány adatai</legend>
            <p>
                <label class = "inline-block" for="seller_id">Indító tenyészetkódja</label>
                <!-- <input type="text" name = "seller_id" id = "seller_id" value="<?= $current_item ? $current_item->seller_id : '' ?>" /> -->
                <?= form_dropdown('seller_id', $breedersites, $current_item ? $current_item->seller_id : '') ?>
                <a href="<?= base_url() ?>breeder/from_scratch/" class = "button small-button add-breedersite-from-scratch">Új tenyészet</a>
            </p>

            
            <p>
                <label class = "inline-block" for="sell_date">Indítás ideje</label>
                <input type="text" name = "sell_date" id = "sell_date" value="<?= $current_item ? $current_item->sell_date : '' ?>" class = "datepicker" />
            </p>
    
            <p>
                <label class = "inline-block" for="sell_piece">Indított állatok/tojások száma</label>
                <input type="text" name = "sell_piece" id = "sell_piece" value="<?= $current_item ? $current_item->sell_piece : '' ?>" size = "10"/>
            </p>
        </fieldset>
        <fieldset class="round">
            <legend>Célállomás</legend>
            <p>
                <label class = "inline-block" for="buyer_id">Célállomás tenyészetkódja</label>
                <!-- <input type="text" name = "buyer_id" id = "buyer_id" value="<?= $current_item ? $current_item->buyer_id : '' ?>" /> -->
                <?= form_dropdown('buyer_id', $breedersites, $current_item ? $current_item->buyer_id : '') ?>
                <a href="<?= base_url() ?>breeder/from_scratch/" class = "button small-button add-breedersite-from-scratch">Új tenyészet</a>
            </p>
            
            <p>
                <label class = "inline-block" for="buyer_country_code">Cálország kódja</label>
                <input type="text" name = "buyer_country_code" id = "buyer_country_code" value="<?= $current_item ? $current_item->buyer_country_code : '' ?>" size = "5"/>
            </p>
            <p>
                <label class = "inline-block" for="buyer_country_name">Cálország neve</label>
                <input type="text" name = "buyer_country_name" id = "buyer_country_name" value="<?= $current_item ? $current_item->buyer_country_name : '' ?>" />
            </p>
    
    
            <p>
                <label class = "inline-block" for="buyer_intra">INTRA/KÁBO szám</label>
                <input type="text" name = "buyer_intra" id = "buyer_intra" value="<?= $current_item ? $current_item->buyer_intra : '' ?>" size = "45"/>
            </p>
        </fieldset>
        <fieldset class="round">
            <legend>Szállítás adatai</legend>
            
            <p>
                <label class = "inline-block" for="transporter_plate">Szállítójármű azonosítója, rendszám</label>
                <input type="text" name = "transporter_plate" id = "transporter_plate" value="<?= $current_item ? $current_item->transporter_plate : '' ?>" />
            </p>
            <p>
                <label class = "inline-block" for="start_date">Szállítás várható időtartama</label>
                <input type="text" name = "start_date" id = "start_date" value="<?= $current_item ? $current_item->start_date : '' ?>" class = "datepicker" />
            </p>
        </fieldset>
        <fieldset class="round">
            <legend>Szállítmány beérkezése</legend>
            <p>
                <label class = "inline-block" for="receiver_id">Beérkeztető tenyészetkódja</label>
                <!-- <input type="text" name = "receiver_id" id = "receiver_id" value="<?= $current_item ? $current_item->receiver_id : '' ?>" /> -->
                <?= form_dropdown('receiver_id', $breedersites, $current_item ? $current_item->receiver_id : '') ?>
            </p>
            <p>
                <label class = "inline-block" for="received">Beérkezés dátuma</label>
                <input type="text" name = "received" id = "received" value="<?= $current_item ? $current_item->received : '' ?>" class = "datepicker" />
            </p>
    
            <p>
                <label class = "inline-block" for="received_piece">Beérkezett állatok/tojások száma</label>
                <input type="text" name = "received_piece" id = "received_piece" value="<?= $current_item ? $current_item->received_piece : '' ?>" />
            </p>
        </fieldset>
        <fieldset class="round">
            <legend>Beérkeztető állattartó aláírása</legend>
            <p>
                <label class = "inline-block" for="arrival_date">Aláírás dátuma</label>
                <input type="text" name = "arrival_date" id = "arrival_date" value="<?= $current_item ? $current_item->arrival_date : '' ?>" class = "datepicker" />
            </p>
        </fieldset>
        <fieldset class="round">
            <p>
                <button>Mentés</button>
            </p>
        </fieldset>
    
    <?= form_close(); ?>
</fieldset>
