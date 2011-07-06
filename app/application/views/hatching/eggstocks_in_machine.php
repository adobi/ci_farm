<?php if (!$machine): ?>
    <div class="error">
        Nem lett kiválasztva gép, vagy nincs ilyen gép. 
        <a href="<?= base_url() ?>machine/edit" dialog_id = "0" rel = "dialog" title = "Keltető gép felvitele">új keltető gép felvitele</a>
    </div>
<?php else: ?>
    <h2 style="padding:5px;"><?= $machine->name ?> (<?= $machine->code ?>) aktuális állományai</h2>

    <style type="text/css">
        .inner-table tr td:nth-child(1) {
            text-align:left!important;
        }
    </style>
    
    <?php if ($eggstocks): ?>
        <table cellspacing="5" cellpadding="5" class = "week-table first">
            <thead>
                <tr>
                    <td class="span-4">Berakás</td>
                    <td class="span-5">Lámpázás</td>
                    <td class="span-5">Bujtatás</td>
                    <td class="span-5">Kelés</td>
                </tr>
            </thead>
            <tbody class = "week-tbody">
                <?php foreach ($eggstocks as $item): ?>
                    
                    <tr class="week-tr">
                        <td style="vertical-align:middle">
                            <p><strong>Állomány</strong>: <?= $item->stock_code ?></p>
                            <p><strong>Dátum</strong>: <?= to_date($item->put_in_date) ?></p>
                            <p><strong>Darab</strong>: <?= $item->piece ?></p>
                            <p><strong>Fajta</strong>: <?= $item->egg_type_description ?> (Kód: <?= $item->egg_type_code ?>)</p>
                        </td>
                        <td>
                            <?php if ($item->step_1): ?>
                                <p>
                                    <strong>Dátum</strong>: <?= to_date($item->step_1->step_date) ?>
                                </p>
                                <table class = "inner-table">
                                    <tr>
                                        <td>Alkalmatlan</td>
                                        <td><?= $item->step_1->useless ?></td>
                                    </tr>
                                    <tr>
                                        <td>Terméketlen</td>
                                        <td><?= $item->step_1->steril ?></td>
                                    </tr>
                                    <tr>
                                        <td>Elhulllt</td>
                                        <td><?= $item->step_1->dead ?></td>
                                    </tr>
                                    <tr>
                                        <td>Befulladt</td>
                                        <td><?= $item->step_1->rotten ?></td>
                                    </tr> 
                                    <tr>
                                        <td>Selejt</td>
                                        <td><?= $item->step_1->waste ?></td>
                                    </tr>                                                                                                                                                
                                </table>
                            <?php endif ?>
                            <p style = "margin-top:5px;"><a href="<?= base_url() ?>hatching/step/1/<?= $item->id ?>" rel = "dialog" title = "Lámpázás <?= $item->step_1 ? 'módosítása' : 'felvitele'; ?>" class = "button">Lámpázás</a></p>
                        </td>
                        <td>
                            <?php if ($item->step_2): ?>
                                <p>
                                    <strong>Dátum</strong>: <?= to_date($item->step_2->step_date) ?>
                                </p>
                                <table class = "inner-table">
                                    <tr>
                                        <td>Alkalmatlan</td>
                                        <td><?= $item->step_2->useless ?></td>
                                    </tr>
                                    <tr>
                                        <td>Terméketlen</td>
                                        <td><?= $item->step_2->steril ?></td>
                                    </tr>
                                    <tr>
                                        <td>Elhulllt</td>
                                        <td><?= $item->step_2->dead ?></td>
                                    </tr>
                                    <tr>
                                        <td>Befulladt</td>
                                        <td><?= $item->step_2->rotten ?></td>
                                    </tr> 
                                    <tr>
                                        <td>Selejt</td>
                                        <td><?= $item->step_2->waste ?></td>
                                    </tr>                                                                                                                                                
                                </table>
                            <?php endif ?>
                            <p style = "margin-top:5px;"><a href="<?= base_url() ?>hatching/step/2/<?= $item->id ?>" rel = "dialog" title = "Bujtatás <?= $item->step_2 ? 'módosítása' : 'felvitele'; ?>" class = "button">Bujtatás</a></p>
                        </td>
                        <td>
                            <?php if ($item->step_3): ?>
                                <p>
                                    <strong>Dátum</strong>: <?= to_date($item->step_3->step_date) ?>
                                </p>
                                <table class = "inner-table">
                                    <tr>
                                        <td>Alkalmatlan</td>
                                        <td><?= $item->step_3->useless ?></td>
                                    </tr>
                                    <tr>
                                        <td>Terméketlen</td>
                                        <td><?= $item->step_3->steril ?></td>
                                    </tr>
                                    <tr>
                                        <td>Elhulllt</td>
                                        <td><?= $item->step_3->dead ?></td>
                                    </tr>
                                    <tr>
                                        <td>Befulladt</td>
                                        <td><?= $item->step_3->rotten ?></td>
                                    </tr> 
                                    <tr>
                                        <td>Selejt</td>
                                        <td><?= $item->step_3->waste ?></td>
                                    </tr>                                                                                                                                                
                                </table>
                            <?php endif ?>
                            
                            <p style = "margin-top:5px;"><a href="<?= base_url() ?>hatching/step/3/<?= $item->id ?>" rel = "dialog" title = "Kelés <?= $item->step_3 ? 'módosítása' : 'felvitele'; ?>" class = "button">Kelés</a></p>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    <?php else: ?>
        
    <?php endif ?>
    
<?php endif ?>

<p>
    <a href="<?= base_url() ?>hatching">&laquo; vissza a keltetéshez</a>
</p>
