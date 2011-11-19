<fieldset class = "round inline-block">
    
    <?= form_open(); ?>
        <p>
            Kis vagy nagytermelő?
        </p>
        <p>
            <label for="buyer_breeder_site_id">Vevő telep kódja</label>
            <input type="text" name = "buyer_breeder_site_id" id = "buyer_breeder_site_id"/>
            <a href="#" rel = "dialog">uj telephely</a>
        </p>   
        <p>
            <label for="buy_date">Eladás dátuma</label>
            <input type="text" class = "datepicker" name = "buy_date" size = "20" />
        </p> 
        <p>
            <button>Mentés</button>
        </p>    
    <?= form_close(); ?>
</fieldset>

<div id = "new-breeder_site">
    
</div>