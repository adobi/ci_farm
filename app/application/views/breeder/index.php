
<p>
    <a href="<?= base_url() ?>breeder/edit" class="button" rel = "dialog" dialog_id = "0" title = "Új tenyésztő">új tenyésztő felvitele</a>
</p>

<p style="margin:10px 5px">
    <strong>Listázás: </strong>
    <a href="<?= base_url() ?>breeder/index/priority/<?= $by==='priority' ? $dest : 'asc' ?>" <?= !$by || $by === 'priority' ? 'style="font-weight:bold"' : '' ?>>
        &raquo; saját sorrend szerint <span class = "<?= !$by || $by === 'priority' ? $dest : 'asc' ?>"></span>
    </a>
    <a href="<?= base_url() ?>breeder/index/name/<?= $by === 'name' ? $dest : 'asc' ?>"<?= $by === 'name' ? 'style="font-weight:bold"' : '' ?>>
        &raquo; név szerint <span class = "<?= $by === 'name' ? $dest : 'asc'?>"></span>
    </a>
</p>

 
<?php if ($breeders): ?>

    <?php foreach ($breeders as $i=>$item): ?>
        <div class = "zebra span-19 round" style = "border:1px solid #ccc;">
            
            <strong class = "name"><?= $item->priority ?>. <?= $item->name ?></strong>
            <ul class = "horizontal-list span-18 horizontal-list-header">
                <li class="span-6">Cím</li>
                <li class="span-4">Telefonszám</li>
                <li class="span-4">Mobil</li>
                <li class="span-3">Email cím</li>
            </ul>
            <ul class="horizontal-list span-18">
                <li class="span-6"><?= $item->zip ?> <?= $item->city ?> <?= $item->address ?></li>
                <li class="span-4"><?= $item->phone ?></li>
                <li class="span-4"><?= $item->cell ?></li>
                <li class="span-3"><?= $item->email ?></li>
            </ul>

            <div class="span-19 text-right">
                <a class="button button-small" href="<?= base_url() ?>breedersite/for_breeder/<?= $item->id ?>">tenyészetei</a>
                <a class="button button-small" href="<?= base_url() ?>breeder/edit/<?= $item->id ?>" rel = "dialog" dialog_id = "<?= $item->id ?>" title = "Tenyésztő szerkesztése">szerkeszt</a>
                <?php if ($item->id != $actualBreederId): ?>
                    <a class="button button-small"  href="<?= base_url() ?>breeder/delete/<?= $item->id ?>" class = "delete">töröl</a>
                <?php endif ?>                <!-- <a href="<?= base_url() ?>breeder/delete/<?= $item->id ?>" class = "delete">töröl</a> -->
            </div>
        </div>
    <?php endforeach ?>
    <div class="pagination span-19">
        <?= $pagination_links; ?>
    </div>
    
<?php endif ?>


<?php if ($this->session->userdata('validation_error')): ?>
    <script type="text/javascript">
        $(function() {
            //$('a[rel=dialog]').trigger('click');
            App.TriggerDialogOpen('<?= $this->session->userdata("current_dialog_item") ?>')
        });
        
    </script>
<?php endif ?>
