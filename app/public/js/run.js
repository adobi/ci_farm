$(function() {
    App.Dialog();
    App.Confirm();
    
    $('#loading-global').hide();
    
    $('button, input[type=submit], .button').button();
   
    $('#loading-global')
       .ajaxStart(function() {
           
    		$(this).show();
       })
       .ajaxStop(function() {
    		$(this).hide();
    });
    
    App.CatchLoadWeekDataEvent();
    
    App.Datepicker();
    
    //App.SetSelectedBreedersite();
    App.SetSelectValueInSession('select[name=breeder_site_id]', "egg/set_selected_breedersite/");
    App.SetSelectValueInSession('select[name=cast_id]', "cast/set_selected_cast/");
    
    App.Egg.UpdatePeoductionData();
    App.Egg.DeleteProductionData();
    
    App.Egg.UpdateFoodOrDeathForDay();
    
    App.Egg.UpdateCommenOrVitamin('.update-production-comment', 'comment');
    App.Egg.UpdateCommenOrVitamin('.update-production-vitamin', 'vitamin');
    
    if ($('#the-egg-week').length) {
        App.TriggerLoadWeekDataEvent($('#the-egg-week'), 'egg');
    }
    /*
    $('body').delegate('a', 'click', function() {
        
        if (!$(this).is('.delete')) {
        
            $('#loading-global').show();
        }
        
        return true;
    });
    */
    $(window).unload(function() {
        $('#loading-global').show();
    });   
    
    
    App.ValidateForm(); 
});