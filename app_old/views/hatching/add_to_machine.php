<fieldset class = "round inline-block" id = "stock-form">
    <?= form_open(); ?>
        <p>
            <label for="egg_stock_id">Tojás állomány</label>
            <?= form_dropdown('egg_stock_id', $egg_stocks, null); ?>
        </p>
        <p>
            <label for="put_in_date">Berakás dátuma</label>
            <input type="text" name = "put_in_date" id = "put_in_date" class = "datepicker" size = "20" />
        </p>
        <p>
            <button>Mentés</button>
        </p>  
    <?= form_close(); ?>
</fieldset>    