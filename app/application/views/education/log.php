<style type="text/css">
    label {
        display:inline-block;
        width:150px;
    }
</style>

<h2 style="padding:5px;">Csibenevelési napló</h2>

<fieldset class = "round">
    <p>
        <label for="">Válasszon tenyészetet</label>

        <?= form_dropdown('breeder_site_id', $breeder_sites_select, $this->session->userdata('selected_breedersite')); ?>
    </p>
    
    <?php if ($this->session->userdata('selected_breedersite')): ?>
        <?php if (count($yards_select) !== 1): ?>
            <p>
                <label for="">Válasszon istállót</label>
                <?= form_dropdown('stock_yard_id', $yards_select, $this->session->userdata('selected_stockyard')); ?>
            </p>
        <?php else: ?>
            <div class="message-info">
                A kiválasztott tenyészethez nem szerepel istálló. 
                <a class = "button button-small" rel = "dialog" title="Új istálló felvitele" href="<?php echo base_url() ?>stockyard/edit/breeder_site/<?php echo $this->session->userdata('selected_breedersite') ?>">új istálló felvitele</a>
            </div>
        <?php endif ?>
    
    <?php endif ?>
    <?php if ($this->session->userdata('selected_breedersite') && $this->session->userdata('selected_stockyard')): ?>
        <?php if ($hatching): ?>
            <p>
                <label>Telepítésidőpontja</label>
                <span class="current-week"><?php echo to_date($hatching->created) ?></span>
                <a href="#" class="button delete right" style="margin:0">Nevelés törlése</a>
            </p>
        <?php else: ?>
            <div class="message-info">Nincs aktuális betelepítés</div>
        <?php endif ?>
    <?php endif ?>
    
</fieldset>

<?php if ($this->session->userdata('selected_breedersite') && $this->session->userdata('selected_stockyard') && $hatching): ?>
    

    <div class = "span-20 week-picker-navigation">
        <div class = "span-4 first">
            <a href="#"><span class = "left-arrow-icon"></span></a>
        </div>
        <div class = "span-11 text-center current-week">
            2009-07-01 - 2009-07-28
        </div>
        <div class="span-4 last text-right">
            <a href="#"><span class = "right-arrow-icon"></span></a>
        </div>
    </div>
    <div class="span-20">
        <table cellspacing="0" cellpadding="0" class = "week-table first bordered-table zebra-striped">
            <thead>
                <tr>
                    <th class="span-1"></th>
                    <th class="span-1">Nap</th>
                    <th class="span-7" style="padding:0">
                        Elhullás
                    </th>
                    <th class="span-7">Tápfelhasználás</th>
                    <th class="span-4">Egyéb</th>
                </tr>
            </thead>
            <tbody class = "week-tbody">
                <?php foreach (range(0, 28) as $key => $value): ?>
                    <tr>
                        <td class = "td-first text-center" style = "font-size:1.1em;"><?php echo date('m-d', time()) ?> - <?php echo $key ?></td>
                        <td class=" text-center"><?php echo $key ?></td>
                        <td>
                            <div class="left" style="margin-top:5px;">Összesen: <?php echo $value * rand(1, 100) + rand(1, 100) ?></div>
                            <a href="#" class="button right">Bővebben</a>
                        </td>
                        <td>
                            <div class="left" style="margin-top:5px;">Összesen: <?php echo $value * rand(1, 100) + rand(1, 100) ?></div>
                            <a href="#" class="button right">Bővebben</a>
                        </td>
                        <td class="text-center">
                            <a href="#" class="button" rel="dialog" title="">Egyéb adatok</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

<?php endif ?>

