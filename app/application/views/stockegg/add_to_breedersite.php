<fieldset class = "round inline-block" id = "stock-form">
    <?= form_open(); ?>

        <p>
            <label for="code">Törzsállomány kódja:</label>
            <input type="text" name = "code" id = "code" value = ""/>
        </p>
        <p>
            <label for="birth_date">Kelés ideje:</label>
            <input type="text" name = "birth_date" id = "birth_date" class = "datepicker" size = "20" value = ""/>
        </p>
        <p>
            <label for="chicken_type_id">Tyúk típus:</label>
            <?= form_dropdown('chicken_type_id', $chicken_type, null); ?>
        </p>
        <p>
            <label for="klass">Törzskönyvi osztály:</label>
            <input type="text" name = "klass" id = "klass" value = ""/>
        </p>
        <p>
            <label for="parent_male_code">Szülőállomány(M):</label>
            <input type="text" name = "parent_male_code" id = "parent_male_code" />
        </p> 
        <p>
            <label for="parent_male_code_2">Szülőállomány(M)<br /><em>INTRA/KÁBO</em>:</label>
            <input type="text" name = "parent_male_code_2" id = "parent_male_code_2" />
        </p> 
        <p>
            <label for="parent_female_code">Szülőállomány(M):</label>
            <input type="text" name = "parent_female_code" id = "parent_female_code" />
        </p> 
        <p>
            <label for="parent_female_code_2">Szülőállomány(M)<br /><em>INTRA/KÁBO</em>:</label>
            <input type="text" name = "parent_female_code_2" id = "parent_female_code_2" />
        </p>
        <p>
            <label for="piece">Darabszám:</label>
            <input type="text" name = "piece" id = "piece"  size = "10" value = ""/>
        </p>  
        <!--                       
        <p>
            <label for="number_of_male">Kakasok száma:</label>
            <input type="text" name = "number_of_male" id = "number_of_male"  size = "10" value = ""/>
        </p> 
        <p>
            <label for="number_of_female">Jércék száma:</label>
            <input type="text" name = "number_of_female" id = "number_of_female"  size = "10" value = ""/>
        </p>
        --> 
        <p>
            <label for="egg_code">Tojáskód:</label>
            <input type="text" name = "egg_code" id = "egg_code"  size = "10" value = ""/>
        </p> 
        <p>
            <label for="validity_date">Érvényesség:</label>
            <input type="text" name = "validity_date" id = "validity_date" class = "datepicker"  size = "20" value = ""/>
        </p> 
        <p>
            <button>Mentés</button>
        </p>        
    <?= form_close(); ?>
</fieldset>
<script type="text/javascript">

</script>