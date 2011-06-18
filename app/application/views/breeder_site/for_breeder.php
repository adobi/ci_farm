<h2 style="padding:10px;"><?= $breeder->name; ?> telephelyei</h2>
<p style="padding:10px;">
    <a class = "button" href="<?= base_url() ?>breedersite/edit/breeder/<?= $breeder->id ?>" dialog_id = "0" rel = "dialog" title = "Új telephely felvitele">új telephely</a>
</p>

<?php if ($breeder_sites): ?>
    <table class = "week-table">
        <thead>
            <tr>
                <td class="span-3">Név</td>
                <td class="span-2">Kód</td>
                <td class="span-2">MGSZH</td>
                <td class="span-5">Cím</td>
                <td class="span-4">Megjegyzés</td>
                <td class="span-3">&nbsp;</td>
            </tr>
        </thead>
        <tbody class="week-tbody">
            
    <?php foreach ($breeder_sites as $item): ?>
        <tr class="week-tr middle">
            <td><?= $item->name; ?></td>
            <td><?= $item->code; ?></td>
            <td><?= $item->mgszh; ?></td>
            <td><?= $item->postal_code; ?> - <?= $item->city; ?> <?= $item->address; ?></td>
            <td><?= $item->description; ?></td>
            <td>
                <!--<a href="<?= base_url(); ?>fakkgroup/for_breedersite/<?= $item->id; ?>">fakk csoportok</a><br />-->
                <a href="<?= base_url(); ?>stockyard/for_breedersite/<?= $item->id; ?>">istállók</a><br />
                <a href="<?= base_url(); ?>breedersite/edit/<?= $item->id; ?>" dialog_id = "<?= $item->id; ?>" rel = "dialog" title = "Telephely szerkesztése">szerkeszt</a><br />
                <a href="<?= base_url(); ?>breedersite/delete/<?= $item->id; ?>" class = "delete">töröl</a>
            </td>
        </tr>
        <!-- 
        <div class = "zebra span-19 round"  style = "border:1px solid #ccc;">
            <ul>
                <li><strong>Név</strong>: <?= $item->name; ?></li>
                <li><strong>Kód</strong>: <?= $item->code; ?></li>
                <li><strong>MGSZH</strong>: <?= $item->mgszh; ?></li>
                <li><strong>Irányítószám</strong>: <?= $item->code; ?> - <?= $item->city; ?></li>
                <li><strong>Cím</strong>: <?= $item->address; ?></li>
                <li><strong>Megjegyzés</strong>: <?= $item->description; ?></li>
            </ul>
            <a href="<?= base_url(); ?>breedersite/delete/<?= $item->id; ?>" class = "delete">töröl</a>
            <a href="<?= base_url(); ?>breedersite/edit/<?= $item->id; ?>" dialog_id = "<?= $item->id; ?>" rel = "dialog" title = "Telephely szerkesztése">szerkeszt</a>
            <a href="<?= base_url(); ?>fakkgroup/for_breedersite/<?= $item->id; ?>">fakk csoportok</a>
        </div>            
         -->
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


