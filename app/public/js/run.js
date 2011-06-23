$(function() {
    App.Dialog();
    App.Confirm();
    
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
    
    App.SetSelectedBreedersite();
    
    App.Egg.UpdatePeoductionData();
    App.Egg.DeleteProductionData();
    
    App.Egg.UpdateFoodOrDeathForDay();
    
    App.Egg.UpdateCommenOrVitamin('.update-production-comment', 'comment');
    App.Egg.UpdateCommenOrVitamin('.update-production-vitamin', 'vitamin');
    
    if ($('#the-egg-week').length) {
        App.TriggerLoadWeekDataEvent($('#the-egg-week'), 'egg');
    }
});