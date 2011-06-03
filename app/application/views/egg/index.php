
<div class = "span-20">
    <div class = "span-9 first">
        <a href="#" class = "button">Válasszon telephelyet</a>
    </div>
    <div class = "span-10 last text-right">
        <a href="#" class = "button" rel = "dialog">Beólazás</a>
        <a href="#" class = "button" rel = "dialog">Állomány felszámolása</a>
    </div>
</div>

<div class = "span-20 week-picker-navigation">
    <div class = "span-4 first">
        <a href="#"><span class = "left-arrow-icon"></span></a>
    </div>
    <div class = "span-11 text-center current-week">
        Majus 30 - Junius 5
    </div>
    <div class="span-4 last text-right">
        <a href="#"><span class = "right-arrow-icon"></span></a>
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
            
            <?php for ($i = 0; $i < 7; $i++) : ?>
            
                <tr class = "week-tr">
                    <td class = "td-first">05.30 Hétfő</td>
                    <td>
                        <?php require '_egg_production.php'; ?>
                        <p>
                            <a href="#">Új felvite</a>
                            <a href="#">Töröl</a>
                        </p>                        
                    </td>
                    <td>
                        <?php require '_chicken_death.php'; ?>
                        <p>
                            <a href="#">Új felvite</a>
                            <a href="#">Töröl</a>
                        </p>                        
                    </td>
                    <td>
                        <?php require '_chicken_food.php'; ?>
                        <p>
                            <a href="#">Új felvite</a>
                            <a href="#">Töröl</a>
                        </p>
                    </td>
                    <td class = "">
                        <p>Megjegyzés: ez itt most valamilyen random szoveg amit jo lenne latni, hogy mennyire nyomjs szet ezt az egeszet</p>
                        <p>Vitaminok:  ez itt most valamilyen random szoveg amit jo lenne latni, hogy mennyire nyomjs szet ezt az egeszet</p>
                        <p><a href="#">Megjegyzés</a></p>
                        <p><a href="#">Vitaminok</a></p>
                    </td>
                </tr>            
            <?php endfor ?>
        </tbody>
    </table>
</div>