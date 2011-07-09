<h2 style="padding:10px;"><?= $breeder->name; ?> telephelyei</h2>
<p style="padding:10px;">
    <a class = "button" href="<?= base_url() ?>breedersite/edit/breeder/<?= $breeder->id ?>" dialog_id = "0" rel = "dialog" title = "Új telephely felvitele">új telephely</a>
</p>

<?php if ($breeder_sites): ?>
    <table class = "week-table">
        <thead>
            <tr>
                <td class = "span-7">Telephely adatai</td>
                <td class = "span-10">Tartási helyek</td>
                <td class="span-2">&nbsp;</td>
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
                    <strong>Tenyészet levelezési címe: </strong><br/> <?= $item->postal_postal_code ?>, <?= $item->postal_zip ?>, <?= $item->postal_address ?>
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
            </td>
            <td>
                <fieldset>
                    <legend>Tartási helyek</legend>
                    <p><a href="#">Új tartási hely felvitele</a></p>
                </fieldset>
            </td>
            <td>
                <!--<a href="<?= base_url(); ?>fakkgroup/for_breedersite/<?= $item->id; ?>">fakk csoportok</a><br />-->
                <a href="<?= base_url(); ?>stockyard/for_breedersite/<?= $item->id; ?>">ólak</a><br />
                <a href="<?= base_url(); ?>breedersite/edit/<?= $item->id; ?>" dialog_id = "<?= $item->id; ?>" rel = "dialog" title = "Telephely szerkesztése">szerkeszt</a><br />
                <a href="<?= base_url(); ?>breedersite/delete/<?= $item->id; ?>" class = "delete">töröl</a>
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
            App.TriggerDialogOpen('<?= $this->session->userdata("current_dialog_item") ?>')
        });
        
    </script>
<?php endif ?>


