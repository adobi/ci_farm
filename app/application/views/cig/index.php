<fieldset class="round">
    <?= form_open(); ?>
        <p>
            <label for="table_name inline-block">Table name:</label>
            <input type="text" name = "table_name" id = "table_name" value = "" size = "45"/>
        </p>
        <p>
            <button>Generate</button>
        </p>
    <?= form_close(); ?>
</fieldset>

<script type="text/javascript">
    $(function() {
        $('#sidebar').remove();
        //$('#content').css('margin-top', 0).removeClass('span-20').addClass('span-24')
    })
</script>