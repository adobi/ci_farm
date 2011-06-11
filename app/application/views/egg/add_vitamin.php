<fieldset  class="round">
    <?= form_open() ?>
        <p>
            <label for="selected_chickenstock">Válasszon állományt</label>
            <?= form_dropdown('chicken_stock_id', $stocks, $this->session->userdata('selected_chickenstock')); ?>
        </p>     
        <p>
            <label for="vitamin" class = "block">Vitamin</label>
            <textarea name="vitamin" cols="60" rows="3" id = "vitamin"></textarea>
        </p>
        <p><button>Mentés</button></p>
    <?= form_close() ?>
</fieldset>