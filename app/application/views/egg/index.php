
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
        <!-- 
        <?php if (isset($stocks)): ?>
            <br />
            <label for="selected_chickenstock">Válasszon állományt</label>
            <?= form_dropdown('chicken_stock_id', $stocks, $this->session->userdata('selected_chickenstock')); ?>
        <?php endif ?>
         -->
    </div>
</div>


<div class = "span-20 week-picker-navigation">
    <div class = "span-4 first">
        <a href="<?= base_url() ?>egg/week/<?= $week-1 ?>"><span class = "left-arrow-icon"></span></a>
    </div>
    <div class = "span-11 text-center current-week">
        <?= $week_begining ?> - <?= $week_end; ?>
    </div>
    <div class="span-4 last text-right">
        <a href="<?= base_url() ?>egg/week/<?= $week+1 ?>"><span class = "right-arrow-icon"></span></a>
    </div>
</div>

<div class = "span-20" style = "padding-left:0px">
    <table cellspacing="5" cellpadding="5" class = "week-table first">
        <thead>
            <tr>
                <td></td>
                <td>Tojás termelés</td>
                <td>Elhalálozás</td>
                <td>Tápanyag felhasználás</td>
                <td  style="width:130px">Egyéb</td>
            </tr>
        </thead>
        <tbody class = "week-tbody">
            
            <?php foreach ($selected_week_days as $day) : ?>
            
                <tr class = "week-tr 
                    <?= $last_blank && date('Y-m-d', $day) === date('Y-m-d', strtotime($last_blank->to_date)) ? " next-to-fill" : ""; ?>
                    <?= array_key_exists($day, $is_filled) && $is_filled[$day] ? " filled" : ""; ?>
                ">
                    <td class = "td-first text-center" style = "font-size:1.4em;"><?= date('m-d', $day) ?></td>
                    <td>
                        <?php //require '_egg_production.php'; ?>
                        
                        <?php if (array_key_exists($day, $egg_production_sum) && $egg_production_sum[$day]): ?>
                            <table class = "inner-table">
                                <?php foreach ($egg_production_sum[$day] as $item): ?>
                                    <tr>
                                        <td style = "text-align:left"><?= $item->code; ?> - <?= $item->description; ?></td>
                                        <td style = "text-align:left"><strong><?= $item->pieces_sum; ?></strong> db</td>
                                    </tr>
                                <?php endforeach ?>
                            </table>
                        <?php else: ?>
                            <p><em>nincs adat</em></p>
                        <?php endif ?>
                        
                        <p>
                            <a href="<?= base_url(); ?>egg/show_production/<?= $day; ?>" rel = "dialog" title = "Termelési adatok <?= date('Y-m-d', $day); ?>">Bővebben</a>
                            <a href="<?= base_url() ?>egg/add_production/<?= $day; ?>" rel = "dialog" title = "Tojástermelési adat felvitele">Új felvite</a>
                            <!-- <a href="<?= base_url() ?>egg/delete_production">Töröl</a> -->
                        </p>                        
                    </td>
                    <td>
                        <?php //require '_chicken_death.php'; ?>
                        
                        <?php if (array_key_exists($day, $egg_production_death) && ($egg_production_death[$day]->sum_dead_female || $egg_production_death[$day]->sum_dead_male || $egg_production_death[$day]->sum_reject_female || $egg_production_death[$day]->sum_reject_male)): ?>
                            <table class = "inner-table">
                                <tr>
                                    <td rowspan = "2" style="vertical-align:middle; background:#F7F7F7;">Elhalt</td>
                                    <td>jérce</td>
                                    <td><strong><?= $egg_production_death[$day]->sum_dead_female ?></strong> db</td>
                                </tr>
                                <tr>
                                    <td>kakas</td>
                                    <td><strong><?= $egg_production_death[$day]->sum_dead_male ?></strong> db</td>
                                </tr>
                                <tr>
                                    <td rowspan = "2" style="vertical-align:middle; background:#F7F7F7;">Selejt</td>
                                    <td>jérce</td>
                                    <td><strong><?= $egg_production_death[$day]->sum_reject_female ?></strong> db</td>
                                </tr>
                                <tr>
                                    <td>kakas</td>
                                    <td><strong><?= $egg_production_death[$day]->sum_reject_male ?></strong> db</td>
                                </tr>
                            </table>
                        <?php else: ?>
                            <p><em>nincs adat</em></p>
                        <?php endif ?>
                        
                        <p>
                            <a href="<?= base_url() ?>egg/show_death/<?= $day ?>" rel = "dialog" title = "Elhalálozási adatok <?= date('Y-m-d', $day) ?>">Bővebben</a>
                            <a href="<?= base_url() ?>egg/add_death/<?= $day; ?>" rel = "dialog" title = "Elhalálozási adat felvitele">Új felvite</a>
                            <!-- <a href="<?= base_url() ?>edd/delete_death">Töröl</a> -->
                        </p>                        
                    </td>
                    <td>
                        <?php //require '_chicken_food.php'; ?>
                        <?php if (array_key_exists($day, $feed_sum) && ($feed_sum[$day]->sum_female || $feed_sum[$day]->sum_male || $feed_sum[$day]->sum_grain)): ?>
                            <table class = "inner-table">
                                <tr>
                                    <td style = "text-align:left">Jérce</td>
                                    <td style = "text-align:left"><strong><?= $feed_sum[$day]->sum_female; ?></strong> kg</td>
                                </tr>
                                <tr>
                                    <td style = "text-align:left">Kakas</td>
                                    <td style = "text-align:left"><strong><?= $feed_sum[$day]->sum_male; ?></strong> kg</td>
                                </tr>
                                <tr>
                                    <td style = "text-align:left">Szemes</td>
                                    <td style = "text-align:left"><strong><?= $feed_sum[$day]->sum_grain; ?></strong> kg</td>
                                </tr>
                            </table>
                        <?php else: ?>
                            <p><em>nincs adat</em></p>
                        <?php endif ?>                        
                        <p>
                            <a href="<?= base_url(); ?>egg/show_food/<?= $day; ?>" rel = "dialog" title = "Táőanyag adatok <?= date('Y-m-d', $day); ?>">Bővebben</a>
                            <a href="<?= base_url() ?>egg/add_food/<?= $day; ?>" rel = "dialog" title = "Tápanyag felvitele">Új felvite</a>
                            <!-- <a href="<?= base_url() ?>egg/delete_food">Töröl</a> -->
                        </p>
                    </td>
                    <td class = "" style = "vertical-align:middle;">
                        <!-- 
                        <p>Megjegyzés: ez itt most valamilyen random szoveg amit jo lenne latni, hogy mennyire nyomjs szet ezt az egeszet</p>
                        <p>Vitaminok:  ez itt most valamilyen random szoveg amit jo lenne latni, hogy mennyire nyomjs szet ezt az egeszet</p>
                         -->
                         
                        <p>
                            <strong>Megjegyzés</strong><br/>
                            <a href="<?= base_url() ?>egg/show_comment/<?= $day ?>" rel = "dialog" title = "Megjegyzések">Bővebben</a>
                            <a href="<?= base_url() ?>egg/add_comment/<?= $day ?>" rel = "dialog" title = "Megjegyzés">Új felvitele</a>
                        </p>
                        <p>&nbsp;</p>
                        <p>
                            <strong>Vitamin</strong><br/>
                            <a href="<?= base_url() ?>egg/show_vitamin/<?= $day ?>" rel = "dialog" title = "Megjegyzések">Bővebben</a>
                            <a href="<?= base_url() ?>egg/add_vitamin/<?= $day ?>" rel = "dialog" title = "Vitaminok">Új felvitele</a>
                        </p>
                    </td>
                </tr>            
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<script type="text/javascript">
    $(function() {
        
/*
        $('select[name=chicken_stock_id]').bind('change', function() {
            var stock = $(this).val();
            
            if ($.trim(stock).length && stock != 0) {
                
                $.get(App.URL + "egg/set_selected_chickenstock/"+stock);
            } 
        });
*/
    });
</script>