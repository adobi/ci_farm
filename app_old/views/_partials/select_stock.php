            <p>
                <label for="selected_chickenstock">Válasszon állományt</label>
                <?= form_dropdown('chicken_stock_id', $stocks, $this->session->userdata('selected_chickenstock')); ?>
            </p>   