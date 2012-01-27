<fieldset class="round">
    <legend>Válasszon tenyészetet</legend>
        <?= form_dropdown('breeder_site_id', $breeder_sites_select, $this->session->userdata('selected_breedersite')); ?>
        <a class="button" href="<?= base_url(); ?>breedersite/edit/breeder/<?= $breeder_id; ?>" rel = "dialog" title = "Új telephely felvitele">Új tenyészet felvitele</a>
</fieldset>

<style type="text/css">
    .span-18 {
        background:#f7f7f7;
        margin:3px 20px;
    }
    
    .span-18 label {
        display:inline-block; width:300px;
    }
    .label-in-label {
        width:150px!important;
        font-weight:normal;
    }
    .span-18 p {
        border-bottom:0px solid #eaeaea;
    }
    
    .span-18 p:last-child {
        border-bottom:0;
    }
</style>

    <fieldset class="round">
        <legend>Keresés szállítólevél sorszámra</legend>
        <?= form_open(); ?>
            <p>
                <input type="text" name = "serial_number" value = "<?= $this->session->userdata('delivery_serial_number') ?>" size = "45"/>
                <button class="button-small">Keres</button>
            </p>
        <?= form_close(); ?>
    </fieldset>     
    <?php if ($items): ?>
        <?php if (isset($pagination_links)): ?>
            <div class="pagination span-19">
                <?= $pagination_links; ?>
            </div>    
        <?php endif ?>                
        <?php foreach ($items as $item): ?>
            <fieldset class="round">
                <div class="span-18 highlighted">
                    <p>
                        <label>Törzsállomány azonosító szám:</label>
                        <?php if (!$item->certificate_code): ?>
                            <!-- <a class = "button button-small" rel = "dialog" href="<?= base_url(); ?>chickenstock/add_certificate/<?= $item->id; ?>" title = "Törzsállomány azonosító száma felvitele">azonosító szám felvitele</a> -->
                        <?php else: ?>
                            <span style="font-size:1.6em; position:relative; top:2px;"><?= $item->certificate_code; ?></span>
                            <!-- <a class = "fr button button-small" rel = "dialog" href="<?= base_url(); ?>chickenstock/add_certificate/<?= $item->id; ?>" title = "Törzsállomány azonosító száma módosítása">szerkeszt</a> -->
                        <?php endif ?>
                    </p>
                </div>
                <div class="span-18">
                    <p><label>Tenyésztő szervezet azonosítószáma:</label> <?//= $item->mgszh_code; ?></p>
                    <p><label>Tenyésztő szervezet neve:</label> <?= $item->seller_name; ?></p>
                    <p><label>Faj:</label> <?//= $item->cast_name; ?></p>
                    <p><label>Fajta:</label> <?//= $item->cast_type_name; ?></p>
                    <p><label>Szaporitási fokozat:</label> </p>
                    <p><label>Létszám érvényesség kezdete: </label> <?= to_date($item->hatching_date); ?></p>
                    <p><label>Létszám érvényességének vége: </label></p>
                    <p>
                        <label>Létszám</label>
                        <label class = "label-in-label">
                            Nőivar: <?//= $item->female_piece; ?>
                        </label>
                        <label class = "label-in-label">
                            Hímivar: <?//= $item->male_piece; ?>
                        </label>
                    </p>
                    <p><label>Tenyészetkód:</label> <?= $item->buyer_code; ?></p>
                    <p><label>Tartó neve:</label> <?= $item->buyer_name; ?></p>
                    <p><label>Tenyészet címe:</label> <?= $item->buyer_address; ?></p>
                </div>
                
                <div class="span-18">
                    <p style="margin-top:15px;border-bottom:0px;"><label>Törzsállomány eredete (eredetei):</label></p>
                    
                    <p style="margin-top:10px;"><label>Keltetés(ek)</label></p>
                    
                </div>
                
                <?php if (@$item->male_piece): ?>
                    <div class="span-18">
                        <p><label>Keltető tenyészetkódja:</label> <?= $item->seller_code; ?></p>
                        <p><label>Keltető üzembentartó neve:</label> <?= $item->seller_name; ?></p>
                        <p><label>Szülő törzsállomány azonosítója:</label> <?//= $item->parent_male_code; ?></p>
                        <p><label>Kelés dátuma:</label> <?= to_date($item->hatching_date); ?></p>
                        <p>
                            <label>Törzsállományhoz tartozó létszám:</label>
                            <label class = "label-in-label">
                                Nőivar: 
                            </label>
                            <label class = "label-in-label">
                                Hímivar: <?//= $item->male_piece; ?>
                            </label>                            
                        </p>
                    </div>
                <?php endif ?>
                <?php if (@$item->female_piece): ?>
                    <div class="span-18">
                        <p><label>Keltető tenyészetkódja:</label> <?= $item->seller_code; ?></p>
                        <p><label>Keltető üzembentartó neve:</label> <?= $item->seller_name; ?></p>
                        <p><label>Szülő törzsállomány azonosítója:</label> <?//= $item->parent_female_code; ?></p>
                        <p><label>Kelés dátuma:</label> <?= to_date($item->hatching_date); ?></p>
                        <p>
                            <label>Törzsállományhoz tartozó létszám:</label>
                            <label class = "label-in-label">
                                Nőivar:  <?//= $item->female_piece; ?>
                            </label>
                            <label class = "label-in-label">
                                Hímivar:
                            </label>                            
                        </p>                        
                    </div>
                <?php endif ?>
            </fieldset>
        <?php endforeach ?>
        <?php if (isset($pagination_links)): ?>
            <div class="pagination span-19">
                <?= $pagination_links; ?>
            </div>    
        <?php endif ?>        
    <?php endif ?>
