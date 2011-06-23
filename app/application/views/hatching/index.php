
<div class = "span-20">
    <div class = "span-9 first inline-block">
        
        
        <label for="breedersite-select" style="display:inline">Válasszon telephelyet</label>
        <?php if (isset($breeder_sites)): ?>
            <?= form_dropdown('breeder_site_id', $breeder_sites, $this->session->userdata('selected_breedersite')); ?>
        <?php endif ?>
        <a href="<?= base_url(); ?>breedersite/edit/breeder/<?= $breeder->id; ?>" rel = "dialog" title = "Új telephely felvitele">Új telephely</a>
        
    </div>
    <div class = "span-10 last text-right">
        <a href="<?= base_url(); ?>stock/add_to_breedersite" class = "button" rel = "dialog" title = "Új állomany felvitele és beólazása">Beólazás</a>
        <a href="#" class = "button">Állomány felszámolása</a>

    </div>
</div>


<div class = "span-20 week-picker-navigation">
    <div class = "span-4 first">
        <a href="<?= base_url() ?>hatching/week/<?= $week-1 ?>"><span class = "left-arrow-icon"></span></a>
    </div>
    <div class = "span-11 text-center current-week">
        <?= $week_begining ?> - <?= $week_end; ?>
    </div>
    <div class="span-4 last text-right">
        <a href="<?= base_url() ?>hatching/week/<?= $week+1 ?>"><span class = "right-arrow-icon"></span></a>
    </div>
</div>

<div class = "span-20" style = "padding-left:0px">
    <table cellspacing="5" cellpadding="5" class = "week-table first">
        <thead>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td style="width:130px"></td>
            </tr>
        </thead>
        <tbody class = "week-tbody">
            
            <?php foreach ($selected_week_days as $day) : ?>
            
                <tr class = "week-tr">
                    <td class = "td-first text-center" style = "font-size:1.4em;"><?= date('m-d', $day) ?></td>
                    <td>
                                           
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td class = "" style = "vertical-align:middle;">
                    </td>
                </tr>            
            <?php endforeach ?>
        </tbody>
    </table>
</div>
