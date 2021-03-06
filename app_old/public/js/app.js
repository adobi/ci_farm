var App = App || {};

App.AjaxSubmit = false;

App.Dialog = function() 
{

    $('body').delegate('a[rel*=dialog]', 'click', function() {
        
        $('.dialog').remove();
        
        var self = $(this);
        
        
        var elem = $('<div />', {'class': 'dialog', id: 'dialog_'+(new Date()).getTime(), title: self.attr('title')}).html('<p style = "width: 300px;text-align:center"><img src = "'+App.URL+'img/pie.gif" /></p>');

        elem.dialog({
            modal: false,
            width: 'auto',
            minWidth: 500,
            position:[Math.floor((window.innerWidth / 2)-150),  70],
            open: function(event, ui) {
                
                $.get(self.attr('href'), function(response) {
                    elem.html(response);
                    //alert(window.innerHeight);
                    elem.dialog('option', 'position', [Math.floor(((window.innerWidth  - elem.width()) / 2)), window.pageYOffset]);
                    $('.ui-dialog').css('top',  window.pageYOffset + 70);
                    
                    if ($('form input[type=text]').length) {
                        
                        $.each($('form input[type=text]'), function(index, item) {
                            
                            if ($(item).attr('size') === undefined) {
                                
                                $(item).attr('size', 45);
                            }
                        });
                    }

                    if ($('.datepicker').length) {
                        //console.log('datepicker found');
                        App.Datepicker();
                        
                        $('.datepicker').attr('size', 15);
                    }

                    if ($('#buyer_breeder_site_id').length) {
                        
                        App.Autocomplete($('#buyer_breeder_site_id'),  'breedersite/search_code_and_name');
                    }
                    
                    App.Placeholder();
                    
                    App.CloseDialog();
                    
                    elem.find('form p:last').append('<button class = "close-dialog">Mégsem</button>');

                    //elem.find('button, .button').button();
                    
                    if ($('#breeder_name').length) {
                        
                        App.SimpleAutcomplete($('#breeder_name'), 'breeder/autocomplete_search', App.ShowBreederInfo);
                    }
                });
                
            }
        });
        
        return false;
    });
};
/**
 * szallitolvelenel ajaxosan elmenti az uj tenyeszto formot
 */
App.NewBreederForDelivery = function() 
{
    $('body').delegate('#new-breeder-for-delivery', 'click', function() {
        $(this).parent().prevAll('.select-breeder').find('select').attr('disabled', true);
        
        App.AjaxSubmitFormDialog();
        
        return true;
    });
};
/**
 * ajaxos form mentes dialogbol
 */
App.AjaxSubmitFormDialog = function() 
{
    $('body').delegate('.dialog form', 'submit', function() {
        
        var self = $(this);

        if (!App.Error) {
        	
        	$.post(self.attr('action'), self.serialize(), function(response) {
        		
	        	$('#add-breeder-and-site').find('.select-breeder').append($('<input />',  {
	        		type:'hidden',
	        		name: 'breeder_id',
	        		value: response
	        		//disabled:true
	        	}));
	        	
	        	$('#add-breeder-and-site').find('select').removeAttr('name').attr('disabled', true).removeClass('required');
	        	
	            $('.dialog').dialog('close');
	            
	            $('body').undelegate('.dialog form', 'submit');
        	});
        }
        return false;
    });
};
/**
 * szallitolevelnel megjeleni az uj tenyeszto es tenyeszet hozzaadasa formot
 */
App.AddBreederFromScratch = function() 
{
    
    $('body').delegate('.add-breedersite-from-scratch', 'click', function() {
        var self = $(this);
        
        $('.selected-breedersite-from-scratch').removeClass('selected-breedersite-from-scratch');
        
        self.addClass('selected-breedersite-from-scratch');
        
        $('#add-breeder-from-scratch-form').remove();
        
        self.parents('p:first').after($('<fieldset />', {
            'class':"span-18 round fr",
            'id': "add-breeder-from-scratch-form",
            'style':'background:#F7F7F7'
        }));
        
        $('#add-breeder-from-scratch-form')
            .html('<p style = "text-align:center"><img src = "'+App.URL+'img/pie.gif" /></p>')
            .load(self.attr('href'), function() {
                //App.SimpleAutcomplete($('#breeder_name'), 'breeder/autocomplete_search', function(id) {
                //    console.log('breeder id', id);
                //});
                //console.log($('#add-breeder-and-site'));
                //App.SaveBreederAndSite();
            });
        
        return false;
    });
};

