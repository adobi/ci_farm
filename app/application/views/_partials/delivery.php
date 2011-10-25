<style type="text/css">
    .span-18 {
        background:#f7f7f7;
        margin:3px 20px;
    }
    
    .span-18 label {
        display:inline-block; width:210px;
    }
</style>
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
                        <label>Indító tenylszetkódja:</label><?= $item->seller_code ? $item->seller_code : 'kistermelő'; ?>
                    </p>
                    <p>
                        <label>Állattartó neve, tenyészet címe:</label> <?= $item->seller_name; ?> <?= $item->seller_address; ?>
                    </p>
                    <p>
                        <label>Indítás dátuma: </label><?= to_date($item->sell_date); ?>
                        <label class="text-center">Indított databszám: </label><?= $item->sell_piece; ?>
                    </p>
                </div>

                <?php if ($item->chickenstocks): ?>
                    <div class="span-18">
                        <table class="zebra-striped">
                            <thead style="font-size:0.9em;">
                                <tr>
                                    
                                    <th colspan = "2">Törzsállomány</th>
                                    <th class="span-3">INTRA/KÁBO szám</th>
                                    <th>Keltető teny. kódja</th>
                                    <th>Kelés dátuma</th>
                                    <th>Darabszám</th>
                                    <th class="span-4">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1; foreach ($item->chickenstocks as $stock): ?>
                                <tr>
                                    <td>
                                        <!-- <input type="checkbox" name = "concentrate" />-->
                                        <?= $i++; ?>
                                    </td>
                                    <td><?= $stock->stock_code; ?></td>
                                    <td><?= $stock->intra_code; ?></td>
                                    <td class="text-center"><?= $stock->seller_code; ?></td>
                                    <td class="text-center"><?= to_date($stock->hatching_date); ?></td>
                                    <td class="text-center"><?= $stock->piece; ?></td>
                                    <td>
                                        <!-- 
                                        <p>
                                            <a href="<?= base_url(); ?>chickenstock/show/<?= $stock->id; ?>" rel = "dialog" title = "Részletek">bővebben</a>
                                        </p>
                                         -->
                                        <!-- <p> -->
                                            <a class="button button-small"  href="<?= base_url(); ?>chickenstock/edit/<?= $stock->id; ?>" rel = "dialog" title = "Módosítás">szerkeszt</a>
                                            <a class="delete button button-small" href="<?= base_url(); ?>chickenstock/delete/<?= $stock->id; ?>">töröl</a>
                                        <!-- </p> -->
                                    </td>
                                </tr>
                            <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>    
                <?php endif ?>
                
                <div class="span-18 text-right" style="background:#eaeaea">
                    <a href="<?= base_url(); ?>chickenstock/edit/delivery/<?= $item->id; ?>" rel = "dialog" title = "Új állomány felvitele" class="button button-small">új állomány</a>
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
                    <a href="<?= base_url(); ?>delivery/edit/<?= $item->id; ?>"  class="button small-button">szerkeszt</a>
                    <a href="<?= base_url(); ?>delivery/delete/<?= $item->id; ?>" class="button small-button delete">töröl</a>
                </div>
            </fieldset>
            
        <?php endforeach ?>            