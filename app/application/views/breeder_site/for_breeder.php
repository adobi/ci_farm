<h2 style="padding:10px;margin-bottom:0px; padding-bottom:0px;"><?= $breeder->name; ?> telephelyei</h2>

<div class = "span-20" style="margin-bottom:20px">
    <div class = "span-20 first inline-block">
        
        <?php if (isset($breeder_sites_select) && count($breeder_sites_select) !== 1): ?>
            <label for="breedersite-select" style="display:inline">Válasszon telephelyet</label>
            <?= form_dropdown('breeder_site_id', $breeder_sites_select, $this->session->userdata('selected_breedersite')); ?>
        <?php else: ?>
            <strong>Előbb vigyen fel telephelyet</strong>              
        <?php endif ?>
        <a href="<?= base_url(); ?>breedersite/edit/breeder/<?= $breeder->id; ?>" rel = "dialog" title = "Új telephely felvitele">Új telephely</a>
        
    </div>
</div>

<?php if ($breeder_sites): ?>
   
    <?php foreach ($breeder_sites as $item): ?>
        <fieldset>
            <legend>Telephely adatai</legend>
            <div class="span-20">
                <p>
                    <strong>Telephely iktatószáma:</strong> <?= $item->registration_number; ?>
                </p>
                <p>
                    <strong>Üzemeltető neve:</strong> <?= $breeder->name ?>
                </p>
                <p>
                    <strong>Viszony kezdete:</strong> <?= to_date($item->registered) ?>
                </p>
                <p>
                    <strong>Tenyészet fentázianeve:</strong> <?= $item->name ?>
                </p>
                <p>
                    <strong>Tenyészet megnevezése:</strong> <?= $item->designation ?>
                </p>                
                <p>
                    <strong>Tenyészet címe: </strong><?= $item->postal_code ?>, <?= $item->city ?>, <?= $item->address ?>
                </p>
                <p>
                    <strong>Tenyészet levelezési címe: </strong>
                    
                    <?= $item->postal_postal_code ?>, <?= $item->postal_city ?>, <?= $item->postal_address ?>
                </p>
            </div>
            <div class="span-20">
                
                <p>
                    <strong>Típus:</strong> <?= $item->type ?>
                </p>
                <p>
                    <strong>Telephely típus:</strong> <?= $site_types[$item->site_type] ?>
                </p>                
                <p>
                    <strong>ENAR felelős neve:</strong> <?= $item->enar_name ?>
                </p>
                <p>
                    <strong>ENAR felelős telefonszáma:</strong> <?= $item->enar_phone ?>
                </p>
                <p>
                    <strong>ENAR felelős faxszáma:</strong> <?= $item->enar_fax ?>
                </p>
                <p>
                    <strong>ENAR felelős email címe:</strong> <?= $item->enar_email ?>
                </p>
            </div>
            <div class="span-20">
                
                <p>
                    <a class = "button button-small" href="<?= base_url(); ?>stockyard/for_breedersite/<?= $item->id; ?>">istállók</a>
                    <a class = "button button-small" href="<?= base_url(); ?>breedersite/edit/<?= $item->id; ?>" dialog_id = "<?= $item->id; ?>" rel = "dialog" title = "Telephely szerkesztése">szerkeszt</a>
                    <a class = "button button-small delete" href="<?= base_url(); ?>breedersite/delete/<?= $item->id; ?>">töröl</a>
                </p>
            </div>
        </fieldset>
                <fieldset>
                    <legend>Tartási hely</legend>
                    <?php if ($item->holdingplaces): ?>
                        <?php foreach ($item->holdingplaces as $place): ?>
                            <p>
                                <strong>Azonosító:</strong> <?= $place->code ?>
                            </p>
                            <p>
                                <strong>Megnevezés:</strong> <?= $place->name ?>
                            </p>
                            <p>
                                <strong>Cím:</strong> <?= $place->postal_code ?>, <?= $place->city ?>, <?= $place->address ?>
                            </p>
                            <p>
                                <a class = "button button-small" href="<?= base_url() ?>holdingplace/edit/<?= $place->id ?>" rel = "dialog" title = "<?= $place->name ?> szerkesztése">szerkeszt</a>
                                <a class = "button button-small delete" href="<?= base_url() ?>holdingplace/delete/<?= $place->id ?>">töröl</a>
                            </p>
                            <fieldset style = "margin:5px -5px!important" class="round">
                                <legend>Tartási adatok</legend>
                                <p><a class = "button button-small" href="<?= base_url() ?>holdingdata/edit/place/<?= $place->id ?>" rel = "dialog" title = "Új adat fevitele">Új adat fevitele</a></p>
                                
                                <?php if ($place->holdingdata): ?>
                                    <table class = "inner-table" style = "border-left: 1px solid #ccc">
                                        <thead>
                                            <tr>
                                                <td>Faj</td>
                                                <td>Tartás kezdete</td>
                                                <td>Tartás vége</td>
                                                <td>Létszám</td>
                                                <td>Hasznosítás</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($place->holdingdata as $data):?>
                                                <tr>
                                                    <td><?= $data->type ?></td>
                                                    <td><?= to_date($data->start_date) ?></td>
                                                    <td><?= $data->end_date ? to_date($data->end_date) : '' ?></td>
                                                    <td><?= $data->size ?></td>
                                                    <td><?= $data->utilization ?></td>
                                                    <td  style="text-align:left">
                                                        <a class = "button button-small" href="<?= base_url() ?>holdingdata/edit/<?= $data->id ?>" rel = "dialog" title = "Tartási adat szerkesztése">szerkeszt</a>
                                                        <br />
                                                        <a class = "button button-small delete" href="<?= base_url() ?>holdingdata/delete/<?= $data->id ?>">töröl</a>
                                                    </td>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                <?php endif ?>
                                
                            </fieldset>
                            <fieldset style = "margin:5px -5px!important" class="round">
                                <legend>Kapacitás adatok</legend>
                                <p><a class = "button button-small" href="<?= base_url() ?>holdingcapacity/edit/place/<?= $place->id ?>" rel = "dialog" title = "Új kapacitási adat felvitele">Új adat felvitele</a></p>
                                <?php if ($place->holdingcapacitites): ?>
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
                                            <?php foreach ($place->holdingcapacitites as $data):?>
                                                <tr>
                                                    <td><?= $data->type ?></td>
                                                    <td><?= $data->size ?></td>
                                                    <td><?= to_date($data->created) ?></td>
                                                    <td  style="text-align:left">
                                                        <a class = "button button-small" href="<?= base_url() ?>holdingcapacity/edit/<?= $data->id ?>" rel = "dialog" title = "Tartási adat szerkesztése">szerkeszt</a>
                                                        <br />
                                                        <a class = "button button-small delete" href="<?= base_url() ?>holdingcapacity/delete/<?= $data->id ?>">töröl</a>
                                                    </td>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                <?php endif ?>
                                
                            </fieldset>
                        <?php endforeach ?>
                    <?php else: ?>
                        <p><a class = "button button-small" href="<?= base_url() ?>holdingplace/edit/breedersite/<?= $item->id ?>" rel = "dialog" title = "Új tartási hely felvitele">Új tartási hely felvitele</a></p>

                    <?php endif ?>
                </fieldset>
    <?php endforeach ?>
<?php endif ?>

<?php if ($this->session->userdata('validation_error')): ?>
    <script type="text/javascript">
        $(function() {
            //$('a[rel=dialog]').trigger('click');
            //App.TriggerDialogOpen('<?= $this->session->userdata("current_dialog_item") ?>')
        });
        
    </script>
<?php endif ?>