App.SaveBreederAndSite = function() 
{
    $('body').delegate('#save-breedersite-from-scratch', 'click', function() {
        $('#add-breeder-and-site').trigger('submit');
        
        return false;
    });
};

/**
 * szallitolevelnel elmenti az uj tenyeszto es tenyeszet hozzaadasa formot
 */
App.SaveBreederAndSite2 = function() 
{
    $('body').delegate('#add-breeder-and-site', 'submit', function(e) {
    //$('body').delegate('#save-breedersite-from-scratch', 'click', function() {
        //alert('hello');
        
		var self = $(this);//.parents('form:first');
		
		
		if (!App.Error) {
		    
    		$.post(self.attr('action'), self.serialize(), function(response) {
    			// select elemrol levenni a name-et, hidden inputot felvenni
    			var fieldset = $('.selected-breedersite-from-scratch').parents('fieldset:first');
    			
    			var name = fieldset.find('select').attr('name'),
    				elem = $('<input />', {type: 'hidden', name: name, value: response});
    			
    			fieldset.find('select').removeAttr('name').attr('disabled', true).removeClass('required').parents('p:first').append(elem);
    			
    			//fieldset.append(elem);
    			
    			//console.log(elem);
    			$('#add-breeder-from-scratch-form').remove();
    		});
		}
		
		return false;
	});
};

App.CloseFromScartch = function() 
{
    $('body').delegate('.close-from-scratch', 'click', function() {
        var self = $(this);
        
        self.parents('#add-breeder-from-scratch-form').remove();
        
        return false;
    });
};

App.HideBreederInfo = function() 
{
    
    $('body').delegate('.hide-breeder-info', 'click', function() {
        $('#breeder-search-result-by-name').hide();
    });
};

App.ShowBreederInfo = function(id) 
{
    var container = $('#breeder-search-result-by-name');
    
    container.html('<p style = "text-align:center"><img src = "'+App.URL+'img/pie.gif" /></p>').show();
    
    container.load(App.URL+'breeder/get/'+id, function() {
        App.HideBreederInfo();
        
        $('.button').button();
    });
};

App.SimpleAutcomplete = function(element, url, callback) 
{
    element.autocomplete({
        source: App.URL + url,
        select: function(e, ui) {
            var id = ui.item.id;

            if (typeof callback === 'function') {
                
                callback.call(this, id);
            }
        }
    });     
};

App.CloseDialog = function() 
{
    $('body').delegate('.close-dialog', 'click', function() {
        $('.ui-dialog-titlebar-close').trigger('click');
        
        return false;
    });
};

App.Placeholder = function() 
{
    var style = {
        color:'#aaa'
        //fontStyle:'italic'
    }, reset = {
        color:'inherit',
        fontStyle:'inherit'
    };
    
    $.each($('[placeholder]'), function(i, v) {
        if (!$.trim($(v).val())) {
            $(v).css(style);
        }
        $(v).watermark($(v).attr('placeholder'), {className: 'placeholder', useNative: true});
    });                    
    
    $('[placeholder]').focus(function() {
        $(this).css(reset);
    }).blur(function() {
        if (!$.trim($(this).val())) {
            $(this).css(style);
        }
    });
    
};

App.SetupForm = function() {
    if ($('.required').length) {
        
        $.each($('form'), function(i, v) {
            
            if ($(v).find('.required').length && !$(v).find('.message-info').length) {
                
                $(v).prepend('<p class="message-info">a <strong class="star-required">*</strong>-gal jelölt mezők kitöltése kötelező</p>');
            }
            
        });
        
        $.each($('.required'), function(i, v) {
            if (!$(v).prevAll('label').find('.star-required').length) {
                
                $(v).prevAll('label').append(' <strong class="star-required">*</strong>');
            }
        });
    }
};

