<!-- <h2 style="padding:10px;margin-bottom:0px; padding-bottom:0px;"><?= $breeder->name; ?> telephelyei</h2> -->

<?php if ($breeder_site): ?>
    <h2 style="padding:10px;margin-bottom:0px; padding-bottom:0px;">
        <?= $breeder_site->code; ?> - <?= $breeder_site->name; ?>
    </h2>
<?php else: ?>
    <h2 style="padding:10px;margin-bottom:0px; padding-bottom:0px;"><?= $breeder->name; ?> tenyészetei</h2>
<?php endif ?>

<!-- <div class = "span-19" style="margin-bottom:20px"> -->
<fieldset class = "round">
    <legend>Válasszon tenyészetet</legend>
    <div class = "span-18">
        
        <?php if (isset($breeder_sites_select) && count($breeder_sites_select) !== 1): ?>
            <!-- <label for="breedersite-select" style="display:inline">Válasszon tenyészetet</label> -->
            <?= form_dropdown('breeder_site_id', $breeder_sites_select, $this->session->userdata('selected_breedersite')); ?>
        <?php else: ?>
            <!-- <strong>Előbb vigyen fel tenyészetet</strong> -->
        <?php endif ?>
        <a class="button" href="<?= base_url(); ?>breedersite/edit/breeder/<?= $breeder->id; ?>" rel = "dialog" title = "Új telephely felvitele">Új tenyészet felvitele</a>
    </div>
    <?php if ($breeder_site): ?>
        <div class="span-19 text-right" style="margin-right:0px;">
            <!-- <a class = "button" style = "margin-right: 30px;" href="<?= base_url(); ?>stockyard/for_breedersite/<?= $breeder_site->id; ?>">istállók</a> -->
            <a href="<?= base_url() ?>breedersite/edit/<?= $breeder_site->id ?>" class="button fl" rel = "dialog" title = "tenyészet szerkesztése">szerkeszt</a>
            <a href="<?= base_url() ?>breedersite/delete/<?= $breeder_site->id ?>" class="button delete">töröl</a>
        </div>
    <?php endif ?>
</fieldset>
<!-- </div> -->

<?php if ($breeder_site): ?>
   
        <fieldset  class="breedersite round">
            <legend>Telephely adatai</legend>
            
            <p>
                <strong>Telephely iktatószáma:</strong> <?= $breeder_site->registration_number; ?>
            </p>
            <p>
                <strong>Tartó/üzemeltető ügyfél-regisztrációszsáma:</strong> <?= $breeder_site->code; ?>
            </p>
            <p>
                <strong>Tartó/üzemeltető neve:</strong> <?= $breeder_site->breeder_name ?>
            </p>
            <p>
                <strong>Tartó viszony kezdete:</strong> <?= to_date($breeder_site->registered) ?>
            </p>
            <p>
                <strong>Tenyészet neve:</strong> <?= $breeder_site->designation ?>
            </p>
            <!-- 
            <p>
                <strong>Tenyészet megnevezése:</strong> <?= $breeder_site->designation ?>
            </p>                
             --> 
            <p>
                <strong>Tenyészet címe: </strong><?//= $breeder_site->postal_code ?> <?//= $breeder_site->city ?> <?= $breeder_site->address ?>
            </p>
            <p>
                <strong>Tenyészet levelezési címe: </strong>
                
                <?//= $breeder_site->postal_postal_code ?> <?//= $breeder_site->postal_city ?> <?= $breeder_site->postal_address ?>
            </p>
            <p>
                <strong>Típus:</strong> <?= $breeder_site->type ?>
            </p>
            <!-- 
            <p>
                <strong>Telephely típus:</strong> <?= @$site_types[$breeder_site->site_type] ?>
            </p> 
             -->               
            <p>
                <strong>ENAR felelős/kapcsolattartó/keltetésvezető neve:</strong> <?= $breeder_site->enar_name ?>
            </p>
            <p>
                <strong>ENAR felelős/kapcsolattartó/keltetésvezető telefonszáma:</strong> <?= $breeder_site->enar_phone ?>
            </p>
            <p>
                <strong>ENAR felelős/kapcsolattartó/keltetésvezető faxszáma:</strong> <?= $breeder_site->enar_fax ?>
            </p>
            <p>
                <strong>ENAR felelős/kapcsolattartó/keltetésvezető email címe:</strong> <?= $breeder_site->enar_email ?>
            </p>
            
        </fieldset>
        <fieldset class="breedersite round">
            <legend>Tartási helyek</legend>
            <p>
                <strong>Tartási/vágási hely azonosítója:</strong> <?= $breeder_site->holding_place_id ?>
            </p>
            <p>
                <strong>Tartási/vágási hely megnevezése:</strong> <?= $breeder_site->holding_place_name ?>
            </p>
            <p>
                <strong>Tartási/vágási hely címe:</strong> 
                <?//= $breeder_site->holding_place_postal_code ?> <?//= $breeder_site->holding_place_city ?> <?= $breeder_site->holding_place_address ?>
            </p>
            <fieldset class="round">
                
                <legend>Tartási adatok</legend>
                    <table class = "inner-table" style = "border-left: 1px solid #ccc">
                        <thead>
                            <tr>
                                <td>Faj</td>
                                <td>Tartás/vágás kezdete</td>
                                <td>Tartás/vágás vége</td>
                                <td>Létszám</td>
                                <td>Hasznosítás</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?= $breeder_site->holding_data_type ?></td>
                                <td><?= to_date($breeder_site->holding_data_start) ?></td>
                                <td><?= $breeder_site->holding_data_end ? to_date($breeder_site->holding_data_end) : '' ?></td>
                                <td><?= $breeder_site->holding_data_count ?></td>
                                <td><?= $breeder_site->holding_data_utilization ?></td>
                            </tr>
                        </tbody>
                    </table>
                <?php //endif ?>
                
            </fieldset>
            <fieldset class="round">
                <legend>Kapacitás adatok</legend>
                <p><a class = "button button-small" href="<?= base_url() ?>holdingcapacity/edit/place/<?= $breeder_site->id ?>" rel = "dialog" title = "Új kapacitási adat felvitele">Új adat felvitele</a></p>
                <?php if ($breeder_site->capacity): ?>
                    <table class = "inner-table" style = "border-left: 1px solid #ccc">
                        <thead>
                            <tr>
                                <td>Típusa</td>
                                <td>Mértéke</td>
                                <td>Létrehozva</td>
                                <td>&nbsp;</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($breeder_site->capacity as $data):?>
                                <tr>
                                    <td><?= $data->type ?></td>
                                    <td><?= $data->size ?></td>
                                    <td><?= to_date($data->created) ?></td>
                                    <td class="span-4 text-right">
                                        <a class = "button button-small" href="<?= base_url() ?>holdingcapacity/edit/<?= $data->id ?>" rel = "dialog" title = "Tartási adat szerkesztése">szerkeszt</a>
                                        
                                        <a class = "button button-small delete" href="<?= base_url() ?>holdingcapacity/delete/<?= $data->id ?>">töröl</a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                <?php endif ?>
                
            </fieldset>
        </fieldset>
<?php endif ?>

<?php if ($this->session->userdata('validation_error')): ?>
    <script type="text/javascript">
        $(function() {
            //$('a[rel=dialog]').trigger('click');
            //App.TriggerDialogOpen('<?= $this->session->userdata("current_dialog_item") ?>')
        });
        
    </script>
<?php endif ?>


