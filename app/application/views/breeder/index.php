
<p>
    <a href="<?= base_url() ?>breeder/edit" class="button" rel = "dialog" dialog_id = "0" title = "Új tenyésztő">új tenyésztő felvitele</a>
</p>

 
<?php if ($breeders): ?>
    <?php foreach ($breeders as $i=>$item): ?>
        <div class = "zebra span-19 round" style = "border:1px solid #ccc;">
            
            <strong class = "name"><?= $item->name ?></strong>
            <ul style="list-style-type:none">
                <li><strong>Cím:</strong><?= $item->postal_code ?>, <?= $item->city ?>, <?= $item->address ?></li>
                <li><strong>Telefonszám: </strong><?= $item->phone ?></li>
                <li><strong>Mobil: </strong><?= $item->cell ?></li>
                <li><strong>Email: </strong><?= $item->email ?></li>
            </ul>
            <?php if ($item->id != $actualBreederId): ?>
                <a class="button button-small"  href="<?= base_url() ?>breeder/delete/<?= $item->id ?>" class = "delete">töröl</a>
            <?php endif ?>
            <!-- <a href="<?= base_url() ?>breeder/delete/<?= $item->id ?>" class = "delete">töröl</a> -->
            <a class="button button-small" href="<?= base_url() ?>breeder/edit/<?= $item->id ?>" rel = "dialog" dialog_id = "<?= $item->id ?>" title = "Tenyésztő szerkesztése">szerkeszt</a>
            <a class="button button-small" href="<?= base_url() ?>breedersite/for_breeder/<?= $item->id ?>">tenyészetei</a>
        </div>
    <?php endforeach ?>
<?php endif ?>


<?php if ($this->session->userdata('validation_error')): ?>
    <script type="text/javascript">
        $(function() {
            //$('a[rel=dialog]').trigger('click');
            App.TriggerDialogOpen('<?= $this->session->userdata("current_dialog_item") ?>')
        });
        
    </script>
<?php endif ?>
