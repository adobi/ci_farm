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
                        <table class="zebra-striped zebra-striped-ternary">
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
                                    <td class="text-right">
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
                                <tr>
                                    <td colspan = "5" style="background: #FEFBF3">
                                        Törzsállomány azonosító száma (Hatósági bizonyítvány): <strong><?= $stock->certificate_code; ?></strong>
                                    </td>
                                    <td colspan = "2" class = "text-right" style="background: #FEFBF3">
                                        <?php if (!$stock->certificate_code): ?>
                                            <a class = "button button-small" rel = "dialog" href="<?= base_url(); ?>chickenstock/add_certificate/<?= $stock->id; ?>" title = "Törzsállomány azonosító száma felvitele">azononosító felvitele</a>
                                        <?php else: ?>
                                            <a class = "fr button button-small" rel = "dialog" href="<?= base_url(); ?>chickenstock/add_certificate/<?= $stock->id; ?>" title = "Törzsállomány azonosító száma módosítása">azononosító szerkesztése</a>
                                        <?php endif ?>
                                    </td>
                                </tr>
                                <!-- 
                                <tr>
                                    <td colspan = "5" style="background: #FEFBF3">
                                        Napos származási igazolás
                                    </td>
                                    <td colspan = "2" class = "text-right" style="background: #FEFBF3">
                                        <a class="button button-small" href="<?php echo base_url() ?>" rel = "dialog" title="Napos származási igazolás">igazolás</a>
                                    </td>
                                </tr>
                                 -->
                            <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>    
                <?php endif ?>
                
                <div class="span-18 text-right" style="background:#eaeaea">
                    <a class="button button-small" href="<?php echo base_url() ?>" rel = "dialog" title="Napos származási igazolás">származási igazolás</a>
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
                
                    
                    
                    <div class = "span-18 hidden" id = "delivery-vacinarry">
                        <label>Allategészségügyi igazolás</label>
                        <div class="span-18">
                            Alúlírott kezelő állatorvos igazolom hogy:
                        </div>
                        <ul style="list-style-type:none; margin-bottom:0px;" class="span-18">
                            <li class="span-18">
                                <div class="span-17" style="padding:0px;">
                                    <div class="span-1 checkbox-wrapper" style="top:15px;">
                                        <input type="checkbox" name = "stmt_1" id = "stmt_1" value = "1" <?= $item->stmt_1 ? 'checked = "checked"' : ''; ?>/> 
                                    </div>
                                    <div class = "span-16" style="margin:0;">
                                        a szállítólevélen leírt állatokat <?= $item ? to_date($item->stmt_1_date) : '' ?>-án/én
                                        <!-- <input type="text" name = "" id = "" size = "2"/> óra <input type="text" name = "" id = "" size = "2"/> perckor  -->
                                        az indító tenyészetben megvizsgáltam és azokat egészségesnek találtam,
                                    </div>
                                </div>
                            </li>
                            
                            <li class="span-18">
                                <div class = "span-17" style="padding:0px;">
                                    <div class="span-1 checkbox-wrapper">
                                        <input type="checkbox" name = "stmt_2" id = "stmt_2" value = "1" <?= $item->stmt_2 ? 'checked = "checked"' : ''; ?> /> 
                                    </div>
                                    <div class = "span-16" style="margin:0;">
                                        a vizsgálat időpontjában a szállítólevélen leírt állatok a vonatkozó állatvédelmi jogszabályokkal összhangban
                                        a tervezett szállításra alkalmas állapotban voltak;
                                    </div>
                                </div>
                            </li>
                            
                            <li class="span-18">
                                <div class = "span-17" style="padding:0px;">
                                    <div class="span-1 checkbox-wrapper">
                                        <input type="checkbox" name = "stmt_3" id = "stmt_3" value = "1"  <?= $item->stmt_3 ? 'checked = "checked"' : ''; ?>/> 
                                    </div>
                                    <div class = "span-16" style="margin:0;">
                                        a szállítólevélen leírt szállítmány, illetve származási állománya baromfipestis elleni immunizálásra került 
                                        az alábbiak szerint
                                        <table class="zebra-striped">
                                            <thead>
                                                <tr>
                                                    <th>Felhasznált oltóanyag</th>
                                                    <th>immunizálás időpontja</th>
                                                    <th>a használt törzs neve</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <?= $item ? $item->vaccine_1 : ''; ?>
                                                    </td>
                                                    <td>
                                                        <?= $item ? to_date($item->vaccine_1_date) : '' ?>
                                                    </td>
                                                    <td>
                                                        <?= $item ? $item->trunk_1 : ''; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <?= $item ? $item->vaccine_2 : ''; ?>
                                                    </td>
                                                    <td>
                                                        <?= $item ? to_date($item->vaccine_2_date) : '' ?>
                                                    </td>
                                                    <td>
                                                        <?= $item ? $item->trunk_2 : ''; ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="span-18">
                            Vágásra történő szállítás:
                        </div>
                        <ul style="list-style-type:none; margin-bottom:0px;" class="span-18">
                            <li class="span-18">
                                <div class = "span-17" style="padding:0px;">
                                    <div class="span-1 checkbox-wrapper">
                                        <input type="checkbox" name = "stmt_4" id = "stmt_4" value = "1"  <?= $item->stmt_4 ? 'checked = "checked"' : ''; ?>/> 
                                    </div>
                                    <div class = "span-16" style="margin:0;">
                                        az említett állatokkal kapcsolatos nyilvántartás és dokumentáció megfelel a jogi követelménynek
                                        és nem akadályozza az állatok levágását
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="span-18">
                            Nem vágásra történő szállítás:
                        </div>
                        <ul style="list-style-type:none; margin-bottom:0px;" class="span-18">
                            <li class="span-18">
                                <div class = "span-17" style="padding:0px;">
                                    <div class="span-1 checkbox-wrapper">
                                        <input type="checkbox" name = "stmt_5" id = "stmt_5" value = "1"  <?= $item->stmt_5 ? 'checked = "checked"' : ''; ?>/> 
                                    </div>
                                    <div class = "span-16" style="margin:0;">
                                        a szállítólevélen leírt szállítmány, illetve származási állománya immunizálásra került az alábbiak szerint
                                        <table class="zebra-striped">
                                            <thead>
                                                <tr>
                                                    <th>Felhasznált oltóanyag</th>
                                                    <th>immunizálás időpontja</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <?= $item ? $item->vaccine_3 : ''; ?>
                                                    </td>
                                                    <td>
                                                        <?= $item ? to_date($item->vaccine_3_date) : '' ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <?= $item ? $item->vaccine_4 : ''; ?>
                                                    </td>
                                                    <td>
                                                        <?= $item ? to_date($item->vaccine_4_date) : '' ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>                                
                                    </div>
                                </div>
                            </li>
                            <li class="span-18">
                                <div class = "span-17" style="padding:0px;">
                                    <div class="span-1 checkbox-wrapper">
                                        <input type="checkbox" name = "stmt_6" id = "stmt_6" value = "1"  <?= $item->stmt_6 ? 'checked = "checked"' : ''; ?>/> 
                                    </div>
                                    <div class = "span-16" style="margin:0;">
                                        egyéb az állomány állat egészségügyi státusára, kezelésére vonatkozó információk
                                        (Salmonell, Mycoplasma, diagnosztikai vizsgálatok eredménye, stb)
                                        <?= $item ? $item->comment : ''; ?>
                                    </div>
                                </div>
                            </li>                    
                        </ul>
                        <div class="span-18">
                            Dátum <?= $item ? to_date($item->medical_certificate_date) : '' ?>
                            <div  style="width:100px;display:inline-block;"></div>
                            Kezelő állatorvos <?= $item ? $item->medic_name : ''; ?>
                        </div>
                    </div>

                <div class="span-18 text-right" style="background:#eaeaea">
                   
                    <a href="javascript:void(0);" onclick = "$('#delivery-vacinarry').toggle();"  class="button small-button">állatorvosi igazolás</a>
                    <a href="<?= base_url(); ?>delivery/edit/<?= $item->id; ?>"  class="button small-button">szerkeszt</a>
                    <a href="<?= base_url(); ?>delivery/delete/<?= $item->id; ?>" class="button small-button delete">töröl</a>
                </div>
            </fieldset>
            
        <?php endforeach ?>            