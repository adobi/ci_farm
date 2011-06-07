
<div class = "span-20">
    <div class = "span-9 first inline-block">
        
        <a href="<?= base_url(); ?>breedersite/edit/breeder/<?= $breeder->id; ?>" class = "button" rel = "dialog">Új telephely</a>
        <br />
        <label for="breedersite-select" style="display:inline">Válasszon telephelyet</label>
        <?php if (isset($breeder_sites)): ?>
            <?= form_dropdown('breeder_site_id', $breeder_sites, $this->session->userdata('selected_breedersite')); ?>
        <?php endif ?>
    </div>
    <div class = "span-10 last text-right">
        <a href="<?= base_url(); ?>stock/add_to_breedersite" class = "button" rel = "dialog">Beólazás</a>
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
                <td class = "span-3">Egyéb</td>
            </tr>
        </thead>
        <tbody class = "week-tbody">
            
            <?php foreach ($selected_week_days as $day) : ?>
            
                <tr class = "week-tr">
                    <td class = "td-first text-center" style = "font-size:1.4em;"><?= date('m-d', $day) ?></td>
                    <td>
                        <?php //require '_egg_production.php'; ?>
                        <p>
                            <a href="<?= base_url(); ?>egg/show_production/<?= $day; ?>" rel = "dialog" title = "Termelési adatok <?= date('Y-m-d', $day); ?>">Bővebben</a>
                            <a href="<?= base_url() ?>egg/add_production/<?= $day; ?>" rel = "dialog" title = "Tojástermelési adat felvitele">Új felvite</a>
                            <a href="<?= base_url() ?>egg/delete_production">Töröl</a>
                        </p>                        
                    </td>
                    <td>
                        <?php //require '_chicken_death.php'; ?>
                        <p>
                            <a href="<?= base_url() ?>egg/add_death/<?= $day; ?>" rel = "dialog" title = "Elhalálozási adat felvitele">Új felvite</a>
                            <a href="<?= base_url() ?>edd/delete_death">Töröl</a>
                        </p>                        
                    </td>
                    <td>
                        <?php //require '_chicken_food.php'; ?>
                        <p>
                            <a href="#">Bővebben</a>
                            <a href="<?= base_url() ?>egg/add_food/<?= $day; ?>" rel = "dialog" title = "Tápanyag felvitele">Új felvite</a>
                            <a href="<?= base_url() ?>egg/delete_food">Töröl</a>
                        </p>
                    </td>
                    <td class = "">
                        <!-- 
                        <p>Megjegyzés: ez itt most valamilyen random szoveg amit jo lenne latni, hogy mennyire nyomjs szet ezt az egeszet</p>
                        <p>Vitaminok:  ez itt most valamilyen random szoveg amit jo lenne latni, hogy mennyire nyomjs szet ezt az egeszet</p>
                         -->
                         
                        <p><a href="<?= base_url() ?>egg/comment" rel = "dialog" title = "Megjegyzés">Megjegyzés</a></p>
                        <p><a href="<?= base_url() ?>egg/vitamin" rel = "dialog" title = "Vitaminok">Vitaminok</a></p>
                    </td>
                </tr>            
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<script type="text/javascript">
    $(function() {
        
        $('select[name=breeder_site_id]').bind('change', function() {
            var breederSite = $(this).val();
            
            if ($.trim(breederSite).length && breederSite != 0) {
                
                $.get(App.URL + "egg/set_selected_breedersite/"+breederSite, function() {
                    //location.reload();
                });
            } 
        });
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