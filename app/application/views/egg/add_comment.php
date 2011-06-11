<fieldset class = "round">
    <?= form_open() ?>
        <p>
            <label for="selected_chickenstock">Válasszon állományt</label>
            <?= form_dropdown('chicken_stock_id', $stocks, $this->session->userdata('selected_chickenstock')); ?>
        </p>   
        <p>
            <label for="comment" class = "block">Megjegyzés</label>
            <textarea name="comment" cols="60" rows="3" id = "comment"></textarea>
        </p>
        <p><button>Mentés</button></p>
    <?= form_close() ?>
</fieldset>