App.ValidateForm = function() 
{
    
    $('body').delegate('form', 'submit', function() {
        App.Error = false;
        
        var self = $(this), required = self.find('.required'), error = false;

        $.each($('input, textarea, select'), function(i, v) {
            
            $(v).parent().removeClass('error-required');
            
            $(v).val($.trim($(v).val()));
        });
        
        $.each(required, function(i, v) {
            
            if (!$(v).val() || $(v).val() === '0') {
                
                $(v).parent().addClass('error-required');
                
                App.Error = true;
                
                return;
            }
        });
        
        if (App.Error) {
            
            $.scrollTo($('.error-required:first'), 800);
            $.scrollTo('-=100px', 800)
        }
        
        return !App.Error;
    });
};

App.TriggerDialogOpen = function(dialogId) 
{
    $('[dialog_id='+dialogId+']').trigger('click');
};

App.Confirm = function() 
{
    $('body').delegate('.delete', 'click', function() {
        var self = $(this);
        var elem = $('<div />', {title: 'Figyelmztetés'}).html('<p class = "notice">Biztos törlöd?</p>');
        
        elem.dialog({
            modal: true,
            buttons: {
                'Igen': function() {
                    window.location = self.attr('href');
                },
                'Nem': function() {
                    $(this).dialog('close');
                }
            }
        });
        
        return false;
    });  
};

App.Datepicker = function() 
{
    
    $('.datepicker').datepicker('destroy');
    
    $('.datepicker').datepicker({
        dateFormat: 'yy-mm-dd',
        changeYear: true,
        changeMonth: true,
        showMonthAfterYear:true,
        yearRange: '1980:+5'
	});
  
};

App.Autocomplete = function (element, url) 
{
    
    element.autocomplete({
        source: App.URL + url,
        select: function(e, ui) {
            var id = ui.item.id;
            
            element.after($('<input />', {
                type: 'hidden',
                name: element.attr('id'),
                value: id    
            }));
            
            element.removeAttr('name');
        }
    });    
};

App.FakkSortable = function() 
{
    $(".fakks-list").sortable({
		connectWith: ".fakks-list",
		stop: function (event, ui) {
		    var el = ui.item,
		        id = el.attr('fakkid'),
		        o = $(event.target).attr('group'),
		        n = el.parents('.fakks-list').attr('group');
		    
		    $.post(App.URL+'fakk/change_group', 
		        {
		            ci_csrf_token:$.cookie('ci_csrf_token'),
		            old_group: o,
		            new_group: n,
		            fakk_id: id
		        }, 
		        function() {
		        
		        }
		    );
		}
	}).disableSelection();     
};

/*
App.SetSelectedBreedersite = function() {
    $('select[name=breeder_site_id]').bind('change', function() {
        var breederSite = $(this).val();
        
        if ($.trim(breederSite).length && breederSite != 0) {
            
            $.get(App.URL + "egg/set_selected_breedersite/"+breederSite, function() {
                location.reload();
            });
        } 
    });    
};
*/
App.SetSelectValueInSession = function(element, url) 
{
    
    $('body').delegate(element, 'change', function() {
        var value = $(this).val();
        
        if ($.trim(value).length && value != 0) {
            
            $.get(App.URL+url+"/"+value, function() {
                
                location.reload();
            });
            $('#loading-global').show();                
        } 
    });
};

App.CatchLoadWeekDataEvent = function() 
{
    
    $('body').bind('event_load_week_data', function(event, container, controller) {
         
        container.load(App.URL+controller+'/loadweek/'+container.attr('data-week'), function() {
            
            $('.button').button();
        });
    });
};

App.TriggerLoadWeekDataEvent = function(container, controller) 
{
    
    $('body').trigger('event_load_week_data', [container, controller]);
};

