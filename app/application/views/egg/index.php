
<div class = "span-20">
    <div class = "span-9 first">
        <a href="#" class = "button">Válasszon telephelyet</a>
    </div>
    <div class = "span-10 last text-right">
        <a href="#" class = "button" rel = "dialog">Új állomány felvitele</a>
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
                <td>Egyéb</td>
            </tr>
        </thead>
        <tbody>
            
            <?php for ($i = 0; $i < 7; $i++) : ?>
            
                <tr>
                    <td class = "td-first">05.30 Hétfő</td>
                    <td>
                        <p>
                            <ul>
                                <li>Fakk1: 10 kicsi, 10 nagy, 10 ilyen</li>
                                <li>Fakk2: 100 kicsi, 102 nagy, 50 ilyen</li>
                            </ul>
                        </p>
                        <p>
                            <a href="#">Új felvite</a>
                            <a href="#">Töröl</a>
                        </p>                        
                    </td>
                    <td>
                        <p>
                            <ul>
                                <li>Fakk1
                                    <ul>
                                        <li>Elhalt: 10 jerce, 20 kakas</li>
                                        <li>Selejt: 20 jerce, 10 kakas</li>
                                    </ul>
                                </li>
                            </ul>
                        </p>
                        <p>
                            <a href="#">Új felvite</a>
                            <a href="#">Töröl</a>
                        </p>                        
                    </td>
                    <td>
                        <p>
                            <ul>
                                <li>Fakk cs1:10kg</li>
                                <li>Fakk cs2:40kg</li>
                                <li>Fakk cs3:120kg</li>
                            </ul>
                        </p>
                        <p>
                            <a href="#">Új felvite</a>
                            <a href="#">Töröl</a>
                        </p>
                    </td>
                    <td class = "td-last">
                        <p><a href="#">Megjegyzés</a></p>
                        <p><a href="#">Vitaminok</a></p>
                    </td>
                </tr>            
            <?php endfor ?>
        </tbody>
    </table>
</div>