<fieldset class = "round inline-block" id = "stock-form">
        
    <?= form_open(); ?>
        <p>
            <label for="step_date">Dátum</label>
            <input type="text" name = "step_date" value = "<?= $step ? to_date($step->step_date) : date('Y-m-d') ?>" id = "step_date" size = "10"  class = "datepicker"/>
        </p>        
        <p>
            <label for="useless">Alkalmatlan</label>
            <input type="text" name = "useless" value = "<?= $step ? $step->useless : '' ?>" id = "useless" size = "10" /> darab
        </p>
        <p>
            <label for="steril">Terméketlen</label>
            <input type="text" name = "steril" value = "<?= $step ? $step->steril : '' ?>" id = "steril" size = "10" /> darab
        </p>    
        <p>
            <label for="dead">Elhalt</label>
            <input type="text" name = "dead" value = "<?= $step ? $step->dead : '' ?>" id = "dead" size = "10" /> darab
        </p>   
        <p>
            <label for="rotten">Befulladt</label>
            <input type="text" name = "rotten" value = "<?= $step ? $step->rotten : '' ?>" id = "rotten" size = "10" /> darab
        </p> 
        <p>
            <label for="waste">Selejt</label>
            <input type="text" name = "waste" value = "<?= $step ? $step->waste : '' ?>" id = "waste" size = "10" /> darab
        </p>                       
        <p>
            <label for="description" style="display:block">Megjegyzés</label>
            <textarea id="description" cols="30" rows="1" name = "description"><?= $step ? $step->description : ''; ?></textarea>
        </p>
        <p>
            <button>Mentés</button>
        </p>  
    <?= form_close(); ?>
</fieldset>        