<fieldset class = "round inline-block" id = "stock-form">
    <?= form_open(); ?>
        <p>
            <label for="egg_stock_id">Tojás állomány</label>
            <?= form_dropdown('egg_stock_id', $egg_stocks, null); ?>
        </p>
        <p>
            <button>Mentés</button>
        </p>  
    <?= form_close(); ?>
</fieldset>    