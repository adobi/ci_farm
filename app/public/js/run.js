$.fn.toEm = function(settings){
	settings = jQuery.extend({
		scope: 'body'
	}, settings);
	var that = parseInt(this[0],10);
	var scopeTest = jQuery('<div style="display: none; font-size: 1em; margin: 0; padding:0; height: auto; line-height: 1; border:0;">&nbsp;</div>').appendTo(settings.scope);
	var scopeVal = scopeTest.height();
	scopeTest.remove();
	return (that / scopeVal).toFixed(8) + 'em';
};


$.fn.toPx = function(settings){
	settings = jQuery.extend({
		scope: 'body'
	}, settings);
	var that = parseFloat(this[0]);
	var scopeTest = jQuery('<div style="display: none; font-size: 1em; margin: 0; padding:0; height: auto; line-height: 1; border:0;">&nbsp;</div>').appendTo(settings.scope);
	var scopeVal = scopeTest.height();
	scopeTest.remove();
	return Math.round(that * scopeVal) + 'px';
};

Number.prototype.pxToEm = String.prototype.pxToEm = function(settings){
	//set defaults
	settings = jQuery.extend({
		scope: 'body',
		reverse: false
	}, settings);
	
	var pxVal = (this == '') ? 0 : parseFloat(this);
	var scopeVal;
	var getWindowWidth = function(){
		var de = document.documentElement;
		return self.innerWidth || (de && de.clientWidth) || document.body.clientWidth;
	};	
	
	/* When a percentage-based font-size is set on the body, IE returns that percent of the window width as the font-size. 
		For example, if the body font-size is 62.5% and the window width is 1000px, IE will return 625px as the font-size. 	
		When this happens, we calculate the correct body font-size (%) and multiply it by 16 (the standard browser font size) 
		to get an accurate em value. */
				
	if (settings.scope == 'body' && $.browser.msie && (parseFloat($('body').css('font-size')) / getWindowWidth()).toFixed(1) > 0.0) {
		var calcFontSize = function(){		
			return (parseFloat($('body').css('font-size'))/getWindowWidth()).toFixed(3) * 16;
		};
		scopeVal = calcFontSize();
	}
	else { scopeVal = parseFloat(jQuery(settings.scope).css("font-size")); };
			
	var result = (settings.reverse == true) ? (pxVal * scopeVal).toFixed(2) + 'px' : (pxVal / scopeVal).toFixed(2) + 'em';
	return result;
};

$.fn.equalHeights = function(px) {
	$(this).each(function(){
		var currentTallest = 0;
		$(this).children().each(function(i){
			if ($(this).height() > currentTallest) { currentTallest = $(this).height(); }
		});
		if (!px || !Number.prototype.pxToEm) currentTallest = currentTallest.pxToEm(); //use ems unless px is specified
		// for ie6, set height since min-height isn't supported
		if ($.browser.msie && $.browser.version == 6.0) { $(this).children().css({'height': currentTallest}); }
		$(this).children().css({'min-height': currentTallest}); 
	});
	return this;
};

$(function() {
    App.NewBreederForDelivery();
    
    App.Dialog();
    App.Confirm();
    
    // delivery search by serial_number
    App.SimpleAutcomplete($('#serial_number_ac'), 'delivery/autocomplete_search')
    
    $('#loading-global').hide();
    
    $('button, input[type=submit], .button').button();
   
    $('#loading-global')
       .ajaxStart(function() {
           
    		$(this).show();
       })
       .ajaxStop(function() {
            if (!App.Loading) {
                
    		    $(this).hide();
            } else {
                App.Loading = false;
            }
           
    		$('button, input[type=submit], .button').button();
    		
    		App.SetupForm();
    		//App.Dialog();
        });
    
    App.CatchLoadWeekDataEvent();
    
    App.Datepicker();
    
    //App.SetSelectedBreedersite();
    App.SetSelectValueInSession('select[name=breeder_site_id]', "egg/set_selected_breedersite/");
    App.SetSelectValueInSession('#cast_id', "cast/set_selected_cast/");
    App.SetSelectValueInSession('select[name=stock_yard_id]', 'egg/set_selected_stockyard/');
    
    //App.Egg.UpdatePeoductionData();
    //App.Egg.DeleteProductionData();
    
    //App.Egg.UpdateFoodOrDeathForDay();
    
    //App.Egg.UpdateCommenOrVitamin('.update-production-comment', 'comment');
    //App.Egg.UpdateCommenOrVitamin('.update-production-vitamin', 'vitamin');
    
    if ($('#the-egg-week').length) {
        //App.TriggerLoadWeekDataEvent($('#the-egg-week'), 'egg');
    }
    /*
    $('body').delegate('a', 'click', function() {
        
        if (!$(this).is('.delete')) {
        
            $('#loading-global').show();
        }
        
        return true;
    });
    */
    
    App.SetupForm();
    App.ValidateForm(); 
    
    App.AddBreederFromScratch();
    
    App.SaveBreederAndSite();
    App.SaveBreederAndSite2();
    
    App.CloseFromScartch();
    
    App.Autocomplete($('#buyer_id'),  'breedersite/search_code_and_name');
    
    $('#loading-global').show();
    
    
});

$(window).unload(function() {
    $('#loading-global').show();
    
});  
$(window).load(function() {
    
    $('#loading-global').hide();
});    
  
