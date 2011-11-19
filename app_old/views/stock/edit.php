<fieldset class = "round inline-block" id = "stock-form">
    <?= form_open(); ?>
        <p>
            <label for="code">Törzsállomány kódja:</label>
            <input type="text" name = "code" id = "code" value = "<?= $current_stock_item ? $current_stock_item->code : ''; ?>"/>
        </p>
        <p>
            <label for="birth_date">Kelés ideje:</label>
            <input type="text" name = "birth_date" id = "birth_date" class = "datepicker" size = "20" value = "<?= $current_stock_item ? to_date($current_stock_item->birth_date) : ''; ?>"/>
        </p>
        <p>
            <label for="chicken_type_id">Tyúk típus:</label>
            <?= form_dropdown('chicken_type_id', $chickentypes, $current_stock_item ? $current_stock_item->chicken_type_id : null); ?>
        </p>
        <p>
            <label for="klass">Törzskönyvi osztály:</label>
            <input type="text" name = "klass" id = "klass" value = "<?= $current_stock_item ? $current_stock_item->klass : ''; ?>"/>
        </p>
        <p>
            <label for="parent_male_code">Szülőállomány(M):</label>
            <input type="text" name = "parent_male_code" id = "parent_male_code" value = "<?= $current_stock_item ? $current_stock_item->parent_male_code : ''; ?>"/>
        </p> 
        <p>
            <label for="parent_male_code_2">Szülőállomány(M)<br /><em>INTRA/KÁBO</em>:</label>
            <input type="text" name = "parent_male_code_2" id = "parent_male_code_2"value = "<?= $current_stock_item ? $current_stock_item->parent_male_code_2 : ''; ?>" />
        </p> 
        <p>
            <label for="parent_female_code">Szülőállomány(F):</label>
            <input type="text" name = "parent_female_code" id = "parent_female_code" value = "<?= $current_stock_item ? $current_stock_item->parent_female_code : ''; ?>"/>
        </p> 
        <p>
            <label for="parent_female_code_2">Szülőállomány(F)<br /><em>INTRA/KÁBO</em>:</label>
            <input type="text" name = "parent_female_code_2" id = "parent_female_code_2" value = "<?= $current_stock_item ? $current_stock_item->parent_female_code_2 : ''; ?>"/>
        </p>                         
        <p>
            <label for="number_of_male">Kakasok száma:</label>
            <input type="text" name = "number_of_male" id = "number_of_male"  size = "10" value = "<?= $current_stock_item ? $current_stock_item->number_of_male : ''; ?>"/>
        </p> 
        <p>
            <label for="number_of_female">Jércék száma:</label>
            <input type="text" name = "number_of_female" id = "number_of_female"  size = "10" value = "<?= $current_stock_item ? $current_stock_item->number_of_female : ''; ?>"/>
        </p> 
        <p>
            <label for="egg_code">Tojáskód:</label>
            <input type="text" name = "egg_code" id = "egg_code"  size = "10" value = "<?= $current_stock_item ? $current_stock_item->egg_code : ''; ?>"/>
        </p> 
        <p>
            <label for="validity_date">Érvényesség:</label>
            <input type="text" name = "validity_date" id = "validity_date" class = "datepicker"  size = "20" value = "<?= $current_stock_item ? to_date($current_stock_item->validity_date) : ''; ?>"/>
        </p> 
        <p>
            <button>Mentés</button>
        </p>        
    <?= form_close(); ?>
</fieldset>
<script type="text/javascript">

</script>