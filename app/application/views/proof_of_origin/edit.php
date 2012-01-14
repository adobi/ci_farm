        <?php if (!$current_item): ?>
            
            <fieldset class="round">
                <p>
                    <a href="javascript:void(0)" class="button button-small" onclick = "$('#proof-of-origin').toggle();">Napos származási igazos megadása</a>
                </p>
            </fieldset>
        <?php endif ?>
        <fieldset class="round <?= !$current_item ? "hidden" : ''; ?>" id = "proof-of-origin">
            <p>
                <label class = "inline-block" for="mgszh_code">MgSzH által adott azonosító</label>
                <input type="text" name = "mgszh_code" id = "mgszh_code" value="<?= $current_item ? $current_item->mgszh_code : '' ?>" size = "15"/>
            </p>
    
            <p>
                <label class = "inline-block" for="cast_type_id">Fajta/hibrid neve</label>
                <!-- <input type="text" name = "cast_type_id" id = "cast_type_id" value="<?= $current_item ? $current_item->cast_type_id : '' ?>" />-->
                <?= form_dropdown('cast_type_id', $cast_types, $current_item ? $current_item->cast_type_id : ''); ?>
            </p>
    
            <p>
                <label class = "inline-block" for="klass">Törzskönyvi osztály</label>
                <input type="text" name = "klass" id = "klass" value="<?= $current_item ? $current_item->klass : '' ?>" size = "15"/>
            </p>
    
            <p>
                <label class = "inline-block" for="male_piece">Hímivar darab</label>
                <input type="text" name = "male_piece" id = "male_piece" value="<?= $current_item ? $current_item->male_piece : '' ?>" size = "15"/>
            <!-- 
            </p>
    
            <p>
             -->    
                <label class = "inline-block" style="width: auto; margin-left:30px;" for="male_cast_type">Fajta/vonal</label>
                <!-- <input type="text" name = "male_cast_type" id = "male_cast_type" value="<?= $current_item ? $current_item->male_cast_type : '' ?>" /> -->
                <?= form_dropdown('male_cast_type', $cast_types, $current_item ? $current_item->male_cast_type : ''); ?>
            </p>
    
            <p>
                <label class = "inline-block" for="female_piece">Nőivar darab</label>
                <input type="text" name = "female_piece" id = "female_piece" value="<?= $current_item ? $current_item->female_piece : '' ?>" size = "15"/>
            <!-- 
            </p>
    
            <p>
             -->    
                <label class = "inline-block" style="width: auto; margin-left:30px;" for="female_cast_type">Fajta/vonal</label>
                <!-- <input type="text" name = "female_cast_type" id = "female_cast_type" value="<?= $current_item ? $current_item->female_cast_type : '' ?>" /> -->
                <?= form_dropdown('female_cast_type', $cast_types, $current_item ? $current_item->female_cast_type : ''); ?>
            </p>
    
            <p>
                <label class = "inline-block" for="stock_reason">Csoport létrejöttének okda</label>
                <input type="text" name = "stock_reason" id = "stock_reason" value="<?= $current_item ? $current_item->stock_reason : '' ?>" size = "52"/>
            </p>
    
            <p>
                <label class = "inline-block" for="parent_male_code">Szülőállomány kódja (hímivar)</label>
                <input type="text" name = "parent_male_code" id = "parent_male_code" value="<?= $current_item ? $current_item->parent_male_code : '' ?>"  size = "15"/>
            </p>
    
            <p>
                <label class = "inline-block" for="parent_female_code">Szülőállomány kódja (nőivar)</label>
                <input type="text" name = "parent_female_code" id = "parent_female_code" value="<?= $current_item ? $current_item->parent_female_code : '' ?>"  size = "15"/>
            </p>
            <!-- 
            <p>
                <label class = "block" for="holder_breeder_site_id">Tartó tenyészet</label>
                <input type="text" name = "holder_breeder_site_id" id = "holder_breeder_site_id" value="<?= $current_item ? $current_item->holder_breeder_site_id : '' ?>" />
            </p>
            -->
            <p>
                <label class = "inline-block" for="egg_code">Tojásjelölő kód</label>
                <input type="text" name = "egg_code" id = "egg_code" value="<?= $current_item ? $current_item->egg_code : '' ?>" size = "15"/>
            </p>
            <p>
                <label class = "inline-block" for="validity_until">Származási igazolás érvényessége</label>
                <input type="text" name = "validity_until" id = "validity_until" value="<?= $current_item ? to_date($current_item->validity_until) : '' ?>" class = "datepicker" />
            </p>
            <p>
                <label class = "inline-block" for="created">Keltezés</label>
                <input type="text" name = "created" id = "created" value="<?= $current_item ? to_date($current_item->created) : '' ?>" class = "datepicker" />
            </p>
            
            <!-- 
            <p>
                <label class = "block" for="delivery_id">Delivery_id</label>
                <input type="text" name = "delivery_id" id = "delivery_id" value="<?= $current_item ? $current_item->delivery_id : '' ?>" />
            </p>
             -->
             
            <!-- 
            <p>
                <label class = "block" for="certificate_code">Certificate_code</label>
                <input type="text" name = "certificate_code" id = "certificate_code" value="<?= $current_item ? $current_item->certificate_code : '' ?>" />
            </p>
             --> 
    
        </fieldset>
        
        <fieldset  class="round">
            <p>
                <button>Mentés</button>
            </p>        
        </fieldset>        