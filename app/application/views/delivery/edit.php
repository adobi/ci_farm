<?= form_open(); ?>

    <fieldset class="round">
    
        <p>
            <label class = "block" for="serial_number">Serial_number</label>
            <input type="text" name = "serial_number" id = "serial_number" value="<?= $current_item ? $current_item->serial_number : '' ?>" />
        </p>

        <p>
            <label class = "block" for="cast_id">Cast_id</label>
            <input type="text" name = "cast_id" id = "cast_id" value="<?= $current_item ? $current_item->cast_id : '' ?>" />
        </p>

        <p>
            <label class = "block" for="type">Type</label>
            <input type="text" name = "type" id = "type" value="<?= $current_item ? $current_item->type : '' ?>" />
        </p>

        <p>
            <label class = "block" for="intended_use">Intended_use</label>
            <input type="text" name = "intended_use" id = "intended_use" value="<?= $current_item ? $current_item->intended_use : '' ?>" />
        </p>

        <p>
            <label class = "block" for="veterinary_code">Veterinary_code</label>
            <input type="text" name = "veterinary_code" id = "veterinary_code" value="<?= $current_item ? $current_item->veterinary_code : '' ?>" />
        </p>

        <p>
            <label class = "block" for="seller_id">Seller_id</label>
            <input type="text" name = "seller_id" id = "seller_id" value="<?= $current_item ? $current_item->seller_id : '' ?>" />
        </p>
        <p>
            <label class = "block" for="sell_date">Sell_date</label>
            <input type="text" name = "sell_date" id = "sell_date" value="<?= $current_item ? $current_item->sell_date : '' ?>" class = "datepicker" />
        </p>

        <p>
            <label class = "block" for="sell_piece">Sell_piece</label>
            <input type="text" name = "sell_piece" id = "sell_piece" value="<?= $current_item ? $current_item->sell_piece : '' ?>" />
        </p>

        <p>
            <label class = "block" for="buyer_id">Buyer_id</label>
            <input type="text" name = "buyer_id" id = "buyer_id" value="<?= $current_item ? $current_item->buyer_id : '' ?>" />
        </p>

        <p>
            <label class = "block" for="buyer_country_code">Buyer_country_code</label>
            <input type="text" name = "buyer_country_code" id = "buyer_country_code" value="<?= $current_item ? $current_item->buyer_country_code : '' ?>" />
        </p>

        <p>
            <label class = "block" for="buyer_intra">Buyer_intra</label>
            <input type="text" name = "buyer_intra" id = "buyer_intra" value="<?= $current_item ? $current_item->buyer_intra : '' ?>" />
        </p>

        <p>
            <label class = "block" for="transporter_plate">Transporter_plate</label>
            <input type="text" name = "transporter_plate" id = "transporter_plate" value="<?= $current_item ? $current_item->transporter_plate : '' ?>" />
        </p>
        <p>
            <label class = "block" for="start_date">Start_date</label>
            <input type="text" name = "start_date" id = "start_date" value="<?= $current_item ? $current_item->start_date : '' ?>" class = "datepicker" />
        </p>

        <p>
            <label class = "block" for="receiver_id">Receiver_id</label>
            <input type="text" name = "receiver_id" id = "receiver_id" value="<?= $current_item ? $current_item->receiver_id : '' ?>" />
        </p>
        <p>
            <label class = "block" for="received">Received</label>
            <input type="text" name = "received" id = "received" value="<?= $current_item ? $current_item->received : '' ?>" class = "datepicker" />
        </p>

        <p>
            <label class = "block" for="received_piece">Received_piece</label>
            <input type="text" name = "received_piece" id = "received_piece" value="<?= $current_item ? $current_item->received_piece : '' ?>" />
        </p>
        <p>
            <label class = "block" for="arrival_date">Arrival_date</label>
            <input type="text" name = "arrival_date" id = "arrival_date" value="<?= $current_item ? $current_item->arrival_date : '' ?>" class = "datepicker" />
        </p>

        <p>
            <button>Mentés</button>
        </p>
    </fieldset>

<?= form_close(); ?>