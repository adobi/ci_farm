<div style = "width: 940px;">
    
    <?php if (validation_errors()): ?>
        
        <div class = "error">
            <?= validation_errors(); ?>
        </div>
        
    <?php endif ?>
    <fieldset class = "round" style = "border:0px;">
        
        
        <?= form_open('auth/login') ?>
            <p>
                <label for="username">Felhasználónév:</label><br />
                <input type="text" class = "text" name="username" value="" id="username" />
            </p>
            <p>
                <label for="password">Jelszó</label><br />
                <input type="password" class = "text" name="password" value="" id="password" />
            </p>
            <p>
                <button>Belépés</button>
            </p>
        <?= form_close() ?>
        
    </fieldset>
    
</div>