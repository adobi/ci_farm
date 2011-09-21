var App = App || {};

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
                    $('.ui-dialog').css('top',  window.pageYOffset + 70)
                    
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
                    }

                    if ($('#buyer_breeder_site_id').length) {
                        
                        App.Autocomplete($('#buyer_breeder_site_id'),  'breedersite/search_code_and_name');
                    }
                    
                    App.Placeholder();
                    
                    App.CloseDialog();
                    
                    if ($('.required').length) {
                        $('form').prepend('<p class="message-info">a <strong class="star-required">*</strong>-gal jelölt mezők kitöltése kötelező</p>');
                        
                        $.each($('.required'), function(i, v) {
                            
                            $(v).prevAll('label').append(' <strong class="star-required">*</strong>');
                        });
                    }
                    
                    elem.find('form p:last').append('<button class = "close-dialog">Mégsem</button>');

                    elem.find('button').button();
                    
                    if ($('#breeder_name').length) {
                        
                        App.SimpleAutcomplete($('#breeder_name'), 'breeder/autocomplete_search', App.ShowBreederInfo);
                    }
                });
                
            }
        });
        
        return false;
    });
};

App.HideBreederInfo = function() {
    
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
            console.log(id);
            if (typeof callback === 'function') {
                
                callback(id);
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
        color:'#aaa',
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

App.ValidateForm = function() 
{
    
    $('body').delegate('form', 'submit', function() {
        var self = $(this), required = self.find('.required'), error = false;
        
        $.each($('input, textarea'), function(i, v) {
            $(v).val($.trim($(v).val()));
        });
        
        $.each(required, function(i, v) {
            if (!$(v).val()) {
                $(v).parent().addClass('error-required');
                
                error = true;
                
                return;
            }
        });
        
        return !error;
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
}

