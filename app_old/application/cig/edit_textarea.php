        <p>
            <label class = "block" for="%%COLUMN_NAME%%">%%UC_COLUMNS_NAME%%</label>
            <textarea  name = "%%COLUMN_NAME%%" id = "%%COLUMN_NAME%%" cols="60" rows="3"><?= $current_item ? $current_item->%%COLUMN_NAME%% : '' ?></textarea>
        </p>
