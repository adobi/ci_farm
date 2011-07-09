<h2 style="padding:10px;"><?= $breeder->name; ?> telephelyei</h2>
<p style="padding:10px;">
    <a class = "button" href="<?= base_url() ?>breedersite/edit/breeder/<?= $breeder->id ?>" dialog_id = "0" rel = "dialog" title = "Új telephely felvitele">új telephely</a>
</p>

<?php if ($breeder_sites): ?>
    <table class = "week-table">
        <thead>
            <tr>
                <td class = "span-7">Telephely adatai</td>
                <td class = "span-13">Tartási helyek</td>
            </tr>
        </thead>
        <tbody class="week-tbody">
            
    <?php foreach ($breeder_sites as $item): ?>
        <tr class="week-tr middle">
            <td>
                <p>
                    <strong>Üzemeltető neve:</strong> <?= $breeder->name ?>
                </p>
                <p>
                    <strong>Viszony kezdete:</strong> <?= to_date($item->registered) ?>
                </p>
                <p>
                    <strong>Tenyészet neve:</strong> <?= $item->name ?>
                </p>
                <p>
                    <strong>Tenyészet címe: </strong> <br /> <?= $item->postal_code ?>, <?= $item->city ?>, <?= $item->address ?>
                </p>
                <p>
                    <strong>Tenyészet levelezési címe: </strong><br/> <?= $item->postal_postal_code ?>, <?= $item->postal_city ?>, <?= $item->postal_address ?>
                </p>
                <p>
                    <strong>Típus:</strong> <?= $item->type ?>
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
                <p>
                    <a class = "button button-small" href="<?= base_url(); ?>stockyard/for_breedersite/<?= $item->id; ?>">ólak</a>
                    <a class = "button button-small" href="<?= base_url(); ?>breedersite/edit/<?= $item->id; ?>" dialog_id = "<?= $item->id; ?>" rel = "dialog" title = "Telephely szerkesztése">szerkeszt</a>
                    <a class = "button button-small delete" href="<?= base_url(); ?>breedersite/delete/<?= $item->id; ?>">töröl</a>
                </p>
                
            </td>
            <td>
                <fieldset>
                    
                    <p><a class = "button button-small" href="<?= base_url() ?>holdingplace/edit/breedersite/<?= $item->id ?>" rel = "dialog" title = "Új tartási hely felvitele">Új tartási hely felvitele</a></p>
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
                    <?php endif ?>
                </fieldset>
            </td>
        </tr>
    <?php endforeach ?>
        </tbody>
    </table>
<?php endif ?>

<?php if ($this->session->userdata('validation_error')): ?>
    <script type="text/javascript">
        $(function() {
            //$('a[rel=dialog]').trigger('click');
            //App.TriggerDialogOpen('<?= $this->session->userdata("current_dialog_item") ?>')
        });
        
    </script>
<?php endif ?>


