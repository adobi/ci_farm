<style type="text/css">
    .span-18 {
        background:#f7f7f7;
        margin:3px 20px;
    }
    
    .span-18 label {
        display:inline-block; width:210px;
    }
</style>

<fieldset class="round">
    <legend>Szállítólvelek</legend>
    <p>
        <a class="button" href="<?= base_url(); ?>delivery/edit" rel_ = "dialog" title = "Új szállítólevél felvitele">Új szállítólevél felvitele</a>
    </p>
</fieldset>

<?php if ($items): ?>    
    
    
        <?php foreach ($items as $item): ?>
            <fieldset class="round">
                <div class="span-18">
                    <p><label >Sorszám:</label><?= $item->serial_number; ?></p>
                </div>
                <div class="span-18">
                    <p>
                        <label>Állatfaj:</label> <?= $item->cast_name; ?>
                        <label class="text-center"><?= $model->getType($item->type); ?></label>
                        <label class="text-center"><?= $model->getIntendedUse($item->intended_use); ?></label>
                        <label>Állategészségügyi bizonyítvány száma:</label> <?= $item->veterinary_code; ?>
                    </p>
                </div>
                
                <div class="span-18">
                    <p>
                        <label>Indító tenylszetkódja:</label><?= $item->seller_code; ?>
                    </p>
                    <p>
                        <label>Állattartó neve, tenyészet címe:</label> <?= $item->seller_name; ?> <?= $item->seller_address; ?>
                    </p>
                    <p>
                        <label>Indítás dátuma: </label><?= to_date($item->sell_date); ?>
                        <label class="text-center">Indított databszám: </label><?= $item->sell_piece; ?>
                    </p>
                </div>
                
                <div class="span-18">
                    <p>
                        <label>Célállomás tenyészetkódja:</label><?= $item->buyer_code; ?>
                    </p>
                    <p>
                        <label>Állattartó neve, tenyészet címe:</label> <?= $item->buyer_name; ?> <?= $item->buyer_address; ?>
                    </p>
                    <p>
                        <label>INTRA/KÁBO szám:</label> <?= $item->buyer_intra; ?>
                    </p>
                    
                </div>
                <div class="span-18">
                    <p>
                        <label>Szállítójármű azonosítója, rendszáma:</label> <?= $item->transporter_plate; ?>
                    </p>
                </div>
                
                <div class="span-18">
                    <p>
                        <label>Beérkeztető tenyészetkódja:</label> <?= $item->receiver_code; ?>
                    </p>
                    <p>
                        <label>Állattartó neve, tenyészet címe:</label> <?= $item->receiver_name; ?> <?= $item->receiver_address; ?>
                    </p>
                    <p>
                        <label>Beérkezés dátuma:</label> <?= to_date($item->received); ?>
                        <label class="text-center">Beérkezett állatok/tojások száma:</label> <?= $item->received_piece; ?>
                    </p>
                </div>
                
                <div class="span-18 text-right" style="background:#eaeaea">
                    <a href="<?= base_url(); ?>delivery" class="button small-button">állományok</a>
                    <a href="<?= base_url(); ?>delivery/edit/<?= $item->id; ?>"  class="button small-button">szerkeszt</a>
                    <a href="<?= base_url(); ?>delivery/delete/<?= $item->id; ?>" class="button small-button delete">töröl</a>
                </div>
            </fieldset>
        <?php endforeach ?>
        <div class="pagination span-19">
            <?= $pagination_links; ?>
        </div>    
<?php endif ?>
